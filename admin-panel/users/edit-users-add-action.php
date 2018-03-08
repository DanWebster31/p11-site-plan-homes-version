<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

# | db connection

// get the info from the db
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$sql = "SELECT * FROM users ORDER BY idNum DESC";

$result = mysqli_query($con,$sql);

# | usercheck

$usersql = "SELECT * FROM users WHERE username='$_POST[username]'";
$userresult = mysqli_query($con,$usersql);
$count = mysqli_num_rows($userresult);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 0) {
	
	# | insert function
	
	$sql = "INSERT INTO users (name, email, username, password, userLevel) VALUES ('$_POST[contactName]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[userLevel]')";
	
	mysqli_query($con,$sql);
	
	mysqli_close($con);
		
	header("Location: index.php"); 

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $p11pagename ?> Admin | Add User</title>
<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-scripts.php'); ?>
</head>

<body>

<div id="wrapper">

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-header.php'); ?>

<div id="outerContainerSmall">

  <h1>Add User</h1>
  
  <p>Sorry that user already exists. <a href="javascript:history.back();">Go back</a> to the form.</p>

</div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-footer.php'); ?>

</body>
</html>
