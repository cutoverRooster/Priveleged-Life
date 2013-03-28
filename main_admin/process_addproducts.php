<?php
error_reporting(NULL);
session_start(); 
require('../includes/connectDB.php');

$path_to_thumb_directory='../media/collection/product/';
$seasons = $_POST['seasons'];
$title=$_POST['title'];
$description=$_POST['description'];
$sort=$_POST['sort'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `products` VALUES (NULL,"'.$seasons.'","'.$title.'","'.$_FILES['thumb']['name'].'","'.$description.'","'.$sort.'")';
//echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
     $id = mysql_insert_id();

if(isset($_FILES['thumb']))
 {
    $thumbname = $id.'_'.$_FILES['thumb']['name'];
    $source = $_FILES['thumb']['tmp_name'];
    $target = $path_to_thumb_directory . $thumbname;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $thumbname))
	  {
        move_uploaded_file($source, $target);
    }
}
     $update_img = mysql_query("UPDATE products SET thumb='$thumbname' WHERE id='$id'");

  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageproducts.php?emsg=1&id='.$id;
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageproducts.php?emsg=0&id='.$id;
header("Location: http://$host$uri/$extra");
}
?>