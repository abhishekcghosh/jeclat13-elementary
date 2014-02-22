<?php
	//session preliminaries (to avoid header warnings)
	session_start();
	$li_bool = 0;
	if(isset($_SESSION['jeclat13_useremail']) && $_SESSION['jeclat13_useremail']!="") {
		$li_bool = 1;
		$li_email = $_SESSION['jeclat13_useremail'];
		$li_uid = $_SESSION['jeclat13_uid'];
		$li_fullname = $_SESSION['jeclat13_fullname'];
	}
	else {
		$li_bool = 0;
		$li_email = "";
		$li_uid = 0;
		$li_fullname = "Guest";
	}
	//browser detection
	require_once('browser.php');
	$browser = new Browser();
	$bName=$browser->getBrowser();
	$bVer=$browser->getVersion();
	$bUA=$browser->getUserAgent();
	$isGood=false;
	$isReallyBad=false;
	if($bName==Browser::BROWSER_OPERA && $bVer>=9.80) { $bVer=substr($bUA,strrpos($bUA,"/")+1,strlen($bUA)-strrpos($bUA,"/")-1); if($bVer>=12.10) { $isGood=true; } }
	else if($bName==Browser::BROWSER_CHROME && $bVer>=18) { $isGood=true; }
	else if($bName==Browser::BROWSER_FIREFOX && $bVer>=16) { $isGood=true; }
	else if($bName==Browser::BROWSER_SAFARI && $bVer>=5) { $isGood=true; }
	else if($bName==Browser::BROWSER_IE) { if($bVer>=9) { $isGood=true; } else { $isReallyBad=true; } }	
	else if(strtolower(substr($bUA,0,19))=="facebookexternalhit") { $isGood=true; }	
	if($isGood==false)
	{ 
		//oh shit!
		//redirect to alert
		header("location: browser-alert.php");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="expires" CONTENT="Sat, 26 Jan 2013 0:00:00 GMT">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="JECLAT 13, The Annual Cultural Festival of Jalpaiguri Government Engineering College" />
<meta name="keywords" content="cultural, festival, fest, 2013, jgec, jalpaiguri, engineering, college, competitions, events, annual, reunion, ojasvin, irina, seminar, social, night, grand" />
<meta name="author" content="Abhishek Ghosh" />
<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
<title>JECLAT 13</title>
<link rel="stylesheet" href="assets/main-style.css" type="text/css" />
<link rel="stylesheet" href="assets/scrollpath.css" type="text/css" />
<link rel="stylesheet" href="assets/vcarousel/vcarousel.css" type="text/css" />
</head>
<style type="text/css">
	/* loader styles */
	.loaderWindow {
		position: fixed;
		top: 0px;
		bottom: 0px;
		left: 0px;
		right: 0px;
		background-color: #fff;
		z-index: 9000;
		opacity: 1;
		diplay:block;
		
		-webkit-transition: opacity 2s;
		-moz-transition: opacity 2s;
		-o-transition: opacity 2s;
		-ms-transition: opacity 2s;
		transition: opacity 2s;
		
	}
	.loaderTable {
		width: 100%;
		height: 100%;
	}
	.loaderPlease {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: #333;
	}
	.loaderOneLiners {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		color: #333;
		height: 20px;
	}
	@keyframes rotateLoadingAmbigram 
	{
		0% { 	transform: rotate(0deg); 	}
		35% {	transform: rotate(180deg);	}
		100% { 	transform: rotate(180deg);	}
	}
	@-webkit-keyframes rotateLoadingAmbigram
	{
		0% { 	-webkit-transform: rotate(0deg); 	}
		35% {	-webkit-transform: rotate(180deg);	}
		100% { 	-webkit-transform: rotate(180deg);	}
	}
	@-moz-keyframes rotateLoadingAmbigram 
	{
		0% { 	-moz-transform: rotate(0deg); 	}
		35% {	-moz-transform: rotate(180deg);	}
		100% { 	-moz-transform: rotate(180deg);	}
	}
	@-o-keyframes rotateLoadingAmbigram 
	{
		0% { 	-o-transform: rotate(0deg); 	}
		35% {	-o-transform: rotate(180deg);	}
		100% { 	-o-transform: rotate(180deg);	}
	}
	@-ms-keyframes rotateLoadingAmbigram 
	{
		0% { 	-ms-transform: rotate(0deg); 	}
		35% {	-ms-transform: rotate(180deg);	}
		100% { 	-ms-transform: rotate(180deg);	}
	}
	.loaderImageAmbigram
	{
		-webkit-animation: rotateLoadingAmbigram 5s infinite ease-in-out;
		-moz-animation: rotateLoadingAmbigram 5s infinite ease-in-out;
		-o-animation: rotateLoadingAmbigram 5s infinite ease-in-out;
		-ms-animation: rotateLoadingAmbigram 5s infinite ease-in-out;
		animation: rotateLoadingAmbigram 5s infinite ease-in-out;		
    }
	.cssdaNominee {
		position: fixed;
		top: 50px;
		right: 0px;
		z-index: 9500;
	}
</style>
<body>
	
    <!-- css da nominee -->
    <a href="http://cssdesignawards.com/css-web-design-award-nominees.php" target="_blank">
    	<img class="cssdaNominee" src="assets/css-design-awards-nominee-right-black.png" height="96" width="68" />
    </a>
        
    
    <div class="loaderWindow">
    	<table class="loaderTable" border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
            <tr>
                <td align="center">
                    <img class="loaderImageAmbigram" src="assets/rotator-ambigram.png" style="width: 400px; height: 170px"> 
                    <br/><br/><br/>
                    <br/><br/><br/>
                    <br/><br/>
                    <div class="loaderText">
                        <div class="loaderPlease">please bear, as we</div>
                        <br/>
                        <div class="loaderOneLiners" id="loader_oneliners">prepare a journey around the world...</div>
                    </div> 
                    <script type="text/javascript">
						var brk = '~'; 
						var resetTime = 0; 
						function twDisplay(id,content,num) 
						{
							var delay = 50; 
							if (num <= content.length)  
							{
								var lt = content.substr(0,num); 
								document.getElementById(id).innerHTML = lt.replace(RegExp(brk,'g'),'<br \/>');
								num++; 
								if (num > content.length) delay = resetTime * 1000;
							} 
							else 
							{
								document.getElementById(id).innerHTML = ''; num = 0;
							} 
							if (delay > 0) setTimeout('twDisplay("'+id+'","'+content+'","'+num+'")',delay);
						} 
						var gib = new Array('prepare a journey around the world',
											'build the story half a century old',
											'unfurl before you an inter-college fiesta',
											'serve you with a never-before experience',
											'set the projectors',								
											'lay the dias',
											'for eminent personalities to address the audience',
											'wait to serve a cause to the society',
											'arrange the lights to brighten up eight eves this spring',
											'rewind time into the by-gone days',
											'lay out the tables for an evening of togetherness',
											'time up the preparations for five days of competitions',
											'attempt to put together our visions of the future',
											'set the stage for a grand night of celebration and stardom',
											'invite you for an array of open challenges',
											'call for a showcase at the previous editions of this festival',
											'journey to the server to ask for a list of attendees this year',
											'and last but not the least',
											'furnish the dreamliner which shall be yours',
											'as you embark upon this tour'
											);
						var gibB = new Array(gib.length); for(i=0;i<gibB.length;i++) { gibB[i]=0; }
						var timerId;
						var ci = -1;
						function showGibberish()
						{
							ci++;
							if(ci >= gib.length) ci = 0;
							twDisplay("loader_oneliners",gib[ci]+"...",0);
							timerId = setTimeout('showGibberish();',10000);
							
						}
						showGibberish();
					</script>                  
                </td>
            </tr>
        </table>        
    </div>
    
    <!-- load all scripts -->
    <script type="text/javascript" src="assets/jquery-1.8.2.js"></script>
	<script type="text/javascript" src="assets/jquery.scrollpath.js"></script>
    <script type="text/javascript" src="assets/jquery.easing.js"></script>
    <script type="text/javascript" src="assets/prefixfree.min.js"></script>
    <script type="text/javascript" src="assets/scrollpath.worldmap.js"></script>
    <script type="text/javascript" src="assets/paper.js"></script>
    <script type="text/javascript" src="ajax-alumni-register.js"></script>
    <script type="text/javascript" src="ajax-alumni-listview.js"></script>
    <script type="text/javascript" src="ajax-alumni-yearview.js"></script>
    <script type="text/javascript" src="assets/vcarousel/vcarousel.js"></script>
    <script type="text/javascript" src="ajax-feedback.js"></script>
    <script type="text/javascript" src="ajax-user-register.js"></script>
    <script type="text/javascript" src="ajax-user-login.js"></script>

    
    <div class="mapContainer" id="map_container">
    <!-- level 1: z-index 0 -->
        <img id="world_map" class="mapImage" src="assets/whitemap.svgz" />
        <input type="hidden" name="spv1" class="scrollPathVars" id="spvDetachScroll" value="0" />
        <input type="hidden" name="spv2" class="scrollPathVars" id="spvSpeedFactor" value="1" />
        
    <!-- level 2: z-index: 500 -->
        <canvas id="routeMap" height="1920" width="4770"></canvas>
        
    <!-- level 3: z-index: 1000 -->
        <img id="colossus_rhodes" class="landmarkImages" src="assets/small-rhodes.png" />
    	<img id="colosseum_rome" class="landmarkImages" src="assets/small-colosseum.png" />
        <img id="redeemer_rio" class="landmarkImages" src="assets/small-christ-the-redeemer.png" />
        <img id="hollywood_la" class="landmarkImages" src="assets/small-hollywood.png" />
        <img id="bigben_london" class="landmarkImages" src="assets/small-bigben.png" /> 
        <img id="louvre_paris" class="landmarkImages" src="assets/small-louvre.png" /> 
        <img id="icrc_geneva" class="landmarkImages" src="assets/small-icrc.png" /> 
        <img id="grandbazaar_istanbul" class="landmarkImages" src="assets/small-grandbazaar.png" /> 
        <img id="jgec_jalpaiguri" class="landmarkImages" src="assets/small-jgec.png" /> 
        <!-- FLYING BUBBLES -->
        <div class="flyingBubbles" id="bubble_rome">Battle at the Arena</div>
        <div class="flyingBubbles" id="bubble_rio">Party like the Samba!</div>
        <div class="flyingBubbles" id="bubble_hollywood">The One that came before</div>
        <div class="flyingBubbles" id="bubble_london">Turn back Time</div>
        <div class="flyingBubbles" id="bubble_paris">The Story of &Eacute;clat</div>
        <div class="flyingBubbles" id="bubble_geneva">Social Cause</div>
        <div class="flyingBubbles" id="bubble_istanbul">Sponsors</div>
        <div class="flyingBubbles" id="bubble_jalpaiguri">Contact</div>
        <!-- HIGHLIGHT TEXTS -->
        <div class="highlightText" id="hText_rome1">27 Events in 5 Days</div>
        <div class="highlightText" id="hText_rome2">18 to 22 March</div>
        
        <div class="highlightText" id="hText_rio1">3 Performers, 1 Night</div>
        <div class="highlightText" id="hText_rio2">23 March</div>
        
        <div class="highlightText" id="hText_hollywood1">Take a dive into the</div>
        <div class="highlightText" id="hText_hollywood2">Previous Edition of Jeclat</div>
        
        <div class="highlightText" id="hText_london1">Join the Reunion</div>
        <div class="highlightText" id="hText_london2">17 March</div>
        
        <div class="highlightText" id="hText_paris1">Over 50 years of heritage</div>
        <div class="highlightText" id="hText_paris2">Add to the Story</div>
        
        <div class="highlightText" id="hText_geneva1">Lifeline to Society</div>
        <div class="highlightText" id="hText_geneva2">Blood Donation Initiative</div>
        
        <div class="highlightText" id="hText_istanbul1">Promote your Brand</div>
        <div class="highlightText" id="hText_istanbul2">Partner with Us</div>
        
        <div class="highlightText" id="hText_jalpaiguri1">Here's our Number</div>
        <div class="highlightText" id="hText_jalpaiguri2">So Call us, maybe</div>
        
        <!--clouds & ufo -->
        <img src="assets/cloud_1.png" class="landmarkImages landmarkClouds" id="clouds_rio1">
        <img src="assets/cloud_2.png" class="landmarkImages landmarkClouds" id="clouds_rio2">
        <img src="assets/ufo.gif" class="landmarkImages landmarkUFO" id="ufo_atlantic">

        
    <!-- level 4: z-index: 1500 -->
        <img src="assets/ship.png" class="transport ship" id="ship" />
        <img src="assets/plane.png" class="transport plane" id="plane" />
        <img src="assets/plane-c.png" class="transport planeb" id="planeb" />
        <img src="assets/plane-shadow.png" class="transport planeShadow" id="planeShadow" />\
        <img src="assets/plane-c-shadow.png" class="transport planebShadow" id="planebShadow" />\
        <img src="assets/car.png" class="transport car" id="car" />
        
        
    </div>

	
    <!-- level 6: z-index: details panes, zindex 3000 -->
        <!-- details pane : rome -->
        <table class="detailsPane" id="detailsPane_rome" border="0" cellpadding="0" cellspacing="0">
            <tr><td colspan="2" class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rome">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<img src="assets/red-flag.gif" id="detailsPic_romeFlag"/>
                                <br/>
                                <img src="assets/colosseum.png" id="detailsPic_romeColosseum"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_rome">
                                	The Arena
                                    <br/>
                                    <span class="detailsSubHeader">
                                	Cultural Events &amp; Competitions
                                	</span>
                                </p>
                            	<p class="detailsText">
                                	The arena is all set for the beginning of 2013's most awaited competitions in JGEC from 18<sup>th</sup> 
                                    of March, 2013.
                                </p>
                                <p class="detailsText">
                                	Pick up the pen to conquer 
                                    the literary genres, take part in the wars of the melodies, strain your brains to solve mind-boggling 
                                    puzzles, spur into life your talents in multi-directions.
                                </p>                                
                                <p class="detailsText">
                                	Guys &amp; gals!
                                </p>
                                <p class="detailsText">
                                	Let the fires of imagination and the flames of creativity leap inside you. Unleash your spirit to face 
                                    the heated arena of challenging your opponents and let victory be yours!
                                </p>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_romeA">
                                	Check out the Events &raquo;
                                </span>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rome">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="600px" valign="bottom" >
                            	<p class="detailsHeader" id="detailsHeader_rome">
                                	List of Events
                                    <br/>
                                    <!--<span class="detailsSubHeader">
                                	List of Events
                                	</span>-->
                                </p>
                            	<div class="eventNamesList">
                                    Solo Vocal<br/>
                                    Duet Vocal<br/>
                                    Antakshari<br/>
                                    Debate (Open)<br/>
                                    Mock Parliament (Open)<br/>
                                    Press Conference (Open)<br/>
                                    Creative Writing <br/>
                                    Made for Each Other<br/>
                                    Fully Faltoo<br/>
                                    Dumb Charades<br/>
                                    Puzzle<br/>
                                    Gaming - Counter-Strike 1.6 <br/>
                                    Gaming - Age Of Empires II<br/>
                                    Wall Painting<br/>
                                    Laughter Challenge<br/>
                                    Spot Dancing<br/>
                                    Solo Dancing<br/>
                                    Spot Acting<br/>
                                    Spot Recitation<br/>
                                    X-Factor<br/>
                                    Pentathlon (Open)<br/>                                    
                                    Treasure-hunt (in-campus)<br/>
                                    Treasure-hunt (Online, Open)<br/>
                                    Trollmania (Online, Open)<br/>
                                    Photography Contest (Online, Open)<br/>
                                    Flyer Design (Open)<br/>
                                    Cooking Contest<br/>
                                    
								</div> 
                                <br/><br/> 
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_romeB">
                                	&laquo; Back
                                </span>                              
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>&nbsp;
                            	
                            </td>
                        </tr>
                    </table>               
                </td>                
            </tr>
            <tr>
                <td class="detailsPaneBottomRow" colspan="2"></td>           
            </tr>
        </table>
        <!-- details pane : rio -->
        <table class="detailsPane" id="detailsPane_rio" border="0" cellpadding="0" cellspacing="0">
            <tr><td colspan="3" class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rio">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<img src="assets/samba-yellow.png" id="detailsPic_rioSambaYellow"/>
                                <img src="assets/samba-blue.png" id="detailsPic_rioSambaBlue"/>
                                <img src="assets/samba-green.png" id="detailsPic_rioSambaGreen"/>
                                <br/>
                                <img src="assets/christ-the-redeemer.png" id="detailsPic_rioRedeemer"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_rio">
                                	Night of the Living
                                    <br/>
                                    <span class="detailsSubHeader">
                                	46<sup>th</sup> Grand Social Night
                                	</span>
                                </p>
                                <p class="detailsText">
                                	This spring too the city of Rio dresses up to celebrate the famous "Carnival in Rio de Janeiro".
                                </p>
                                <p class="detailsText">
                                	A carnival in JGEC shall also keep the campus in a festive mood full of enthusiastic celebrations on the 
                                    46<sup>th</sup> Grand Social Night!
                                </p>                                
                                <p class="detailsText">
                                	Be ready to witness the rocking performances on the spectacular night of 23<sup>rd</sup> of March, 2013.
                                </p>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_rioA">
                                	Performers &raquo;
                                </span>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rio">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" cellpadding="0" cellspacing="0">
                        <tr>
                            <td valign="bottom" align="center">
                           		<p class="detailsHeader" id="detailsHeader_rio">
                                	Previous Performers at
                                	JECLAT 2012, 2011 &amp; 2010
                                	</span>
                                </p>
                            	<img src="assets/proshows-previous.jpg" height="390" width="662"/>
                             	<br><br>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_rioB">
                                	&laquo; Back
                                </span> | 
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_rioC">
                                	Performers This Year &raquo;
                                </span>
                                
                            </td>
                        </tr>
                    </table>               
                </td>   
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rio">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="left" valign="bottom">                           
                            	<p class="detailsHeader" id="detailsHeader_rio">
                                	Will be updated soon.
                                    <br>
                                <span class="detailsSubHeader">
                                	Keep checking!
                                </span>
                                </p>
                                <br>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_rioD">
                                	&laquo; Back
                                </span>
                            </td>
                        </tr>
                    </table>               
                </td>                
            </tr>
            <tr>
                <td class="detailsPaneBottomRow" colspan="3"></td>           
            </tr>
        </table>
        <!-- details pane : hollywood -->
        <table class="detailsPane" id="detailsPane_hollywood" border="0" cellpadding="0" cellspacing="0">
            <tr><td colspan="2" class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_hollywood">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<img src="assets/holly-lights-l.png" id="detailsPic_hollywoodLightsL"/>
                                <img src="assets/holly-lights-r.png" id="detailsPic_hollywoodLightsR"/>
                                <br/>
                                <img src="assets/hollywood.png" id="detailsPic_hollywoodSign"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_hollywood">
                                	The Way we do it around here
                                    <br/>
                                    <span class="detailsSubHeader">
                                	JECLAT 2012 Tour
                                	</span>
                                </p>
                                
                            	<p class="detailsText">
                                	A glimpse at the previous edition of JECLAT, only for you!
                                </p>
                                <p class="detailsText">
                                	Check it out to find out how festivity coupled with sheer competitive spirits bind all the 
                                    participants and audience throughout the span of this grand celebration each year.
                                </p>                                
                                <p class="detailsText">
                                	Make sure you do not miss your chance to be amongst us this year.
                                </p>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_hollywoodA">
                                	Check out the Video &raquo;
                                </span>
                                <br/><br/><br/>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_hollywood">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td valign="bottom" align="center">
                            	
                                <iframe width="854" height="480" src="http://www.youtube.com/embed/ZK9BxLkGUNM?rel=0" frameborder="0" allowfullscreen></iframe>
                                
                                <br/><br/>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_hollywoodB">
                                	&laquo; Back
                                </span>
                            </td>
                        </tr>
                    </table>               
                </td>                
            </tr>
            <tr>
                <td class="detailsPaneBottomRow" colspan="2"></td>           
            </tr>
        </table>
        <!-- details pane : london -->
        <table class="detailsPane" id="detailsPane_london" border="0" cellpadding="0" cellspacing="0">
            <tr><td colspan="3" class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_london">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<img src="assets/clock-hour-hand.png" id="detailsPic_londonClockHourHand"/>
                                <img src="assets/clock-minute-hand.png" id="detailsPic_londonClockMinuteHand"/>
                            	<br/>
                                <div id="detailsPic_londonBigBen">&nbsp;</div>
                                                              
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_london">
                                	Where Present meets the Past
                                    <br/>
                                    <span class="detailsSubHeader">
                                	Annual Reunion
                                	</span>
                                </p>
                                
                            	<p class="detailsText">
                                	With every rising run journeying to the western horizon a day passes by.
                                	Change walks steadily. JGEC stands upright through changing times.
                                </p>                                
                                <p class="detailsText">
                                	This 17<sup>th</sup> day of March, strong hands of time shall turn backwards when 
                                    the present shall meet the past.
                                </p>
                                <p class="detailsText">
                                	On the evening of reunion, you and your family are cordially invited to spend a few
                                    hours to walk through those old doors.
                                </p>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonA">
                                	Let us know if you are coming &raquo;
                                </span>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_london">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" valign="bottom">
                            	<span class="detailsSubHeader">
                                	What's your Plan for J' 13?
                                </span>
                                <br/><br/>
                                <p class="detailsText">
                                    If you are a JGEC Alumni, we'd be delighted to know what you are planning this JECLAT! 
                                </p>
                                <p class="detailsText">
                                    Please take a minute to fill in our alumni form so that we can prepare better for the forthcoming Reunion. 
                                </p>
                                <br/><br/>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonB">
                                	&laquo; Back
                                </span> | 
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonC">
                                	See who's coming &raquo;
                                </span>
                                <br/><br/>
                            </td>
                            <td width="100px">&nbsp;</td>
                            <td valign="bottom">
                            	<table class="alumnitable" border="0" cellpadding="4" cellspacing="2" style="text-align:left; vertical-align:top">
                                    <tr>
                                        <td colspan="2" align="left" valign="top" style="padding-bottom: 10px; border-bottom: 2px dotted rgba(255,255,255,0.4)">
                                            <p class="detailsHeader" id="detailsHeader_london" style="margin-bottom: 0px">
                                                Please let us know
                                            </p>
                                        </td>                                        
                                    </tr>
                                    <tr valign="top"><td width="180px" style="padding-top: 10px">Your Name</td><td style="padding-top: 10px"><input class="formitems" id="af_name" type="text" name="name" maxlength="256" style="width: 280px" /></td></tr>
                                    <tr valign="top"><td>College Nick</td><td><input class="formitems" type="text" name="collegenick" id="af_nick" maxlength="128" style="width: 200px" title="We all love to know this :)" />&nbsp;<span style="font-weight: normal; font-size: 11px; color: #999"><em>(Optional)</em></span></td></tr>
                                    <tr valign="top"><td>Year of Passing</td><td><select name="year" id="af_year" class="formitems"><?php for($y=2012;$y>=1966;$y--) { echo '<option>' . $y . '</option>'; } ?></select></td></tr>
                                    <tr valign="top"><td>Department</td><td><select name="department" id="af_deptt" class="formitems"><option>CE</option><option>CSE</option><option>ECE</option><option>EE</option><option>IT</option><option>ME</option></select></td></tr>
                                    <tr valign="top"><td>Presently working in</td><td><input class="formitems" type="text" name="company" id="af_company" maxlength="256" style="width: 280px" /></td></tr>
                                    <!--<tr valign="top"><td>Contact Address</td><td><textarea class="formitems" name="address" id="af_address" style="width: 280px; height: 60px" title="1024 Characters Max"></textarea></td></tr>-->
                                    <tr valign="top"><td>Contact #</td><td><input class="formitems" type="text" name="phone" id="af_phone" maxlength="15" style="width: 200px" /></td></tr>
                                    <tr valign="top"><td>Email</td><td><input class="formitems" type="text" name="emailid" id="af_email" maxlength="256" style="width: 280px" /></td></tr>
                                    <tr valign="top"><td>Attending J 13?</td><td><select name="attendingstatus" id="af_status" class="formitems"><option>Yes</option><option>No</option><option>Maybe</option></select></td></tr>
                                    <tr valign="top"><td>&nbsp;</td><td><input class="formitems" id="af_submit" type="submit" name="submit" value=" Submit " onclick="doAlumniRegister()" /></td></tr>
                                </table>
                                
                            </td>
                        </tr>
                    </table>               
                </td>   
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_london">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_london" style="margin-bottom: 0px;">
                                	See who's doing what
                                </p>
                                <p class="detailsText">
                                    Here's a list of all those who have let us know, grouped according to their year of passing. 
                                    Click on a year to open its list:
                                    <div class="multicolyear" id="af_yeardata">
                                        <?php
                                            require_once('module-config.php');
                                            require_once('module-sql-connect.php'); 
                                            $tbl_name=__SQL_TABLE_PREFIX__ . "alumni";
                                            $sql_query="SELECT DISTINCT(yearofpassout) FROM $tbl_name ORDER BY yearofpassout DESC";
                                            $query_result=mysql_query($sql_query);
                                            $yearpresent=0;
                                            while($row=mysql_fetch_array($query_result))
                                            {
                                                $year=$row['yearofpassout'];
                                                echo '<a class="linkyear" onclick="doAlumniListView(' . $year . ')">' . $year . '</a> <br/> ';
                                                $yearpresent=1;
                                            }
                                        ?>
                                    </div>
                                    <span id="af_yearview_nodata" style="color: #666"><?php if($yearpresent==0) { echo 'No registrations yet!'; } ?></span>
                                </p>
                                <br/><br/>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonD">
                                	&laquo; Back
                                </span>
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>&nbsp;
                            	<div class="alumniListData" id="af_listdata">
                                </div>                                
                            </td>
                        </tr>
                    </table>               
                </td>                
            </tr>
            <tr>
                <td class="detailsPaneBottomRow" colspan="3"></td>           
            </tr>
        </table>
        <!-- details pane : paris -->
        <table class="detailsPane" id="detailsPane_paris" border="0" cellpadding="0" cellspacing="0">
            <tr><td colspan="2" class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_paris">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<table cellpadding="0" cellspacing="0" border="0" style="width: 300px;">
                                	<tr>
                                        <td><div class="detailsPic_parisPeople" id="detailsPic_parisPeople1"></div></td>
                                        <td><div class="detailsPic_parisPeople" id="detailsPic_parisPeople2"></div></td>
                                        <td><div class="detailsPic_parisPeople" id="detailsPic_parisPeople3"></div></td>
                                        <td><div class="detailsPic_parisPeople" id="detailsPic_parisPeople4"></div></td>
                                        <td><div class="detailsPic_parisPeople" id="detailsPic_parisPeople5"></div></td>
                                        <td><div class="detailsPic_parisPeople" id="detailsPic_parisPeople6"></div></td>
                                	</tr>
                                </table>
                                <br/>
                                <img src="assets/louvre.png" id="detailsPic_parisLouvre"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_paris">
                                	The Story of &Eacute;clat
                                    <br/>
                                    <span class="detailsSubHeader">
                                	A Timeline
                                	</span>
                                </p>
                                
                            	<p class="detailsText">
                                	The magnanimous glow which adorns the position of JGEC today has been achieved through a period 
                                    spanning over half a century. The story of this institution as a whole unfurls in this timeline. 
                                    It's not what we narrate, it's what you share that shall frame the legacy with which Jalpaiguri 
                                    stands out today.
                                </p>
                                <p class="detailsText">
                                	"JECLAT" (from the word <strong>&eacute;clat</strong>, <em>n.</em> meaning "brilliant display or effect") coined by Manas Dasgupta, 1983 ME, 
                                    also grew up in these years to reach the limelight of 
                                    a national level college festival. 
                                	Please join hands with us and let's all participate in making up this timeline a remarkable <em>story of &eacute;clat</em>, 
                                    the story behind this remarkable successful event and the institution. Please <strong>share with us</strong> the 
                                    <strong>experiences</strong>, <strong>photos</strong>, <strong>videos</strong>
                                    of your golden days in JGEC, memories related to college festivals, celebrations and other things which you feel shall 
                                    give completeness to our timeline.
                                </p>
                                <p class="detailsText">
                                	You can share with us by submitting the <strong>content or a link to it</strong> through 
                                    <a id="linkEclat" target="_blank" href="mailto:jeclat.2k13@gmail.com">mail</a>
                                     or on our 
                                     <a id="linkEclat" target="_blank" href="http://www.facebook.com/jeclat13">Facebook Page</a>
                                </p>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_parisA">
                                	See the Timeline &raquo;
                                </span>
                                
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_paris">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td valign="bottom" align="center">
                            	
                                <iframe src='http://embed.verite.co/timeline/?source=0AkUl3qlghu6BdEMtTzJVSnZESnVtTHpMd0ZReVctNlE&font=Bevan-PotanoSans&maptype=toner&lang=en&start_zoom_adjust=1&height=500' width='100%' height='500' frameborder='0' scrolling="no"></iframe>
                               
                                <br/>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_parisB">
                                	&laquo; Back
                                </span>
                            </td>
                        </tr>
                    </table>               
                </td>                
            </tr>
            <tr>
                <td class="detailsPaneBottomRow" colspan="2"></td>           
            </tr>
        </table>
        <!-- details pane : geneva -->
        <table class="detailsPane" id="detailsPane_geneva" border="0" cellpadding="0" cellspacing="0">
            <tr><td class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_geneva">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<img src="assets/icrc-plus.png" id="detailsPic_genevaPlus" />
                                <br/>
                                <img src="assets/icrc.png" id="detailsPic_genevaICRC"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_geneva">
                                	Blood Donation Initiative
                                    <br/>
                                    <span class="detailsSubHeader">
                                	Social Cause
                                	</span>
                                </p>
                                
                            	<p class="detailsText">
                                	The human nature never gets enshrouded even in the hours of festivity.
                                </p>
                                <p class="detailsText">
                                	JGEC has ever served the society to the fullest. A blood donation intiative opens 
                                    this grand fiesta each year.
                                </p>                                
                                <p class="detailsText">
                                	Serving as the lifeline to many, such an initiative awaits your voluntary participation on 
                                    18<sup>th</sup> March, 2013.
                                </p>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>           
            </tr>
            <tr>
                <td class="detailsPaneBottomRow"></td>           
            </tr>
        </table>
        <!-- details pane : istanbul -->
        <table class="detailsPane" id="detailsPane_istanbul" border="0" cellpadding="0" cellspacing="0">
            <tr><td colspan="2" class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_istanbul">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<span class="detailsPic_rupee" id="detailsPic_rupee1">&#8377;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee2">$</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee3">&euro;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee4">&#8377;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee5">&pound;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee6">$</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee7">&#8377;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee8">&euro;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee9">&#8377;</span>
                                <span class="detailsPic_rupee" id="detailsPic_rupee10">$</span>
                                <br/>
                                <img src="assets/grandbazaar.png" id="detailsPic_istanbulGBazaar"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_istanbul">
                                	Partner with Us
                                    <br/>
                                    <span class="detailsSubHeader">
                                	Sponsorship Opportunities
                                	</span>
                                </p>
                                
                            	<p class="detailsText">
                                	A very nicely organised festival with the participation of thousands of students and alumni is the 
                                    right platform to promote your brand to a larger audience.
                                </p>
                                <p class="detailsText">
                                	Partner with us and sponsor this grand fiesta to enhance the market of your products and services.
                                </p>                                
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_istanbulA">
                                	Our Sponsors &raquo;
                                </span>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_istanbul">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td valign="bottom">
                            	<p class="detailsSubHeader">
                                	Want to sponsor JECLAT 13?
                                </p>
                                <p class="detailsText">
                                	We would love to contact you!
                                </p>
                                <p class="detailsText">
                                   	Please drop a mail at <a id="linkSponsors" target="_blank" href="mailto:sponsorship@jeclat.in">sponsorship@jeclat.in</a>
                                    or contact the people below:
                                </p> 
                                <p class="detailsText" style="margin-left: 20px;">
                                   	Satyabrata Das <br>
                                    +91 - 8944 093 696 <br>
                                    satyabrata.d@jeclat.in<br>
                                    <br>
                                    Soumen Das <br>
                                    +91 - 9475 314 353 <br>
                                    soumen.d@jeclat.in<br>
                                </p> 
                                <br/><br/>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_istanbulB">
                                	&laquo; Back
                                </span>
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td width="550px">
                            	<p class="detailsHeader" id="detailsHeader_istanbul" style="margin-bottom: 6px">
                                	Our Past Sponsors
                                </p>
                            	<div class="detailsSponsorImages">
                                	<img src="assets/past-sponsors.png" height="757" width="532"/>
                                </div>
                                
                            </td>
                        </tr>
                    </table>               
                </td>                
            </tr>
            <tr>
                <td class="detailsPaneBottomRow" colspan="2"></td>           
            </tr>
        </table>
        <!-- details pane : jalpaiguri -->
        <table class="detailsPane" id="detailsPane_jalpaiguri" border="0" cellpadding="0" cellspacing="0">
            <tr><td class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_jalpaiguri">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	<!--<img src="assets/rotator-logo.png" id="detailsPic_jalpaiguriAmbigram"/>-->
                                <img src="assets/smal-star.png" class="detailsPic_fourStar" id="detailsPic_fourStar1"/>
                                <img src="assets/smal-star.png" class="detailsPic_fourStar" id="detailsPic_fourStar2"/>
                                <img src="assets/smal-star.png" class="detailsPic_fourStar" id="detailsPic_fourStar3"/>
                                <img src="assets/smal-star.png" class="detailsPic_fourStar" id="detailsPic_fourStar4"/>
                                <img src="assets/smal-star.png" class="detailsPic_fourStar" id="detailsPic_fourStar5"/>
                                <img src="assets/smal-star.png" class="detailsPic_fourStar" id="detailsPic_fourStar6"/>
                                <br/>
                                <img src="assets/jgec.png" id="detailsPic_jalpaiguriJGEC"/>                                
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td valign="bottom">
                            	<p class="detailsHeader" id="detailsHeader_jalpaiguri">
                                	Contact us
                                    <!--<br/>
                                    <span class="detailsSubHeader">
                                	Contact Us
                                	</span>-->
                                </p>
                                <table id="detailsContactUsTable" border="0" cellpadding="0" cellspacing="0" width="100%" >
                                	<tr>
                                    	<td colspan="3">
                                        	<span class="detailsSubHeader">
	                                              Chief Coordinators
                                             </span>
                                        </td>
                                    </tr>
                                	<tr>
                                    	<td>
                                			Soumen Das	
                                		</td>
                                        <td>
                                        	+91 - 9475 314 353	
                                        </td>
                                        <td>
                                        	soumen.d@jeclat.in
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                			Sabarna Chowdhury
                                		</td>
                                        <td>
                                        	+91 - 9804 443 301
                                        </td>
                                        <td>
                                        	sabarna.c@jeclat.in
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td colspan="3">
                                        	<br>
                                        	<span class="detailsSubHeader">
	                                              Secretaries (Social)
                                             </span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                			Mainak Maitra
                                		</td>
                                        <td>
                                        	+91 - 8900 345 715
                                        </td>
                                        <td>
                                        	mainak.m@jeclat.in
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                			Nilotpal Halder
                                		</td>
                                        <td>
                                        	+91 - 9933 979 953
                                        </td>
                                        <td>
                                        	nilotpal.h@jeclat.in
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                        	<br>
                                        	<span class="detailsSubHeader">
	                                              Secretaries (Cultural)
                                             </span>
                                        </td>
                                    </tr>
                                	<tr>
                                    	<td>
                                			Tamonash Jana
                                		</td>
                                        <td>
                                        	+91 - 9749 963 068
                                        </td>
                                        <td>
                                        	tamonash.j@jeclat.in
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                			Aritra Biswas
                                		</td>
                                        <td>
                                        	+91 - 9474 018 321
                                        </td>
                                        <td>
                                        	aritra.b@jeclat.in
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    	<td colspan="3">
                                        <br>
                                        	<span class="detailsSubHeader">
	                                              Sponsorship
                                             </span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                			Satyabrata Das
                                		</td>
                                        <td>
                                        	+91 - 8944 093 696
                                        </td>
                                        <td>
                                        	satyabrata.d@jeclat.in
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                    	<td colspan="3">
                                        <br>
                                        	<span class="detailsSubHeader">
	                                              You can also reach us at
                                             </span>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                			mail@jeclat.in
                                		</td>
                                        <td colspan="2">&nbsp;
                                			
                                		</td>
                                    </tr>
                                    <tr>
                                </table>
                            </td>
                        </tr>
                    </table>               
                </td>           
            </tr>
            <tr>
                <td class="detailsPaneBottomRow"></td>           
            </tr>
        </table>
        
    <!-- universal close button -->
    <span class="detailsPaneBackButton" id="detailsPane_back">×</span>
    
    <!-- level 8: side pane (tabs) -->
    <table class="sidePaneTabs" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td class="sidePaneTabItems">
            	<img class="sidePaneImages" id="sidePaneImages_updates" src="assets/metro-updates.png">
                <span class="sidePaneImageDesc" id="sidePaneImageDesc_updates">UPDATES</span>
            </td>
        </tr>
        <tr><td class="sidePaneTabItemsGap"></td></tr>
        <tr>
        	<td class="sidePaneTabItems">
            	<img class="sidePaneImages" id="sidePaneImages_register" src="assets/metro-register.png">
                <span class="sidePaneImageDesc" id="sidePaneImageDesc_register">LOGIN/REGISTER & FEEDBACK</span>
            </td>
        </tr>
        <tr><td class="sidePaneTabItemsGap"></td></tr>
        <tr>
        	<td class="sidePaneTabItems">
            	<img class="sidePaneImages" id="sidePaneImages_misc" src="assets/metro-misc.png">
                <span class="sidePaneImageDesc" id="sidePaneImageDesc_misc">ARCHIVES & CREDITS</span>
            </td>
        </tr>
        
        
    </table>
    
    <!-- level 9: side panes (details) zindex 4500 -->
    <!-- side pane: updates -->
    <table class="sidePanes" id="sidePanes_updates" border="0" cellpadding="0" cellspacing="15">
    	<tr>
        	<td height="70px" valign="bottom">
            	<img src="assets/metro-back.png" class="sidePaneBackImages" id="sidePane_backupdates">
            </td>
        </tr>
        <tr>
        	<td valign="top">
            	<span class="sidePaneHeader">Updates</span>
                <br/><br/>
            	<div  class="v-carousel-mask1">
                    <ul id="vcarousel_ul">
                        <?php
                                require_once('module-config.php');
                                require_once('module-sql-connect.php'); 
                                $tbl_name=__SQL_TABLE_PREFIX__ . "updates";
                                $sql_query="SELECT updatevalue FROM $tbl_name ORDER BY upid DESC";
                                $query_result=mysql_query($sql_query);
                                $printed=0;
                                while($row=mysql_fetch_array($query_result))
                                {
                                    $uvalue=stripslashes($row['updatevalue']);
                                    echo '<li>' . $uvalue . '</li>';
                                    $printed=1;
                                }	
								if($printed==0) {
									echo '<li>Fetching Data...</li>';
								}
                         ?>
                    </ul>
                </div>
            </td>
        </tr>
    </table>
    <!-- side pane: register -->
    <table class="sidePanes" id="sidePanes_register" border="0" cellpadding="0" cellspacing="15">
    	<tr>
        	<td height="70px" valign="bottom">
            	<img src="assets/metro-back.png" class="sidePaneBackImages" id="sidePane_backregister">
            </td>
        </tr>
        <tr>
        	<td valign="top">
            	<a class="sidePaneLinks sidePaneLinkTabs sidePaneLinkTabsSelected" id="sidePaneLinkTabs_login" target="_blank">Log In</a> &middot;
                <span id="tabHeadingRegister"><a class="sidePaneLinks sidePaneLinkTabs" target="_blank" id="sidePaneLinkTabs_register">Register</a> &middot;</span>
                <a class="sidePaneLinks sidePaneLinkTabs" target="_blank" id="sidePaneLinkTabs_feedback">Feedback</a>
                <br/><br/>
                <div class="sidePaneInsideTabContents" id="sidePaneLogIn" style="display: block; opacity: 1">
                	<?php
						if($li_bool==1) {
							//logged in
							echo "<div style='line-height: 150%; font-size: 12px'><span style='color: #ccc'>You are logged in as </span><br/>" . $li_fullname . " <span style='color: #ccc'>(" . $li_email . ")<span></div>";
							?>
                            <br/>
                            <a class="sidePaneLinks" target="_blank" href="user-logout.php" id="sidePaneLinkTabs_logout" onClick="doGiveLoginForm()">Log out</a>
                            <Script type="text/javascript">
								$("#tabHeadingRegister").css("display","none");
                            </script>
                            <?php
						}
						else {
					?>
                	<table class="logintable" border="0" cellpadding="4" cellspacing="2" style="text-align:left; vertical-align:top">
                        <tr valign="top"><td>Email<br/><input class="formitems" id="lf_email" type="text" name="email" maxlength="256" style="width: 260px" /></td></tr>
                        <tr valign="top"><td>Password<br/><input class="formitems" type="password" name="password" id="lf_password" maxlength="32" style="width: 260px" /></td></tr>
                        <tr valign="top"><td><input class="formitems" id="lf_submit" type="submit" name="submit" value=" Log In " onclick="doUserLogin()" /></td></tr>
                    </table>
                    <?php
						}
					?>
                </div>
                <div class="sidePaneInsideTabContents" id="sidePaneRegister">
                	<table class="registertable" border="0" cellpadding="4" cellspacing="2" style="text-align:left; vertical-align:top">
                        <tr valign="top"><td>Full Name<br/><input class="formitems" id="rf_fullname" type="text" name="fullname" maxlength="256" style="width: 260px"  /></td></tr>
                        <tr valign="top"><td>College/Institution<br/><input class="formitems" id="rf_college" type="text" name="college" maxlength="256" style="width: 260px" /></td></tr>
                        <tr valign="top"><td>Email<br/><input class="formitems" id="rf_email" type="text" name="email" maxlength="256" style="width: 260px" /></td></tr>
                        <tr valign="top"><td>Contact #<br/><input class="formitems" id="rf_contact" type="text" name="contact" maxlength="16" style="width: 260px" /></td></tr>                        
                        <tr valign="top"><td><input class="formitems" id="rf_submit" type="submit" name="submit" value=" Register " onclick="doUserRegister()" /></td></tr>
                    </table>
                    <p style="font-size: 12px; padding: 10px; color: #ccc">You must register here to participate in the online events of JECLAT 13.</p>
                    <p style="font-size: 12px; padding: 10px; color: #ccc">
                    	Note that, these registrations are meant for participation in online events
                        only. 
                        <br/><br/>
                        For Alumni registrations, please check out the REUNION section of 
                        the website.
                    </p>
                </div>
                <div class="sidePaneInsideTabContents" id="sidePaneFeedback">
                	<!--<div class="v-carousel-mask2">-->
                    <div id="feedbackContainer" style="height: 230px; overflow-y:scroll; overflow-x: hidden;">
                        <!--<ul id="vcarousel_ul2">-->
                        
                            <?php
                                    require_once('module-config.php');
									require_once('module-sql-connect.php'); 
									$tbl_name=__SQL_TABLE_PREFIX__ . "feedback";
									$sql_query="SELECT fid, message, name FROM $tbl_name ORDER BY fid DESC LIMIT 0,100";
									$query_result=mysql_query($sql_query);
									$printed=0;
									$mfid=0;
									while($row=mysql_fetch_array($query_result))
									{
										$fid=stripslashes($row['fid']);
										if($fid>$mfid) { $mfid=$fid; }
										$name=stripslashes($row['name']);
										$message=stripslashes($row['message']);
										echo '<div class="feedbackItem">' . $message . '<br /><em style="color: #ccc"> - ' . $name . '</em></div>';
										$printed=1;
									}
									
                             ?>
                        
                        <input type="hidden" id="ff_lastid" value="<?php echo $mfid; ?>" />
                    </div>
                    <table class="feedbacktable" border="0" cellpadding="4" cellspacing="2" style="text-align:left; vertical-align:top">
                        <tr valign="top"><td>Name<br/><input class="formitems" id="ff_name" type="text" name="name" maxlength="256" style="width: 260px" value="<?php if($li_bool==1) echo $li_fullname ?>" /></td></tr>
                        <tr valign="top"><td>Email<br/><input class="formitems" id="ff_email" type="text" name="email" maxlength="256" style="width: 260px" value="<?php if($li_bool==1) echo $li_email ?>" /></td></tr>
                        <tr valign="top"><td>Feedback<br/><textarea class="formitems" id="ff_feedback" name="feedback" style="width: 260px; height: 60px;" title="900 Characters Max"></textarea></td></tr>                        
                        <tr valign="top"><td><input class="formitems" id="ff_submit" type="submit" name="submit" value=" Submit " onclick="doFeedback()" /></td></tr>
                    </table>
                    
                </div>
                
            </td>
        </tr>
    </table>
    <!-- side pane : credits and archives -->
    <table class="sidePanes" id="sidePanes_misc" border="0" cellpadding="0" cellspacing="15">
    	<tr>
        	<td height="70px" valign="bottom">
            	<img src="assets/metro-back.png" class="sidePaneBackImages" id="sidePane_backmisc">
            </td>
        </tr>
        <tr>
        	<td valign="top">
            	<p class="sidePaneText">
                	<span class="sidePaneHeader">Archives</span>
                    <br/>
                    <ul class="sidePaneList">
                    	<li><a class="sidePaneLinks" target="_blank" href="http://2012.jeclat.in">JECLAT 2012 website</a></li>
                        <li><a class="sidePaneLinks" target="_blank" href="http://2011.jeclat.in">JECLAT 2011 website</a></li>
                    </ul>
                </p>
                <p class="sidePaneText" style="border-top: 1px dotted rgba(255,255,255,0.1); padding-top: 20px">
                	<span class="sidePaneHeader">2013 Website credits</span>
                    <div style="padding: 10px; color: #fff">
                        <span style="font-variant: small-caps; padding-bottom: 10px">Concept &amp; Development</span><br/>
                        Abhishek Ghosh<br/>
                        <br/>
                        <span style="font-variant: small-caps; padding-bottom: 10px">Concept &amp; Content</span><br/>
                        Arka Basak<br/>
                        <br/>
                        <br/><br/>
                        <span style="font-variant: small-caps; padding-bottom: 10px">Copyleft 2013</span><br/>
                        JECLAT 13 Committee<br/>
                    </div>
            </td>
        </tr>
    </table>
    
    
    
    <!-- level 10: topbar: zindex 5000 -->
    <table class="topBar" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td id="topBar_logo">13</td>            
            <td id="topBar_bufferleft">&nbsp;</td>            
            <td class="topBarItems" id="topBar_home" >Home</td>
            <td class="topBarItems" id="topBar_competitions">Competitions</td>
            <td class="topBarItems" id="topBar_socialnight">Social Night</td>
            <td class="topBarItems" id="topBar_j12tour">J '12 Tour</td>
            <td class="topBarItems" id="topBar_reunion">Reunion</td>
            <td class="topBarItems" id="topBar_storyofeclat">Story of &Eacute;clat</td>
            <td class="topBarItems" id="topBar_socialcause">Social Cause</td>
            <td class="topBarItems" id="topBar_sponsors">Sponsors</td>
            <td class="topBarItems" id="topBar_contact">Contact</td>
            <td id="topBar_bufferright">&nbsp;</td>
            <td id="topBar_socialbuttons">
            	<table border="0" cellpadding="0" cellspacing="2" class="socialIconsContainer">
                    <tr>
                        <td><a target="_blank" href="http://www.facebook.com/jeclat13"><div class="socialIcons" id="social_facebook"></div></a></td>
                        <td><a target="_blank" href="http://www.twitter.com/jeclat13"><div class="socialIcons" id="social_twitter"></div></a></td>
                        <td><a target="_blank" href="http://www.youtube.com/jeclat13"><div class="socialIcons" id="social_youtube"></div></a></td>
                        <td><a target="_blank" href="http://plus.google.com/100914136625513351089"><div class="socialIcons" id="social_googleplus"></div></a></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class="topBarIndicator"></div>
    
    <!-- navigation tips: zindex 5000 -->
    <div class="navigationTips" style=" <?php if(isset($_COOKIE['suppress_navtips'])) { echo 'display: none; opacity: 0'; } else { echo 'display: block; opacity: 0'; } ?> " >
    	<div style="padding-bottom: 10px; border-bottom: 2px dotted rgba(255,255,255,0.2);">HOW TO NAVIGATE THIS WEBSITE</div>
        <div>
            <ul class="navigationTipsList">
            	<li>SCROLL to Navigate</li>
                <li>CLICK on Landmark Icons or the Bubbles above them to drop down details</li>
                <li>CLICK on Circular Icons on the right to open side panes</li>
            </ul>
        </div>
        <div style="padding-top: 10px; border-top: 2px dotted rgba(255,255,255,0.2); font-variant: small-caps">
        	<a class="navigationTipsLink" id="navigationTipsLink_close">Close</a> &middot;
            <a class="navigationTipsLink" id="navigationTipsLink_dontshow" target="_blank" href="suppress-navtips.php">Close and Don't show this again</a>
        </div>
    </div>
    
    <!-- details pane : RHODES, ENTRY PANE , zindex: 7000-->
        <table class="detailsPane" id="detailsPane_rhodes" border="0" cellpadding="0" cellspacing="0">
            <tr><td class="detailsPaneTopRow">&nbsp;</td></tr>
            <tr>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rome">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px" align="center" valign="bottom">
                            	
                                <img src="assets/flames.gif" id="detailsPic_rhodesFire" />
                                <br/>
                                <img src="assets/rhodes-fireless.png" id="detailsPic_rhodesColossus"/>                                
                            </td>
                            <td valign="bottom">
                            	<p class="detailsHeaderRhodes">
                                	JECLAT 13                                    
                                </p>
                                <div class="detailsSubHeaderRhodes" style="font-size: 35px">
                                	Annual Cultural Festival
                                </div>
                                <div class="detailsSubHeaderRhodes">
                                	Jalpaiguri Government Engineering College
                                </div>
                                <div class="detailsSubHeaderRhodes" style="padding: 30px 0px; font-size: 35px">
                                	16 - 23 March 2013
                                </div>
                                <p class="detailsText" style="font-variant: small-caps; font-size: 24px; margin: 0px">
                                	Gear up to take the tour of this year's<br/>
                                    edition of JECLAT!                                                               
                                </p>           
                                <p class="detailsText" style="font-variant: small-caps; font-size: 20px; margin: 0px; margin-top: 15px">
                                	You are Tourist
                                    <span style="color: #c00000">
										<?php
                                            require_once('module-sql-connect.php');
                                            //GET MESSAGES
                                            $tbl_name=__SQL_TABLE_PREFIX__ . "general";
                                            $sql_query="SELECT SUM(attribvalue) AS hitsTotal FROM $tbl_name WHERE attribname='hitcount_high' OR attribname='hitcount_low'";
                                            $query_result=mysql_query($sql_query);
                                            $result_row=mysql_fetch_array($query_result);
                                            $hits=$result_row['hitsTotal']+1;
                                            $sql_query="UPDATE $tbl_name SET attribvalue=attribvalue+1 WHERE attribname='hitcount_high'";
                                            $query_result=mysql_query($sql_query);
                                            echo " # " . str_pad(number_format($hits,0,'.',' '),7,'0',STR_PAD_LEFT);
                                        ?>
                                    </span>
                                </p>           
                                <div style="margin-top: 30px; margin-bottom: 15px">
                                    <span class="detailsButtonRhodes" id="detailsButton_rhodes">
                                        Sail Forth &raquo;
                                    </span>
                                </div>
                                <div id="detailsPaneRhodes_hitCount">
                                	
                                </div>
                            </td>
                        </tr>
                    </table>               
                </td>                               
            </tr>
            <tr>
                <td class="detailsPaneBottomRow"></td>           
            </tr>
        </table>
</body>
</html>