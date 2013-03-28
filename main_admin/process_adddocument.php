<?php
session_start(); 
error_reporting(NULL);
require('../includes/connectDB.php');
$title=$_POST['title'];
$content=$_POST['content'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `documents` VALUES (NULL,"'.$title.'","'.$content.'")';

  //echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
   $id = mysql_insert_id();
  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managedocument.php?emsg=1 &id='.$id;;
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managedocument.php?emsg=0 &id='.$id;
header("Location: http://$host$uri/$extra");
}
?>