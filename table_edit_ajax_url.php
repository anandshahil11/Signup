<?php
include("./config/db_connection.php");
//include("./config/constants.php");

if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$username=mysql_escape_String($_POST['username']);
$password=mysql_escape_String($_POST['password']);
// Encrypt $string
//$encrypted_app_string = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $password, MCRYPT_MODE_CBC, $iv);
$encrypted_app_string = base64_encode($password);
echo "id is".$id."username:".$username."password:".$encrypted_app_string;

$sql = "update application_server set app_url_userid='$username',app_url_pwd='$encrypted_app_string' where app_server_id ='$id'";

mysql_query($sql);
}
?>