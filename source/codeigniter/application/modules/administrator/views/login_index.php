<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Page | Starlight Premium Admin Template</title>
<link rel="stylesheet" href="<?php echo base_url();?>content-admin/css/style.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>content-admin/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.loginform button').hover(function(){
		$(this).stop().switchClass('default','hover');
	},function(){
		$(this).stop().switchClass('hover','default');
	});
	
	$('#login').submit(function(){
		var u = jQuery(this).find('#username');
        var p = jQuery(this).find('#password');
		if(u.val() == '' || p.val() == '' ) {
			jQuery('.loginerror').slideDown();
			u.focus();
            p.focus();
			return false;	
		}
	});
	
	$('#username').keypress(function(){
		jQuery('.loginerror').slideUp();
	});
 
    $('#password').keypress(function(){
		jQuery('.loginerror').slideUp();
	});
    
    
});
</script>
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<meta charset="UTF-8"></head>

<body class="login">

<div class="loginbox radius3">
	<div class="loginboxinner radius3">
    	<div class="loginheader">
    		<h1 class="bebas">Sign In</h1>
        	<div class="logo"><img src="./images/starlight_admin_template_logo.png" alt="" /></div>
    	</div><!--loginheader-->
        
        <div class="loginform">
        	<div class="loginerror"><p>Invalid username or password</p></div>
        	<form id="login" action="<?php echo base_url(); ?>administrator/login/index" method="post">
            	<p>
                	<label for="username" class="bebas">Username</label>
                    <input type="text" id="username" name="username" class="radius2" />
                </p>
                <p>
                	<label for="password" class="bebas">Password</label>
                    <input type="password" id="password" name="password" class="radius2" />
                </p>
                <p>
                	<button class="radius3 bebas">Sign in</button>
                 
                </p>
                <p> <a href="<?php echo base_url(); ?>administrator/login/forget" class="whitelink small">...Quên mật khẩu?</a> | 
                <a href="<?php echo base_url(); ?>administrator/signup/index" class="whitelink small">Đăng ký!</a></p>
            </form>
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->

</body>
</html>
