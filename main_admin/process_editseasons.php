<?php
error_reporting(NULL);
session_start(); 
require('../includes/connectDB.php');
$path_to_image_directory='../media/collection/season/';
mysql_select_db($database_tes, $tes);
$id=$_POST['hiddenid'];
$selectSQL='SELECT * FROM seasons WHERE id='.$id;
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
while($row = mysql_fetch_assoc($queryset))
{
	$image=$row['image'];
}
$title=$_POST['title'];
$image2=$id.'_'.$_FILES['image']['name'];
$description=$_POST['description'];
$sort=$_POST['sort'];
//Project Thumbnail Image Uploader
if($image2!=$image && $_FILES['image']['name']!='')
{
@unlink($path_to_image_directory.$image);
if(isset($_FILES['image']))
 {
    $imagename = $id.'_'.$_FILES['image']['name'];
    $source = $_FILES['image']['tmp_name'];
    $target = $path_to_image_directory . $imagename;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $imagename))
	{
        move_uploaded_file($source, $target);
    }
$image=$image2;
}
}

$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='UPDATE `seasons` SET title="'.$title.'",image="'.$image.'",description="'.$description.'",sort="'.$sort.'" WHERE id='.$id;
//echo $insertSQL;exit;

mysql_query($insertSQL,$tes) or die(mysql_error());
$dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageseasons.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageseasons.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>