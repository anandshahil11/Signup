<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PEI Support Repository</title>
<link rel="stylesheet" type="text/css" href="./css/cloud1.css" />
</head>
<body >
<div id="header">
	    <div id="picture">
           
        </div>
 </div>
 <div id="main"> 
<?php

if(isset($_POST["username"]) and isset($_POST["password"])){
    // Grab User submitted information
    $usern = trim($_POST["username"]);
    $pass = trim($_POST["password"]);
	$_SESSION["username"] = $usern;
	$_SESSION["password"] = $pass;
}elseif(isset($_SESSION["username"]) and isset($_SESSION["password"])){
    $usern = $_SESSION["username"];
	$pass = $_SESSION["password"];
} else{
    $usern = "";
	$pass = "";
}



//Debugging
//echo "username:".$usern;
//echo "password:".$pass;

include("./config/db_connection.php");
// Make sure we connected succesfully


$result = mysql_query("SELECT username, userpwd, roleid, status FROM user WHERE username = '".$usern."' and userpwd= '".$pass."';");
//Debugging
//var_dump($result);
$count=mysql_num_rows($result);
//Debugging
//echo "count".$count;

if($count>0){
    
	$row = mysql_fetch_array($result);
    //Debugging
	//echo "You are a validated user.";
	//var_dump($row);
	$roleid = $row["roleid"];
	$_SESSION['role'] = $roleid;
	//echo "role id is:".$_SESSION['role'];
	$status = $row["status"];
	$username = $row["username"];
    //echo $username.$roleid.$status;
	$app_grp_list="select app_type_id ,app_type_name from apptype";
	
	$app_grp_list_result = mysql_query($app_grp_list);
	$num_rows = mysql_num_rows($app_grp_list_result);
    
	echo "<h3><center> Application Type </center></h3>";
	?>
	
	<?php
   
	if($num_rows > 0){
	    while ($row = mysql_fetch_assoc($app_grp_list_result)) {
           
			?>
			
			
			<h3><u><?php echo $row['app_type_name']; ?></u></h3></br><br/>
			<?php 
			    $appid = $row['app_type_id'];
				//echo "appid".$appid;
			    $app_list="select appid,appname,appdata,appurl from application where app_type_id=$appid;";
			    $app_list_result = mysql_query($app_list);
                $num_rows_list = mysql_num_rows($app_list_result);
				//echo "application count:".$num_rows_list;
                if($num_rows_list>0){
				    echo "<table width = 100% border = '0' cellspacing = '2' cellpadding = '0'>";
                    // loop to create columns
                    $position = 1;					
				    while ($row_list = mysql_fetch_assoc($app_list_result) ) {
					    if($position == 1){echo "<tr>";}
					    echo " <td><h3>";    
									
			?>
            <!--<a href="application_list.php?name=<?php //echo $row_list['appname']; ?>&id=<?php //echo $row_list['appid'];?>">-->
			        
			<a href="viewApp_password.php?name=<?php echo $row_list['appname']; ?>&id=<?php echo $row_list['appid'];?>">
            <?php			
                       echo $row_list['appname']."</a></br></h3></td>";
					   if($position == 5){echo "</tr> "; $position = 1;}else{ $position++;}
					
					
					}
					$end = "";
                    if($position != 1){
                        for($z=(5-$position); $z>0 ; $z--){
                            $end .= "<td></td>";
                        }
                    $end .= "</tr>";
                    }

                    echo $end."</table><br/><br/> ";
                }//if
		}
    }else{
	    echo "<tr><td>No Records found</td></tr>";
	}	
	mysql_free_result($app_list_result);
	echo "</table>";
}else{
    echo "Sorry, your credentials are not valid, Please try again.";
	echo "<center><h3><a href='http://ppt.www.optusbusiness.com.au/ewsrepo/login.php'> Back to Login Page</a></h3></center>";
}
?>
</div>
<div id="footer">
       <h3><br/>This Portal contains information about the MSAT managed systems.  </h3>
</div> 
</body>
</html>