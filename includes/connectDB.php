<?php
$hostname_tes='localhost:3306';
//$hostname_tes='privilegedlife.db.10022349.hostedresource.com';
//$database_tes='p_life';
//$database_tes='privilegedlife';
$database_tes='Privileged';
$username_tes='root';
//$username_tes='privilegedlife';
$password_tes='root';
//$password_tes='bandit@Pride1';
$tes = mysql_pconnect($hostname_tes, $username_tes, $password_tes) or trigger_error(mysql_error(),E_USER_ERROR);
?>