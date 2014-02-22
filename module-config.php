<?php

	//MySQL Server Access Key CONSTANTS							
	define("__SQL_HOST__","localhost",true);							//Server Hostname to MySQL Server
	define("__SQL_USERNAME__","ENTER_USERNAME_HERE",true);						//MySQL System Username for the site
	define("__SQL_PASSWORD__","ENTER_PASSWORD_HERE",true);						//MySQL System user's Password for the site
	define("__SQL_DBNAME__","ENTER_DATABASE_NAME_HERE",true);							//MySQL Database name for the site
	define("__SQL_TABLE_PREFIX__","j13_",true);						//MySQL Table name prefix for the site db
	
	//Site Specification CONSTANTS
	define("__SITE_ADMINEMAIL__","mail@jeclat.in",true);			//Site Admin's Email Address, where error-reports, feedback etc. will go
	define("__SITE_WEBADDRESS__","http://www.jeclat.in/",true);				//Absolute website address, ** with trailing / **

	//Date/Time Default Format/Offset CONSTANTS
	define("__DATE_FORMAT_IP__","Y-m-d H:i:s",true);						//Input  (MySQL Server's accepted format)
	define("__DATE_FORMAT_OP__","d M Y, h:i a",true);						//Output (what looks good to people...)
	define("__TIME_OFFSET_HOUR__","0",true);								//Default hour offset to add to server time while displaying
	define("__TIME_OFFSET_MINUTE__","0",true);								//Default minute offset to add to server time while displaying
	
	
	//Elementary
	define("__ELEMENTARY_LEVEL_COUNT__",30,true);					//elementary level count
?>
