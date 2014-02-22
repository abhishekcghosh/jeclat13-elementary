<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="JECLAT 13, The Annual Cultural Festival of Jalpaiguri Government Engineering College" />
<meta name="keywords" content="cultural, festival, fest, 2013, jgec, jalpaiguri, engineering, college, competitions, events, annual, reunion, ojasvin, irina, seminar, social, night, grand" />
<meta name="author" content="Abhishek Ghosh" />
<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
<title>JECLAT 13</title>
<link rel="stylesheet" href="assets/main-style.css" type="text/css" />
<link rel="stylesheet" href="assets/scrollpath.css" type="text/css" />
<script type="text/javascript" src="assets/jquery-1.8.2.js"></script>
<script type="text/javascript" src="assets/jquery.scrollpath.js"></script>
<script type="text/javascript" src="assets/jquery.easing.js"></script>
<script type="text/javascript" src="assets/prefixfree.min.js"></script>
<script type="text/javascript" src="assets/scrollpath.worldmap.js"></script>
<script type="text/javascript" src="assets/paper.js"></script>

</head>
<body>
	
    <div class="mapContainer" id="map_container">
    <!-- level 1: z-index 0 -->
        <img id="world_map" class="mapImage" src="assets/whitemap.svgz" />
        <input type="hidden" name="spv1" class="scrollPathVars" id="spvDetachScroll" value="0" />
        <input type="hidden" name="spv2" class="scrollPathVars" id="spvSpeedFactor" value="1" />
        
    <!-- level 2: z-index: 500 -->
        <canvas id="routeMap" height="4103" width="8000"></canvas>
        
    <!-- level 3: z-index: 1000 -->
        <img id="colossus_rhodes" class="landmarkImages" src="assets/rhodes.png" />
    	<img id="colosseum_rome" class="landmarkImages" src="assets/colosseum.png" />
        <img id="redeemer_rio" class="landmarkImages" src="assets/christ-the-redeemer.png" />
        <img id="hollywood_la" class="landmarkImages" src="assets/hollywood.png" />
        <img id="bigben_london" class="landmarkImages" src="assets/bigben.png" /> 
        <img id="louvre_paris" class="landmarkImages" src="assets/louvre.png" /> 
        <img id="icrc_geneva" class="landmarkImages" src="assets/icrc.png" /> 
        <img id="grandbazaar_istanbul" class="landmarkImages" src="assets/grandbazaar.png" /> 
        <img id="jgec_jalpaiguri" class="landmarkImages" src="assets/jgec.png" /> 
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
        <div class="highlightText" id="hText_rome1">25 Events in 5 Days</div>
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
        
        <div class="highlightText" id="hText_jalpaiguri1">Here's our Number!</div>
        <div class="highlightText" id="hText_jalpaiguri2">So Call us, maybe?</div>
        
        
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
                            <td width="400px">
                            	Events List
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	Events Details
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_romeB">
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
                                	Who's Performing &raquo;
                                </span>
                                <br/><br/><br/>
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rio">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px">
                            	Performer List
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	XX
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_rioB">
                                	&laquo; Back
                                </span> | 
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_rioC">
                                	Front &raquo;
                                </span>
                            </td>
                        </tr>
                    </table>               
                </td>   
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_rio">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px">
                            	Performer list
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	XX
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
                            <td width="400px">
                            	Video
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	Events Details
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
                            <td width="400px">
                            	Enroll
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	XX
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonB">
                                	&laquo; Back
                                </span> | 
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonC">
                                	Front &raquo;
                                </span>
                            </td>
                        </tr>
                    </table>               
                </td>   
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_london">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px">
                            	WHo's enrolled
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	XX
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_londonD">
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
                                    a national level college festival. An identity marked by its very presence, we are committed to take this 
                                    institute to the pinnacle of glory and excellence.
                                </p>                                
                                <p class="detailsText">
                                	Please join hands with us and let's all participate in making up this timeline a remarkable <em>story of &eacute;clat</em>, 
                                    the story behind this remarkable successful event and the institution. Please <strong>share with us</strong> the 
                                    <strong>experiences</strong>, <strong>photos</strong>, <strong>videos</strong>
                                    of your golden days in JGEC, memories related to college festivals, celebrations and other things which you feel shall 
                                    give completeness to our timeline.
                                </p>
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_parisA">
                                	Check out the Video &raquo;
                                </span>
                                
                            </td>
                        </tr>
                    </table>               
                </td>
                <td class="detailsPaneContentRow" id="detailsPaneContentRow_paris">
                    <!-- details content sliding panes -->
                    <table class="detailsPaneContent" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="400px">
                            	Video
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	Events Details
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
                            <td width="400px">
                            	Sponsor list
                            </td>
                            <td width="50px">&nbsp;</td>
                            <td>
                            	Events Details
                                <span class="detailsBottomSliderText" id="detailsBottomSliderText_istanbulB">
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
                                        	+91-XXXXXXXXXX	
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
                                        	+91-XXXXXXXXXX	
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
                                        	+91-XXXXXXXXXX	
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
                                        	+91-XXXXXXXXXX	
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
                                        	+91-XXXXXXXXXX	
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
                                        	+91-XXXXXXXXXX	
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
                                        	+91-XXXXXXXXXX	
                                        </td>
                                        <td>
                                        	sponsorship@jeclat.in
                                        </td>
                                    </tr>
                                    <!--<tr>
                                    	<td>
                                			&nbsp;
                                		</td>
                                        <td>
                                        	&nbsp;
                                        </td>
                                        <td>
                                        	satyabrata.d@jeclat.in
                                        </td>
                                    </tr>-->
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
                                        <td colspan="2">
                                			jeclat.2k13@gmail.com
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
                <span class="sidePaneImageDesc" id="sidePaneImageDesc_register">REGISTRATION & FEEDBACK</span>
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
    <table class="sidePanes" id="sidePanes_updates" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><div id="sidePane_backupdates">Back</div></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        </tr>
    </table>
    <table class="sidePanes" id="sidePanes_register" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><div id="sidePane_backregister">Back</div></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        </tr>
    </table>
    <table class="sidePanes" id="sidePanes_misc" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><div id="sidePane_backmisc">Back</div></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
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
    
    
    
    
    
    
     
    	<!--<div id="showmid" style="background-color:#FC0; position: fixed; top: 10px; right: 10px; z-index: 9000; height: 40px; width: 400px;"></div>
    	<!--<textarea style="background-color:#FC0; position: fixed; top: 10px; left: 10px; z-index: 8000; height: 300px; width: 100px;" id="coordlist"></textarea>
    <!--
        <input type="button" style="position:fixed; top: 0px; right: 0px;" value="detach" onClick="$('#spvDetachScroll').attr('value','1')"/>
        <input type="button" style="position:fixed; top: 30px; right: 0px;" value="attach" onClick="$('#spvDetachScroll').attr('value','0')"/>
       
        <input type="button" style="position:fixed; top: 70px; right: 0px;" value="speed up" onClick="$('#spvSpeedFactor').attr('value',$('#spvSpeedFactor').attr('value')*2)"/>
        <input type="button" style="position:fixed; top: 100px; right: 0px;" value="slow down" onClick="$('#spvSpeedFactor').attr('value',$('#spvSpeedFactor').attr('value')*0.5)"/>
    
    <script type="text/javascript" src="assets/__mouse.pos.js"></script>
    <!-- TEMP SECTION END -->
    
</body>
</html>