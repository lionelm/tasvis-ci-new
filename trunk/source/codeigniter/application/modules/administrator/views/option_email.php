<ul class="maintabmenu multipletabmenu">
	<li ><a href="<?php echo base_url().'administrator/setting' ?>">General Settings</a></li>
    <li class="current"><a href="<?php echo base_url().'administrator/setting/email' ?>">Email</a></li>
    <li><a href="<?php echo base_url().'administrator/setting/seo' ?>">Seo</a></li>
</ul><!--maintabmenu-->

<div class="content">
    
    <form class="stdform" action="<?php echo base_url().'administrator/setting/email' ?>" method="post">    	        
        <p>
        	<label>From Email:</label>
            <span class="field"><input type="text" name="mail_server" class="mediuminput" value="<?php echo $mail_server ?>"/></span>
        </p>
        <p>
        	<label>From Name:</label>
            <span class="field"><input type="text" name="mail_server_name" class="mediuminput" value="<?php echo $mail_server_name ?>"/></span>
        </p>        
        <p>
        	<label>SMTP Host:</label>
            <span class="field"><input type="text" name="mail_server_host" class="mediuminput" value="<?php echo $mail_server_host ?>"/></span>
        </p>
        <p>
        	<label>SMTP Username:</label>
            <span class="field"><input type="text" name="mail_server_username" class="smallinput" value="<?php echo $mail_server_username ?>"/></span>
        </p>
                
        
        <p>
        	<label>SMTP Password:</label>
            <span class="field"><input type="password" name="mail_server_password" class="smallinput" placeholder="<?php echo $mail_server_password ?>"/></span>
        </p>
        <p>
        	<label>SMTP port:</label>
            <span class="field"><input type="text" name="mail_server_port" class="smallinput" value="<?php echo $mail_server_port ?>"/></span>
        </p>
        <br clear="all" /><br />
        
        <p class="stdformbutton">
        	<button class="submit radius2"name="submit">Submit</button>
            <input type="reset" class="reset radius2" value="Reset" />
        </p>
        
        
    </form>
    
    
    <br clear="all" /><br />
      
</div><!--content-->