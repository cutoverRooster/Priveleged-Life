<?php
error_reporting(E_ALL);
session_start(); 
require('../includes/connectDB.php');
mysql_select_db($database_tes, $tes);
$id=$_POST['hiddenid'];
$selectSQL='SELECT * FROM dealer WHERE id='.$id;
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$zip=$_POST['zip'];
$phone=$_POST['phone'];
$sort=$_POST['sort'];
$dbinsert=0;
//database editor(new table)
if($dbinsert==0)
{
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='UPDATE `dealer` SET name="'.$name.'",address="'.$address.'",city="'.$city.'",state="'.$state.'",country="'.$country.'",zip="'.$zip.'",phone="'.$phone.'",sort="'.$sort.'"WHERE id='.$id;
mysql_query($insertSQL,$tes) or die(mysql_error());
$dbinsert=1;
}
if($dbinsert==1)
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managedealer.php?emsg=1';
header("Location: http://$host$uri/$extra");
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra='managedealer.php?emsg=0';
header("Location: http://$host$uri/$extra");
}
?>