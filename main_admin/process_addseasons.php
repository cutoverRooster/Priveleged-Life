<?php
error_reporting(NULL);
session_start(); 
require('../includes/connectDB.php');

$path_to_image_directory='../media/collection/season/';

$title=$_POST['title'];
$description=$_POST['description'];
$sort=$_POST['sort'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `seasons` VALUES (NULL,"'.$title.'","'.$_FILES['image']['name'].'","'.$description.'","'.$sort.'")';
//echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
     $id = mysql_insert_id();

if(isset($_FILES['image']))
 {
    $imagename = $id.'_'.$_FILES['image']['name'];
    $source = $_FILES['image']['tmp_name'];
    $target = $path_to_image_directory . $imagename;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $imagename))
	  {
        move_uploaded_file($source, $target);
    }
}
     $update_img = mysql_query("UPDATE seasons SET image='$imagename' WHERE id='$id'");

  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageseasons.php?emsg=1&id='.$id;
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageseasons.php?emsg=0&id='.$id;
header("Location: http://$host$uri/$extra");
}
?>