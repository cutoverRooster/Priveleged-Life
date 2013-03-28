<?php
require('../includes/connectDB.php');
session_start(); 
$name=$_POST['name'];
$uname=$_POST['uname'];
$password=md5($_POST['password']);
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
//$insertSQL ='INSERT INTO `admin` VALUES ("'.$name.'","'.$uname.'","'.$password.'")';
  $insertSQL = "INSERT INTO admin(name, uname, pswd) VALUES('$name', '$uname', '$password')";
  //echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='adduser.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='adduser.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>