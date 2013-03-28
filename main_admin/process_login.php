<?php
session_start();
require('../includes/connectDB.php');
$login_username=$_POST['username'];
$login_password=$_POST['password'];

//check for real password and compare with the entered password
$selectSQL='';
mysql_select_db($database_tes, $tes);
$selectSQL='SELECT * FROM admin WHERE uname ="' . $login_username . '" and
pswd ="'.md5($login_password).'"';
//echo $selectSQL;
//exit;
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
$i=0;
while($row = mysql_fetch_assoc($queryset))
{
      $realpassword=$row['pswd'];
      if($realpassword==md5($login_password))
      {
         setcookie("mmadminset",$login_username, 0);
		     $host  = $_SERVER['HTTP_HOST'];
         $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         $extra='welcome.php?name='.$row['uname'];
         $_SESSION['admin']=$row['status'];
         header("Location: http://$host$uri/$extra");
      }
	    else
      {
         $host  = $_SERVER['HTTP_HOST'];
             $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
             $extra='index.php';
             header("Location: http://$host$uri/$extra");
      }
}

      if(mysql_num_rows($queryset)==0)
      {
         $host  = $_SERVER['HTTP_HOST'];
         $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
         $extra='index.php';
         header("Location: http://$host$uri/$extra");
      }
?>
