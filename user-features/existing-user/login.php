<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel='stylesheet' href='style.css'/>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
	<a href= "frontpage.php"> <img class="logo" src="greenCart.jpg"> </a>	
	<p class="title"> shopCart | User Login</p>
</div>
<div class="container">
	
</div>

</body>
</html>
<?php

session_start();

if (isset($_POST["submit"]) && !empty($_POST["unm"]) && !empty($_POST["ups"])){
	$dbLocalhost = mysql_connect("localhost:3306", "root", "")
			or die("Could not connect: " . mysql_error());
	
	mysql_select_db("shopCartUsers", $dbLocalhost)
			or die ("Could not find database: " . mysql_error());
			
	try{
		$sql = mysql_query("SELECT username, password FROM userinfo WHERE 
			username='$_POST[unm]' AND password='$_POST[ups]'")
			or die("Could not find user: " . mysql_error());
		
		$userfetch = mysql_fetch_row($sql)
			or die("Could not find user. " . mysql_error());
			
		$_SESSION['username'] = $userfetch[0];
		$_SESSION['userpass'] = $userfetch[1];
		
		//*******************************create token to go with user session
		$cookie_name = "userid";
		$cookie_value = MD5($_SESSION["username"]);
		
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				
		//************************************************************************
		//$message = "You have successfully logged in. Welcome, " . $userfetch[0] . "!";
		header("Location: frontpage.php");
		
	}
	catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
else{
	$message =  "Login failure.";
}

?>
