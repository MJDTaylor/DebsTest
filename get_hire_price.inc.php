<?php
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
#                                                                                       #
#                          *** i N A M I C (UK) Ltd ***                                 #
#                          ============================                                 #
#                                                                                       #
# This software is solely owned by iNAMIC Ltd (UK) - (Reg. Co. No.7593256)              #
# Copyright © 2011 iNAMIC. All rights reserved.                                         #
#                                                                                       #
#                                                                                       #
# No part of these Programs may be reproduced or transmitted in any form or by any      # 
# means, electronic or mechanical, for any purpose.                                     #
# The Programs contain proprietary information; they are provided under licence         #
# agreement containing restrictions on use and disclosure they are also protected by    #
# copyright, patent, and other intellectual and industrial property laws.               #
# Reverse engineering, disassembly, or decompilation of the Programs is prohibited.     #
#                                                                                       #
# get_hire_price.php                                                                    #
# Contributors: Mike Taylor                                                             #
#                                                                                       #
#                                                                                       #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
//Ok This include gets the hire price for a booking



function get_hire_price($price_type=0,$booking_date=0,$booked=0,$time_from=0,$time_to=0, $activity_id=0)
{

	//$price_type is the constant 'PRICE_TYPE' value
	//$booking date is the date of the booking - format DD/MM/YYYY ie 13/7/2011
	//$booked is the things that are booked as a number (before binary conversion)
	//$time_from  and time to is the actual value in  TIME constant so you will need to convert this to a number of not there it gets set to 0
	//this function returns an array($price_id,$price);

	// security not required as this is an include - but should be put in the config directory so it cannot be downloaded

	//Now get the constants 
	$price_type_list=unserialize(PRICE_TYPE);
	$dow_list=unserialize(DAY_OF_WEEK);
	$time_list=unserialize(TIME);
	$match_list = unserialize(PRICE_MATCH);	
	unset($left_over); // just to be sure
	$skip_contains = FALSE;
	$continue=$price_type; // Ok if price type is 0 price and id are always going to return 0

	// Get the time intervals from the time list
	$time_id_list=array(); 
	foreach ($time_list as $key => $value)
	{
		$time_id_list[$value]= (int) $key;
	}

	// dont need to check as this should be pre validated by the form

	$time_units = count($time_list);
	$tfrom=$time_id_list[$time_from];
	$tto=$time_id_list[$time_to];
	
	if ($tto<=$tfrom){ //extend the period of time to if time from is zero  eg. if it is all day to 1am  
		$tto=$tto+$time_units;
	} 
	$time_interval=$tto - $tfrom;
	

	// Get the day from the date 
	if ($booking_date !=0){
		list($day,$month,$year)=explode("/", $booking_date);
		if (is_numeric($day) && is_numeric($month) && is_numeric($year)){			
			$day_num = (int) date("N",mktime(0,0,0,$month,$day,$year));	
			//$day_of_week = $dow_list[$day_num];
		} else { 
			$day_num=0; // ok set to every day
			//$day_of_week = $dow_list[$day_num];
		}
	}
	
	//create a booking date that can be used in mysql

	$sql_booking_date="$year-$month-$day";

	// lets check that the hire type is set and correct
	if (!isset($price_type_list[$price_type])){// check it is a valid hire type if not set it to zero
		$price_type=0;
		}
	

	
	// Create the Time - from  & to - sql decode	statements 
	
	
	$tf_clause='CASE time_from';
 	$tt_clause='CASE time_to';
 	$when = ' ';
 	$i=0;
 	while(isset($time_list[$i])){
 		$when .= "when '{$time_list[$i]}' then $i ";
 		$i++;
 	}	
 	$when .= "END";
 	$tf_clause.="$when as new_time_from";
 	$tt_clause.="$when as new_time_to";
	$time_diff = "$tfrom - CASE time_from $when as time_diff" ;
	
	
	// ok time to go to the database	
//$x='Here we are<br />';
	global $dbc;

		
		if ($continue){
		// EXACT MATCH	
		// looking for exact match(ie price_match=0) on facilities (ie price_type=1)
		//  Important Note: Careful with this SQL when editing  - it contains fewer cols (no number of ticks col )  than the other sql statements -  so the 'select' and 'order by' is different 		
			$q ="SELECT price_id, 
						TO_DAYS('$sql_booking_date') - TO_DAYS(effective_from) as days_interval,						
						$time_diff,
						$tf_clause,						 
						$tt_clause,
						price
				  FROM price_list
				  WHERE '$sql_booking_date' BETWEEN effective_from AND ifnull(effective_to, DATE_ADD(CURDATE(), INTERVAL 1 YEAR) )
				  AND day_of_week = if(day_of_week=0,day_of_week,$day_num)
				  AND activity_id IN (0, $activity_id)
				  AND price_type=$price_type
			  	  AND price_match=0
			  	  AND booked=$booked
			     HAVING new_time_from <= $tfrom
				  AND if(new_time_from >= new_time_to, new_time_to + $time_units, if(new_time_from=0, new_time_to + $time_units, new_time_to)) >= $tto
		   	  ORDER BY days_interval asc, price asc, time_diff asc LIMIT 1
			 	  ";
//$x.=$q; 
			$r = mysqli_query($dbc, $q);
			$num = mysqli_num_rows($r);
			// Right if number of rows is 0 we get the next match if it is 1 then we stop if it is greater than 1 we have to do it bit more !
	
			if ($num ==1){

				$continue = 0;
				$row=mysqli_fetch_array($r, MYSQLI_ASSOC); // only need the first record chuck the rest away	
				$price = $row['price'];
				$price_id = $row['price_id'];
			
			} else {
			
				$continue = 1;
			}
		
			mysqli_free_result($r);	 
		} else {
			$price_id = 0;
			$price=0;
		}
		

			
		if ($continue){
			// MUST MATCH -  (ie price_match=1) on facilities (ie price_type=1) 	
			$q ="SELECT price_id,
							booked,
							length(replace(conv(booked,10,2),'0','')) as num_of_ticks,
							TO_DAYS('$sql_booking_date') - TO_DAYS(effective_from) as days_interval,
							$time_diff,
							$tf_clause, 
							$tt_clause,
							conv(replace(replace(conv( (conv(conv(booked,10,2),4,10)*2) + conv(conv($booked,10,2),4,10) ,10,4),'2','0'),'3','0'),2,10) as left_over,
							price
				  FROM price_list
				  WHERE '$sql_booking_date' BETWEEN effective_from AND ifnull(effective_to, DATE_ADD(CURDATE(), INTERVAL 1 YEAR) )
				  AND day_of_week = if(day_of_week=0,day_of_week,$day_num)
				  AND activity_id IN (0, $activity_id)
				  AND price_type=$price_type
			  	  AND price_match=1			  	 
				  AND conv(replace(replace(conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3),'1','0'),'2','1'),2,10) = booked
				  HAVING new_time_from <= $tfrom
				  AND if(new_time_from >= new_time_to, new_time_to + $time_units, if(new_time_from=0, new_time_to + $time_units, new_time_to)) >= $tto
				  ORDER BY days_interval asc,  num_of_ticks asc, price asc, time_diff asc LIMIT 1
				 ";
//$x.=$q;
			$r = mysqli_query($dbc, $q);
			$num = mysqli_num_rows($r);
			



	
/*
Notes on Base Jumping - Patent Pending- this  is the bit that works out if there is an includes match
=====================================================================================================
AND conv(replace(replace(conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3)'1','0'),'2','1'),2,10)=booked
1 convert booked and $booked to binary then that string pretend it is a trinary string (base jump)  and covert it to decimal (to get new_booked and new_$booked) then add the two values together  
2. add actual booked and the price list booked and then convert to base 3 ie. conv(new_booked + new_$booked,10,3)
This will show all the matches with the number 2
3. Now remove al the number 1's so only the twos remain  ie replace(conv(new_booked+$new_booked,10,3)'1','0').
4. Now convert those 2's back to ones (replace(replace(conv(booked+$booked,10,3)'1','0'),'2','1').
this will get you back to the binary string
5. convert that binary string into a decimal value this should then be equal to your price list booked amount if you have an includes match 
ie. conv(replace(replace(conv(booked+$booked,10,3)'1','0'),'2','1'),2,10)=booked.
												
*/	
	

			// Right if number of rows is 0 we get the next match if it is 1 then we stop if it is greater than 1 we have to do it bit more !
	
			if ($num >=1){

				$continue = 0;
				$row=mysqli_fetch_array($r, MYSQLI_ASSOC);// only need the first record chuck the rest away		
				$price = $row['price'];
				$price_id = $row['price_id'];
				$left_over= $row['left_over'];
			
			
			} else {
			
			$continue = 1;
			}
		
			mysqli_free_result($r);	 

		}	

		if ($continue){ //MAY MATCH (ie price_match=2) on facilities (ie price_type=1) 
	
			$q ="SELECT price_id,
							booked,
							length(replace(replace(replace(conv((conv(conv(booked,10,2),4,10)*2)+conv(conv($booked,10,2),4,10),10,4),'2','0'),'1','0'),'0','')) as num_of_ticks,
							TO_DAYS('$sql_booking_date') - TO_DAYS(effective_from) as days_interval,
							$time_diff,
							$tf_clause, 
							$tt_clause,
							conv(replace(replace(conv( (conv(conv(booked,10,2),4,10)*2) + conv(conv($booked,10,2),4,10) ,10,4),'2','0'),'3','0'),2,10) as left_over,
							price
				  FROM price_list
				  WHERE '$sql_booking_date' BETWEEN effective_from AND ifnull(effective_to, DATE_ADD(CURDATE(), INTERVAL 1 YEAR) )
				  AND day_of_week = if(day_of_week=0,day_of_week,$day_num)
				  AND activity_id IN (0, $activity_id)
				  AND price_type=$price_type
			  	  AND price_match=2		  	  			  	  
				  AND length(replace(replace(replace(conv((conv(conv(booked,10,2),4,10)*2)+conv(conv($booked,10,2),4,10),10,4),'2','0'),'1','0'),'0',''))>0          
				  HAVING new_time_from <= $tfrom
				  AND if(new_time_from >= new_time_to, new_time_to + $time_units, if(new_time_from=0, new_time_to + $time_units, new_time_to)) >= $tto
				  ORDER BY days_interval asc,  num_of_ticks desc, price asc, time_diff asc LIMIT 1
				 ";
//$x=$q;				 
/* //Notes
1.conv(booked,10,2) converts to binary string
2. conv(conv(booked,10,2),3,10) takes binary string and pretends its trinary making it decimal
3. do the same to the actual booking - conv(conv($booked,10,2),3,10)
4. add the two together and display as a trinary string  - conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3)
5  get the string length  - length(conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3))
6. rip out the number 2 from the string - replace(conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3),'2','')
7. now take the string length in 5 and minus the sting length in 6 if it is zero then the actual value excludes those facilities in the price list.
*/

			$r = mysqli_query($dbc, $q);
			$num = mysqli_num_rows($r);
			// Right if number of rows is 0 we get the next match if it is 1 then we stop if it is greater than 1 we have to do it bit more !
	
			if ($num >=1){

				$continue = 0;
				$row=mysqli_fetch_array($r, MYSQLI_ASSOC);// only need the first record chuck the rest away		
				$price = $row['price'];
				$price_id = $row['price_id'];
				$left_over= $row['left_over'];

			
			} else {
			
			$continue = 1;
			}
			
			mysqli_free_result($r);	 

		}	


 // The system always looks for 'Contains' match (ie price_match=3) on facilities (ie price_type=1) 

		// Note this has number of ticks descending unlike the others that has this acending
//$x.=$left_over;
		if(isset($left_over)){ // left over is set by includes and is the remainer of what needs to be chared for not picked up by includes
				if ($left_over){// ok is there anything but zeros left over 
					$booked=$left_over;
					$contains=TRUE;
				} else { // if nothing but zeros left over we can skip the contains section
					$contains=FALSE;
				}
			} else {
				$contains=FALSE;
			}
		
		
		if ($contains || $continue){//  This only gets run if no matches have been found so far or the include matches have something left over  	
		// INDIVIDUAL MATCH					
			$q ="SELECT 0 as price_id,
							booked,
							length(replace(conv(booked,10,2),'0','')) as num_of_ticks,
							TO_DAYS('$sql_booking_date') - TO_DAYS(effective_from) as days_interval,
							$time_diff,
							$tf_clause, 
							$tt_clause,
							sum(price) as price
				  FROM price_list
				  WHERE '$sql_booking_date' BETWEEN effective_from AND ifnull(effective_to, DATE_ADD(CURDATE(), INTERVAL 1 YEAR) )
				  AND day_of_week = if(day_of_week=0,day_of_week,$day_num)
				  AND activity_id IN (0, $activity_id)
				  AND price_type=$price_type
			 	  AND price_match=3
			 	  AND length(conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3))-length(replace(conv(conv(conv(booked,10,2),3,10)+conv(conv($booked,10,2),3,10),10,3),'2','')) = length(replace(conv(booked,10,2),'0',''))
			 	  HAVING new_time_from <= $tfrom
				  AND if(new_time_from >= new_time_to, new_time_to + $time_units, if(new_time_from=0, new_time_to + $time_units, new_time_to)) >= $tto  LIMIT 1
				 ";
//$x=$q;

			$r = mysqli_query($dbc, $q);
			$num = mysqli_num_rows($r);
			// Right if number of rows is 0 we get the next match if it is 1 then we stop if it is greater than 1 we have to do it bit more !
	
			if ($num ==1){

				$continue = 0;
				$row=mysqli_fetch_array($r, MYSQLI_ASSOC);	// only need the first record chuck the rest away	
				if (isset($price)){
					$price = $price + $row['price'];
					$price_id = $row['price_id'];
				} else {
					$price = $row['price'];
					$price_id = $row['price_id'];
				}
				mysqli_free_result($r);	 
			}	
		}

		if ($continue){ //no include matches found look for an 'Any  match (ie price_match=4) on facilities (ie price_type=1) 
		//ANY MATCH
			$q ="SELECT price_id,
							booked,
							TO_DAYS('$sql_booking_date') - TO_DAYS(effective_from) as days_interval,
							$time_diff,
							$tf_clause, 
							$tt_clause,
							price
				  FROM price_list
				  WHERE '$sql_booking_date' BETWEEN effective_from AND ifnull(effective_to, DATE_ADD(CURDATE(), INTERVAL 1 YEAR) )
				  AND day_of_week = if(day_of_week=0,day_of_week,$day_num)
				  AND activity_id IN (0, $activity_id)
				  AND price_type=$price_type
			 	  AND price_match=4
			 	  AND $booked >0
			 	  HAVING new_time_from <= $tfrom
				  AND if(new_time_from >= new_time_to, new_time_to + $time_units, if(new_time_from=0, new_time_to + $time_units, new_time_to)) >= $tto
				  ORDER BY days_interval asc, price asc, time_diff asc LIMIT 1
				 ";

//$x=$q;
			$r = mysqli_query($dbc, $q);
			$num = mysqli_num_rows($r);
			// Right if number of rows is 0 we get the next match if it is 1 then we stop if it is greater than 1 we have to do it bit more !
	
			if ($num >=1){

				$continue = 0;
				$row=mysqli_fetch_array($r, MYSQLI_ASSOC);	// only need the first record chuck the rest away	
				$price = $row['price'];
				$price_id = $row['price_id'];
			
			} else {//Ok we have failed to find a price match
				$price=0;
				$price_id=0;

			}
		
			mysqli_free_result($r);	 

		}	
	
	
	
// Ok lets perform the return
// return array($price_id,$x);
// if debugging also change print_booking.inc.php printout  on line 152
return array($price_id,$price);

}



?>
