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
<title>leaderboard</title>
</head>
<body>
	<table class="container" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td style="height: 100px">&nbsp;  </td>
        </tr>
        <tr>
        	<td align="center" valign="middle">
            	<div class="rulesContainer">
                	<?php
						require_once('module-sql-connect.php');
						$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
						$tbl_name2=__SQL_TABLE_PREFIX__ . "users";
						$sql_query="SELECT * FROM $tbl_name INNER JOIN $tbl_name2 ON $tbl_name2.uid = $tbl_name.uid ORDER BY currentlevel DESC,whenreached ASC LIMIT 0,100";
						$query_result=mysql_query($sql_query);
						$printed = 0;
						$rank_serial=1;
						echo '<table class="leaderBoardTable" border="0" cellpadding="0" cellspacing="0" width="100%">';
						echo '<tr><td>Rank</td><td>Name</td><td>College/Institute</td><td>Current Level</td></tr>';
						while($result_rows=mysql_fetch_array($query_result)) {
							$level_now = $result_rows['currentlevel'];
							if($result_rows['currentlevel']>__ELEMENTARY_LEVEL_COUNT__) {
								$level_now = 'COMPLETE';
							}
							if($result_rows['fullname']!="admin") {
								echo '<tr><td>' . $rank_serial .  '</td><td>' . $result_rows['fullname'] . '</td><td>' . $result_rows['college'] . '</td><td>' . $level_now . '</td></tr>';
								$rank_serial++;
								$printed =1;
							}
						}
						echo '</table>';
						mysql_close($con);
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
            <td class="topBarItem" align="center" valign="middle" id="tbi_levelinfo">leaderboard</td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_buffer1"></td>
            <td class="topBarItem" align="center" valign="middle" id="tbi_user">
            	<span id="accountUsername"><?php echo $li_user; ?></span>
                <ul class="accountOptions" style="right: 10px;">
                	<li><a class="accountOptionsLinks" href="level.php">current level</a></li>
                    <li><a class="accountOptionsLinks" href="rules.php">rules</a></li>
                    <li><a class="accountOptionsLinks" href="password.php">change password</a></li>
                    <li><a class="accountOptionsLinks" href="logout.php">sign out</a></li>
                </ul>
            </td>
        </tr>
    </table>
    
    
</body>
</html>