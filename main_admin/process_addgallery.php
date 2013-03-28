<?php
session_start(); 
error_reporting(NULL);
require('../includes/connectDB.php');
$path_to_thumb_directory='../media/collection/gallery/thumb/';
$path_to_image_directory='../media/collection/gallery/image/';
$sea_id = $_POST['sea_id'];
$products = $_POST['prod_id'];

$title=$_POST['title'];
$sort=$_POST['sort'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `product_gallery` VALUES (NULL,"'.$products.'","'.$title.'","'.$_FILES['thumb']['name'].'","'.$_FILES['image']['name'].'","'.$sort.'")';
//echo $insertSQL;exit;
  mysql_query($insertSQL,$tes) or die(mysql_error());
     $id = mysql_insert_id();
 if(isset($_FILES['thumb']))
 {
    $thumbname =  $id.'_'.$_FILES['thumb']['name'];
    $source = $_FILES['thumb']['tmp_name'];
    $target = $path_to_thumb_directory . $thumbname;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $thumbname))
	  {
        move_uploaded_file($source, $target);
    }
}
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
    $update_img = mysql_query("UPDATE product_gallery SET thumb='$thumbname',image='$imagename' WHERE id='$id'");

  $dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managegallery.php?emsg=1&sea_id='.$sea_id.'&prod_id='.$products;
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managegallery.php?emsg=0&sea_id='.$sea_id.'&prod_id='.$products;
header("Location: http://$host$uri/$extra");
}
?>