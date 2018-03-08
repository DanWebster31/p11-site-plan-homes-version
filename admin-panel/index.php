<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'app/config.php');
if (isset($_GET['messalert'])) {
	$messalert = $_GET['messalert'];
} else {
	$messalert = "";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php print $p11pagename; ?> Admin | Login</title>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'includes/inc-scripts.php'); ?>

</head>

<body>

<div id="wrapper">

  <div id="headUnitHolder">
    <div id="headUnit">
      <div id="headTitleFront"><?php print $p11pagename; ?> Availability</div>
      <div id="headLogo"><img src="<?php print $p11base ?>images/logo.png" alt="<?php print $p11pagename; ?>" width="175" height="60" border="0" /></div>
    </div>
  </div>

  <div id="outsideContainer">

    <div id="loginBox">
      <?php
      if ($messalert == 'pw') {
        print('<div id="failBox">Username and/or password failed, please try again.</div>');
        print("<script type='text/javascript'>$(document).ready(function(){ $('#failBox').fadeIn('1500'); });</script>");
      }
      ?>
      <form id="loginForm" name="loginForm" method="post" action="app/">

        <table width="450" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="111" align="right">Username</td>
            <td width="339" align="right"><input name="myusername" type="text" class="loginField" id="myusername" /></td>
          </tr>
          <tr class="frontFormSpacing">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">Password</td>
            <td align="right"><input name="mypassword" type="password" class="loginField" id="mypassword" /></td>
          </tr>
          <tr class="frontFormSpacing">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">&nbsp;</td>
            <td align="right"><input type="image" name="imageField" id="imageField" src="images/login.gif" /></td>
          </tr>
        </table>
      </form>
    </div>

  </div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'includes/inc-footer.php'); ?>
