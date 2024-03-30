<div id="login_wrapper">
<div id="content">
  <div id="header">
    <div id="header_logo"><img src="<?php echo url::base(FALSE) ?>/media/img/admin_logo.png" alt="admin logo" width="183" height="45" /></div>
  </div>
  <div id="content_area">
    
    <div id="login">
      <form id="login_form" name="login_form" method="post" action="<?php echo url::site("user/login") ?>">
        <?php if (isset($title)): ?>
		<div class="error" style="text-align:left;padding-left: 100px;">
		<?php echo $title;?>
		</div>
	    <?php endif;?>
      
        <p><label>Username</label><input type="text" name="username"  /></p>
        <p><label>Password</label><input type="password" name="password"  /></p>
        <div class="floatRight">
        <div class="small"><a href="#">Forgot Password</a>&nbsp;</div>
        <!--<input type="image" name="submit" src="img/login_btn.png" style="width:113px; height:26px;" />-->
        <input type="image" name="submit"  src="<?php echo url::base(FALSE) ?>/media/img/login_btn.png" alt="submit" style="width:100px; height:25px;text-align:right;float:right;"/>
        <br/><br/>
		</div>
		</div>
      </form>
      <p>&nbsp;</p>
    
  </div>
  <div id="footer"></div>
</div>
</div>
