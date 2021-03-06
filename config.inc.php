<?php 


/*
 This Script :
	 o - defines constants and settings
	 o - dictates how errors are handled
	 o - defines useful functions
	 o - handles expired passwords
*/
//*******************************************************************************
//************************************SETTINGS***********************************
// Pear configuration
//$pear_path='/htdocs/pear/php';
//set_include_path(get_include_path() . PATH_SEPARATOR . $pear_path);

//define ('IMAGE_MAGICK_DIR','/kunden/homepages/3/d362877227/htdocs/ImageMagick-6.7.7-0/bin');

/*define('MOBILE', ismobile());// this finds if the user is using a mobile device
define('MOB_SUFFIX', '.gif');// this is used in quick_menu.inc.php to find button suffix to be used if mobile device
define('STD_SUFFIX', '.png');
*/

//Template
define ('TEMPLATE','Debs');

//Header Titles
define('HEADER_TITLE','Debenhams Test System');

define ('HEADER_SUBTITLE','Front End Testing');

define ('HEADER_IMAGE','./images/Debenhams.jpg');

define('HEADER_STYLE','includes/style3.css');

define('BANNER_IMAGE','./images/banner.jpg');

define('NO_IMAGE','./images/No_image.jpg');

define('NO_IMAGE_THUMB','./images/No_image_thumb.jpg');

define('HOME_PAGE','/home_page.php');
define('FIXED1_PAGE','/notice_board.php');

define('FIXED2_PAGE','/inform.php?aid=10');

// Flag variable for site status
define ('BOOKING_AGE',0); //Age of the booking before it disappears off view booking- if '0' this setting is ignored (all records displayed)

define('SITE_REGISTRATION_ENABLED',TRUE);

define('LIVE',FALSE);

define('EMAIL','mike.taylor@inamic.co.uk');// This is the email used in error management

define('CONTACT_EMAIL','ros@edingtonvillagehall.org, k@kamart1n.plus.com, mike@edingtonvillagehall.org');

define('CONTACT_TITLE','Edington Village Hall - Website Enquiry Made ');

define('CONTACT_REGARD',serialize(array('The Hall in General', 'Booking the Hall', 'The Hall Website')));

define('NOTICEBOARD_TITLE','<h2>The Notice Board</h2><i>To add your poster contact ~ ros@edingtonvillagehall.org (tel 01278 723095)</i>');

//images that create the notice board
define('CORNTL','grass_corntl.gif');
define('CORNTR', 'grass_corntr.gif');
define('CORNBL','grass_cornbl.gif');
define('CORNBR','grass_cornbr.gif');
define('VERTLEFT','grass_vertleft.gif');
define('VERTRIGHT','grass_vertright.gif');
define('HORZTOP','grass_horztop.gif');
define('HORZBOTTOM','grass_horzbottom.gif');
define('BOARD','cork.jpg');

define('NOTICE_BOARD_BREAK', 1);
define('BASE_URL',''); // this is the sub domain if any

define('DOMAIN', 'http://10.52.54.221/');// this is the full domain used for register.php 

define('ICON', 'favicon.ico');// This is the name of the icon used for the site
//MAP PLACES
define('MAP_TITLE','Edington Village Hall - TA7 9HA');
define('MAPLAT',51.149162);
define('MAPLONG',-2.873988);
define('MAPPLACE', 'Edington Village Hall');
define('MAPDIR','<b> Address:<blockquote> Edington Village Hall <br /> Quarry Ground <br /> Lippets Way <br /> Edington <br /> Bridgwater <br /> Somerset TA7 9HA </blockquote></b>');


//MySQL connection Script

define('MYSQL','../mysqli_connect.php');

date_default_timezone_set('Europe/London');

//Allowed Image types

define('ALLOWED_IMAGES', serialize(array('image/jpg','image/jpeg','image/JPG','image/X-PNG', 'image/PNG','image/png','image/x-png','image/gif', 'application/pdf', 'application/x-pdf', 'application/acrobat', 'applications/vnd.pdf', 'text/pdf', 'text/x-pdf'))); 

// Webpage Images are displayed inside a border this is where you set up the border - TYPE is the style command. NAME is the LOV given to the style displayed in edit_image.php


define ('IMAGE_BORDER_STYLE', serialize(array('none','border:4px double #545565')));
define ('IMAGE_BORDER_NAME', serialize(array('none','double border')));

// This section looks a displaying adverts

define('ADVERTA_WHATSON', serialize(array('/images/advert.gif')));
define('ADVERTB_WHATSON', serialize(array('/images/advert.gif')));
define('ADSPEED',3);



//This section deals with file control - upload and download of files

define ('GALLERY_UPLOAD_LEGEND',' <b>Note:</b> Upload a Photo no bigger than 8MB ');

define ('NOTICE_UPLOAD_LEGEND',' <b>Note:</b> Upload a Image no bigger than 8MB ');

define ('ACTIVITY_UPLOAD_LEGEND',' <b>Note:</b> Upload a Image no bigger than 8MB ');

define('GALLERY_FILESIZE',8524288);

define('NOTICE_FILESIZE',8524288);

define('ACTIVITY_FILESIZE',8524288);

define('ADMIN_FILESIZE',8524288);

define('COMMITTEE_FILESIZE',8524288);

define('USERS_COMMITTEE_NAME','Committee');

define('USERS_FILE_GROUP_NAME', 'My File Access');

define('USERS_COMMITTEE', serialize(array('NONE','COMMITTEE_FILES_1', 'COMMITTEE_FILES_2', 'COMMITTEE_FILES_3', 'COMMITTEE_FILES_4', 'COMMITTEE_FILES_5', 'COMMITTEE_FILES_6', 'COMMITTEE_FILES_7', 'COMMITTEE_FILES_8', 'COMMITTEE_FILES_9',)));

define('USERS_FILE_GROUP', serialize(array('NONE','USER_FILES_1', 'USER_FILES_2', 'USER_FILES_3', 'USER_FILES_4', 'USER_FILES_5', 'USER_FILES_6', 'USER_FILES_7', 'USER_FILES_8', 'USER_FILES_9','USER_FILES_10','USER_FILES_11','USER_FILES_12','USER_FILES_13','USER_FILES_14','USER_FILES_15','USER_FILES_16','USER_FILES_17','USER_FILES_18','USER_FILES_19','USER_FILES_20')));

define('USERS_COMMITTEE_CATEGORY', serialize(array('No Access', 'Committee Files', 'Minutes', 'Building Project', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused')));


define('USERS_FILE_CATEGORY', serialize(array('No Access', 'Polden Productions', 'Booking Contracts', 'Boogie Bears', 'Boogie Woogie', 'Happy Companions', 'Brownies', 'Circuit Training','New Activity1', 'Ladies Who Limber','Upholstery','Bingo','Edington Stay & Play', 'Coffee Stop','New Activity2', 'New Activity3','New Activity4','New Activity5','New Activity6','New Activity7','New Activity8')));



define('COMMITTEE_FILES_1','../../uploads/committee/comm1');
define('COMMITTEE_FILES_2','../../uploads/committee/comm2');
define('COMMITTEE_FILES_3','../../uploads/committee/comm3');
define('COMMITTEE_FILES_4','../../uploads/committee/comm4');
define('COMMITTEE_FILES_5','../../uploads/committee/comm5');
define('COMMITTEE_FILES_6','../../uploads/committee/comm6');
define('COMMITTEE_FILES_7','../../uploads/committee/comm7');
define('COMMITTEE_FILES_8','../../uploads/committee/comm8');
define('COMMITTEE_FILES_9','../../uploads/committee/comm9');

define('USER_FILES_1','../../uploads/users/user1');
define('USER_FILES_2','../../uploads/users/user2');
define('USER_FILES_3','../../uploads/users/user3');
define('USER_FILES_4','../../uploads/users/user4');
define('USER_FILES_5','../../uploads/users/user5');
define('USER_FILES_6','../../uploads/users/user6');
define('USER_FILES_7','../../uploads/users/user7');
define('USER_FILES_8','../../uploads/users/user8');
define('USER_FILES_9','../../uploads/users/user9');
define('USER_FILES_10','../../uploads/users/user10');
define('USER_FILES_11','../../uploads/users/user11');
define('USER_FILES_12','../../uploads/users/user12');
define('USER_FILES_13','../../uploads/users/user13');
define('USER_FILES_14','../../uploads/users/user14');
define('USER_FILES_15','../../uploads/users/user15');
define('USER_FILES_16','../../uploads/users/user16');
define('USER_FILES_17','../../uploads/users/user17');
define('USER_FILES_18','../../uploads/users/user18');
define('USER_FILES_19','../../uploads/users/user19');
define('USER_FILES_20','../../uploads/users/user20');




define('DELETE_FILE_PREFIX','delete_');
define('DELETE_FILE_DIR','../../uploads/bin');

//Picture & Poster Locations

define('TEMP','../../uploads/temp');

define('GALLERY','../../uploads/gallery');

define('GALLERY_THUMBS','../../uploads/gallery/thumbs');

define('GALLERY_ROW_NUMBERS', 8);// This is number of images per row in the gallery

define('GALLERY_THUMB_WIDTH', 120);

define('GALLERY_NUM_VISIBLE', 2);

define('GALLERY_REVEAL_AMT',10);

define('GALLERY_PICTURE_WIDTH', 650);

define('ACTIVITY_THUMB_WIDTH', 120);

define('EVENT_THUMB_WIDTH', 120);

define('EVENT_POSTER_WIDTH', 680);

define('ACTIVITY_POSTER_WIDTH', 680);

define('ACT_WEBPAGE_WIDTH', 250);

define('ACT_WEBPAGE_THUMB_WIDTH',120); 

define('EVENTS','../../uploads/events');

define('EVENTS_THUMBS','../../uploads/events/thumbs');

define('ACTIVITIES','../../uploads/activities');

define('ACTIVITIES_THUMBS','../../uploads/activities/thumbs');

define('NOTICE','../../uploads/notice');

define('NOTICE_THUMBS','../../uploads/notice/thumbs');

define('NOTICE_THUMB_WIDTH', 120);

define('NOTICE_WIDTH', 650);

define('SPONSOR','../../uploads/sponsor');

define('SPONSOR_THUMBS','../../uploads/sponsor/thumbs');

define('SPONSOR_THUMB_WIDTH', 80);

define('SPONSOR_PICTURE_WIDTH', 90);

define('LOG_DOWNLOADS',true);

define ('BADGE','../../uploads/badge');

define ('BADGE_THUMBS','../../uploads/badge/thumbs');

define ('BADGE_WIDTH',120);

define('BADGE_THUMB_WIDTH',24);

//This section contains all the legend settings
define('LEGEND_EVENTS','<b>Welcome to the Village Hall WebSite</b>');

define('LEGEND_ACTIVITY','<b>Hall Notice Board </b><small>click on Activity</small>');

define('LEGEND_GALLERY',' Gallery ');

//This section contains all the page title names

define ('PAGE_VIEWACTIVITY','View Activity');
define ('PAGE_NOTICEBOARD','EVH Home Page');
define ('PAGE_INFORM','Edington Village Hall');
define ('PAGE_WHATSON','Whats On');
define ('PAGE_DIARY','Bookings Diary');
define ('PAGE_GALLERY','Photo Gallery');

// This section contains all of the configurable menu names and screen names
define('MENU', serialize(array('MENU_HOME','MENU_VENUE','MENU_GALLERY','MENU_EVENTS','MENU_ACTIVITIES','MENU_OTHER','MENU_ADMIN')));


define ('MENU_FIXED1', 'Home');

define ('MENU_FIXED1_DESC', 'EVH Home');

define ('MENU_FIXED2','News');

define ('MENU_FIXED2_DESC','Latest News');

define('MENU_VENUE_DESC','Village Hall Facilities');

define('MENU_VENUE','Hall');

define('MENU_ACTIVITIES','Activities');

define('MENU_ACT_DESC','Clubs Activities and Notices');

define('MENU_GALLERY','Gallery');

define('MENU_GALL_DESC','Users Gallery of Pictures');

define('MENU_OTHER','Committee');

define('MENU_OTHER_DESC','File Sharing');

define('MENU_HOME','Home');

define('MENU_HOME_DESC','List of coming events');

define('MENU_ADMIN','Admin');

define('MENU_ADMIN_DESC','Administrative Tasks');

define('MENU_EVENTS','Events');

define('MENU_EVT_DESC','Event Booking and Diary');

define('MENU_BOOKING','Bookings Diary');

define('MENU_BOOK_DESC','Village Hall Bookings Diary');

define('MENU_BOOK_INSTRUCT','Click on date you want to view the bookings for.');

define ('BUTTONTEXT_VIEW_BOOK', 'View Bookings for:');

define ('BUTTONTEXT_MAKE_BOOK', 'Make a Booking');

//Submenu Names
define('SUBMENU_WHATSON','Forthcoming Events');
define('SUBDESC_WHATSON','List of Upcoming Events');
define('SUBMENU_OPPONENT','Opponent - unused');
define('SUBDESC_OPPONENT','Next Opponent -unused');
define('SUBMENU_NTCBOARD','Notice Board');
define('SUBDESC_NTCBOARD','Notice Board');
define('SUBMENU_BOOKINGS','Bookings Diary');
define('SUBDESC_BOOKINGS','Diary of all Confirmed Bookings');
define('SUBMENU_MYBOOKINGS','Edit Fixtures');
define('SUBDESC_MYBOOKINGS','Edit Fixtures and Match details');
define('SUBMENU_PUBGALLERY','Public Gallery');
define('SUBDESC_PUBGALLERY','Public Gallery');
define('SUBMENU_GALLERY','Photo Gallery');
define('SUBDESC_GALLERY','Latest Photos');
define('SUBMENU_TERMS','Terms and Conditions of Hire');
define('SUBDESC_TERMS','By Order of the Committee');
define('SUBMENU_ADDPHOTO', 'Add Photos');
define('SUBDESC_ADDPHOTO','Upload Photos'); 
 
//Notice Board
define ('NB_COUNTDOWN',' On ' );


// This section contains booking Form Display control -  this controls what is displayed on the booking form

define('BOOKING_LOCATION',true);

define('BOOKING_BAR',true);

define('BOOKING_CATEGORY',true);

define('BOOKING_MESSAGE','Hall available for all booking inquiries');

// Activities Facilities and Areas

define('IMAGE_SIZE_PX', serialize(array(120,250,350,500,650)));

define('IMAGE_SIZE_DESC', serialize(array('Tiny','Small','Regular','Large','Huge')));

define('IMAGE_PLACEMENT', serialize(array('Text Only', 'Image Left of Text','Image Right of Text','Image Above Text','Image Below Text')));

define('ACTIVITY_DESC', 'Activity List');
define('ACTIVITY_LIST', serialize(array('Play/Show', 'Film Showing', 'Indoor Sport', 'Live Music', 'Recorded Music', 'Performing Dance', 'Party  or Dinner Party', ' Youth Meeting', 'Club Meeting','Fair or Jumble Sale','Other')));

define('ACTIVITY_HIDDEN', serialize(array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)));
define ('FACILITY_DESC', 'Facilities');
define('FACILITY_LIST', serialize(array('Main Hall', 'Stage and Lighting', 'Kitchen', 'Dishwasher', 'Store Room', 'Committee Room', 'Small Kitchen', 'Lawn <small>(raised lawn area)</small>', 'Car Park <small>(other than parking)</small>','Other <small>(please specify)</small>')));

define('FACILITY_HIDDEN', serialize(array(0, 0, 0, 0, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)));

define('BAR_DESC','Misc');

define('BAR', serialize(array('Bar Licence','Corkage','Prep-Time'))); 

define('BAR_HIDDEN', serialize(array(0, 2, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1)));

// Hire - Price List variables
define('HIRE_PRICES', TRUE); 

define('CURRENCY_SYMBOL', '&pound;');

define('PRICE_MATCH', serialize(array('1. Exact Match','2. Must Match','3. Best Match', '4. Individual Match', '5. Any Match')));

define('PRICE_TYPE', serialize(array('None','Facility','Bar','Activity'))); 

define('PRICE_NOTES', serialize(array('None','Please tick, some areas automatically include other areas (provided at no extra cost)','Please tick, if you intend to provide alcoholic drinks or require bar service for your event.<br /> Tick if you require more than 1 hours prep time','We need to know the nature of the booking, please tick the check box(es) that describe the booking.')));

define('TERMS_COND', TRUE);


// ALL_AREAS - This defines which of the facilities get ticked automatically as part of all areas 
// It works off binary if you just want say the first three boxes the add 1 + 2 + 4 (ie 7) if you want all the boxes then it is
// 1+2+4+8+16+32+64+128+256+512=1023 it is possible to have any button checked or unchecked using this method so if you wanted 
// all checked except the third one it is 1023-4=1019. Typically I use 511 which is all except the last one. 
  
define('ALL_AREAS',511);

//This section deals with Sponsors 

define('SPONSOR_TYPE', serialize(array('Type1', 'Type2', 'Type3' )));

define('SPONSOR_STATUS', serialize(array('Status 1', 'Status2', 'Status3' )));

define ('TOP_ADVERT', serialize(array('','', '')));

define('SIDE_ADVERT1','');
//define('SIDE_ADVERT2','');
define('SIDE_ADVERT2','');
define('SIDE_ADVERT3','');
define('SIDE_ADVERT4','');
define('SIDE_ADVERT5','');


// Allow direct file download (hotlinking)?
// Empty - allow hotlinking
// If set to nonempty value (Example: example.com) will only allow downloads when referrer contains this text

define('ALLOWED_REFERRER', '');

define('LOG_FILE','downloads.log');

//define('ADMIN','../uploads/images');

define('AGENT', md5($_SERVER['HTTP_USER_AGENT']));

define('EXPIRE',7); // Number of days allowed before expirydate stops access

define('BOOKING_DESC', 'Please enter the booking details - if you want your booking to cover several days, we will allow you to do this without having to re-enter any details. If you make a mistake do not worry you will be able to go back and amend or cancel your booking.'); 

define('BOOKING_STATUS',serialize(array('Provisional','Confirmed','Suspended','Move Booking','User Confirmation','Waiting Payment','Unused','Unused','Unused','Delete')));
//ok to call the above eg. $booking_status = unserialize(BOOKING_STATUS);
//then $booking_status[0]='Pending' .. $booking_status[9]='Unused' (look in header.html)
//so if you use it with booking.confirmed init(1) it will decode the the value. 


// This setting decides if the booking status is changed on the booking status screen if the email fires
// In the case below if the admin sets any booking back to provisional(0) or move booking (3) or delete (9) the emails attached to those status will not fire
define('STATUS_EMAIL',serialize(array(FALSE,TRUE,TRUE,FALSE,TRUE,TRUE,TRUE,TRUE,TRUE,FALSE)));


// Ok this is the status that allows you to change the booking date so if you add a booking status of 'Move' then starting at 0 count the status number this is (ie -0=Pending, 1=Approved etc.. 3=move) so now set MOVE_BOOKING to 5 in this example.
//So when you change a status to MOVE you will be allowed to change the booking date. Note: The system emails relyon this being set to 3 (system email id =14)

define ('MOVE_BOOKING',serialize(array(3,0)));
// Ok  This is the status that the user changes on the view booking form.
// When the user confirms it will move it to the status number from position[0] to postion[1] ie if it is - define ('CONFIRM_BOOKING',serialize(array(4,5))); -  then from status 4 to status 5 
define ('CONFIRM_BOOKING',serialize(array(4,5)));

// The next section has to do with the booking $printout
define ('BOOKING_PREFIX','EVH');
define ('BOOKING_LOGO','images/email_head.jpg');
define ('BOOKING_LOGO_HEIGHT',175);
define ('BOOKING_LOGO_WIDTH',900);
define ('BOOKING_INSTRUCTION','Thank you for the booking request. <br />You have been sent an email, please follow instructions in order to complete and confirm the booking.');
define ('BOOKING_FOOTER','<b><small>Debenhams AT Test Team </small></b>');
define ('BOOKING_DIR',2);// This is the user directory number- No Access = 0
define ('BOOKING_HTML',0);// if set to 1 this outputs the automated emails in html ( but you must setup the emails to output html if you set this)

// This section contains invoice payment details
define('BANK_DETAILS',serialize(array('Bank','Sort Code','Account Number','Ref','Notes')));
define('BANK_VALUES',serialize(array('Lloyds TSB','30-91-20','00345811','','Please quote reference on the bank transfer')));

define('CHEQUE_DETAILS',serialize(array('Payable To','Send To','AddLn1','AddLn2','AddLn3','AddLn4','Post Code','Notes')));
define('CHEQUE_VALUES',serialize(array('EDINGTON VILLAGE HALL','Ros Dolding','BACCHUS','Holywell Road','Edington','Bridgwater','TA7 9LD','Please write Inv.No. on back of cheque','')));

//Activity applying for membership wording 

define('APPLY_MEMBERSHIP','Click here to register your interest in joining');


//This next section allows you to control what week days are bookable on your calendar

define('MONDAY',0); // Set to 1 if you wanto to disable mondays on your calendar
define('TUESDAY',0); // Set to 1 if you wanto to disable tuesdays on your calendar
define('WEDNESDAY',0); // Set to 1 if you wanto to disable wednesday on your calendar
define('THURSDAY',0); // Set to 1 if you wanto to disable thursday on your calendar
define('FRIDAY',0); // Set to 1 if you wanto to disable friday on your calendar
define('SATURDAY',0); // Set to 1 if you wanto to disable saturday on your calendar
define('SUNDAY',0); // Set to 1 if you wanto to disable sunday on your calendar

define('WHATSON_HEIGHT', 120);
define('WHATSON_INC', TRUE); //this controls if whatson appears in the notice board
define('WHATSON_HEIGHT_INC', 30);//this controls the height of whatson include in the notice board
define('WHATSON_TYPE','event' );// match, event

define('WHATSON_NB_DAYS',30);// This displays the events and activities that happen from today for the next n days ON THE NOTICE BOARD
define('WHATSON_DAYS',60);// This displays the events and activities that happen from today for the next n days

define('WHATSON_NB_DAYS',30);// This displays the events and activities that happen from today for the next n days ON THE NOTICE BOARD


define('WHATSON_MAX',0);// If this is not 0 then the events/activities will stop if their number exceed this value 
define('WHATSON_MIN',0);// If this is not 0 then if the are not enough events over the next days specified in WHATSON_DAYS then the system will continue to display events until this value is reached
//Note: if min is greater than max then the value of both (max and min) will be taken as 0 and hence ignored. 

define('GROUP_TYPE',serialize(array('Activity','Notice','Hall Committee','Polden Productions','Unused','Unused','Unused','Unused','Unused','Unused'))); // The first two are set in stone so do not change these values.

define('TIME', serialize(array('All Day','0:30 am','1:00 am','1:30 am','2:00 am','2:30 am','3:00 am','3:30 am','4:00 am','4:30 am','5:00 am','5:30 am','6:00 am','6:30 am','7:00 am','7:30 am','8:00 am','8:30 am','9:00 am','9:30 am','10:00 am','10:30 am','11:00 am','11:30 am','12 noon','12:30 pm','1:00 pm','1:30 pm','2:00 pm','2:30 pm','3:00 pm','3:30 pm','4:00 pm','4:30 pm','5:00 pm','5:30 pm','6:00 pm','6:30 pm','7:00 pm','7:30 pm','8:00 pm','8:30 pm','9:00 pm','9:30 pm','10:00 pm','10:30 pm','11:00 pm','11:30 pm','12 midnight')));

define ('DAY_OF_WEEK', serialize(array('Every Day','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')));

define('MEMBERSHIP_STATUS', serialize(array('Pending', 'Active', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused')));

define('GALLERY_COMPLAINT', serialize(array('Complaint')));

define('FORGOT_PWD', serialize(array('Unactivated','Activated','Suspended','Invalid')));

define('USER_STATUS', serialize(array('Registered', 'Suspended', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused', 'Unused','Unused')));

define('EVENT_PUBLISH', serialize(array('Unpublished - Not in Diary or Whats-on &amp; No Poster','Published - In Diary &amp; Whats-On plus Poster','Published - In Diary &amp; a Poster','Published - In Diary &amp; Whats-On, No Poster','Unused','Unused','Unused','Unused','Unused'))); 

define('ACTIVITY_FREQ', serialize(array('Weekly','Fortnightly','Tri-Weekly','Monthly','Bi-Monthly','Quarterly','Half Year','Annually')));

define('SOCIAL_MEDIA', TRUE);

define('FACEBOOK', 'http://www.facebook.com/pages/Edington-Village-Hall-Somerset/261788170518439');

define('TWITTER', 'http://www.twitter.com/edingtonvh');

define('TWITTER_TAG','edingtonvh');

define('TWITTER_SHELL', serialize(array('#1aae94','#ffffff')));

define('TWITTER_SIZE', serialize(array(150,250)));

define('TWITTER_INTERVAL', 20000);

define('TWITTER_TWEETS', serialize(array('#eeeee9','#333333','#e82c2c')));

define('TWITTER_FEATURES',serialize(array('true','false','true','all')));



define('UTUBE', '');

define('WIKI', 'http://en.wikipedia.org/wiki/Edington,_Somerset');

define('MAIL', '/contact.php');


//*******************************************************************************
//************************************ useful functions**************************

// This function converts days into meaningfull times

function when($value=0){
	if($value==0){
		$value =" Today ";
	}
	elseif($value==1) {	
		$value =" Tomorrow ";
	}
	elseif($value>1 && $value< 7) {
		$value = " in $value days time ";
	}
	elseif ($value > 6 && $value < 28){
		$weeks = floor($value/7);
		$value=" in $weeks weeks time ";
	}
	elseif($value > 27 && $value < 364) {
		$months = floor($value/28);
		$value=" in $months months time ";
	}
	elseif($value > 363){
		$years=floor($value/364);
		$value=" in $years years time ";
	} else {$value='';}
return $value;
}

// This takes a decimal number representation of the day(s) of week and output a string of days
function dayofweek($value=0){// if it returns zero something has gone wrong
	if ($value>0 && $value<128){
		switch ($value){
			case 1:
				$dow='Monday';
				break;
			case 2:
				$dow='Tuesday';
				break;
			case 4:
				$dow='Wednesday';
				break;
			case 8:
				$dow='Thursday';
				break;
			case 16:
				$dow='Friday';
				break;
			case 32:
				$dow='Saturday';
				break;
			case 64:
				$dow='Sunday';
				break;
			default:
				$binstring=strrev(str_pad(base_convert($value,10,2),7,"0",STR_PAD_LEFT));
				$addand=FALSE;
				for ($i=0; $i<7; $i++){
					$day=substr($binstring,$i,1);
					if ($day){
						switch ($i){
							case 0:
								$dow='Monday';
								break;
								$addand=TRUE;
							case 1:
								if ($addand){
									$dow.= ' &amp; Tuesday'; 							
								}	else {
									$dow='Tuesday';
									$addand=TRUE;
								}
								break;
							case 2:
								if ($addand){
									$dow.= ' &amp; Wednesday'; 							
								}	else {
									$dow='Wednesday';
									$addand=TRUE;
								}
								break;
							case 3:
								if ($addand){
									$dow.= ' &amp; Thursday'; 							
								}	else {
									$dow='Thursday';
									$addand=TRUE;
								}
								break;
							case 4:
								if ($addand){
									$dow.= ' &amp; Friday'; 							
								}	else {
									$dow='Friday';
									$addand=TRUE;
								}
								break;
							case 5:
								if ($addand){
									$dow.= ' &amp; Saturday'; 							
								}	else {
									$dow='Saturday';
									$addand=TRUE;
								}								
								break;
							case 6:
								if ($addand){
									$dow.= ' &amp; Sunday'; 							
								}	else {
									$dow='Sunday';
								}
								break;
						}
					}
				}
				break;	
		}			
	} else {
		$dow=0;
	}
return $dow;
}

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


function usertomatch($value) {
	$check=strlen($value);
	if ($check<11){ //something is wrong so return nothing
		$value=NULL;
	} else {
		$played=substr($value,-10,10);
		$match=substr($value,0,-10);
		$value="$match on $played";
	}
	return $value;
}



function input_string($value) {
    if(isset($value) && strlen($value)>0){
      return get_magic_quotes_gpc() ? stripslashes(htmlentities($value,ENT_QUOTES,"UTF-8")) : htmlentities($value,ENT_QUOTES,"UTF-8");
    } else {
      $value=NULL;
      return $value;
    }
}
  // use like this  $description = show_string($str_variable)

function show_string($value){
  if(isset($value) && strlen($value)>0){
     $value = get_magic_quotes_gpc() ? stripslashes(html_entity_decode($value ,ENT_QUOTES,"UTF-8")) : html_entity_decode($value ,ENT_QUOTES,"UTF-8") ;
  # & (ampersand) becomes &amp;
  # " (double quote) becomes &quot;
  # ' (single quote) becomes &#039;
  # £ becomes &pound;
     $value = str_replace(" & ","&nbsp;&amp;&nbsp;",$value);
     $value = str_replace("'","&#039;",$value);
//     $value = str_replace('" ',"&quot;&nbsp;",$value);
//     $value = str_replace(' "',"&nbsp;&quot;",$value);
     $value = str_replace("£","&pound;",$value);
     return $value;

   } else {
      $value=NULL;
      return $value;
   }
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




// This function below gives a comma seperated list of  (as in FACILITY_LIST or ACTIVITY_LIST above) for facilities or activities for the number held in the booking table


function booking_list($num=0)
{	// ok lets find the max number of entries in the lists
	$fac_no=count(unserialize(FACILITY_LIST));
	$bar_no=count(unserialize(BAR));
	$act_no=count(unserialize(ACTIVITY_LIST));
	$bin_num=(int) $num;
	$count= (int) max($fac_no,$bar_no,$act_no);
					
// ok now we know the maximum number we can do the conversion
	$str=str_pad(strval(base_convert($bin_num,10,2)),$count,"0",STR_PAD_LEFT);
	//Now reverse the string and add to an array
	for($i=0; $i<$count; $i++){
		$list[$i]=(int) substr($str, (0-($i+1)), 1);
	}
													
	//Now output the array as a comma separated list 
	$booking_list=implode(",",$list);	
	return $booking_list;
	}




// This function below gives a comma seperated list of  (as in FACILITY_LIST or ACTIVITY_LIST above) for facilities or activities for the number held in the booking table
//Use it like this to get list of facilities as comma seperated list ie :-  $fac_list = booked_full_list(1,$booked);  
//Note. Where $booked is a decimal representation of a binary number, change 1 to 2, to get bar, or to 3 to get activity.
 
 function booked_full_list($type=0,$num=0) 
 {
 	$fac_name=unserialize(FACILITY_LIST); //type1
	$bar_name=unserialize(BAR);           //type2	
	$act_name=unserialize(ACTIVITY_LIST); //type3
	$type_str=array();
	$bin_array=explode(",",booking_list($num));
					
	switch($type) {
		case 1:// facility 
			foreach($bin_array as $key =>  $value){
				if ($value){
					$type_str[]=$fac_name[$key];
				}	
			 }
 		break;
		case 2://bar
 			foreach($bin_array as $key =>  $value){
				if ($value){
				$type_str[]=$bar_name[$key];
				}	
			 }
		break;		
		case 3://activity
			foreach($bin_array as $key =>  $value){
				if ($value){
					$type_str[]=$act_name[$key];
				}	
			}
		break;
	}

	$booking_list=implode(",",$type_str);
	return $booking_list;

	}

																																																																																		


function whatson($start_date, $freq, $i=0)//$i is number of days from today 
{
	list	($sd_day,$sd_month,$sd_year)=explode("/",$start_date);
		$sd_dayno=mktime(0,0,0,$sd_month,$sd_day,$sd_year);
	 	$start_wday= date('w',$sd_dayno);
		$start_day_num=($start_wday==0)?7:$start_wday;// =1
		$today = getdate();
	        $td_month = $today['mon'];
	        $td_day = $today['mday'];
		$td_year = $today['year'];
		$days_between = (($today['0']/86400)+$i) - $sd_dayno/86400;
		switch($freq){ // this outputs $skip if it is '1' then skip this record
		case 0: //weekly
		$skip=0;
		break;
		case 1: //biweekly
 		case 2://triweekly
		if ($freq==1){
			$modulus=14;
		} elseif($freq==2) {
			$modulus=21;
		
		}
		$dayno=fmod(($start_day_num+$days_between),$modulus);
		if ($dayno>6 ){
			$skip=1;
		} else {						
			$skip=0;
		}						
 		break;
 		case 3://monthly
		case 4://bimonthly
 		case 5://Quarterly
 		case 6://Half Year
		case 7://Annually
		if($freq==3){
			$gap=1;
		}
		elseif ($freq==4){
			$gap=2;
		} elseif($freq==5) {
			$gap=3;
		} elseif($freq==6) {
			$gap=6;
		} elseif($freq==7) {
			$gap=12;
		}	
		$max_days =(int) cal_days_in_month(CAL_GREGORIAN, $td_month, $td_year);
		if ($max_days>=$sd_day){
			$act_day=$sd_day;
		} else {
			$act_day=$max_days;
		}
		$new_date = $td_month . '/' .$act_day . '/' . $td_year;
		$new_date = strtotime($new_date);
		//$today=date('m/d/Y',mktime(0,0,0,$td_month,$td_day,$td_year));
	//	$today = strtotime($today);
		while (($new_date/86400)+6<(($today['0']/86400)+$i)){
			$new_date = strtotime(date("m/d/Y",$new_date)." +$gap month");
		}
		$start_wday= date('w', $new_date);
		$start_day_num=($start_wday==0)?7:$start_wday;
		$today=$today['0']+($i*86400);

	if($today>=$new_date && $today<=($new_date+(6*86400))){
		$skip=0;			
	} else {
		$skip=1;
	}

	break;
	default:
	$skip=1;
	break;												
}			
//return $dayno;
return $skip;
}
?>
