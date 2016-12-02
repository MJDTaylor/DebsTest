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
# mysqli_connect.php                                                                    #
# Contributors: Mike Taylor																				 #
#																													 #
#																													 #	
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
function encrypt($value, $salt='FiEe0"4$s#') {
	$myconst= base64_encode($salt) . base64_encode($value);
	$myconst=base64_encode($myconst);
	return $myconst;	
 }

function decrypt($value,$salt='FiEe0"4$s#'){
	$x=base64_encode($salt);
	$y=strlen($x);	
	$myconst=base64_decode($value);
	$myconst=substr($myconst,$y);	
 	return base64_decode($myconst);	
 }
 
 
//set constants.
DEFINE('DB_USER', encrypt('dbo366491657'));
DEFINE('DB_PASSWORD',encrypt('LNF0wler'));
DEFINE('DB_HOST',encrypt('db366491657'));
DEFINE('DB_NAME',encrypt('db366491657'));

//echo ' ----> ' . decrypt(constant('DB_PASSWORD'));


// make the connection
$dbc=mysqli_connect( decrypt(constant('DB_HOST')) . '.db.1and1.com', decrypt(constant('DB_USER')), decrypt(constant('DB_PASSWORD')), decrypt(constant('DB_NAME')) );


if(!$dbc) {
	
	trigger_error('Could not connect to Database: '. mysqli_connect_error() );
}

?>
