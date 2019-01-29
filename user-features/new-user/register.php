<?php

session_start();
include 'captcha/simple-php-captcha.php';
$_SESSION['captcha']=simple_php_captcha();
?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel='stylesheet' href='style.css'/>
<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
	<a href= "frontguest.html"> <img class="logo" src="greenCart.jpg"> </a>	
	<p class="title"> shopCart | New User Registration</p>
</div>
<div class="container">
	
</div>
<div class="container">
<div class="jumbotron">
    <form method="POST" action="regscript.php">
		<p style="color: orange">Create a Username: <input type="text" name="uname"/><br>
		<p style="color: orange">Create a Password: <input type="password" name="upass"/></p>
		<p style="color: orange">Enter your email: <input type="text" name="umail"/></p>
		<p><?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" />';?></p>
		<p style="color: green">Copy the text above: <input type="text" name="captcode"/></p>
		<input type="submit" name="submit" value="submit registration"/></p>
	</form> 
</div>
</div>
</body>
</html>
<?php

	
	
	
	
