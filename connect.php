<?php


$host = "localhost";
$username = "root";
$password = "Bonjib2015";
$db = "stock";
$objcon = mysql_connect($host,$username,$password) or die("Cannot Connect Database");
mysql_select_db($db);
mysql_query( "SET NAMES UTF8" );


?>