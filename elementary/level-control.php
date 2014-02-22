<?php

	//answer array
	$correct_answer[0] = "no-level";
	
	$correct_answer[1] = "my dear watson";
	$correct_answer[2] = "frederick tudor";
	$correct_answer[3] = "mook chivalry";
	$correct_answer[4] = "perelman";
	$correct_answer[5] = "lb384";
	
	$correct_answer[6] = "francisco randez";
	$correct_answer[7] = "animus";
	$correct_answer[8] = "silver linings playbook";
	$correct_answer[9] = "minix";
	$correct_answer[10] = "predator";
	
	$correct_answer[11] = "moskstraumen";
	$correct_answer[12] = "cersei";
	$correct_answer[13] = "valenzetti";
	$correct_answer[14] = "argo";
	$correct_answer[15] = "rubik";
	
	$correct_answer[16] = "edwin";
	$correct_answer[17] = "dxc4";
	$correct_answer[18] = "alcatraz";
	$correct_answer[19] = "the fountain";
	$correct_answer[20] = "nupedia";
	
	$correct_answer[21] = "odyssey";
	$correct_answer[22] = "joker";
	$correct_answer[23] = "alicia";
	$correct_answer[24] = "eragon";
	$correct_answer[25] = "pamela";
	
	$correct_answer[26] = "everest";
	$correct_answer[27] = "embarcadero";
	
	
	//get login parameters, if not logged in, redirect to login page
	require_once('module-session-check.php');
	if($li_user=="no-user") {
		header("location: cover.php?s=starti");
		exit(0);
	}
	
	//requires
	require_once('module-config.php');
	require_once('module-sql-connect.php');
	
	//obtain session level data
	require_once('module-session-level.php');
	
	//match provided answer
	if(isset($_POST['answer'])) {
		$li_givenanswer = strtolower($_POST['answer']);
		if($li_givenanswer==$correct_answer[$li_elmcl]) {
			//correct answer, level increment
			$datetimereached = date(__DATE_FORMAT_IP__);
			$li_elmcl++;
			$_SESSION['jeclat13_elmcurrlvl'] = $li_elmcl;
			$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
			$sql_query="UPDATE $tbl_name SET currentlevel='$li_elmcl',whenreached='$datetimereached' WHERE uid='$li_uid'";
			$query_result=mysql_query($sql_query);
		}
		else {
			//wrong answer, store in wrong answer db
			$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_wronganswers";
			$sql_query="INSERT INTO $tbl_name(uid,level,wronganswer) VALUES('$li_uid','$li_elmcl','$li_givenanswer')";
			$query_result=mysql_query($sql_query);
		}
	}
	
	mysql_close($con);
	
	//processing over, redirect to level (witll fetch current level automatically)	
	header("location: level.php");
	
?>