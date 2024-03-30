<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PEI Support Login Form</title>
<!--<link rel='stylesheet' type='text/css' href='./media/css/track.css' />-->
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<script type="text/javascript" src="./js/jquery/jquery.js"></script>
<script type="text/javascript" src="./js/jquery/jquery-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function()
{
alert("hiiiiiiiAAAA");
$(".edit_tr").click(function()
{
alert("hiiiiiii");
var ID=$(this).attr('id');
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
$("#username_"+ID).html(first);
$("#password_"+ID).html(last);
}
});
}
else
{
alert('Enter something.');
}

});

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
$env_id = trim($_POST["envid"]);
$app_id = trim($_POST["appid"]);

//debugging
//echo "environment name ".$env_id;
//echo "application name ".$app_id;

$env = explode(":", $env_id);
//debugging
//echo "environment id:- ".$env[0]; // piece1
//echo "environment name:- ".$env[1]; // piece2

include("./config/db_connection.php");
?>
</head>
<body>
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
	    echo "<h3>$env[1]</h3><table>";
        if($num_rows>0){
		    while ($row_app_env_list = mysql_fetch_assoc($env_app_list_result)) {
			    $id = $row_app_env_list['app_server_id'];
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
                <span id="password_<?php echo $id; ?>" class="text"><?php echo $row_app_env_list['app_userpwd']; ?></span>
                <input type="text" value="<?php echo $row_app_env_list['app_userpwd']; ?>" class="editbox" id="password_input_<?php echo $id; ?>" /&gt;
                </td>
				</tr>
                <?php 				
			    }
             			
		}
    echo "</table>";
	echo "<br/><h3>Application Urls</h3>";	
    $env_app_url = "select app_server_id, app_env_id, app_url, app_url_userid,  app_url_pwd  from application_server where app_env_id=$env[0] and app_id =$app_id and app_url is not null;";
    $env_app_url_result = mysql_query($env_app_url);
    $num_url_rows= mysql_num_rows($env_app_url_result);
	echo "application count:".$num_url_rows;
	    echo "<h3>$env[1]</h3><table border='2px;'>";
        if($num_url_rows>0){
		    while ($row_env_app_url = mysql_fetch_assoc($env_app_url_result)) {
			    ?>
				<tr >
                <?php 				
				echo "<td id=".$row_env_app_url ['app_env_id'].">".$row_env_app_url ['app_url']."</td>";
				echo "<td id=".$row_env_app_url ['app_env_id'].">".$row_env_app_url ['app_url_userid']."</td>";
				echo "<td id=".$row_env_app_url ['app_env_id'].">".$row_env_app_url ['app_url_pwd']."</td></tr>";
				
			}
             			
		}
        echo "</table>";	

?>

</div>
<?php } ?>
</body>
</html>