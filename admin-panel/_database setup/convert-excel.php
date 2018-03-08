<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
error_reporting(E_ALL);
date_default_timezone_set('America/Los_Angeles');
//--------------------------------------------------------------------------
  // 6) Convert the file into an array
  //--------------------------------------------------------------------------

	require_once "simplexlsx.class.php";

	$xlsx = new SimpleXLSX( 'residences.xlsx' );
	$rows = $xlsx->rows();



  //--------------------------------------------------------------------------
  // 7) Get the key values for each column in the array
  //--------------------------------------------------------------------------

	$keys = array_values($rows[0]);

	unset($rows[0]);

	$count = 0;

	foreach ( $rows as $row ) {
		$row = array_combine($keys, $row);

		echo ('array("Residence" => "'.$row['residence'].'", "Elevation" => "'.$row['elevation'].'", "FloorPlanType" => "'.$row['plan'].'", "FloorPlanTitle" => "", "Description1" => "'.$row['description'].'", "Description2" => "'.number_format($row['sqft']).'", "Availability" => "'.$row['availability'].'", "Price" => "'.$row['price'].'", "MoveInDate" => "'.$row['mid'].'", "Caption1" => "'.$row['caption1'].'", "Caption2" => "'.$row['caption2'].'"),'.'<br />');

	}



?>
</body>
</html>
