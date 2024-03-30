<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PEI Support Login Form</title>
<script type="text/javascript">
            function validate()
            {
                if(document.login.username.value=="" && document.login.password.value==""){
                    alert("Enter Username and Password");
                    return false;
                }
                 if(document.login.username.value=="")
                 {
                    alert("Enter Username");
                    return false;
                }
              
               if(document.login.password.value=="")
               {
                    alert("Enter Password");
                    return false;
                }
                else
                    return true;
            }
            window.history.forward();
            function noBack() { window.history.forward(); }
</script>
<link rel="stylesheet" type="text/css" href="./css/cloud.css" />
</head>
<body>
    <form name="login" action="validate_login.php" method="post" accept-charset='UTF-8'>
        
	<div id="container">
	<div id="header">
	    <div id="picture">
           
        </div>
    </div>
    <div id="main">
    <div id="leftcol_container">
    	<div class="leftcol">
      	
        <h2>Top news:</h2>
        
        </div>
     
      </div>
     <div id="rightcol_container">
        <div class="rightcol">
        <h2>Login here</h2>
        <table  cellspacing="23">
        <tr><td>Username:</td> <td><input name="username"  size="16" maxlength="30" type="text"></input></td> </tr> 
        <tr><td>Password: </td><td><input name="password" size="16" maxlength="30" type="password"></input></td> </tr>   
        <tr><td></td><td align="left"><input name="Submit" value="Login" type="submit" ></input></td> </tr>
       <tr><td></td></tr><tr><td></td></tr>
       </table>
        	
        </div>
        
        </div>
      
        <div class="clear"></div>
       <div id="footer">
       <h3><br/>This Portal contains information about the MSAT managed systems.  </h3></div> 
       

  </div>
 
</div>
		
    </form>
</body>
</html>