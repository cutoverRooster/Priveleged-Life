<?php
require('../includes/connectDB.php');

$path_to_image_link_directory='../media/images/lookbook/';
mysql_select_db($database_tes, $tes);
$id=$_POST['hiddenid'];
$selectSQL='SELECT * FROM lookbook WHERE id='.$id;
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
while($row = mysql_fetch_assoc($queryset))
{
	$image_link=$row['image_link'];

}

$title=$_POST['title'];
$sort=$_POST['sort'];
$image_link2=$id.'_'.$_FILES['image_link']['name'];

if($image_link2!=$image_link && $_FILES['image_link']['name']!='')
{
@unlink($path_to_image_link_directory.$image_link);
if(isset($_FILES['image_link']))
 {
    $imagename = $id.'_'.$_FILES['image_link']['name'];
    $source = $_FILES['image_link']['tmp_name'];
    $target = $path_to_image_link_directory . $imagename;
    if(preg_match('/[.](jpg)|(gif)|(png)|(jpeg)$/', $imagename))
	{
        move_uploaded_file($source, $target);
    }
$image_link=$image_link2;
}
}

$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='UPDATE `lookbook` SET title="'.$title.'",image_link="'.$image_link.'",sort="'.$sort.'" WHERE id='.$id;
//echo $insertSQL;exit;

mysql_query($insertSQL,$tes) or die(mysql_error());
$dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managelookbook.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managelookbook.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>