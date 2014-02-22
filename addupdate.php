<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="JECLAT 13, The Annual Cultural Festival of Jalpaiguri Government Engineering College" />
<meta name="keywords" content="cultural, festival, fest, 2013, jgec, jalpaiguri, engineering, college, competitions, events, annual, reunion, ojasvin, irina, seminar, social, night, grand" />
<meta name="author" content="Abhishek Ghosh" />
<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
<title>JECLAT 13 - Admin Panel</title>
<style type="text/css">
	body {
		background-color: #eee;
		font-family: "Courier New", Courier, monospace;
		font-size: 1em;
	}
	input {
		font-family: "Courier New", Courier, monospace;
		font-size: 1em;
	}
</style>
</head>
<body>
	<form method="post" action="admin/add-update.php">
    	PASSWORD:
    	<input name="password" type="password" value="" maxlength="32" size="30" />
        <input type="submit" value="ENTER" />
    </form>
    <?php
		if(isset($_GET['wp']))
		{
			echo '<code style="color: #f00">WRONG PASSWORD!</code>';
		}
	?>
</body>
</html>