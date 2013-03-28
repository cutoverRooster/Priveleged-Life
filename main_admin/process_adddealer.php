<?php
session_start(); 
require('../includes/connectDB.php');
$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$zip=$_POST['zip'];
$phone=$_POST['phone'];
$sort=$_POST['sort'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `dealer` VALUES (NULL,"'.$name.'","'.$address.'","'.$city.'","'.$state.'","'.$country.'","'.$zip.'","'.$phone.'","'.$sort.'")';

  //echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='adddealer.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='adddealer.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>