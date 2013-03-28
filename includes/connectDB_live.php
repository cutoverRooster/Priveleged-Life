
<?php
//$type="local";
$host="missmochila.db.10022349.hostedresource.com"; // Host name
$username="missmochila"; // Mysql username
$password="bandit@Pride1"; // Mysql password
$db_name="missmochila"; // Database name

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
define('DB_PREFIX', 'mm_');



?>