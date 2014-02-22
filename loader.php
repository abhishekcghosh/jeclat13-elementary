<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>JECLAT '13 :: Jalpaiguri Govt. Engineering College</title>
<style type="text/css">
	body {
		padding: 0px;
		margin: 0px;
		background-color: #02000a;
	}
	
	@font-face {
		font-family: Pristina;
		src: url('assets/webfonts/pristina.woff') format('woff');
	}
	
	@keyframes starryNightBG
	{
		from { background-position: 0px 0px; }
		to { background-position: -1000px; }
	}
	@-webkit-keyframes starryNightBG
	{
		from { background-position: 0px 0px; }
		to { background-position: -1000px; }
	}
	@-moz-keyframes starryNightBG
	{
		from { background-position: 0px 0px; }
		to { background-position: -1000px; }
	}
	@-o-keyframes starryNightBG
	{
		from { background-position: 0px 0px; }
		to { background-position: -1000px; }
	}
	@-ms-keyframes starryNightBG
	{
		from { background-position: 0px 0px; }
		to { background-position: -1000px; }
	}
	
	@keyframes starryNightMG
	{
		0% { opacity: 1; }
		25% { opacity: 0.4; }
		50% { opacity: 0.8; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-webkit-keyframes starryNightMG
	{
		0% { opacity: 1; }
		25% { opacity: 0.4; }
		50% { opacity: 0.8; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-moz-keyframes starryNightMG
	{
		0% { opacity: 1; }
		25% { opacity: 0.4; }
		50% { opacity: 0.8; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-o-keyframes starryNightMG
	{
		0% { opacity: 1; }
		25% { opacity: 0.4; }
		50% { opacity: 0.8; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-ms-keyframes starryNightMG
	{
		0% { opacity: 1; }
		25% { opacity: 0.4; }
		50% { opacity: 0.8; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	
	
	@keyframes starryNightFG
	{
		0% { opacity: 1; }
		25% { opacity: 0.2; }
		50% { opacity: 0.6; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-webkit-keyframes starryNightFG
	{
		0% { opacity: 1; }
		25% { opacity: 0.2; }
		50% { opacity: 0.6; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-moz-keyframes starryNightFG
	{
		0% { opacity: 1; }
		25% { opacity: 0.2; }
		50% { opacity: 0.6; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-o-keyframes starryNightFG
	{
		0% { opacity: 1; }
		25% { opacity: 0.2; }
		50% { opacity: 0.6; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	@-ms-keyframes starryNightFG
	{
		0% { opacity: 1; }
		25% { opacity: 0.2; }
		50% { opacity: 0.6; }
		75% { opacity: 0.5; }
		100% { opacity: 1; }
	}
	
	
	table.starryNight
	{
		width: 100%; 
		height: 100%; 
		position: absolute; 
		top: 0px; bottom: 0px; left: 0px; right: 0px; 
		background: url(assets/starryNight-bg.png) repeat 5% 5%;
		
		animation-name:             starryNightBG; 
		animation-duration:         200s; 
		animation-iteration-count:  infinite;
		animation-timing-function:  linear;
		
		-webkit-animation-name:             starryNightBG; 
		-webkit-animation-duration:         200s; 
		-webkit-animation-iteration-count:  infinite;
		-webkit-animation-timing-function:  linear;
		
		-moz-animation-name:             starryNightBG; 
		-moz-animation-duration:         200s; 
		-moz-animation-iteration-count:  infinite;
		-moz-animation-timing-function:  linear;
		
		-o-animation-name:             starryNightBG; 
		-o-animation-duration:         200s; 
		-o-animation-iteration-count:  infinite;
		-o-animation-timing-function:  linear;
		
		-ms-animation-name:             starryNightBG; 
		-ms-animation-duration:         200s; 
		-ms-animation-iteration-count:  infinite;
		-ms-animation-timing-function:  linear;
	}
	div.starryNightMG 
	{
		background: url(assets/starryNight-mg.png) repeat 20% 20%;
		position: absolute;
		top: 0; left: 0; right: 0; bottom: 0;
		z-index: 997;
		
		animation-name:             starryNightMG; 
		animation-duration:         3s; 
		animation-iteration-count:  infinite;
		animation-timing-function:  linear;
		
		-webkit-animation-name:             starryNightMG; 
		-webkit-animation-duration:         3s; 
		-webkit-animation-iteration-count:  infinite;
		-webkit-animation-timing-function:  linear;
		
		-moz-animation-name:             starryNightMG; 
		-moz-animation-duration:         3s; 
		-moz-animation-iteration-count:  infinite;
		-moz-animation-timing-function:  linear;
		
		-o-animation-name:             starryNightMG; 
		-o-animation-duration:         3s; 
		-o-animation-iteration-count:  infinite;
		-o-animation-timing-function:  linear;
		
		-ms-animation-name:             starryNightMG; 
		-ms-animation-duration:         3s; 
		-ms-animation-iteration-count:  infinite;
		-ms-animation-timing-function:  linear;
		
	}
	div.starryNightFG {
		background: url(assets/starryNight-fg.png) repeat 90% 110%;
		position: absolute;
		top: 0; left: 0; right: 0; bottom: 0;
		z-index: 998;
		
		animation-name:             starryNightFG; 
		animation-duration:         2s; 
		animation-iteration-count:  infinite;
		animation-timing-function:  linear;
		
		-webkit-animation-name:             starryNightFG; 
		-webkit-animation-duration:         2s; 
		-webkit-animation-iteration-count:  infinite;
		-webkit-animation-timing-function:  linear;
		
		-moz-animation-name:             starryNightFG; 
		-moz-animation-duration:         2s; 
		-moz-animation-iteration-count:  infinite;
		-moz-animation-timing-function:  linear;
		
		-o-animation-name:             starryNightFG; 
		-o-animation-duration:         2s; 
		-o-animation-iteration-count:  infinite;
		-o-animation-timing-function:  linear;
		
		-ms-animation-name:             starryNightFG; 
		-ms-animation-duration:         2s; 
		-ms-animation-iteration-count:  infinite;
		-ms-animation-timing-function:  linear;
		
	}
	
	@keyframes rotateLoading 
	{
		0% { 	transform: rotate(0deg); 	}
		35% {	transform: rotate(180deg);	}
		100% { 	transform: rotate(180deg);	}
	}
	@-webkit-keyframes rotateLoading 
	{
		0% { 	-webkit-transform: rotate(0deg); 	}
		35% {	-webkit-transform: rotate(180deg);	}
		100% { 	-webkit-transform: rotate(180deg);	}
	}
	@-moz-keyframes rotateLoading 
	{
		0% { 	-moz-transform: rotate(0deg); 	}
		35% {	-moz-transform: rotate(180deg);	}
		100% { 	-moz-transform: rotate(180deg);	}
	}
	@-o-keyframes rotateLoading 
	{
		0% { 	-o-transform: rotate(0deg); 	}
		35% {	-o-transform: rotate(180deg);	}
		100% { 	-o-transform: rotate(180deg);	}
	}
	@-ms-keyframes rotateLoading 
	{
		0% { 	-ms-transform: rotate(0deg); 	}
		35% {	-ms-transform: rotate(180deg);	}
		100% { 	-ms-transform: rotate(180deg);	}
	}
	
	img.loaderImageAmbigram
	{
		animation-name:             rotateLoading; 
		animation-duration:         5s; 
		animation-iteration-count:  infinite;
		animation-timing-function:  ease-in-out;
		
		-webkit-animation-name:             rotateLoading; 
		-webkit-animation-duration:         5s; 
		-webkit-animation-iteration-count:  infinite;
		-webkit-animation-timing-function:  ease-in-out;
		
		-moz-animation-name:             rotateLoading; 
		-moz-animation-duration:         5s; 
		-moz-animation-iteration-count:  infinite;
		-moz-animation-timing-function:  ease-in-out;
		
		-o-animation-name:             rotateLoading; 
		-o-animation-duration:         5s; 
		-o-animation-iteration-count:  infinite;
		-o-animation-timing-function:  ease-in-out;
		
		-ms-animation-name:             rotateLoading; 
		-ms-animation-duration:         5s; 
		-ms-animation-iteration-count:  infinite;
		-ms-animation-timing-function:  ease-in-out;
		
    }

	
	div.loaderText
	{
		font-family: Pristina, "Trebuchet MS", Arial, Helvetica, sans-serif;
		font-size: 20px;
		color: #382e56;
		
	}
	#link2012 {
		text-decoration: none;
		color: #382e56;
		border-bottom: dotted 1px #382e56;
		position: relative;
		z-index: 9000;
		padding-left: 5px;
		padding-right: 5px;
		
		-webkit-transition: background-color 0.5s;
		-moz-transition: background-color 0.5s;
		-o-transition: background-color 0.5s;
		-ms-transition: background-color 0.5s;
		transition: background-color 0.5s;
	}
	#link2012:hover {
		background-color: #ccccff;
	}
</style>
</head>
<body>
	<table class="starryNight">
    	<tr>
        	<td align="center">
            	<div class="starryNightMG">
                </div>
                <div class="starryNightFG">
                </div>
            	<img class="loaderImageAmbigram" src="assets/rotator-logo.png" style="width: 400px; height: 170px"> 
                <br/><br/><br/>
                <br/><br/><br/>
                <div class="loaderText">
                	<span style="font-size: 30px">JECLAT '13 website coming soon!</span>
                    <br/>
                    Keep checking!
                    <br/><br/>
                    Meanwhile, you can also<a id="link2012" href="http://2012.jeclat.in">visit</a> the 2012 website.
                </div>
                
            </td>
        </tr>
    </table>
</body>
</html>