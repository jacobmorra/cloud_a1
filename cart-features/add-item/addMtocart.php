<?php
require_once "Item.php";
session_start();

//echo "<p> ". $_COOKIE['userid'] . "</p> ";

//connect to database (only connects if $_COOKIE['userid'] matches table entry)
$dbLocalhost = mysql_connect("localhost:3306", "root", "")
	or die("Could not connect: " . mysql_error());	
mysql_select_db("shopCartUsers", $dbLocalhost)
	or die ("Could not find database: " . mysql_error());

//select row corresponding to user token in cookie
$cartselect = mysql_query("SELECT userid, numtwix, numkit, nummars FROM usercart WHERE userid='$_COOKIE[userid]'")
	or die("Could not find user: " . mysql_error());
	
//fetch entire row		
$cartfetch = mysql_fetch_row($cartselect)
	or die("Could not fetch password. " . mysql_error());
	
$numtwix = $cartfetch[1];
$numkit = $cartfetch[2];
$nummars = $cartfetch[3];

//create KitKat object for use of methods for adding, setting, getting
$mars = new Mars();

//after importing table data, set kitkat object with correct current number
$mars->setItemNum($nummars);
$mars->addItemNum(1);

$currmars= $mars->getItemNum();
//get total cost 
$cost = $mars->getCost();

//update table with correct number of items
$cartupdate = mysql_query("UPDATE usercart SET nummars = $currmars WHERE userid='$_COOKIE[userid]'")
	or die("Could not update database: " . mysql_error());
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
	<p class="title"> shopCart | Add/Remove Items</p>	
</div>


<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
		<h4>Your item has been added!</h4>
			<a href= "frontpage.php"> <button type="button" class="btn btn-success">Click here to keep shopping </button></a>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
		<h3>Mars Bar Xtreme!</h3> 
		<img class="img-thumbnail" width="304" height="236" src = "http://www.candywarehouse.com/assets/item/large/image-130632.jpg">
		<p class="well">Price: $2.99/ea </p>
	</div>
    <div class="col-sm-4">
    </div>
  </div>
</div>
