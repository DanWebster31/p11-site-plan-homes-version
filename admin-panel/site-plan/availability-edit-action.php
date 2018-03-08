<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

# | db connection

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$saleStatus = addslashes($_POST['saleStatus']);
//$unitType = addslashes($_POST['unitType']);
//$unitTitle = addslashes($_POST['unitTitle']);
$unitPrice = addslashes($_POST['unitPrice']);
$moveInDate = addslashes($_POST['moveInDate']);
$description1 = addslashes($_POST['description1']);
$description2 = addslashes($_POST['description2']);
$caption1 = addslashes($_POST['caption1']);
$caption2 = addslashes($_POST['caption2']);

$sql = "UPDATE siteplan
SET Availability='$saleStatus', Price='$unitPrice', MoveInDate='$moveInDate', Description1='$description1', Description2='$description2', Caption1='$caption1', Caption2='$caption2'
WHERE idNum = $_POST[idNum]";

mysqli_query($con, $sql);

mysqli_close($con);

header("Location: index.php?a=edit"); 

?>