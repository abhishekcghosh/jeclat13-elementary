<?php
require_once('browser.php');
	$browser = new Browser();
	$bName=$browser->getBrowser();
	$bVer=$browser->getVersion();
	$bUA=$browser->getUserAgent();
	if(strtolower(substr($bUA,0,19))=="facebookexternalhit") {
		$s = "fb good";
	}
	else {
		$s = "fb bad";
	}
	//$val =  "Name: " . $bName. ", Ver: " . $bVer . ", UA: " . $bUA;
?>
<html>
	<head>
    	<title><?php echo $s; ?></title>
    </head>
    <body>
    	<?php echo $s; ?>
    </body>
</html>