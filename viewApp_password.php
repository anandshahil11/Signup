<?php
session_start();
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
<?php
// Grab User submitted information
$app_name = trim($_GET["name"]);
$app_id = trim($_GET["id"]);

//echo "application_name ".$app_name;
//echo "application_name ".$app_id;
include("./config/db_connection.php");
?>


<script type="text/javascript">
 /*   $(function() {
        
		$(".envButton").click(function() {
		    
		    $("#message").html('<img src="./image/loading_img.gif"/>');
            var env_id = $(this).val();
            //alert("env_id"+env_id);
			var app_id = <?php echo $app_id; ?>;
            var dataString ='envid='+env_id+'&appid='+app_id;
			//alert("app_id"+app_id);
			$.ajax({
				type: "POST",
				url: "viewApp_pwdlist.php",
				data: dataString,
				success: function(data) {
					
					$('#message').html(data);			
				}
		    });
		return false; 			
		
	    });
	});
*/

$(document).ready(function()
{

//alert("hi");
//To edit app username  and password
$(".editbox_appdata").hide();

$(".edit_tr").click(function()
{

var ID=$(this).attr('id');
//alert("Id is"+ID);

//$("#appname_"+ID).hide();
$("#appurl_"+ID).hide();
$("#appdata_"+ID).hide();
$("#apppwd_"+ID).hide();
//$("#appname_input_"+ID).show();
$("#appurl_input_"+ID).show();
$("#appdata_input_"+ID).show();
$("#apppwd_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
//var appname=$("#appname_input_"+ID).val();
var appurl=$("#appurl_input_"+ID).val();
var appdata=$("#appdata_input_"+ID).val();
var apppwd=$("#apppwd_input_"+ID).val();
//alert("appwd"+appdata);

//alert("appurl"+appurl+"apppwd"+apppwd);
//var dataString = 'id='+ ID +'&appname='+appname+'&appurl='+appurl+'&appdata='+appdata+'&apppwd='+apppwd;
var dataString = 'id='+ ID +'&appurl='+appurl+'&appdata='+appdata+'&apppwd='+apppwd;
$("#appurl_"+ID).html('<img src="./image/loading_img.gif"/>'); // Loading image

if(appurl.length>0 || appdata.length >0 || apppwd.length >0)
{
//alert("hello");
$.ajax({
type: "POST",
url: "table_edit_app_data.php",
data: dataString,
cache: false,
success: function(html)
{
//alert("success");
//$("#appname_"+ID).html(appname);
//var app_data = wrap(appdata);
$("#appurl_"+ID).html(appurl);
$("#apppwd_"+ID).html(apppwd);

$("#appdata_"+ID).html(appdata);

}
});
}
else
{
alert('Enter something.');
}

});
// Edit input box click action
$(".editbox_appdata").mouseup(function()
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox_appdata").hide();
$(".text").show();
});

});
	
</script>




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
    echo "<h1><center>".$app_name."</h1></center><br/><h3><center><a href='validate_login.php'>Back to Applications list</a></h3></center></br><br/>";
?>  <table id="container" width="800px;">
    <tr> 
    <td id="left" style="vertical-align:top;padding:-1px;">
<?php  	
    $env_list="select env_id, env_name from appenvironment";
    $env_name_result = mysql_query($env_list);
    $num_rows_name = mysql_num_rows($env_name_result);
	//echo "application count:".$num_rows_name;
	    echo "<table border='1px;' width='300px;'>";
        if($num_rows_name>0){
		    while ($row_env_list = mysql_fetch_assoc($env_name_result)) {
			    $envid=$row_env_list["env_id"].":".$row_env_list['env_name'];
                $appid=$app_id;			
			    ?>
				<tr><td width="50px;"><h4>
				
				<!--<tr class="envButton" "this.style.cursor='pointer';this.style.fontWeight='normal';" onclick="this.value='<?php //echo $row_env_list["env_id"].":".$row_env_list['env_name'];?>'">-->
                <?php 				
				echo $row_env_list['env_name'];
				?>
				</h4></td> 
				<td width="250px;"><h4><a href="viewApp_pwdlist.php?envid=<?php echo $envid ?>&appid=<?php echo $appid;?>">Application Credentials</a></h4></td>
				 
				</tr>
			<?php	
			}
             			
		}
        echo "</table>";		

?>
</td>
<td id="right">
<?php

			
			    $app_name="select appid,appname,appdata,apppassword,appurl from application where appid=$app_id;";
			    $app_name_result = mysql_query($app_name);
                $num_rows_name = mysql_num_rows($app_name_result);
				//echo "application count:".$num_rows_name;
				echo "<table border='1px;'>";
                if($num_rows_name>0){
				    while ($row_app_list = mysql_fetch_assoc($app_name_result)) {
					   $id = $row_app_list['appid'];
                        if($roleid >1 )
				        {					   
                       ?>
					   <tr id="<?php echo $id; ?>" class='edit_tr' ><td style='vertical-align:top;padding:-1px;'><b>application name:-</b></td><td class='edit_td'>
					   <span  class="text"><?php echo $row_app_list['appname']; ?></span>
                       <!--<input type="text" value="<?php //echo $row_app_list['appname']; ?>" class="editbox_appdata" id="appname_input_<?php //echo $id; ?>" />-->
					   </td></tr>
					   <tr id="<?php echo $id; ?>" class='edit_tr' ><td style='vertical-align:top;padding:-1px;'><b>application url:-</b></td><td class='edit_td'>
					   
					   <span id="appurl_<?php echo $id; ?>" class="text"><?php echo $row_app_list['appurl']; ?></span>
                       <input type="text" value="<?php echo $row_app_list['appurl']; ?>" class="editbox_appdata" id="appurl_input_<?php echo $id; ?>"/>
					   </td></tr>
					   <tr id="<?php echo $id; ?>" class='edit_tr' ><td style='vertical-align:top;padding:-1px;'><b>application data:-</b></td><td class='edit_td'>
					   
					   <span id="appdata_<?php echo $id; ?>" class="text" ><?php echo wordwrap($row_app_list['appdata'],50, "\n", true) ?></span>
                       <textarea  rows="50" cols="80" class="editbox_appdata" id="appdata_input_<?php echo $id; ?>"><?php echo wordwrap($row_app_list['appdata'],50, "\n", true) ?> </textarea>
					   </td></tr>
					   <tr id="<?php echo $id; ?>" class='edit_tr' ><td style='vertical-align:top;padding:-1px;'><b>application password:-</b></td><td class='edit_td'>
					   <?php
					   /*****************************Encrypt /Decrypt *********************************************/
                       // Decrypt $string
				       $database_app_pwd=$row_app_list['apppassword']; // encrypted password from database
				
				       $decrypted_url_pwd = base64_decode($database_app_pwd);
                       /*****************************Encrypt /Decrypt *********************************************/ 
					   ?>
					   <span id="apppwd_<?php echo $id; ?>" class="text"><?php echo $decrypted_url_pwd; ?></span>
                       <input type="text" value="<?php echo $decrypted_url_pwd; ?>" class="editbox_appdata" id="apppwd_input_<?php echo $id; ?>" /> 
					   </td></tr> 
					   
					   <?php
					   
				        }else{
						?>
						<tr  class='edit_tr_read' ><td style='vertical-align:top;padding:-1px;'><b>application name:-</b></td><td class='edit_td'>
					   <span  class="text"><?php echo $row_app_list['appname']; ?></span>
                       <!--<input type="text" value="<?php //echo $row_app_list['appname']; ?>" class="editbox_appdata" id="appname_input_<?php //echo $id; ?>" />-->
					   </td></tr>
					   <tr  class='edit_tr_read' ><td style='vertical-align:top;padding:-1px;'><b>application url:-</b></td><td class='edit_td'>
					   
					   <span  class="text"><?php echo $row_app_list['appurl']; ?></span>
                       
					   </td></tr>
					   <tr  class='edit_tr_read' ><td style='vertical-align:top;padding:-1px;'><b>application data:-</b></td><td class='edit_td'>
					   
					   <span  class="text" ><?php echo wordwrap($row_app_list['appdata'],50, "\n", true) ?></span>
                       
					   </td></tr>
					   <tr  class='edit_tr_read' ><td style='vertical-align:top;padding:-1px;'><b>application password:-</b></td><td class='edit_td'>
					   <?php
					   /*****************************Encrypt /Decrypt *********************************************/
                       // Decrypt $string
				       $database_app_pwd=$row_app_list['apppassword']; // encrypted password from database
				
				       $decrypted_url_pwd = base64_decode($database_app_pwd);
                       /*****************************Encrypt /Decrypt *********************************************/ 
					   ?>
					   <span class="text"><?php echo $decrypted_url_pwd; ?></span>
                       
					   </td></tr>
						<?php
						}
					}
				}
                echo "</table>";				
?>

</td></tr>

</table>
<?php } ?>
</div>
<div id="footer">
       <h3><br/>This Portal contains information about the MSAT managed systems.  </h3>
</div> 
</body>
</html>
