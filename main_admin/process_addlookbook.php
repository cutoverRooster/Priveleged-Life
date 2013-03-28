<?php
error_reporting(NULL);
require('../includes/connectDB.php');

$path_to_image_link_directory='../media/images/lookbook/';

$title=$_POST['title'];
$sort=$_POST['sort'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `lookbook` VALUES (NULL,"'.$title.'","'.$_FILES['image_link']['name'].'","'.$sort.'")';
//echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
     $id = mysql_insert_id();

if(isset($_FILES['image_link']))
 {
    $imagename = $id.'_'.$_FILES['image_link']['name'];
    $source = $_FILES['image_link']['tmp_name'];
    $target = $path_to_image_link_directory . $imagename;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $imagename))
	  {
        move_uploaded_file($source, $target);
    }
}
     $update_img = mysql_query("UPDATE lookbook SET image_link='$imagename' WHERE id='$id'");

  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='addlookbook.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='addlookbook.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>