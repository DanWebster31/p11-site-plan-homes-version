<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

# | db connection

$conn = mysql_connect("$dbhost","$dbuser","$dbpass") or trigger_error("SQL", E_USER_ERROR); 
$db = mysql_select_db("$dbname",$conn) or trigger_error("SQL", E_USER_ERROR);

$currentDate = date("F j, Y");  

$sql="DELETE From users Where idNum = $_GET[id]";

if (!mysql_query($sql,$conn)) {
  die('Error: ' . mysql_error());
}

mysql_close($conn);

header("Location: index.php"); 

?>