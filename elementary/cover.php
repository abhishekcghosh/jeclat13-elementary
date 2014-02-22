<?php
	
	require_once('module-session-check.php');	
	if($li_user!="no-user") {
		header("location: level-control.php");		
	}

?>
<?php
	$section='';
	$message='';
	if(isset($_GET['s'])) {
		$section = strtolower($_GET['s']);
	}
	if(isset($_GET['m'])) {
		$message = strtolower($_GET['m']);
	}	
?>
<!doctype html>
<html>
<head>
<?php require_once('module-head-tag.php'); ?>
<link rel="stylesheet" href="assets/cover.css" type="text/css" />
<script type="text/javascript">

	function randomDataIterate(idx) {
		$("#randomData_"+idx).css("opacity","0");
		setTimeout('randomData('+idx+');',500);
		setTimeout('$("#randomData_'+idx+'").css("opacity","1")',550);
		
		setTimeout('randomDataIterate('+idx+');',1000+1000*Math.floor(3*Math.random()));
		
	}
	
	
	function randomData(idx) {
		var value = Math.floor(10000*Math.random())+1;
		$("#randomData_"+idx).html(value);
		
		var l = Math.floor(100*Math.random());
		var t = Math.floor(100*Math.random());
		var fs = Math.floor(80*Math.random())+20;
		$("#randomData_"+idx).css("left",l+"%");
		$("#randomData_"+idx).css("top",t+"%");
		$("#randomData_"+idx).css("font-size",fs+"px");
	}
	
	$(document).ready(function(e) {
		//GLOBAL VAR
		var paneOpen = false;
		//show/hide menu items
		$(".titleContainer").mousemove(function(e) {
			$(".titleSub").css("opacity","1");
            $("#titleMenuItem_start").fadeIn(300);
			$("#titleMenuItem_rules").fadeIn(900);
			$("#titleMenuItem_about").fadeIn(1200);
        });
		$(".titleContainer").mouseleave(function(e) {
            if(paneOpen==false) {
				$(".titleSub").css("opacity","0");
				$("#titleMenuItem_start").fadeOut(1200);
				$("#titleMenuItem_rules").fadeOut(600);
				$("#titleMenuItem_about").fadeOut(300);
			}
        });
		
		//show right panes
        $("#titleMenuItem_start, .titleMain").click(function(e) {
            e.stopPropagation();
			paneOpen = true;
			$(".titleMenuItem").removeClass("titleMenuItemOpen");
			$("#titleMenuItem_start").addClass("titleMenuItemOpen");
			$(".rightCompressionPane").css("width","400px");
			$(".rightDataPane").css("right","0px");
			$(".dataPane").css("display","none");
			$("#dataPane_start").css("display","block");
        });
		$("#titleMenuItem_rules").click(function(e) {
            e.stopPropagation();
			paneOpen = true;
			$(".titleMenuItem").removeClass("titleMenuItemOpen");
			$("#titleMenuItem_rules").addClass("titleMenuItemOpen");
			$(".rightCompressionPane").css("width","400px");
			$(".rightDataPane").css("right","0px");
			$(".dataPane").css("display","none");
			$("#dataPane_rules").css("display","block");
			
        });
		$("#titleMenuItem_about").click(function(e) {
            e.stopPropagation();
			paneOpen = true;
			$(".titleMenuItem").removeClass("titleMenuItemOpen");
			$("#titleMenuItem_about").addClass("titleMenuItemOpen");
			$(".rightCompressionPane").css("width","400px");
			$(".rightDataPane").css("right","0px");
			$(".dataPane").css("display","none");
			$("#dataPane_about").css("display","block");
        });
		
		//hide right pane
		$(".leftCompressionPane").click(function(e) {
            $(".rightCompressionPane").css("width","0px");
			$(".rightDataPane").css("right","-400px");
			paneOpen = false;
			$(".titleMenuItem").removeClass("titleMenuItemOpen");
			$("#titleMenuItem_start").fadeOut(1200);
			$("#titleMenuItem_rules").fadeOut(600);
			$("#titleMenuItem_about").fadeOut(300);
			$(".titleSub").css("opacity","0");				
        });
		
		//pane links for sign up / sign in
		$("#paneLink_signin").click(function(e) {
            $("#start_signup").css("display","none");
			$("#start_signin").css("display","block");			
        });
		$("#paneLink_signup").click(function(e) {
            $("#start_signin").css("display","none");
			$("#start_signup").css("display","block");			
        });
		
		
		//randomization initiate
		for(i=1;i<=12;i++) {
			randomDataIterate(i);
		}
		
		<?php
			if($section=='starti') {
			?>
				$("#titleMenuItem_start").click();
				$("#start_signup").css("display","none");
				$("#start_signin").css("display","block");					
			<?php
			}
			else if($section=='startu') {
			?>
				$("#titleMenuItem_start").click();
				$("#start_signin").css("display","none");
				$("#start_signup").css("display","block");		
			<?php
			}
			else if($section=='rules') {
			?>
				$("#titleMenuItem_rules").click();
			<?php
			}
			else if($section=='about') {
			?>
				$("#titleMenuItem_about").click();
			<?php
			}
		?>
	
		
    });
	
		
</script>
<title>elementary</title>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td align="center" valign="middle" class="leftCompressionPane">
                <div class="titleContainer">
                    <div class="titleSub">
                    	JECLAT 13 presents
                    </div>
                    <div class="titleMain">elementary</div>
                    <div class="titleMenuContainer">
                    	<ul class="titleMenu">
                        	<li><a class="titleMenuItem" id="titleMenuItem_start">start</a></li>
                            <li><a class="titleMenuItem" id="titleMenuItem_rules">getting started</a></li>
                            <li><a class="titleMenuItem" id="titleMenuItem_about">about</a></li>
                        </ul>
                    </div>
                </div>
            </td>
            <td width="0px" class="rightCompressionPane">
            	
            </td>
        </tr>
    </table>
    <div class="rightDataPane">
    	<div class="dataPane" id="dataPane_start">
            <div class="paneHeading">start</div>
            <div class="paneContent" id="start_signin">
            	Sign in with your JECLAT 13 account
            	<form name="signin" method="post" action="login.php">
                	<br>
                	Email<br>
                    <input type="text" name="em" maxlength="256" value=""><br>
                    <br>
                    Password<br>
                    <input type="password" name="pa" maxlength="32" value=""><br>
                    <br>
                    <input type="submit" name="submit" value="Sign in">
                    <span style="padding-left: 10px">Not yet registered? <a class="paneLinks" id="paneLink_signup">Sign up</a></span>
                    <br><br>
                    <span style="padding-left: 10px">Can't access your account? <a class="paneLinks" id="paneLink_resetpass" href="reset-password.php">Reset Password </a></span>
                </form>
                <br>
                <span class="formFeedbackMsg">
                	<?php
						if($message=='itechfail') {
							echo 'Sign in failed due to technical problem. Sorry for the inconvenience. Please try again later.';
						} else if($message=='iincomplete') {
							echo 'One or more fields empty.';
						} else if ($message=='iwrong') {
							echo 'Wrong Email or password';
						}
					?>
                </span>
            </div>
            <div class="paneContent" id="start_signup" style="display: none;">
            	Create a JECLAT 13 account
            	<form name="signup" method="post" action="register.php">
                	<br>
                	Full Name<br>
                    <input type="text" name="na" maxlength="256" value=""><br>
                    <br>
                	College/Institution<br>
                    <input type="text" name="co" maxlength="256" value=""><br>
                    <br>
                	Email<br>
                    <input type="text" name="em" maxlength="256" value=""><br>
                    <br>
                	Contact #<br>
                    <input type="text" name="ph" maxlength="16" value=""><br>
                    <br>
                    <input type="submit" name="submit" value="Create account">
                    <span style="padding-left: 10px">Already have account? <a class="paneLinks" id="paneLink_signin">Sign in</a></span>
                </form>
                <br>
                <span class="formFeedbackMsg" <?php  if($message=='usuccess') { echo 'style="color: #060;"'; } ?> >
                	<?php
						if($message=='utechfail') {
							echo 'Registration failed due to technical problem. Sorry for the inconvenience. Please try again later.';
						} else if($message=='uincomplete') {
							echo 'One or more fields empty.';
						} else if ($message=='uillegal') {
							echo 'Illegal characters in name or email address. Please provide valid data.';
						} else if ($message=='uexists') {
							echo 'A registered account with the same email address already exists. Please provide a unique email address.';
						} else if ($message=='uinvalid') {
							echo 'The email address you provided is invalid. Please provide a valid email address.';
						} else if ($message=='usuccess') {
							echo 'You have been registered successfully.<br><br>Check your email for the password. In case you don\'t find an email, don\'t forget to check the SPAM folder.';
						}
						
					?>
                </span>
            </div>
        </div>
        <div class="dataPane" id="dataPane_rules">
            <div class="paneHeading">getting started</div>
            <div class="paneContent" style="overflow-y: scroll; height: 500px">
            	<ul class="rulesList">
                	<li>Your objective is to proceed to the next level by logically connecting the images and clues provided and putting the <strong>correct answer</strong> in the answer box. Players completing the game will be ranked chronologically and mentioned on our <a class="paneLinks" href="http://elementaryblog.jeclat.in/?page_id=17" target="_blank"><strong>Hall of Fame</strong></a> as well as awarded from <a class="paneLinks" href="http://jeclat.in" target="_blank"><strong>JECLAT 13</strong></a>.</li>
                    <li>Do go through the detailed <strong>Rules of the Game</strong> before you start once you have signed in. They will provide you a list of hints, tips and tricks.</li>
                    <li>We have a blog at <a class="paneLinks" href="http://elementaryblog.jeclat.in" target="_blank"><strong>elementaryblog.jeclat.in</strong></a> where you can go through hints, tips and discussions on various levels of the competition. Your comments shall be moderated lest obvious clues and direct answers are given out. The moderators shall give out hints on the blog if a number of players are stuck up on a certain level for quite a certain time.</li>
                    <li>Use our faithful friends <strong>Google</strong>, <strong>Wikipedia</strong> to study about the various clues provided in the puzzles. You can also use Google, Tineye etc. for reverse image searches.</li>
                    <li>Some levels may contain clues which will try to misguide you into a vicious whirlpool. Be cautious!</li>
                    <li>Please <strong>do not</strong> give out the answers in any of your Facebook pages, blogs or websites.</li>
                    <li>So brace up to dive into solving and winning! All the best! Play the game, and encourage others to do so too!</li>

                </ul>
            </div>
        </div>
        <div class="dataPane" id="dataPane_about">
            <div class="paneHeading">about</div>
            <div class="paneContent">
            	 <p class="aboutPara">                 	
                    The human mind has always chased the unsolved, dived into the depths of uncertainty and has been drawn to symbols, 
                    puzzles and riddles since ages. Unsolved mysteries still draw numerous enthusiasts regularly to try them out. 
                    An open access online competition where you will need to follow your instincts and come up with the answer to 
                    unlock the locked! 
                 </p>
                 <p class="aboutPara">
                 	An endeavour to bring into life the natural curiosity of people to ponder on apparently unconnected codes, 
                    pictures and symbols, <strong>JECLAT 13</strong> presents <strong>elementary.</strong>
                 </p>
            </div>
        </div>
    </div>
	
    <span class="randomData" id="randomData_1"></span>
    <span class="randomData" id="randomData_2"></span>
    <span class="randomData" id="randomData_3"></span>
    <span class="randomData" id="randomData_4"></span>
    <span class="randomData" id="randomData_5"></span>
    <span class="randomData" id="randomData_6"></span>
    <span class="randomData" id="randomData_7"></span>
    <span class="randomData" id="randomData_8"></span>
    <span class="randomData" id="randomData_9"></span>
    <span class="randomData" id="randomData_10"></span>
    <span class="randomData" id="randomData_11"></span>
    <span class="randomData" id="randomData_12"></span>
    
    
</body>
</html>