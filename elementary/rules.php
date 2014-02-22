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
	
	
?>
<!doctype html>
<html>
<head>
<?php require_once('module-head-tag.php'); ?>
<link rel="stylesheet" type="text/css" href="assets/general.css"/>
<title>rules</title>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td style="height: 100px">&nbsp;  </td>
        </tr>
        <tr>
        	<td align="center" valign="middle">
            	<div class="rulesContainer">
                	<div style="font-weight: bold; margin: 20px;">RULES, TIPS &amp; TRICKS</div>
                	<ul class="rulesList">
                    	<li>The gameplay involves getting into the next level by solving the puzzle in the current one using the clues, hints and tricks at your disposal by any means necessary.</li>
                        <li>You can get into the next level by submitting the correct answer through the answer box.</li>
                        <li>Answers are case insensitive. But for multiple word answers, do provide proper space between the words. In case the answer might be one of various possible combinations of a name etc., try using all such combinations you can think of! Who knows - you might arrive at the correct conclusion but just fail to type in the correct combination.</li>
                        <li>Also, note that there is no limitation to the number of trials you get to enter the correct answer in the answer box, so do exploit this fact outrightly!</li>
                        <li>The levels usually require some amount of out-of-the-box lateral thinking which includes locating subtle clues in the puzzles and connecting them in multiple ways. You must be able to connect facts, decipher codes and arrive at correct conclusions to obtain the answer.</li>
                        <li>The clues for a level can be obtained at the following places:
                        	<ul>
                            	<li>Page Title</li>
                                <li>The Image (and it’s name)</li>
                                <li>Page Source code (right-click > view source…)</li>
                            </ul>
                        </li>
                        <li>You would also require to do some amount of document and/or image download and manipulation (doc, xls, jpg, png, gif, etc.) to arrive at answers.</li>
                        <li>Note that all clues might not be correct ones. Some might actually mislead you! So be careful :)</li>
                        <li>We have a blog at <a style="color: rgba(24,0,82,1)" target="_blank" href="http://elementaryblog.jeclat.in">elementaryblog.jeclat.in</a> where you will be able to post comments and discuss with fellow competitors as well as our admins about the levels, clues and get hints and tips. However, all your posts at the blog will be moderated by our administrators to keep tabs on the fact that no obvious clues or direct answers are given out. </li>
                        <li>In case you find a delay between your posts and our replies, please do not get restless, our admins will of course come around but might not be able to do so at that very moment since they probably have their hands full.</li>
                        <li>A lot of hints and discussions are posted by previous contestants who comment about that particular level. So before posting, do take a glance at other contestants’ posts.</li>
                        <li>Please do not share any obvious clues, walkthroughs or answers in any of your personal websites, blogs, or fan pages etc. because it is very much possible that by taking your help, other people finish and win the competition before you! </li>
                        <li>When a number of contestants get stuck at any particular level, the admins will give a push directing them in the way of finding the correct answer.</li>
                        <li>If you need us at any point of the competition, do reach us at <a style="color: rgba(24,0,82,1)" target="_blank" href="mailto:elementary@jeclat.in">elementary@jeclat.in</a>.</li>
                        
                        
                        
                    </ul>
                    <div  style="margin: 20px;">Do try your best and have a great time playing ELEMENTARY.
                    <br> Eye on the prize ;)
                    <br><br>
                    Team Elementary<br>
                    JECLAT 13
                    </div>
                	
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
            <td class="topBarItem" align="center" valign="middle" id="tbi_levelinfo">rules</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_buffer1"></td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_user">
            	<span id="accountUsername"><?php echo $li_user; ?></span>
                <ul class="accountOptions" style="right: 10px;">
                	<li><a class="accountOptionsLinks" href="level.php">current level</a></li>
                    <li><a class="accountOptionsLinks" href="leaderboard.php">leaderboard</a></li>
                    <li><a class="accountOptionsLinks" href="password.php">change password</a></li>
                    <li><a class="accountOptionsLinks" href="logout.php">sign out</a></li>
                </ul>
            </td>
        </tr>
    </table>
    
    
</body>
</html>