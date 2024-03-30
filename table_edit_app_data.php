<?php
include("./config/db_connection.php");


if($_POST['id'])
{
$appid=mysql_escape_String($_POST['id']);
//$appname=mysql_escape_String($_POST['appname']);
$appurl=mysql_escape_String($_POST['appurl']);
$appdata=mysql_escape_String($_POST['appdata']);
$apppwd=mysql_escape_String($_POST['apppwd']);
// Encrypt $string
//$encrypted_app_string = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $password, MCRYPT_MODE_CBC, $iv);
$encrypted_app_pwd = base64_encode($apppwd);

//echo "id is".$appid."appdata:".$appdata."apppwd:".$encrypted_app_pwd."app url".$appurl;

$sql = "update application set appdata='$appdata' , appurl = '$appurl',apppassword='$encrypted_app_pwd' where appid=$appid;";

mysql_query($sql);
}
?>