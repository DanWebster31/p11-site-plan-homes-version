<?php
error_reporting(E_ALL);
$dbhost = "db_host";
$dbname = "db_name";
$dbuser = "db_user";
$dbpass = "db_password";

// database connection info
$conn = mysql_connect("$dbhost","$dbuser","$dbpass") or trigger_error("SQL", E_USER_ERROR);
$db = mysql_select_db("$dbname",$conn) or trigger_error("SQL", E_USER_ERROR);

$residences =  array(

	array("Residence" => "1", "FloorPlanType" => "1C", "FloorPlanTitle" => "", "Description1" => "3 Bedroom / 2.5 Bath", "Description2" => "1,843", "Availability" => "Available", "Price" => "", "MoveInDate" => "", "Caption1" => "Get the best of new construction and contemporary design in this spacious 3-bedroom residence! Cooking in the gourmet kitchen is a real treat with designer finishes and an island. Upstairs, the master suite is extra sweet with 2 walk-in closets.", "Caption2" => "Make the move to Bradbury by Brandywine Homes today!"),


	);


/*foreach($residences as $v) {
echo $v['Residence'];
}*/

foreach($residences as $v) {
      mysql_query("INSERT INTO siteplan (Residence, Elevation, FloorPlanType, FloorPlanTitle, Availability, Price, MoveInDate, Description1, Description2, Caption1, Caption2 )
			VALUES('".str_replace("'", "\'",$v['Residence'])."',
					'".str_replace("'", "\'",$v['Elevation'])."',
          '".str_replace("'", "\'",$v['FloorPlanType'])."',
					'".str_replace("'", "\'",$v['FloorPlanTitle'])."',
					'".str_replace("'", "\'",$v['Availability'])."',
					'".str_replace("'", "\'",$v['Price'])."',
					'".str_replace("'", "\'",$v['MoveInDate'])."',
					'".str_replace("'", "\'",$v['Description1'])."',
					'".str_replace("'", "\'",$v['Description2'])."',
					'".str_replace("'", "\'",$v['Caption1'])."',
					'".str_replace("'", "\'",$v['Caption2'])."')");
   }


?>
