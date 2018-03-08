<?php

$dbhost = "db_host";
$dbname = "db_name";
$dbuser = "db_user";
$dbpass = "db_password";

// database connection info
$conn = mysql_connect("$dbhost","$dbuser","$dbpass") or trigger_error("SQL", E_USER_ERROR);
$db = mysql_select_db("$dbname",$conn) or trigger_error("SQL", E_USER_ERROR);

mysql_query('TRUNCATE TABLE siteplan;');


?>
