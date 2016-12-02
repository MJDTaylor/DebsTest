<?php 


# config.inc.php

/*
 This Script :
	 o - defines constants and settings
	 o - dictates how errors are handled
	 o - defines useful functions
	 o - handles expired passwords
*/
//*******************************************************************************
//************************************SETTINGS***********************************
/*define('MOBILE', ismobile());// this finds if the user is using a mobile device
define('MOB_SUFFIX', '.gif');// this is used in quick_menu.inc.php to find button suffix to be used if mobile device
define('STD_SUFFIX', '.png');
*/

//Template
define ('TEMPLATE','Debs');

//Header Titles
define('HEADER_TITLE','AT Test System');
define('HEADER_SUBTITLE','Front End Testing');
define('HEADER_IMAGE','./images/Debenhams.jpg');
define('HEADER_STYLE','./includes/style3.css');
define('BANNER_IMAGE','./images/banner.jpg');
define('NO_IMAGE','./images/No_image.jpg');
define('NO_IMAGE_THUMB','./images/No_image_thumb.jpg');
define('HOME_PAGE','/home_page.php');

// Flag variable for site status
define('LIVE',FALSE);
define('BASE_URL',''); // this is the sub domain if any
define('DOMAIN', 'http://10.52.54.221/');// this is the full domain used for register.php 
define('ICON', 'favicon.ico');// This is the name of the icon used for the site

date_default_timezone_set('Europe/London');

//Allowed Image types

define('ALLOWED_IMAGES', serialize(array('image/jpg','image/jpeg','image/JPG','image/X-PNG', 'image/PNG','image/png','image/x-png','image/gif', 'application/pdf', 'application/x-pdf', 'application/acrobat', 'applications/vnd.pdf', 'text/pdf', 'text/x-pdf'))); 

// Webpage Images are displayed inside a border this is where you set up the border - TYPE is the style command. NAME is the LOV given to the style displayed in edit_image.php
define ('IMAGE_BORDER_STYLE', serialize(array('none','border:4px double #545565')));
define ('IMAGE_BORDER_NAME', serialize(array('none','double border')));


//This section deals with file control - upload and download of files

define('ACTIVITY_FILESIZE',8524288);
define('ADMIN_FILESIZE',8524288);
define('USERS_FILE_GROUP_NAME', 'My File Access');
define('MYSTRIP_TAGS','<meta><head><body>');

define('USERS_FILE_GROUP', serialize(array('NONE','USER_FILES_1', 'USER_FILES_2', 'USER_FILES_3', 'USER_FILES_4', 'USER_FILES_5', 'USER_FILES_6', 'USER_FILES_7', 'USER_FILES_8', 'USER_FILES_9','USER_FILES_10','USER_FILES_11','USER_FILES_12','USER_FILES_13','USER_FILES_14','USER_FILES_15','USER_FILES_16','USER_FILES_17','USER_FILES_18','USER_FILES_19','USER_FILES_20')));

define('USERS_FILE_CATEGORY', serialize(array('No Access', 'Source File', 'Stripped File','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused')));

define('TEALIUM_FILE_CATEGORY', serialize(array('No Access', 'Unused', 'Unused','Tealium In','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused')));

define('SEO_FILE_NOINDEX', serialize(array('No Access', 'Unused', 'Unused','Unused','Unused','Unused','Loaded URL','Stripped Pages','Failed URLS','Passed URLS','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused')));

define('SEO_FILE_HEADER', serialize(array('No Access', 'Unused', 'Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Loaded URL','Stripped Pages','Failed URLS','Passed URLS','Unused','Unused','Unused','Unused','Unused','Unused','Unused')));

define('SEO_FILE_SOURCE', serialize(array('No Access', 'Unused', 'Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Unused','Loaded URL','Page Source','Rejected URLS','URLs Source Found','Unused','Unused','Unused')));

define('USER_FILES_1','../../uploads/users/user1/');
define('USER_FILES_2','../../uploads/users/user2/');
define('USER_FILES_3','../../uploads/users/user3/');
define('USER_FILES_4','../../uploads/users/user4/');
define('USER_FILES_5','../../uploads/users/user5/');
define('USER_FILES_6','../../uploads/users/user6/');
define('USER_FILES_7','../../uploads/users/user7/');
define('USER_FILES_8','../../uploads/users/user8/');
define('USER_FILES_9','../../uploads/users/user9/');
define('USER_FILES_10','../../uploads/users/user10/');
define('USER_FILES_11','../../uploads/users/user11/');
define('USER_FILES_12','../../uploads/users/user12/');
define('USER_FILES_13','../../uploads/users/user13/');
define('USER_FILES_14','../../uploads/users/user14/');
define('USER_FILES_15','../../uploads/users/user15/');
define('USER_FILES_16','../../uploads/users/user16/');
define('USER_FILES_17','../../uploads/users/user17/');
define('USER_FILES_18','../../uploads/users/user18/');
define('USER_FILES_19','../../uploads/users/user19/');
define('USER_FILES_20','../../uploads/users/user20/');

define('SEO_SEARCH', serialize(array("<meta name=\"robots\" content=\"noindex\">")));
define('SEO_H1_SEARCH', serialize(array("<h1")));
define('SEO_STRIP','<html><head><meta>');
define('SEO_H1_STRIP','<html><meta><h1><style>');

define('DELETE_FILE_PREFIX','delete_');
define('DELETE_FILE_DIR','../../uploads/bin');

//Picture & Poster Locations

define('TEMP','../../uploads/temp');



define('LOG_DOWNLOADS',true);



// Allow direct file download (hotlinking)?
// Empty - allow hotlinking
// If set to nonempty value (Example: example.com) will only allow downloads when referrer contains this text

define('ALLOWED_REFERRER', '');
define('LOG_FILE','downloads.log');

//define('ADMIN','../uploads/images');

define('AGENT', md5($_SERVER['HTTP_USER_AGENT']));
define('EXPIRE',7); // Number of days allowed before expirydate stops access




function ismobile() { //This detects if the user is using a mobile device, if not returns 0. Useful for graphics where mobiles cannot display icos or pngs

	$mobile_browser = '0';
	 
	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
	    $mobile_browser++;
	}
	 
	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
	    $mobile_browser++;
	}    
	 
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
	$mobile_agents = array(
	    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
	    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
	    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
	    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
	    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
	    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
	    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
	    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
	    'wapr','webc','winw','winw','xda ','xda-');
	 
	if (in_array($mobile_ua,$mobile_agents)) {
	    $mobile_browser++;
	}
	 
	if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
	    $mobile_browser++;
	}
	 
	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
	    $mobile_browser = 0;
	}
	return $mobile_browser;
}



function getfilesuffix($value) {
	switch($value) {
		case 'image/gif':
			$type='.gif';
			break;
		case 'image/tiff':
		case 'image/x-tiff':
			$type='.tif';
			break;
		case 'image/png':
			$type='.png';
			break;
		case 'image/x-icon':
			$type='.ico';
			break;					
		default:
			$type='.jpg';
			break;
	}
	return  $type;
}


//************************************Error Management***************************


function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
	$message = "<p> An error occurred in script '$e_file' on line $e_line: $e_message\n<br />";
	
	$message.= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";
	
	$message .= "<pre>" . print_r($e_vars,1) . "</pre>\n</p>";
	
	if (!LIVE){
		echo '<div id="Error">'. $message . '</div><br />';
		} else { //Dont show the error
		mail(EMAIL, 'Edington Village Hall Site Error' ,$message, 'From: admin@edingtonvillagehall.org');
		
		
		// Only print an error message if the error isent a notice
		
		if($e_number != E_NOTICE) {
			echo '<div id = "Error"> A system error occurred. We apologise for the inconvienience.</div><br />';
			}
		} 
}		//End of error handler
		
		set_error_handler('my_error_handler');


// This is used to handle images that are not jpegs that get loadded		

function load_jpeg($image_name) { 
	switch (exif_imagetype($image_name)){ 
		case IMAGETYPE_GIF: 
			$img = imagecreatefromgif ($image_name );
			break; 
		case IMAGETYPE_JPEG : 
			$img = imagecreatefromjpeg($image_name ); 
			break; 
		case IMAGETYPE_PNG : 
			$img = imagecreatefrompng ($image_name ); 
			break; 
		default:
                $img = imagecreatefromgif( $image_name );
                break;
		}
	if (!$img) { 
		/* See if it failed */ 
		$img  = imagecreatetruecolor(150, 30); 
		/* Create a black image */ 
		$bgc = imagecolorallocate($img, 255, 255, 255); 
		$tc  = imagecolorallocate($img, 0, 0, 0); 
		imagefilledrectangle($img, 0, 0, 250, 30, $bgc); 
		/* Output an errmsg */ 
		imagestring($img, 1, 5, 5, "Error loading $image_name", $tc); 
	} 
return $img; 
}

function base_time($convert=1,$value='0')
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		if ($convert){
				$result=substr($characters, $value,1);
					} else {
							$list=array();
									for ($i=0; $i<=61; $i++){
												$list[substr($characters,$i,1)]=$i;
														}
																$result = $list[$value];
																	}    
																	 return $result;
																	 }








?>
