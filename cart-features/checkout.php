<?php
session_start();
include "Item.php";
//connect to database
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

$costtwix = 4.99 * $numtwix;
$costkit = 3.99 * $numkit;
$costmars = 2.99 * $nummars;

$totalcost = $costtwix + $costkit + $costmars;
?>
<style>
.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #36752D; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #36752D; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #275420; border-left: 1px solid #C6FFC2;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #DFFFDE; color: #275420; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #36752D;background: #DFFFDE;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #36752D;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #275420; color: #FFFFFF; background: none; background-color:#36752D;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
</style>
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
<div class="datagrid"><table>
<thead>
<tr>
	<th>Username</th>
	<th>Name of Item </th>
	<th>Cost of Item</th>
	<th>Qty of Item</th>
	<th>Total Cost</th>
</tr>
</thead>
<tbody>
<tr>
	<td rowspan="3"><?php echo $_SESSION['username']; ?></td>
	<td>Twix Box</td>
	<td>$4.99</td>
	<td><?php echo $numtwix ?></td>
	<td rowspan="3"><?php echo $totalcost ?></td>
</tr>
<tr class="alt">
	<td>Kit Kat Box</td>
	<td>$3.99</td>
	<td><?php echo $numkit ?></td>
</tr>
<tr>
	<td>Mars Box</td>
	<td>$2.99</td>
	<td><?php echo $nummars ?></td>
</tr>

</tbody>
</table></div>

<div class="container">
  <div>
    <br><br><br><br><br><br><br><br><br><br><br>
  </div>
  <div class="jumbotron">
    <h1></h1>
    <p style="color: orange; font-size: 40px"> Your total comes to: $<?php echo $totalcost ?> 
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="amount" value="<?php echo $totalcost; ?>">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="MHCA32H68YD46">
	<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>


</p>	
  </div>
</div>
