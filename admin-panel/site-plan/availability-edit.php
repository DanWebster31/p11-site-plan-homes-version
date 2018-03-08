<?php
include(str_replace('//','/',dirname(__FILE__).'/') .'../app/config.php');

session_start();
if(!isset($_SESSION['consultantID'])){
	header("location:$p11base");
}

# | db connection

$idNumerial = $_GET['idNum'];

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$sql="SELECT * FROM siteplan Where idNum = $idNumerial";
$result = mysqli_fetch_assoc(mysqli_query($con, $sql));
$num = $result->num_rows;

mysqli_close($con);

$idNum = stripslashes($result["idNum"]);
$unitNumber = stripslashes($result["Residence"]);
$unitType = stripslashes($result["FloorPlanType"]);
$unitTitle = stripslashes($result["FloorPlanTitle"]);
$saleStatus = stripslashes($result["Availability"]);
$unitPrice = stripslashes($result["Price"]);
$moveInDate = stripslashes($result["MoveInDate"]);
$description1 = stripslashes($result["Description1"]);
$description2 = stripslashes($result["Description2"]);
$caption1 = stripslashes($result["Caption1"]);
$caption2 = stripslashes($result["Caption2"]);

$saleStatus0 = "";
$saleStatus1 = "";
$saleStatus2 = "";
$saleStatus3 = "";
$saleStatus4 = "";

switch ($saleStatus) {
	case 'Available':
		$saleStatus0 = 'selected="selected"';
		break;
	case 'Sold':
		$saleStatus1 = 'selected="selected"';
		break;
	case 'Reserved':
		$saleStatus2 = 'selected="selected"';
		break;
	case 'Model':
		$saleStatus3 = 'selected="selected"';
		break;
	case 'Future Phase':
		$saleStatus4 = 'selected="selected"';
		break;
	default:
		$salesStatus0 = 'selected="selected"';
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $p11pagename ?> | Site Plan Admin</title>
<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-scripts.php'); ?>
</head>


<body onLoad="MM_preloadImages('<?php echo $p11base ?>images/add.gif','<?php echo $p11base ?>images/delete.gif','<?php echo $p11base ?>images/edit.gif','<?php echo $p11base ?>images/stats.gif','<?php echo $p11base ?>images/logout.gif');">

<div id="wrapper">

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-header.php'); ?>

<div id="outerContainerSmall">

	<h1>Edit Residence Info</h1>

  <form action="availability-edit-action.php" method="post" name="htmlEmail" id="htmlEmail">
  <input name="idNum" type="hidden" value="<?php echo($idNum); ?>">
  <input type="hidden" name="reURL" id="reURL" value="<?php print $_SERVER['HTTP_REFERER']; ?>" />

  <label for="unitType">Residence</label>
  <input name="unitNumber" type="text" class="newFieldStyle" id="unitNumber" alt="Unit Number" value="<?php echo($unitNumber); ?>" disabled >

  <label for="lastName">Availability</label>
  <select name="saleStatus"  class="newFieldStyleSelect">
  <option value="Available" <?php print $saleStatus0; ?>>Available</option>
  <option value="Sold" <?php print $saleStatus1; ?>>Sold</option>
  <option value="Reserved" <?php print $saleStatus2; ?>>Reserved</option>
  <option value="Model" <?php print $saleStatus3; ?>>Model</option>
  <option value="Future Phase" <?php print $saleStatus4; ?>>Future Phase</option>
  </select>

  <label for="unitType">Plan Type</label>
  <input name="unitType" type="text" class="newFieldStyle" id="unitType" alt="Unit Type" value="<?php echo($unitType) ?>" disabled >

  <!--<label for="unitTitle">Plan Title</label>-->
  <input name="unitTitle" type="hidden" class="newFieldStyle" id="unitTitle" alt="Unit Title" value="<?php echo($unitTitle) ?>">

  <label for="unitPrice">Price</label>
  <input name="unitPrice" type="text" class="newFieldStyle" id="unitPrice" alt="Unit Price" value="<?php echo($unitPrice) ?>">

  <label for="moveInDate">Move In Date</label>
  <input name="moveInDate" type="text" class="newFieldStyle" id="moveInDate" alt="Move-In-Date" value="<?php echo($moveInDate) ?>">

  <label for="description1">Description 1</label>
  <input name="description1" type="text" class="newFieldStyle" id="description1" alt="Description 1" value="<?php echo($description1) ?>">

  <label for="description2">Description 2</label>
  <input name="description2" type="text" class="newFieldStyle" id="description2" alt="Description 2" value="<?php echo($description2) ?>">

  <label for="caption1" >Caption 1</label>
  <textarea name="caption1" rows="7" class="newFieldStyle" id="caption1" alt="Caption 1"><?php echo($caption1) ?></textarea>

  <label for="caption2" >Caption 2</label>
  <textarea name="caption2" rows="7" class="newFieldStyle" id="caption2" alt="Caption 2"><?php echo($caption2) ?></textarea>

  <div id="formyButtons"><a href="<?php print $_SERVER['HTTP_REFERER'] ?>"><img src="<?php echo $p11base ?>images/cancel.gif" alt="Cancel - Back to Main" width="166" height="31" border="0"></a><input type="image" name="imageField" id="imageField" src="<?php echo $p11base ?>images/editunit.gif" class="buttonSpacer"></div>

  </form>
</div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-footer.php'); ?>
</body>
</html>
