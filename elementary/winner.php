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
	if($li_elmcl<=__ELEMENTARY_LEVEL_COUNT__) {
		//if current level does not exceed level count, competition ongoing, redirect to level
		header("location: level-control.php");	
		exit(0);
	}
	
	//
	$rank = -1;
	$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_winners";
	$sql_query="SELECT rankid FROM $tbl_name WHERE uid='$li_uid'";
	$query_result=mysql_query($sql_query);
	$result_rows=mysql_fetch_array($query_result);
	$rank=$result_rows['rankid'];
	if($rank=="" && $li_fullname!="admin") {
		//not present, add to list
		$datetimereached = date(__DATE_FORMAT_IP__);
		$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_winners";
		$sql_query="INSERT INTO $tbl_name(uid,whenreached) VALUES('$li_uid','$datetimereached')";
		$query_result=mysql_query($sql_query);
		//now get rank
		$sql_query="SELECT rankid FROM $tbl_name WHERE uid='$li_uid'";
		$query_result=mysql_query($sql_query);
		$result_rows=mysql_fetch_array($query_result);
		$rank=$result_rows['rankid'];
	}
	if($li_fullname=="admin") {
		$rank = 0;
	}
	mysql_close($con);
?>
<!doctype html>
<html>
<head>
<?php require_once('module-head-tag.php'); ?>
<link rel="stylesheet" type="text/css" href="assets/general.css"/>
<title>winner</title>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td style="height: 100px">&nbsp;  </td>
        </tr>
        <tr>
        	<td align="center" valign="middle">
            	<div class="winnerContainer">
                	<br>
                	Congratulations!
                	<div class="winnerBannerMain">
                    	You Won.
                    </div>
                    <br>
                        You ranked #<?php echo $rank; ?>
                    <br>
                    <?php
						if($rank<=10) {
					?>
                    	<span style="font-size:20px; color: #000;">
                        	We'll be getting in touch with you soon! Don't forget to check your mail!
                        </span>
					<?php
						}
					?>
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
            <td class="topBarItem" align="center" valign="middle" id="tbi_levelinfo">winner</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_buffer1"></td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_user">
            	<span id="accountUsername"><?php echo $li_user; ?></span>
                <ul class="accountOptions" style="right: 10px;">
                	<li><a class="accountOptionsLinks" href="leaderboard.php">leaderboard</a></li>
                    <li><a class="accountOptionsLinks" href="password.php">change password</a></li>
                    <li><a class="accountOptionsLinks" href="logout.php">sign out</a></li>
                </ul>
            </td>
        </tr>
    </table>
    
    
</body>
</html>