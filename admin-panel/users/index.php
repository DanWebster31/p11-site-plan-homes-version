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
<title><?php echo $p11pagename ?> Admin | Edit Users</title>
<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-scripts.php'); ?>
</head>

<body>

<div id="wrapper">

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-header.php'); ?>

<div id="outerContainerMid">
	
  <h1 class="h1Float">Edit Users</h1>
  
  <div id="navigation"><span class="addEmail"><a href="../../admin-panel/users/edit-users-add.php" class="killRight">Add User</a></span></div>
  
  <table width="800" border="0" cellpadding="0" cellspacing="0" bgcolor="#D1D1D1">
    <tr>
      <td><table width="800" border="0" cellpadding="7" cellspacing="1">
        <tr>
          <td width="143" align="left" bgcolor="#EBEBEB"><strong>NAME</strong></td>
          <td width="104" align="left" bgcolor="#EBEBEB"><strong>USERNAME</strong></td>
          <td width="115" align="left" bgcolor="#EBEBEB"><strong>PASSWORD</strong></td>
          <td width="172" align="left" bgcolor="#EBEBEB"><strong>EMAIL</strong></td>
          <td width="51" align="center" bgcolor="#EBEBEB"><strong>LEVEL</strong></td>
          <td width="124" align="left" bgcolor="#EBEBEB">&nbsp;</td>
        </tr>
        
					<?php
          
          // get the info from the db
			$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
			
			$sql = "SELECT * FROM users ORDER BY idNum DESC";
			
			$result = mysqli_query($con,$sql);
          
			$consultantArray[1] = "Admin";
			$consultantArray[2] = "Manager";
			$consultantArray[3] = "Sales";
          
          // while there are rows to be fetched...
          while ($list = mysqli_fetch_assoc($result)) {
          
            // echo data
            echo("<tr>
                    <td bgcolor=\"#FFFFFF\">".$list['name']."</td>
                    <td bgcolor=\"#FFFFFF\">".$list['username']."</td>
                    <td bgcolor=\"#FFFFFF\">".$list['password']."</td>
                    <td bgcolor=\"#FFFFFF\">".$list['email']."</td>
                    <td bgcolor=\"#FFFFFF\" align=\"center\">".$consultantArray[$list['userLevel']]."</td>
                    <td align=\"center\" nowrap=\"nowrap\" bgcolor=\"#FFFFFF\"><span class=\"editButton\"><a href=\"edit-users-edit.php?id=".$list['idNum']."\">Edit</a></span>&nbsp; &nbsp;<span class=\"deleteButton\"><a href=\"edit-users-delete.php?id=".$list['idNum']."\" onClick=\"return confirm('Are you sure you want to delete ".$list['name']."?')\">Delete</a></span></td>
                  </tr>");
          } // end while
		  
		  mysqli_close($con);
              
          ?>
        
      </table></td>
    </tr>
  </table>
  
</div>

<!-- push & end wrapper dummy -->

<div id="push"></div>

</div>

<?php include(str_replace('//','/',dirname(__FILE__).'/') .'../includes/inc-footer.php'); ?>

</body>
</html>
