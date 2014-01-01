 <?php require_once 'include/db_connection.php'; 
  $id =$_REQUEST['id'];
  mysql_query("DELETE FROM lpda_laptop_hfwc WHERE id='$id'")or die(mysql_error());  	
  print "<script>";
  print " self.location='addhfwclaptopinfo.php'"; // Comment this line if you don't want to redirect
  print "</script>";
?>