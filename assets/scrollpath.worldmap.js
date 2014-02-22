// ScrollPath Drawing & Init code @ World Map @ JECLAT '13

//global
var cnvs, maxPerc, pprRoute, lastPointX, lastPointY;
var wayPoint = "rhodes";
var wayPointTrigger = false;
var firstCallAfterPause = false;
var detailsPaneVisible = false;
var cnvsXOff = 1280, cnvsYOff = 810;

$(document).ready(initMapPath);

function deg2rad(deg) {
	return deg * Math.PI / 180;
}

function xoff(x) {
	return (x-9); 
}

function yoff(y) {
	return (y+9);
}

function roff(r) {
	return r;
}

function detachScroll() {
	$("#spvDetachScroll").attr("value","1");
}

function attachScroll() {
	if(detailsPaneVisible==true) return;
	$("#spvDetachScroll").attr("value","0");
}

function pauseAtKeyLocation() {
	wayPointTrigger=true;
	firstCallAfterPause = true;
	detachScroll();
	setTimeout('attachScroll();',2000);
}


function addThisPaperPoint(x,y,currPerc) {
	setSpeedFactor(currPerc);
	if(wayPointTrigger==true) hideHText(currPerc);
	checkTransportSwap(currPerc);
	if(currPerc>maxPerc) {
		maxPerc = currPerc;
		pprRoute.add(new paper.Point(x-cnvsXOff,y-cnvsYOff));
		//pprRoute.smooth(); //dont smooth
		paper.view.draw();
	}
}

function checkTransportSwap(cperc) {
	if(wayPointTrigger==true) return;
	
	if(cperc>85.9) {
		$("#ship").css("opacity","0");
		$("#car").css("opacity","0");
		$("#plane").css("opacity","0");
		$("#planeb").css("opacity","1");
		$("#planeShadow").css("opacity","0");
		$("#planebShadow").css("opacity","1");		
	}
	else if(cperc<85.8 && cperc>79.1) {
		$("#ship").css("opacity","0");
		$("#car").css("opacity","1");
		$("#plane").css("opacity","0");
		$("#planeb").css("opacity","0");
		$("#planeShadow").css("opacity","0");		
		$("#planebShadow").css("opacity","0");
	}
	else if(cperc<79 && cperc>29.55) {
		$("#ship").css("opacity","0");
		$("#car").css("opacity","0");
		$("#plane").css("opacity","1");
		$("#planeb").css("opacity","0");
		$("#planeShadow").css("opacity","1");		
		$("#planebShadow").css("opacity","0");
	}
	else if(cperc<29.53) {
		$("#ship").css("opacity","1");
		$("#car").css("opacity","0");
		$("#plane").css("opacity","0");
		$("#planeb").css("opacity","0");
		$("#planeShadow").css("opacity","0");		
		$("#planebShadow").css("opacity","0");
	}
	
	
}

function hideHText(cperc)
{
	if(firstCallAfterPause==true) {	
		firstCallAfterPause=false;
		return;
	}
	$("#hText_"+wayPoint+"1").css("opacity","0");
	$("#hText_"+wayPoint+"2").css("opacity","0");
	
	wayPointTrigger=false;
	
	$(".transport").css("opacity","1");

}

function setSpeedFactor(cperc) {
	if(cperc>97)
		spdfctr = 1;
	else if(cperc>86)
		spdfctr = 2;
	else if (cperc>77)
		spdfctr = 1;
	else if (cperc>52)
		spdfctr = 4;
	else if (cperc>49)
		spdfctr = 1
	else if (cperc>31)
		spdfctr = 3;
	else if (cperc>27)
		spdfctr = 1;
	else if (cperc>10)
		spdfctr = 2;
	else if (cperc>6)
		spdfctr = 1;
	else
		spdfctr = 1;
	$("#spvSpeedFactor").attr("value",spdfctr);
	
}
		
function reachedRhodes() {
	firstCallAfterPause = true;
	$(".topBarIndicator").css("left","65px");
	$(".topBarIndicator").css("width","70px");
	$(".topBarIndicator").css("background-color","#f80");
	$("#colossus_rhodes").css("opacity","1");
}
			
function reachedRome() {
	wayPoint = "rome";
	$(".topBarIndicator").css("left","135px");
	$(".topBarIndicator").css("width","120px");
	$(".topBarIndicator").css("background-color","#c66");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#colosseum_rome").css("opacity","1");
	setTimeout('$("#bubble_rome").css("opacity","1");',500);
	setTimeout('$("#hText_rome1").css("opacity","1");',800);
	setTimeout('$("#hText_rome2").css("opacity","1");',1000);
	
}

function reachedRio() {
	wayPoint = "rio";
	$(".topBarIndicator").css("left","255px");
	$(".topBarIndicator").css("width","110px");
	$(".topBarIndicator").css("background-color","#96c");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#redeemer_rio").css("opacity","1");
	setTimeout('$("#bubble_rio").css("opacity","1");',500);
	setTimeout('$("#hText_rio1").css("opacity","1");',800);
	setTimeout('$("#hText_rio2").css("opacity","1");',1000);
}

function reachedHollywood() {
	wayPoint = "hollywood";
	$(".topBarIndicator").css("left","365px");
	$(".topBarIndicator").css("width","90px");
	$(".topBarIndicator").css("background-color","#ea2");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#hollywood_la").css("opacity","1");
	setTimeout('$("#bubble_hollywood").css("opacity","1");',500);
	setTimeout('$("#hText_hollywood1").css("opacity","1");',800);
	setTimeout('$("#hText_hollywood2").css("opacity","1");',1000);
}

function reachedLondon() {
	wayPoint = "london";
	$(".topBarIndicator").css("left","455px");
	$(".topBarIndicator").css("width","85px");
	$(".topBarIndicator").css("background-color","#09c");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#bigben_london").css("opacity","1");
	setTimeout('$("#bubble_london").css("opacity","1");',500);
	setTimeout('$("#hText_london1").css("opacity","1");',800);
	setTimeout('$("#hText_london2").css("opacity","1");',1000);
}

function reachedParis() {
	wayPoint = "paris";
	$(".topBarIndicator").css("left","540px");
	$(".topBarIndicator").css("width","120px");
	$(".topBarIndicator").css("background-color","#5b2");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#louvre_paris").css("opacity","1");
	setTimeout('$("#bubble_paris").css("opacity","1");',500);
	setTimeout('$("#hText_paris1").css("opacity","1");',800);
	setTimeout('$("#hText_paris2").css("opacity","1");',1000);
}

function reachedGeneva() {
	wayPoint = "geneva";
	$(".topBarIndicator").css("left","660px");
	$(".topBarIndicator").css("width","115px");
	$(".topBarIndicator").css("background-color","#f44");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#icrc_geneva").css("opacity","1");
	setTimeout('$("#bubble_geneva").css("opacity","1");',500);
	setTimeout('$("#hText_geneva1").css("opacity","1");',800);
	setTimeout('$("#hText_geneva2").css("opacity","1");',1000);
}

function reachedIstanbul() {
	wayPoint = "istanbul";
	$(".topBarIndicator").css("left","775px");
	$(".topBarIndicator").css("width","90px");
	$(".topBarIndicator").css("background-color","#288");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#grandbazaar_istanbul").css("opacity","1");
	setTimeout('$("#bubble_istanbul").css("opacity","1");',500);
	setTimeout('$("#hText_istanbul1").css("opacity","1");',800);
	setTimeout('$("#hText_istanbul2").css("opacity","1");',1000);
}

function reachedJalpaiguri() {
	wayPoint = "jalpaiguri";
	$(".topBarIndicator").css("left","865px");
	$(".topBarIndicator").css("width","80px");
	$(".topBarIndicator").css("background-color","#946");
	$(".transport").css("opacity","0");
	pauseAtKeyLocation();
	$("#jgec_jalpaiguri").css("opacity","1");
	setTimeout('$("#bubble_jalpaiguri").css("opacity","1");',500);
	setTimeout('$("#hText_jalpaiguri1").css("opacity","1");',800);
	setTimeout('$("#hText_jalpaiguri2").css("opacity","1");',1000);
}

function hideAllDetailsPanes() {
	//hide all panes
	$("#detailsPane_rome").css("bottom","100%");
	$("#detailsPane_rio").css("bottom","100%");
	$("#detailsPane_hollywood").css("bottom","100%");
	$("#detailsPane_london").css("bottom","100%");
	$("#detailsPane_paris").css("bottom","100%");
	$("#detailsPane_geneva").css("bottom","100%");
	$("#detailsPane_istanbul").css("bottom","100%");
	$("#detailsPane_jalpaiguri").css("bottom","100%");
	//hide close button
	$("#detailsPane_back").css("bottom","-50px");
	detailsPaneVisible = false;
	attachScroll();
}
function bringUpDetailsPane(whichPane) {
	//hide all prev panes
	hideAllDetailsPanes();
	//detach scroll
	detachScroll();
	detailsPaneVisible = true;
	//bring up pane
	$("#detailsPane_"+whichPane).css("bottom","0%"); 
	//bring up close button
	$("#detailsPane_back").css("bottom","0px"); 	
}


function initMapPath() {
	/* ========== DRAWING THE PATH AND INITIATING THE PLUGIN ============= */
	
	lastPointX = 4610;
	lastPointY = 1200;
	
	$.fn.scrollPath("getPath", {scrollSpeed: 20, rotationSpeed: Math.PI/10})
		//start - COLOSSUS AT RHODES
		.moveTo(xoff(lastPointX), yoff(lastPointY), {name: "rhodes", callback: function() { reachedRhodes(); }})
		
		//pathway
		.arc(xoff(4575),yoff(1210),roff(35),deg2rad(-25),deg2rad(100),false)
		.lineTo(xoff(4275),yoff(1165))
		.arc(xoff(4310),yoff(1125),roff(45),deg2rad(135),deg2rad(180),false)
		//ROME
		.lineTo(xoff(4280),yoff(1040), {name: "rome", callback: function() { reachedRome(); }}) 
		
		
		//pathway
		.lineTo(xoff(4240),yoff(1115))
		.arc(xoff(4200),yoff(1080),roff(60),deg2rad(45),deg2rad(80),false)
		.lineTo(xoff(4075),yoff(1140))
		.lineTo(xoff(3953),yoff(1185))
		.lineTo(xoff(3819),yoff(1185))
		.arc(xoff(3800),yoff(1470),roff(300),deg2rad(250),deg2rad(200),true)
		.lineTo(xoff(3340),yoff(2450))	
		.arc(xoff(3070),yoff(2320),roff(300),deg2rad(25),deg2rad(70),false)		
		.arc(xoff(3100),yoff(2470),roff(135),deg2rad(90),deg2rad(130),false)
		//RIO
		.lineTo(xoff(3000),yoff(2550), {name: "rio", callback: function() { reachedRio(); }})
		
		//pathway
		//LA, HOLLYWOOD
		.lineTo(xoff(1310),yoff(1220), {name: "hollywood", callback: function() { reachedHollywood(); }})
		
		//pathway
		//LONDON
		.lineTo(xoff(4005),yoff(810), {name: "london", callback: function() { reachedLondon(); }})
		
		//pathway
		//PARIS
		.lineTo(xoff(4035),yoff(890), {name: "paris", callback: function() { reachedParis(); }})
		
		//pathway
		//GENEVA
		.lineTo(xoff(4150),yoff(945), {name: "geneva", callback: function() { reachedGeneva(); }})
		
		//pathway
		.arc(xoff(4350),yoff(1250),roff(360),deg2rad(250),deg2rad(-45),false)
		//ISTANBUL
		.lineTo(xoff(4650),yoff(1060), {name: "istanbul", callback: function() { reachedIstanbul(); }})
		
		//pathway
		.lineTo(xoff(5760),yoff(1360))
		//JALPAIGURI
		.lineTo(xoff(6030),yoff(1400), {name: "jalpaiguri", callback: function() { reachedJalpaiguri(); }})
		
		
		//after drawing, initiate plugin on 
		$(".mapContainer").scrollPath({drawPath: false, wrapAround: false, scrollBar: false});
		detachScroll(); //temp, for running background tasks
		
		
		//attach navigation to top bar
		$("#topBar_home").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "rhodes", 1000, "easeInOutSine");
		});
		$("#topBar_competitions").click(function(e) { 
			e.preventDefault();
			 hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "rome", 1000, "easeInOutSine"); 
		});
		$("#topBar_socialnight").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "rio", 1000, "easeInOutSine"); 
		});
		$("#topBar_j12tour").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "hollywood", 1000, "easeInOutSine"); 
		});
		$("#topBar_reunion").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "london", 1000, "easeInOutSine"); 
		});
		$("#topBar_storyofeclat").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "paris", 1000, "easeInSine"); 
		});
		$("#topBar_socialcause").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "geneva", 1000, "easeInSine"); 
		});
		$("#topBar_sponsors").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "istanbul", 1000, "easeInOutSine"); 
		});
		$("#topBar_contact").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
			$.fn.scrollPath("scrollTo", "jalpaiguri", 1000, "easeInOutSine"); 
		});
		
		
		//attach landmark & flying bubbles to details panes clicks
		$("#colosseum_rome, #bubble_rome").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("rome");
		});
		$("#redeemer_rio, #bubble_rio").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("rio");
		});
		$("#hollywood_la, #bubble_hollywood").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("hollywood");
		});
		$("#bigben_london, #bubble_london").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("london");
		});
		$("#louvre_paris, #bubble_paris").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("paris");
		});
		$("#icrc_geneva, #bubble_geneva").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("geneva");
		});
		$("#grandbazaar_istanbul, #bubble_istanbul").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("istanbul");
		});
		$("#jgec_jalpaiguri, #bubble_jalpaiguri").click(function(e) { 
			e.preventDefault(); 
			bringUpDetailsPane("jalpaiguri");
		});
		
		//and back... (universal close button for detail panes)
		$("#detailsPane_back").click(function(e) { 
			e.preventDefault(); 
			hideAllDetailsPanes();
		});
		
		//details panes bottom sliders inside contents
		//rome
		$("#detailsBottomSliderText_romeA").click(function(e) {
			e.preventDefault();
			$("#detailsPane_rome").css("left","-100%");
		});
		$("#detailsBottomSliderText_romeB").click(function(e) {
			e.preventDefault();
			$("#detailsPane_rome").css("left","0%");
		});
		//rio
		$("#detailsBottomSliderText_rioA").click(function(e) {
			e.preventDefault();
			$("#detailsPane_rio").css("left","-100%");
		});
		$("#detailsBottomSliderText_rioB").click(function(e) {
			e.preventDefault();
			$("#detailsPane_rio").css("left","0%");
		});
		$("#detailsBottomSliderText_rioC").click(function(e) {
			e.preventDefault();
			$("#detailsPane_rio").css("left","-200%");
		});
		$("#detailsBottomSliderText_rioD").click(function(e) {
			e.preventDefault();
			$("#detailsPane_rio").css("left","-100%");
		});
		//hollywood
		$("#detailsBottomSliderText_hollywoodA").click(function(e) {
			e.preventDefault();
			$("#detailsPane_hollywood").css("left","-100%");
		});
		$("#detailsBottomSliderText_hollywoodB").click(function(e) {
			e.preventDefault();
			$("#detailsPane_hollywood").css("left","0%");
		});
		//london
		$("#detailsBottomSliderText_londonA").click(function(e) {
			e.preventDefault();
			$("#detailsPane_london").css("left","-100%");
		});
		$("#detailsBottomSliderText_londonB").click(function(e) {
			e.preventDefault();
			$("#detailsPane_london").css("left","0%");
		});
		$("#detailsBottomSliderText_londonC").click(function(e) {
			e.preventDefault();
			$("#detailsPane_london").css("left","-200%");
		});
		$("#detailsBottomSliderText_londonD").click(function(e) {
			e.preventDefault();
			$("#detailsPane_london").css("left","-100%");
		});
		//paris
		$("#detailsBottomSliderText_parisA").click(function(e) {
			e.preventDefault();
			$("#detailsPane_paris").css("left","-100%");
		});
		$("#detailsBottomSliderText_parisB").click(function(e) {
			e.preventDefault();
			$("#detailsPane_paris").css("left","0%");
		});
		//geneva
			//none
		//istanbul
		$("#detailsBottomSliderText_istanbulA").click(function(e) {
			e.preventDefault();
			$("#detailsPane_istanbul").css("left","-100%");
		});
		$("#detailsBottomSliderText_istanbulB").click(function(e) {
			e.preventDefault();
			$("#detailsPane_istanbul").css("left","0%");
		});
		//jalpaiguri
			//none
			
		//attach navigation for side panes
		$("#sidePaneImages_updates").click(function(e) { 
			e.preventDefault(); 
			$("#sidePanes_updates").css("right","0px"); 
		});
		$("#sidePaneImages_register").click(function(e) { 
			e.preventDefault(); 
			$("#sidePanes_register").css("right","0px"); 
		});
		$("#sidePaneImages_misc").click(function(e) { 
			e.preventDefault(); 
			$("#sidePanes_misc").css("right","0px"); 
		});
		//and back.. (side panels)
		$("#sidePane_backupdates").click(function(e) { 
			e.preventDefault(); 
			$("#sidePanes_updates").css("right","-300px"); 
		});
		$("#sidePane_backregister").click(function(e) { 
			e.preventDefault(); 
			$("#sidePanes_register").css("right","-300px"); 
		});
		$("#sidePane_backmisc").click(function(e) { 
			e.preventDefault(); 
			$("#sidePanes_misc").css("right","-300px"); 
		});
		
		
		//attach pane cleanup routines to map_container click
		$("#map_container, .detailsPane, .topBar").click(function(e) { 
			//e.preventDefault();
			$("#sidePanes_updates").css("right","-300px");
			$("#sidePanes_register").css("right","-300px");
			$("#sidePanes_misc").css("right","-300px");
		});
		
		
		//attach side pane inside tabs for login, register, feedback
		$("#sidePaneLinkTabs_login").click(function(e) {
			$("#sidePaneLogIn").css("display","block"); 
			$("#sidePaneRegister").css("display","none");
			$("#sidePaneFeedback").css("display","none");
			$("#sidePaneLinkTabs_login").addClass("sidePaneLinkTabsSelected");
			$("#sidePaneLinkTabs_register").removeClass("sidePaneLinkTabsSelected");
			$("#sidePaneLinkTabs_feedback").removeClass("sidePaneLinkTabsSelected");
		});
		$("#sidePaneLinkTabs_register").click(function(e) {
			$("#sidePaneLogIn").css("display","none");
			$("#sidePaneRegister").css("display","block");
			$("#sidePaneFeedback").css("display","none");
			$("#sidePaneLinkTabs_login").removeClass("sidePaneLinkTabsSelected");
			$("#sidePaneLinkTabs_register").addClass("sidePaneLinkTabsSelected");
			$("#sidePaneLinkTabs_feedback").removeClass("sidePaneLinkTabsSelected");
		});
		$("#sidePaneLinkTabs_feedback").click(function(e) {
			$("#sidePaneLogIn").css("display","none");
			$("#sidePaneRegister").css("display","none");
			$("#sidePaneFeedback").css("display","block");
			$("#sidePaneLinkTabs_login").removeClass("sidePaneLinkTabsSelected");
			$("#sidePaneLinkTabs_register").removeClass("sidePaneLinkTabsSelected");
			$("#sidePaneLinkTabs_feedback").addClass("sidePaneLinkTabsSelected");
		});
		
		//navigation tips closure
		$("#navigationTipsLink_close, #navigationTipsLink_dontshow").click(function(e) {
			$(".navigationTips").css("opacity","0");
			setTimeout('$(".navigationTips").css("display","none")',600);
		});
		
		//rhodes
		$("#detailsButton_rhodes").click(function(e) {
			$("#detailsPane_rhodes").css("bottom","100%");
			setTimeout('$(".navigationTips").css("opacity","1");',500);
			attachScroll();
		});
		
		
		
		
		//red dotted canvas
		cnvs = document.getElementById("routeMap");
		paper.setup(cnvs);
		
		maxPerc = 0;
		
		pprRoute = new paper.Path();
		pprRoute.strokeColor = '#dd0000';
		pprRoute.strokeWidth = 8;
		pprRoute.strokeCap = 'square';
		pprRoute.strokeJoin = 'round';
		pprRoute.dashArray = [30,20];
	
		var pprRhodes = new paper.Point(xoff(lastPointX)-cnvsXOff,yoff(lastPointY)-cnvsYOff);
		
		pprRoute.moveTo(pprRhodes);
		
}
$(window).load(function() {
	//remove loader
	clearTimeout(timerId);
	$(".loaderWindow").css("opacity","0");
	setTimeout('$(".loaderWindow").css("display","none")',1500);
	setTimeout('$(".loaderWindow").html(null)',2000);
});


