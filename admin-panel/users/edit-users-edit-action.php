<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

# | db connection

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$sql = "UPDATE users SET name='$_POST[contactName]', email='$_POST[email]', password='$_POST[password]', userLevel='$_POST[userLevel]' WHERE idNum = $_POST[idNum]";

mysqli_query($con,$sql);
mysqli_close($con);

header("Location: index.php"); 

?>