<?php
	
	//requires
	require_once('module-config.php');
	require_once('module-sql-connect.php');
	
	//fetch session login user id, redirect to log in page if not logged in
	require_once('module-session-check.php');
	if($li_user=="no-user") {
		header("location: cover.php?s=starti");
		exit(0);
	}
	
	//obtain session level data
	require_once('module-session-level.php');
	if($li_elmcl>__ELEMENTARY_LEVEL_COUNT__) {
		//if current level exceeds level count, competition finished
		header("location: winner.php");	
		exit(0);
	}
	
	//find out how many previously cleared this level
	$li_clearedhowmany = -1;
	$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
	$sql_query="SELECT COUNT(*) as clrhm FROM $tbl_name WHERE currentlevel>'$li_elmcl'";
	$query_result=mysql_query($sql_query);
	$result_rows=mysql_fetch_array($query_result);
	$li_clearedhowmany=$result_rows['clrhm'];
	
	//obtain level titles
	require_once('module-level-info.php');
	
	
?>
<!doctype html>
<html>
<head>
<?php require_once('module-head-tag.php'); ?>
<link rel="stylesheet" type="text/css" href="assets/general.css"/>
<title><?php echo $level_title[$li_elmcl]; ?></title>
<script type="text/javascript">
	$(document).ready(function(e) {
        
		//type in your answer...
		$("#formAnswer_text").focus(function(e) {
			if($("#formAnswer_text").attr("value")=="type in your answer...") {
				$("#formAnswer_text").attr("value","");
				$("#formAnswer_text").css("color","#000");
			}
		});
		$("#formAnswer_text").blur(function(e) {
			if($("#formAnswer_text").attr("value")=="") {
				$("#formAnswer_text").attr("value","type in your answer...");
				$("#formAnswer_text").css("color","#999");
			}
		});
		//search in google
		$("#google_text").focus(function(e) {
			if($("#google_text").attr("value")=="search...") {
				$("#google_text").attr("value","");
				$("#google_text").css("color","#000");
			}
		});
		$("#google_text").blur(function(e) {
			if($("#google_text").attr("value")=="") {
				$("#google_text").attr("value","search...");
				$("#google_text").css("color","#999");
			}
		});
		

    });
</script>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td style="height: 100px">&nbsp;  </td>
        </tr>
        <tr>
        	<td align="center" valign="middle">
            	<?php 
					if($li_elmcl==1) {
				?>        
                <div class="hintBarContainer">
                	Before you begin, we highly recommend you to check out the <a href="rules.php" target="_blank"><strong>rules
                    page</strong></a> for general <strong>rules, tips &amp; tricks</strong> about playing the game.
                    You can always visit the rules page anytime through the dropdown menu by
                    hovering over your email address near the upper right corner of 
                    the screen.
                </div>
                <?php
					}
				?>
                <div class="answerBarContainer">
                	<form name="answerForm" method="post" action="level-control.php">
                    	<table border="0" cellpadding="0" cellspacing="10" width="100%" height="60px">
                        	<tr>
                            	<td align="left" valign="top">
                        			<input class="formItems" id="formAnswer_text" type="text" name="answer" maxlength="256" value="type in your answer..." />
                                </td>
                                <td align="left" valign="top" width="120px">
                        			<input class="formItems" id="formAnswer_submit" type="submit" name="submit" value="Answer"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="pictureContainer">
                	<?php
						require_once('levels/' . $level_address[$li_elmcl] . ".php");
					?>
                </div>
                <div class="googleSearchContainer">
                	<form name="googleSearch" method="get" action="http://www.google.com/search" target="_blank">
                    	<table border="0" cellpadding="0" cellspacing="10" width="100%" height="60px">
                        	<tr>
                            	<td align="center" valign="bottom" width="120px">
                                	<img src="assets/google-logo.png" height="40" width="116"/>
                                </td>
                                <td align="left" valign="top">
                        			<input class="formItems" id="google_text" type="text" name="q" maxlength="255" value="search..." />
                                </td>
                                <td align="left" valign="top" width="120px">
                                	<input type=hidden name=ie value=UTF-8>
							        <input type=hidden name=oe value=UTF-8>
                        			<input class="formItems" id="google_submit" type="submit" name="btnG" value="Search"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="footerContainer">
                	Elementary. Copyleft 2013 JECLAT 13 Committee.
                </div>
            </td>
        </tr>
        <tr>
        	<td style="height: 10px;">&nbsp;</td>
        </tr>
    </table>
    
    
    <table class="topBar" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td class="topBarItem" align="center" valign="middle" id="tbi_logo">elementary</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_levelinfo">level <?php echo $li_elmcl; ?> (Cleared by <?php  echo $li_clearedhowmany; ?>)</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_buffer1"></td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_user">
            	<span id="accountUsername"><?php echo $li_user; ?></span>
                <ul class="accountOptions">
                	<li><a class="accountOptionsLinks" href="rules.php">rules</a></li>
                    <li><a class="accountOptionsLinks" href="leaderboard.php">leaderboard</a></li>
                    <li><a class="accountOptionsLinks" href="password.php">change password</a></li>
                    <li><a class="accountOptionsLinks" href="logout.php">sign out</a></li>
                </ul>
            </td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_icon"><a href="http://elementaryblog.jeclat.in" target="_blank"><img src="assets/blog.png"</a></td>
        </tr>
    </table>
    
    
</body>
</html>