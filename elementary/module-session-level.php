<?php
	require_once('module-config.php');
	//fetch current level
	$li_elmcl = 1;
	/*if(isset($_SESSION['jeclat13_elmcurrlvl'])) {									//session storage of level eliminated to facilitate multiple login progress sync
		//session level stored, so set to var
		$li_elmcl = $_SESSION['jeclat13_elmcurrlvl'];
		
	}
	else {
		*/
		//session level not stored, retrieve from db
		require_once('module-sql-connect.php');
		$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
		$sql_query="SELECT currentlevel FROM $tbl_name WHERE uid='$li_uid'";
		$query_result=mysql_query($sql_query);
		$result_rows=mysql_fetch_array($query_result);
		$li_dbcl=$result_rows['currentlevel'];
		
		if($li_dbcl=="") {
			//doesnot exist in db, so add curr level value = 1 in db
			$datetimereached = date(__DATE_FORMAT_IP__);
			$li_dbcl = 1;
			$tbl_name=__SQL_TABLE_PREFIX__ . "elementary_levels";
			$sql_query="INSERT INTO $tbl_name(uid,currentlevel,whenreached) VALUES('$li_uid','$li_dbcl','$datetimereached')";
			$query_result=mysql_query($sql_query);
		}
		
		//set final elmcl value, set session var
		$li_elmcl = $li_dbcl;
		//$_SESSION['jeclat13_elmcurrlvl'] = $li_elmcl;
		
	//}
?>