<?php
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 
	$tbl_name=__SQL_TABLE_PREFIX__ . "alumni";
	$sql_query="SELECT DISTINCT(yearofpassout) FROM $tbl_name ORDER BY yearofpassout DESC";
	$query_result=mysql_query($sql_query);
	$yearpresent=0;
	while($row=mysql_fetch_array($query_result))
	{
		$year=$row['yearofpassout'];
		echo '<a class="linkyear" onclick="doAlumniListView(' . $year . ')">' . $year . '</a> <br/> ';
		$yearpresent=1;
	}
?>