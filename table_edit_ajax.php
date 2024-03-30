<?php
include("./config/db_connection.php");
//include("./config/constants.php");

if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$username=mysql_escape_String($_POST['username']);
$password=mysql_escape_String($_POST['password']);
// Encrypt $string
//$encrypted_string = trim(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $password, MCRYPT_MODE_CBC, $iv));
$encrypted_string =base64_encode($password);
echo "id is".$id."username:".$username."password:".$encrypted_string;

$sql = "update application_server set app_username='$username',app_userpwd='$encrypted_string' where app_server_id='$id'";

mysql_query($sql);
}
?>