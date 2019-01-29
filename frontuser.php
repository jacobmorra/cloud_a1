<!--this file is not to be run stand-alone. It is appended to frontpage.php
	..this is why I have omitted "session_start()" from the code.        -->

<?php
//error-testing: check MD5 value of username with cookie value of past user
/*echo $_SESSION["username"];
echo "<br>";
echo MD5($_SESSION["username"]);
echo "<br>";
echo $_COOKIE["userid"];
*/
$dbLocalhost = mysql_connect("localhost:3306", "root", "")
	or die("Could not connect: " . mysql_error());
		
mysql_select_db("shopCartUsers", $dbLocalhost)
	or die ("Could not find database: " . mysql_error());

$result = mysql_query("SELECT 1 FROM usercart WHERE userid='$_COOKIE[userid]' LIMIT 1");
//if the user cookie is already in the database
if (mysql_fetch_row($result)) {
    //echo 'Assigned';
} 
//otherwise if the user cookie isn't already in the database 
else {
    //echo 'Available';
	$insertRec = "INSERT INTO usercart (userid) VALUES ('$_COOKIE[userid]')";
			
	mysql_query($insertRec, $dbLocalhost)
	or die("Could not insert user: " . mysql_error());
}
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
	<p class="title">shopCart</p>
	<?php echo "<p style='color:white'> Welcome, " . $_SESSION['username']. "! </p>"?>	
</div>
<div class="container">
<div style="width:100%">
<div style="float: left; width: 50%"> 
	<a href="logout.php">
		<button type="button" class="btn btn-primary" style="float:left">Click to logout</button>
	</a>		
</div>
<div style="float: right; width: 50%">
	<a href="checkout.php">
		<button type="button" class="btn btn-primary"style="float:right">Click to checkout</button>
	</a>
</div>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
		<h3>Ultimate Twix!</h3>
		<img class="img-thumbnail" width="304" height="236" src = "http://www.chocolate-brands.com/image/cache/data/Mars/mars-twix-display-500x500.jpg">
		<p class="well">Price: $4.99/ea </p>
		
		<div style="width:100%">
		<div style="float: left; width: 50%"> 
		<form method="post" action="addTtocart.php">	
			<label for="tSubmit" class="btn"><i class="btn btn-success" ><span class="glyphicon glyphicon-plus"></span></i></label>
			<input id="tSubmit" type="submit" value="tsubmit" name="tsubmit" class="hidden" />
		</form>
		</div>
		<div style="float: left; width: 50%">
		<form style="float:right" method="post" action="rmvTtocart.php">
			<label for="trSubmit" class="btn"><i class="btn btn-danger" ><span class="glyphicon glyphicon-minus"></span></i></label>
			<input id="trSubmit" type="submit" value="trsubmit" name="trsubmit" class="hidden" />
		</form>
		</div>
		</div>
    </div>
    <div class="col-sm-4">
		<h3>Kit Kat Chunky!</h3>
		<img class="img-thumbnail" width="304" height="236" src = "http://thumbs1.ebaystatic.com/d/l225/m/mZs9BTHDJ3Nn5aP1UOBGIcA.jpg">
		<p class="well">Price: $3.99/ea </p>
		
		<div style="width:100%">
		<div style="float: left; width: 50%"> 
		<form method="post" action="addKtocart.php">
			<label for="kSubmit" class="btn"><i class="btn btn-success" ><span class="glyphicon glyphicon-plus"></span></i></label>
			<input id="kSubmit" type="submit" value="ksubmit" name="ksubmit" class="hidden" />
		</form>
		</div>
		<div style="float: left; width: 50%">
		<form style="float:right" method="post" action="rmvKtocart.php">
			<label for="krSubmit" class="btn"><i class="btn btn-danger" ><span class="glyphicon glyphicon-minus"></span></i></label>
			<input id="krSubmit" type="submit" value="krsubmit" name="krsubmit" class="hidden" />
		</form>
		</div>
		</div>
    </div>
    <div class="col-sm-4">
		<h3>Mars Bar Xtreme!</h3> 
		<img class="img-thumbnail" width="304" height="236" src = "http://www.candywarehouse.com/assets/item/large/image-130632.jpg">
		<p class="well">Price: $2.99/ea
		
		<div style="width:100%">
		<div style="float: left; width: 50%"> 
		<form method="post" action="addMtocart.php"> 
			<label for="mSubmit" class="btn"><i class="btn btn-success" ><span class="glyphicon glyphicon-plus"></span></i></label>
			<input id="mSubmit" type="submit" value="msubmit" name="msubmit" class="hidden" />
		</form>
		</div>
		<div style="float: left; width: 50%">
		<form style="float:right" method="post" action="rmvMtocart.php">
			<label for="mrSubmit" class="btn"><i class="btn btn-danger" ><span class="glyphicon glyphicon-minus"></span></i></label>
			<input id="mrSubmit" type="submit" value="mrsubmit" name="mrsubmit" class="hidden" />
		</form>
		</div>
		</div>
    </div>
  </div>
</div>
<br><br>

<br><br><br>
<br><br><br>
<footer>
	<div class="jumbotron">
	<a href= "shopcart.xml"> <img class="logo" src="rss.png"> </a>	
	<br><br><br><br><br><br><br><br>	
</div>
  <p>Jacob Morra &copy 2015</p>
</footer>
</body>
</html>