<div class="login-popup" id="login-box">
    <a class="close" href="#"><img alt="Close" title="Close Window" class="btn_close" src="<?php echo base_url();?>content/thucung/images/close_pop.png"></a>
    <form id="login-form" action="<?php echo base_url();?>users/login" class="signin" method="post">
        <fieldset class="textbox">
            <label class="username">
                <span>Username</span>
                <input type="text" placeholder="Username" autocomplete="on" value="" name="username" id="username">
            </label>
            <label class="password">
                <span>Password</span>
                <input type="password" placeholder="Password" value="" name="password" id="password">
            </label>
            <button type="button" class="submit button-login" outlink="<?php echo base_url();?>users/logout">Sign in</button>
            <p>
                <a href="<?php echo base_url();?>users/forgot" class="forgot">Forgot your password?</a>
            </p>
            <p id="p-message">Thông tin đăng nhập sai!</p>
        </fieldset>
    </form>
</div>