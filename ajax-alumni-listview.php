<?php 
	require_once('module-config.php');
	require_once('module-sql-connect.php'); 
	$year=addslashes(strip_tags(trim($_GET['y'])));
	
	echo '<span style="font-variant: small-caps">From the <b>' . $year . '</b> Batch</span> - <a style="padding: 4px; color: #2bf" id="pfv_link" href="alumni-pfv.php?y=' . $year . '" target="_blank">get a printer-friendly version</a><br /><br />';
	$tbl_name=__SQL_TABLE_PREFIX__ . "alumni";
	$sql_query="SELECT * FROM $tbl_name WHERE yearofpassout='$year'";
	$query_result=mysql_query($sql_query);
	$printed=0;
	while($row=mysql_fetch_array($query_result))
	{
		$aid=stripslashes($row['aid']);
		$name=stripslashes($row['name']);
		$collegenick=stripslashes($row['collegenick']);
		$yearofpassout=stripslashes($row['yearofpassout']);
		$department=stripslashes($row['department']);
		$company=stripslashes($row['company']);
		$phone=stripslashes($row['phone']);
		$emailid=stripslashes($row['emailid']);
		$attendingstatus=stripslashes($row['attendingstatus']);
		echo '<table class="alumniitemtable" border="0" cellpadding="2" cellspacing="2" width="100%">';
		echo '<tr><td>' . $name . '';
		if($collegenick!="") { echo ' <span style="color: #666666">a.k.a.</span> "' . $collegenick . '"'; }
		echo '<br />' . $yearofpassout . ' (' . $department . ')<br /><span style="color: #666666">Presently working in: </span>' . $company . '<br /><span style="color: #666666">Contact #: </span>' . $phone . '<br /><span style="color: #666666">Email: </span>' . $emailid . '<br /><span style="color: #666666">Attending: </span>' . $attendingstatus . '<br /></td></tr>';
		echo '</table><br />';
		$printed=1;
	}
	if($printed==0) { echo 'No alumni entries from the ' . $year . ' batch yet.'; echo '<style> #pfv_link { display: none; } </style>'; }
	
?>