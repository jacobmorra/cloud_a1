<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel='stylesheet' href='style.css'/>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
	<a href= "frontpage.php"> <img class="logo" src="greenCart.jpg"> </a>	
	<p class="title"> shopCart | New User Registration</p>
</div>

<?php
if ($_POST["captcode"] == $_SESSION['captcha']['code']){
	if (isset($_POST["submit"]) && !empty($_POST["uname"]) && !empty($_POST["upass"]) && !empty($_POST["umail"])){
		$dbLocalhost = mysql_connect("localhost:3306", "root", "")
				or die("Could not connect: " . mysql_error());
		
		mysql_select_db("shopCartUsers", $dbLocalhost)
				or die ("Could not find database: " . mysql_error());

		$insertRec = "INSERT INTO userinfo (username, password, email) 
			VALUES ('$_POST[uname]', '$_POST[upass]', '$_POST[umail]')";
			
		mysql_query($insertRec, $dbLocalhost)
			or die("Could not insert user: " . mysql_error());
		
		echo "<h3>Welcome to our site, '$_POST[uname]'!</h3>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter a username. <br>";
	echo "Please enter a password.<br>";
	echo "Please enter an email.<br>";
	}
	else if (isset($_POST["submit"]) && !empty($_POST["uname"]) && empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter a password.<br>";
	echo "Please enter an email.<br>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && empty($_POST["upass"]) && !empty($_POST["umail"])){
	echo "Please enter a username.<br>";
	echo "Please enter a password.<br>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && !empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter a username.<br>";
	echo "Please enter an email.<br>";
	}
	else if (isset($_POST["submit"]) && empty($_POST["uname"]) && !empty($_POST["upass"]) && !empty($_POST["umail"])){
	echo "Please enter a username.<br>";
	}
	else if (isset($_POST["submit"]) && !empty($_POST["uname"]) && empty($_POST["upass"]) && !empty($_POST["umail"])){
	echo "Please enter a password.<br>";
	}
	else if (isset($_POST["submit"]) && !empty($_POST["uname"]) && !empty($_POST["upass"]) && empty($_POST["umail"])){
	echo "Please enter an email.<br>";
	}
}
else{
	echo "You are a spambot or other form of automation.. or you forgot to copy the captcha form.";
}
?>
