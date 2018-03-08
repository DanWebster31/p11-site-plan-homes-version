<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}


// database connection info
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

setlocale(LC_MONETARY, 'en_US');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $p11pagename ?> | Site Plan Admin</title>
<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-scripts.php'); ?>
</head>

<body onLoad="MM_preloadImages('<?php echo $p11base ?>images/add.gif','<?php echo $p11base ?>images/delete.gif','<?php echo $p11base ?>images/edit.gif','<?php echo $p11base ?>images/stats.gif','<?php echo $p11base ?>images/logout.gif');">

<div id="quickFormThanks"><div id="lotPhaseIcon">Unit Updated</div></div>

<div id="wrapper">

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-header.php'); ?>

<div id="outerContainer">

  <h1 style="margin-bottom: 0px;">Site Plan Availability</h1>

  <div id="navigation"></div>

  <table width="940" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1D1D1" style="margin-bottom: 20px;">
    <tr>
      <td>
      <table width="940" border="0" cellpadding="5" cellspacing="1">
        <tr>
          <td width="135" align="left" bgcolor="#EBEBEB"><strong>RESIDENCE</strong></td>
          <td width="135" align="left" bgcolor="#EBEBEB"><strong>FLOOR PLAN</strong></td>
          <td width="150" align="left" bgcolor="#EBEBEB"><strong>AVAILABILITY</strong></td>
          <td width="300" align="left" bgcolor="#EBEBEB"><strong>DESCRIPTION</strong></td>
					<td width="113" align="left" bgcolor="#EBEBEB"><strong>SQ. FT.</strong></td>
          <td width="50" align="center" bgcolor="#EBEBEB">&nbsp;</td>
        </tr>

<?php


$sql = "SELECT * FROM siteplan ORDER BY idNum ASC";
$result = mysqli_query($con, $sql);
//$result = mysql_query($sql, $con) or trigger_error("SQL", E_USER_ERROR);

// while there are rows to be fetched...
while ($list = mysqli_fetch_assoc($result)) {

	// echo data
	echo("<tr>
		<td bgcolor=\"#FFFFFF\">".stripslashes($list['Residence'])."</td>
		<td bgcolor=\"#FFFFFF\">".stripslashes($list['FloorPlanType'])."</td>
		<td bgcolor=\"#FFFFFF\">".stripslashes($list['Availability'])."</td>
		<td bgcolor=\"#FFFFFF\">".stripslashes($list['Description1'])."</td>
		<td bgcolor=\"#FFFFFF\">".stripslashes($list['Description2'])."</td>
		<td bgcolor=\"#FFFFFF\" align=\"center\"><span class=\"editButton\"><a href=\"availability-edit.php?idNum=".stripslashes($list['idNum'])."\">Edit</a></span></td>
	</tr>");
} // end while

mysqli_close($con);

?>

      </table>
      </td>
    </tr>
  </table>


</div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php

if (isset($_GET['a'])) {

	if ($_GET['a'] == "edit") {
		print'<script type="text/javascript">
	$(document).ready(function() {
		$("#quickFormThanks").slideDown(200, function() { $("#quickFormThanks").delay(3000).slideUp(200);});
	});
	</script>';
	}

}
?>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-footer.php'); ?>

</body>
</html>
