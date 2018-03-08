<?php
//error_reporting(E_ALL);
include(str_replace('//','/',dirname(__FILE__).'/') .'config.php');

// Connect to server and select databse.
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// username and password sent from form
$myusername = stripslashes($_POST['myusername']);
$mypassword = stripslashes($_POST['mypassword']);

$sql="SELECT * FROM users WHERE username='$myusername' and password='$mypassword'";

// If result valid let 'em through or else send 'em back with error ///////
if ($result = mysqli_fetch_assoc(mysqli_query($con, $sql))) {
	$idNum = $result["idNum"];
	$userLevel = $result["userLevel"];
	session_start();
	$_SESSION['consultantID'] = $idNum;
	$_SESSION['userLevel'] = $userLevel;
	$finalBaseOne = $p11base."site-plan/";
	header("Location: $finalBaseOne");
}
else {
	$finalBaseTwo = $p11base."?messalert=pw";
	header("Location: $finalBaseTwo");
}

mysqli_close($con);

?>
