<?php

session_start();
//var_dump($_SESSION);
$roleid=$_SESSION['role'];

//echo "user".$_SESSION["username"];
//echo "pass".$_SESSION["password"];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PEI Support Repository</title>
<!--<link rel='stylesheet' type='text/css' href='./media/css/track.css' />-->
<link rel="stylesheet" type="text/css" href="./css/cloud1.css" />
<link rel="stylesheet" type="text/css" href="./css/style.css" />

<script type="text/javascript" src="./js/jquery/jquery.js"></script>
<script type="text/javascript" src="./js/jquery/jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function()
{
//To edit app username  and password

$(".edit_tr").click(function()
{

var ID=$(this).attr('id');
//alert("Id is"+ID);

$("#username_"+ID).hide();
$("#password_"+ID).hide();
$("#username_input_"+ID).show();
$("#password_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var username=$("#username_input_"+ID).val();
var password=$("#password_input_"+ID).val();
var dataString = 'id='+ ID +'&username='+username+'&password='+password;
$("#username_"+ID).html('<img src="./image/loading_img.gif"/>'); // Loading image

if(username.length>0&& password.length>0)
{

$.ajax({
type: "POST",
url: "table_edit_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#username_"+ID).html(username);
$("#password_"+ID).html(password);
}
});
}
else
{
alert('Enter something.');
}

});

// To edit app url username and password

$(".edit_tr_url").click(function()
{

var ID=$(this).attr('id');
//alert("Id is"+ID);

$("#username_"+ID).hide();
$("#password_"+ID).hide();
$("#username_input_"+ID).show();
$("#password_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var username_url=$("#username_input_"+ID).val();
var password_url=$("#password_input_"+ID).val();
var dataString = 'id='+ ID +'&username='+username_url+'&password='+password_url;
$("#username_"+ID).html('<img src="./image/loading_img.gif"/>'); // Loading image

if(username_url.length>0&& password_url.length>0)
{

$.ajax({
type: "POST",
url: "table_edit_ajax_url.php",
data: dataString,
cache: false,
success: function(html)
{

$("#username_"+ID).html(username_url);
$("#password_"+ID).html(password_url);
//alert("password_url"+password_url);

}
});
}
else
{
alert('Enter something.');
}

});

//


// Edit input box click action
$(".editbox").mouseup(function()
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>


<?php
// Grab User submitted information
//$env_id = trim($_POST["envid"]);
//$app_id = trim($_POST["appid"]);

$env_id = trim($_GET["envid"]);
$app_id = trim($_GET["appid"]);

//debugging
//echo "environment name ".$env_id;
//echo "application name ".$app_id;

$env = explode(":", $env_id);
//debugging
//echo "environment id:- ".$env[0]; // piece1
//echo "environment name:- ".$env[1]; // piece2

include("./config/db_connection.php");
//include("./config/constants.php");
?>
</head>
<body>
<div id="header">
	    <div id="picture">
           
        </div>
 </div>
 <div id="main"> 
 
<?php
// Make sure we connected succesfully
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}else{
?>  



<div id="app_container">

<?php 

 	
    $env_app_list="select app_server_id, app_env_id, app_server_name, app_username, app_userpwd  from application_server where app_env_id=$env[0] and app_id =$app_id and app_server_name is not null;";
    $env_app_list_result = mysql_query($env_app_list);
    $num_rows= mysql_num_rows($env_app_list_result);
	//echo "application count:".$num_rows;
	    echo "<h3>$env[1]</h3>";
		?>  <h3><center><a href='validate_login.php'>Back to Applications list</a></h3></center>
		    <table border='1px;'>
			<tr>
				<td><u>Server Name</u></td>
				<td><u>Username</u></td>
				<td><u>Password</u></td>
				</tr>
		<?php		
        if($num_rows>0){
		    while ($row_app_env_list = mysql_fetch_assoc($env_app_list_result)) {
			    $id = $row_app_env_list['app_server_id'];
				if($roleid >1 )
				{
			    ?>
				
				<tr id="<?php echo $id; ?>" class="edit_tr">
                <td class="edit_td">
				<span id="servername_<?php echo $id; ?>" class="text"><?php echo $row_app_env_list['app_server_name'] ?></span>
				</td>
				<td class="edit_td">
                <span id="username_<?php echo $id; ?>" class="text"><?php echo $row_app_env_list['app_username']; ?></span>
                <input type="text" value="<?php echo $row_app_env_list['app_username']; ?>" class="editbox" id="username_input_<?php echo $id; ?>" /&gt;
                </td>
				<td class="edit_td">
				<?php
				/*****************************Encrypt /Decrypt *********************************************/
                // Decrypt $string
				$database_pwd=$row_app_env_list['app_userpwd']; // encrypted password from database
				$decrypted_string =base64_decode($database_pwd);
				//echo "database password:".$database_pwd."<br/>";;
				//echo "decrypted password:".$decrypted_string."<br/>";;
				
                /*****************************Encrypt /Decrypt *********************************************/ 
				?>
                <span id="password_<?php echo $id; ?>" class="text"><?php echo $decrypted_string; ?></span>
                <input type="text" value="<?php echo $decrypted_string; ?>" class="editbox" id="password_input_<?php echo $id; ?>" /&gt;
                </td>
				</tr>
                <?php 				
			    
				}else{
				// read only format
				
				?>
				<tr  class="edit_tr_read">
                <td class="edit_td">
				<span  class="text"><?php echo $row_app_env_list['app_server_name'] ?></span>
				</td>
				<td class="edit_td">
                <span  class="text"><?php echo $row_app_env_list['app_username']; ?></span>
                
                </td>
				<td class="edit_td">
				<?php
				/*****************************Encrypt /Decrypt *********************************************/
                // Decrypt $string
				$database_pwd=$row_app_env_list['app_userpwd']; // encrypted password from database
				$decrypted_string =base64_decode($database_pwd);
				//echo "database password:".$database_pwd."<br/>";;
				//echo "decrypted password:".$decrypted_string."<br/>";;
				
                /*****************************Encrypt /Decrypt *********************************************/ 
				?>
                <span class="text"><?php echo $decrypted_string; ?></span>
                
                </td>
				</tr>
				<?php
				}
				}
             			
		}
    echo "</table>";
	echo "<br/><h3>Application Urls</h3>";	
    $env_app_url = "select app_server_id, app_env_id, app_url, app_url_userid,  app_url_pwd  from application_server where app_env_id=$env[0] and app_id =$app_id and app_url is not null;";
    $env_app_url_result = mysql_query($env_app_url);
    $num_url_rows= mysql_num_rows($env_app_url_result);
	//echo "application count:".$num_url_rows;
	    //echo "<h3>$env[1]</h3><table>";
		?> <table border="1px;">
		        <tr>
				<td><u>App URL</u></td>
				<td><u>Username</u></td>
				<td><u>Password</u></td>
				</tr>
		<?php		
        if($num_url_rows>0){
		    while ($row_env_app_url = mysql_fetch_assoc($env_app_url_result)) {
			    $id_url = $row_env_app_url['app_server_id'];
				if($roleid >1 )
				{
			    ?>
				
				<tr id="<?php echo $id_url; ?>" class="edit_tr_url">
                <td class="edit_td_url">
				<span id="serverurl_<?php echo $id_url; ?>" class="text"><?php echo $row_env_app_url ['app_url']; ?></span>
				</td>
				<td class="edit_td_url">
                <span id="username_<?php echo $id_url; ?>" class="text"><?php echo $row_env_app_url ['app_url_userid']; ?></span>
                <input type="text" value="<?php echo $row_env_app_url ['app_url_userid']; ?>" class="editbox" id="username_input_<?php echo $id_url; ?>" /&gt&gt&gt&gt;
                </td>
				<td class="edit_td_url">
				<?php
				/*****************************Encrypt /Decrypt *********************************************/
                // Decrypt $string
				$database_appurl_pwd=$row_env_app_url ['app_url_pwd']; // encrypted password from database
				
				$decrypted_url_string = base64_decode($database_appurl_pwd);
                /*****************************Encrypt /Decrypt *********************************************/ 
				?>
                <span id="password_<?php echo $id_url; ?>" class="text"><?php echo $decrypted_url_string; ?></span>
                <input type="text" value="<?php echo $decrypted_url_string; ?>" class="editbox" id="password_input_<?php echo $id_url; ?>" /&gt&gt&gt&gt;
                </td>
				</tr>
                <?php 				
			    }else{
				//Read only format
				?>
				<tr  class="edit_tr_url_read">
                <td class="edit_td_url">
				<span class="text"><?php echo $row_env_app_url ['app_url']; ?></span>
				</td>
				<td class="edit_td_url">
                <span  class="text"><?php echo $row_env_app_url ['app_url_userid']; ?></span>
                
                </td>
				<td class="edit_td_url">
				<?php
				/*****************************Encrypt /Decrypt *********************************************/
                // Decrypt $string
				$database_appurl_pwd=$row_env_app_url ['app_url_pwd']; // encrypted password from database
				
				$decrypted_url_string = base64_decode($database_appurl_pwd);
                /*****************************Encrypt /Decrypt *********************************************/ 
				?>
                <span class="text"><?php echo $decrypted_url_string; ?></span>
                
                </td>
				</tr>
				
				<?php
				
				}
				}
             			
		}
        echo "</table>";	

?>

</div>
<?php } ?>
</div>
<div id="footer">
       <h3><br/>This Portal contains information about the MSAT managed systems.  </h3>
</div> 
</body>
</html>