<html>
	<head>
		<?=html::script(array('media/js/jquery.js'), FALSE)?>
		<style type='text/css'>
			body{
				font-family: sans-serif;
				font-size: 14px;
				margin: 0px;
			}
			
			a{
				color: #333;
			}
			
			h2{
				margin: 5px 0px;
			}
			
			#head{
				background-color: #666;
				color: #FFF;
				padding: 15px 35px;
				font-size: 24px;
			}
			
			#content{
				padding: 10px 45px;
			}
			
			table{
				font-size: 1em;
			}
			
			#head_links{
				margin: 0px;
				padding: 0px;
				list-style: none;
			}
			
			#head_links li{
				display: inline;
				margin-left: 20px;
			}
			
			#head_links li a{
				color: #666;
				text-decoration: none;
			}
			
			#head_links li a:hover, #head_links li a.active{
				color: #000;
			}
			
			#menu{
				background-color: #EEE;
				padding: 7px 15px;
			}
			
			.list_table th{
				background-color: #666;
				color: #FFF;
				padding: 5px;
				text-align: left;
				border-bottom: 2px solid #DDD;
			}
			
			.list_table td{
				padding: 10px;
				background-color: #FAFAFA;
				border-bottom: 1px solid #EEE;
			}
			
			.list_table td a.list_action, .std_button{
				border: 2px solid #CCC;
				background-color: #666;
				color: #FFF;
				text-decoration: none;
				padding: 3px 10px;
				font-size: 12px;
				margin-right: 10px;
			}
			
			.list_table td a.list_action:hover, std_button:hover{
				background-color: #333;
			}
			
			a.create_record{
				border: 2px solid #CCC;
				background-color: #666;
				color: #FFF;
				text-decoration: none;
				padding: 5px 10px;
				font-size: 15px;
			}
			
			a.create_record:hover{
				background-color: #333;
			}
			
			.std_form .field{
				border-bottom: 1px solid #CCC;
				border-top: 2px solid #F5F5F5;
				padding: 15px 10px;
				padding-left: 20px;
			}
			
			.std_form .field .notes{
				padding-left: 10px;
				font-size: 90%;
				color: #999;
			}
			
			.std_form .even{
				background-color: #FDFDFD;
			}
			
			.std_form .odd{
				background-color: #FFF;
			}
			
			.std_form label{
				color: #333;
				margin-left: -10px;
			}
			
			.std_form input{
				padding: 3px;
				font-size: 100%;
				margin-top: 10px;
			}	
			
			.std_form textarea{
				padding: 5px;
				font-size: 100%;
				margin-top: 10px;
			}
			
		</style>
	</head>
	<body>
		<div id='head'>
			<table><tr><td><?php echo SITE_ADMIN_TITLE;?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td ><a href="<?php echo url::site('user/logout','http');?>"> 
			<img src="/expand/application/views/smartsite/img/logout_btn.png" alt="Logout" width="55" height="13" class="img_padleft" /></a>     
            </td></tr></table>
		</div>
		<div id='menu'>
			<?php 
				//if($this->auth->logged_in()) 
				//{
					?>
					<ul id='head_links'>
						<li><?php html::anchor('admin/question_sets','Question Sets')?></li>
						<li><?php //html::anchor('admin/logout','Logout')?></li>
					</ul>
					<?php
				//}
			?>
		</div>
		<div id='content'>
			<?php echo $content;	?>
		</div>
	</body>
</html>