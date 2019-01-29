<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel='stylesheet' href='style.css'/>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
	<a href= "frontguest.html"> <img class="logo" src="greenCart.jpg"> </a>	
	<p class="title"> shopCart | Password Recovery</p>
</div>
<div class="container">
	
</div>
<?php
//if (isset($_POST["submit"]) && !empty($_POST["nom"]) && !empty($_POST["ema"])){
	$dbLocalhost = mysql_connect("localhost:3306", "root", "")
			or die("Could not connect: " . mysql_error());
	
	mysql_select_db("shopCartUsers", $dbLocalhost)
			or die ("Could not find database: " . mysql_error());

	$pass = mysql_query("SELECT password FROM userinfo WHERE username='$_POST[nom]'")
		or die("Could not find user: " . mysql_error());
		
	$passfetch = mysql_fetch_row($pass)
		or die("Could not fetch password. " . mysql_error());
	
	echo "Your password is " . $passfetch[0];	
//}
//else{
//	echo "oops!";
//}
