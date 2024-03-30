<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PEI Support Login Form</title>
<!--<link rel='stylesheet' type='text/css' href='./media/css/track.css' />-->

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
    $(function() {
        
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
	
</script>

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


</head>
<body>
<?php
// Make sure we connected succesfully
if(! $conn)
{
    die('Connection Failed'.mysql_error());
}else{
?>  <div id="container">
    <div id="left">AA
<?php  	
    $env_list="select env_id, env_name from appenvironment";
    $env_name_result = mysql_query($env_list);
    $num_rows_name = mysql_num_rows($env_name_result);
	//echo "application count:".$num_rows_name;
	    echo "<table>";
        if($num_rows_name>0){
		    while ($row_env_list = mysql_fetch_assoc($env_name_result)) {
			    ?>
				<tr class="envButton" "this.style.cursor='pointer';this.style.fontWeight='normal';" onclick="this.value='<?php echo $row_env_list["env_id"].":".$row_env_list['env_name'];?>'">
                <?php 				
				echo "<td id=".$row_env_list['env_id'].">".$row_env_list['env_name']."</td></tr>";
			}
             			
		}
        echo "</table>";		

?>
</div>


<div id="right">BB</div>
<div id="message"  class="contents" ></div>
</div>
<?php } ?>
</body>
</html>
