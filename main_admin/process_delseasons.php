<?php
session_start(); 
if(!isset($_COOKIE["mmadminset"]))
{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra='index.php';
    header("Location: http://$host$uri/$extra");
}
else
{
require('../includes/connectDB.php');
$id=$_GET['id'];
mysql_select_db($database_tes, $tes);
$deleteSQL='';
$deleteSQL ='DELETE FROM seasons WHERE id='.$id;
mysql_query($deleteSQL,$tes) or die(mysql_error());
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='manageseasons.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
?>