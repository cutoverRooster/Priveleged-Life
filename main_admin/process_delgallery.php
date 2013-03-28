<?php
session_start(); 
require('../includes/connectDB.php');
if(!isset($_COOKIE["mmadminset"]))
{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra='index.php';
    header("Location: http://$host$uri/$extra");
}
else
{
$id=$_GET['id'];
$sea_id = $_GET['sea_id'];
$products = $_GET['prod_id'];

mysql_select_db($database_tes, $tes);
$deleteSQL='';
$deleteSQL ='DELETE FROM product_gallery WHERE id='.$id;
mysql_query($deleteSQL,$tes) or die(mysql_error());
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managegallery.php?emsg=1&sea_id='.$sea_id.'&prod_id='.$products;
header("Location: http://$host$uri/$extra");
}
?>