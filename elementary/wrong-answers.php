<?php
		session_start();
		
		if(isset($_GET['logout'])) {
			unset($_SESSION['j13_elementary_adminpass']);
			header('location: wrong-answers.php');
			exit(0);
		}
	?>
    
    
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Elementary - Wrong Answers</title>
</head>
<body>
	<?php	
		if((isset($_POST['p']) && $_POST['p']==".jklt.elm13") || (isset($_SESSION['j13_elementary_adminpass']) && $_SESSION['j13_elementary_adminpass']==".jklt.elm13")) {
			$_SESSION['j13_elementary_adminpass'] = ".jklt.elm13";
			//ok, show details
			?>
            	<form name="filter" method="get" action="wrong-answers.php">
                	Based on User: 
                    <select name="u">
                    	<?php
							require_once('module-config.php');
							require_once('module-sql-connect.php');
							
							$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_wronganswers";
							$tbl_name2=__SQL_TABLE_PREFIX__ . "users";
							$sql_query="SELECT DISTINCT(uid) FROM $tbl_name";
							$query_result=mysql_query($sql_query);
							while($result_rows=mysql_fetch_array($query_result)) {
								$thisUID = $result_rows['uid'];															
								$sql_query2="SELECT * FROM $tbl_name2 WHERE uid='$thisUID'";
								$query_result2=mysql_query($sql_query2);
								while($result_rows2=mysql_fetch_array($query_result2)) {
									echo '<option value="' . $result_rows2['uid'] .  '">' . $result_rows2['fullname'] . ' (' . $result_rows2['emailid'] . ')</option>';
									
								}
							}
							
						?>
                    </select>
                    <input type="submit" name="s" value="Display"/>
                </form>
                <br>
                <form name="filter" method="get" action="wrong-answers.php">
                	Based on Level: 
                    <select name="l">
                    	<?php
							
							$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_wronganswers";
							//$tbl_name2=__SQL_TABLE_PREFIX__ . "users";
							$sql_query="SELECT DISTINCT(level) FROM $tbl_name";
							$query_result=mysql_query($sql_query);
							while($result_rows=mysql_fetch_array($query_result)) {
								echo '<option value="' . $result_rows['level'] .  '">' . $result_rows['level'] . '</option>';
								
							}
							//mysql_close($con);
							
						?>
                    </select>
                    <input type="submit" name="s" value="Display"/>
                </form>
                <hr>
                	<?php
						
						if(isset($_GET['u'])) {
							
							$u = $_GET['u'];
						
							$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_wronganswers";
							$tbl_name2=__SQL_TABLE_PREFIX__ . "users";
							
							$sql_query="SELECT * FROM $tbl_name2 WHERE uid='$u'";
							$query_result=mysql_query($sql_query);
							$result_rows=mysql_fetch_array($query_result);
							echo 'Wrong answers for User: <b>' . $result_rows['fullname'] . '(' . $result_rows['emailid'] . ')</b><br><br>';
							
							$sql_query="SELECT * FROM $tbl_name WHERE uid='$u' ORDER BY level ASC";
							$query_result=mysql_query($sql_query);
							echo '<table border="1" cellpadding="4" cellspacing="0">';
							echo '<tr><td>LEVEL</td><td>WRONG ANSWER</td></tr>';
							while($result_rows=mysql_fetch_array($query_result)) {
								echo '<tr><td>' . $result_rows['level'] .  '</td><td>' . $result_rows['wronganswer'] . '</td></tr>';
								
							}
							//mysql_close($con);
							echo '</table>';
						}
					?>
                    <?php
						
						if(isset($_GET['l'])) {
							
							$l = $_GET['l'];
						
							$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_wronganswers";
							$tbl_name2=__SQL_TABLE_PREFIX__ . "users";
							
							//$sql_query="SELECT * FROM $tbl_name2 WHERE uid='$u'";
							//$query_result=mysql_query($sql_query);
							//$result_rows=mysql_fetch_array($query_result);
							echo 'Wrong answers for Level: <b>' . $l . '</b><br><br>';							
							$sql_query="SELECT * FROM $tbl_name INNER JOIN $tbl_name2 ON $tbl_name2.uid = $tbl_name.uid WHERE level='$l' ORDER BY $tbl_name.uid ASC ";
							$query_result=mysql_query($sql_query);
							echo '<table border="1" cellpadding="4" cellspacing="0">';
							echo '<tr><td>USER</td><td>WRONG ANSWER</td></tr>';
							while($result_rows=mysql_fetch_array($query_result)) {
								echo '<tr><td>' . $result_rows['fullname'] . '(' . $result_rows['emailid'] . ')' . '</td><td>' . $result_rows['wronganswer'] . '</td></tr>';
								
							}
							
							echo '</table>';
							//mysql_close($con);
						}
					?>
                    
                <hr>
                	<?php
						
						$li_adminUID = 444;
						
					
						if(isset($_GET['acl'])) {
							
							$acl = $_GET['acl'];
						
							$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
							
							$sql_query="UPDATE $tbl_name SET currentlevel='$acl' WHERE uid='$li_adminUID'";
							$query_result=mysql_query($sql_query);
							
						}
						
					?>
                	Present <strong>admin</strong> level: 
					<?php
						$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
						//$tbl_name2=__SQL_TABLE_PREFIX__ . "users";
						$sql_query="SELECT currentlevel FROM $tbl_name WHERE uid='$li_adminUID'";
						$query_result=mysql_query($sql_query);
						$result_rows=mysql_fetch_array($query_result);
						echo $result_rows['currentlevel'];
						mysql_close($con);
					?>
                    <br>
                    <form name="acrlvl" method="get" action="wrong-answers.php">
                    Change admin's <strong>current level</strong> to 
                    <select name="acl">
                    	<?php
							$lv=1;
							for($lv=1;$lv<=__ELEMENTARY_LEVEL_COUNT__;$lv++) {
								echo '<option value="' . $lv . '">' . $lv . '</option>';
							}
						?>
                    </select>
                    <input type="submit" name="s" value="Update"/>
                    </form>
                    
                    
                <hr>
                <a href="wrong-answers.php?logout">LOGOUT</a>
            <?php
		}
		else
		{
			//show login password form
			?>
            	<form name="login" method="post" action="wrong-answers.php">
                	Password? <input type="password" name="p"> <input type="submit" name="s">
                </form>
            <?php
		}
		
	?>
</body>
</html>