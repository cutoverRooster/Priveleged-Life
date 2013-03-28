<?php
error_reporting(NULL);
session_start();
require('../includes/connectDB.php');
$path_to_thumb_directory='../media/collection/product/';
mysql_select_db($database_tes, $tes);
$id=$_POST['hiddenid'];
$selectSQL='SELECT * FROM products WHERE id='.$id;
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
while($row = mysql_fetch_assoc($queryset))
{
	$thumb=$row['thumb'];
}
$title=$_POST['title'];
$thumb2=$id.'_'.$_FILES['thumb']['name'];
$description=$_POST['description'];
$sort=$_POST['sort'];
//Project Thumbnail Image Uploader
if($thumb2!=$thumb && $_FILES['thumb']['name']!='')
{
@unlink($path_to_thumb_directory.$thumb);
if(isset($_FILES['thumb']))
 {
    $thumbname = $id.'_'.$_FILES['thumb']['name'];
    $source = $_FILES['thumb']['tmp_name'];
    $target = $path_to_thumb_directory . $thumbname;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $thumbname))
	{
        move_uploaded_file($source, $target);
    }
$thumb=$thumb2;
}
}

$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='UPDATE `products` SET title="'.$title.'",thumb="'.$thumb.'",description="'.$description.'",sort="'.$sort.'" WHERE id='.$id;
//echo $insertSQL;exit;

mysql_query($insertSQL,$tes) or die(mysql_error());
$dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageproducts.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageproducts.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>