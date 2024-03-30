<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PEI Support Login Form</title>
<link rel="stylesheet" type="text/css" href="./css/cloud.css" />
</head>
<body>
<?php

// Grab User submitted information
$app_env_id = trim($_GET["envid"]);
$app_id = trim($_GET["appid"]);

//echo "application_name ".$app_env_id;
//echo "application_name ".$app_id;

include("./config/db_connection.php");
// Make sure we connected succesfully
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}else{

 
echo "<h1>".$app_name."</h1></br><br/>";
			
			    $app_name="select appid,appname,appdata,apppassword,appurl from application where appid=$app_id;";
			    $app_name_result = mysql_query($app_name);
                $num_rows_name = mysql_num_rows($app_name_result);
				//echo "application count:".$num_rows_name;
                if($num_rows_name>0){
				    while ($row_app_list = mysql_fetch_assoc($app_name_result)) {
						
                       echo "<br/><br/>application name".$row_app_list['appname']."</br>";
					   echo "<br/><br/>application url".$row_app_list['appurl']."</br>";
					   echo "<br/><br/>application data".wordwrap($row_app_list['appdata'],50, "\n", true)."</br>";
					   echo "<br/><br/>application password".$row_app_list['apppassword']."</br>";
					   //echo "<br>-------------</br>";
					   //$abc=base64_decode($row_app_list['appdata']);
					   //echo "abc".$abc."</br>";
					   //echo $row_app_list['appname']."</br>";
					}  				   
				
				}				
}



?>
</body>
</html>