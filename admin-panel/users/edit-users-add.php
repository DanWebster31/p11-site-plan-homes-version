<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $p11pagename ?> Admin | Add Users</title>
<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-scripts.php'); ?>
</head>

<body>

<div id="wrapper">

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-header.php'); ?>

<div id="outerContainerSmall">

  <h1>Add User</h1>
  
  <form action="../../admin-panel/users/edit-users-add-action.php" method="post" name="htmlEmail" id="htmlEmail">
  
  <label for="contactName">Name</label>
  <input name="contactName" id="contactName" type="text" alt="Name" class="newFieldStyle" />
  
  <label for="email">Email</label>
  <input name="email" id="email" type="text" alt="Email" class="newFieldStyle" />
  
  <label for="username">Username</label>
  <input name="username" id="username" type="text" alt="Username" class="newFieldStyle" />
  
  <label for="password">Password</label>
  <input name="password" id="password" type="text" alt="Address" class="newFieldStyle" />
  
  <label for="userLevel">User Level</label>
  <select name="userLevel" id="userLevel" class="newFieldStyleSelect">
  <option value="1">Admin</option>
  <option value="2">Manager</option>
  <option value="3" selected="selected">Sales</option>
  </select>
        
  <div id="formyButtons"><a href="../../admin-panel/users/index.php"><img src="<?php print $p11base ?>images/cancel.gif" alt="Cancel - Back to Main" width="166" height="31" border="0"></a><input type="image" name="imageField" id="imageField" src="<?php print $p11base ?>images/button_adduser.gif" class="buttonSpacer" onClick="MM_validateForm('firstName','','R','lastName','','R','email','','R');return document.MM_returnValue"></div>
        
  </form>

</div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-footer.php'); ?>

</body>
</html>
