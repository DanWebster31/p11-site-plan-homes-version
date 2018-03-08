<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

# | db connection

$idNumerial = $_GET['id'];

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$sql = "SELECT * FROM users WHERE idNum = $idNumerial";

$result = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE idNum = $idNumerial"));

$idNum = stripslashes($result["idNum"]);
$name = stripslashes($result["name"]);
$email = stripslashes($result["email"]);
$username = stripslashes($result["username"]);
$password = stripslashes($result["password"]);
$userLevelFinal = stripslashes($result["userLevel"]);

mysqli_close($con);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $p11pagename ?> Admin | Edit Users</title>
<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-scripts.php'); ?>
</head>

<body>

<div id="wrapper">

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-header.php'); ?>

<div id="outerContainerSmall">

<h1>Edit User</h1>

  <form action="../../admin-panel/users/edit-users-edit-action.php" method="post" name="htmlEmail" id="htmlEmail">
  
  <input name="idNum" type="hidden" value="<?php echo($idNum); ?>">
  
  <label for="contactName">Name</label>
  <input name="contactName" id="contactName" type="text" alt="Name" class="newFieldStyle" value="<?php echo($name) ?>" />
  
  <label for="email">Email</label>
  <input name="email" id="email" type="text" alt="Email" class="newFieldStyle" value="<?php echo($email) ?>" />
  
  <label for="username">Username</label>
  <input name="username" id="username" type="text" alt="Username" class="newFieldStyle" value="<?php echo($username) ?>" disabled style="background-color: #ececec;" />
  
  <label for="password">Password</label>
  <input name="password" id="password" type="text" alt="Address" class="newFieldStyle" value="<?php echo($password) ?>" />
  
  <label for="userLevel">User Level</label>
  <select name="userLevel" id="userLevel" class="newFieldStyleSelect">
  <option value="1" <?php if ($userLevelFinal == 1) { echo('selected="selected"'); } ?> >Admin</option>
  <option value="2" <?php if ($userLevelFinal == 2) { echo('selected="selected"'); } ?>>Manager</option>
  <option value="3" <?php if ($userLevelFinal == 3) { echo('selected="selected"'); } ?>>Sales</option>
  </select>
        
  <div id="formyButtons"><a href="../../admin-panel/users/index.php"><img src="<?php print $p11base ?>images/cancel.gif" alt="Cancel - Back to Main" width="166" height="31" border="0"></a><input type="image" name="imageField" id="imageField" src="<?php print $p11base ?>images/button_edituser.gif" class="buttonSpacer" onClick="MM_validateForm('firstName','','R','lastName','','R','email','','R');return document.MM_returnValue"></div>
        
  </form>
  
</div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-footer.php'); ?>

</body>
</html>
