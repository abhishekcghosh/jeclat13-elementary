<?php
	if(isset($_POST['password']))
	{
		if($_POST['password']=='SETUP_YOUR_ADMIN_PASSWORD_HERE')			// although this kind of authentication is very vulnerable, but anyway, what the hell, serves the purposes for this site
		{
			//access
			$token = md5(rand(1,10000000));
			setcookie("update_token",$token,time()+60*60*24);

		}
		else
		{
			//die
			header("location: ../addupdate.php?wp");
			exit(0);
		}
	}
	else 
	{
			//die
			header("location: ../addupdate.php");
			exit(0);
	}
?>
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
	<?php
	?>
	<form method="post" action="add-update-backend.php">
    	POST NEW UPDATE ON SITE:
        <br />
    	<textarea name="updatevalue" style="width:400px; height: 100px"></textarea>
        <input type="hidden" name="token" value="<?php echo $token; ?>" />
        <br />
        <input type="submit" value="ENTER UPDATE" />
    </form>
</body>
</html>