<?php
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
#																													 #
# 		 							*** i N A M I C (UK) Ltd ***										  	 #
#									============================											 #
#																													 #
# This software is solely owned by iNAMIC Ltd (UK) - (Reg. Co. No.7593256)	  			    #
# Copyright © 2011 iNAMIC. All rights reserved.                                         #
# 																								                #
#																													 #
# No part of these Programs may be reproduced or transmitted in any form or by any		 # 
# means, electronic or mechanical, for any purpose.												 #
# The Programs contain proprietary information; they are provided under licence 			 #
# agreement containing restrictions on use and disclosure they are also protected by    #
# copyright, patent, and other intellectual and industrial property laws.					 #
# Reverse engineering, disassembly, or decompilation of the Programs is prohibited.		 #
#																													 #
# membership_security.inc.php                                                           #
# Contributors: Mike Taylor																				 #
#																													 #
#																													 #	
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #

//Lets check we are not being hacked
include_once('/homepages/3/d362877227/htdocs/blackhole/hacker.inc.php');	



// This cursor finds the activities that you are an organiser & have membership and is not expired 
	if (isset($_SESSION['admin'])){
		if ($_SESSION['admin']){
			$q1 = "SELECT activity_id as activity_id, 
						  activity_name as activity_name
				 FROM activity";	
		} else {

			$q1 = "SELECT activity_id as activity_id, 
					  activity_name as activity_name
				 FROM activity 
				 WHERE user_id={$_SESSION['user_id']}  
				 AND ifnull(expire_date,now())>=NOW()
				 UNION
				 SELECT a.activity_id as activity_id, 
				 		  a.activity_name as activity_name
			 	FROM activity a, membership m 
				WHERE a.activity_id = m.activity_id 
			 	AND m.user_id={$_SESSION['user_id']} 
			 	AND admin=1 
			 	AND ifnull(m.expire_date,now())>=NOW() 
			 	AND suspended !=1";
		}
	
	} else {
		header('Location: ' . BASE_URL .'index.php');
		exit();
	
	}		 

	$r1 = @mysqli_query($dbc, $q1);
	$num1 = mysqli_num_rows($r1);

// Ok lets stop unauthorised member access

	if ($num1 == 0){// you dont organise or are the admin of any activities	
		$page_title="Error";
		echo '<p class="error">There are no active activity memberships</p>';
		include('includes/footer.html');
		exit(); 
		}

	while($row1=mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
		$get_act_name[$row1['activity_id']]=$row1['activity_name'];
		$activity_id[]=$row1['activity_id'];
	}

// check that the activity being given is correct (user not trying to blag it)
	if (!isset($aid)){
		header('Location: ' . BASE_URL .'index.php');
		exit(); 
		}

	if (!isset($get_act_name[$aid]) || !isset($_SESSION['user_id'])){// Ok you need to stop here
		header('Location: ' . BASE_URL .'index.php');
		exit();
		}
		
?>