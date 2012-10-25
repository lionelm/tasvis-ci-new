<ul class="maintabmenu multipletabmenu">
	<li class="current"><a href="<?php echo base_url().'administrator/setting' ?>">General Settings</a></li>
    <li><a href="<?php echo base_url().'administrator/setting/email' ?>">Email</a></li>
    <li><a href="<?php echo base_url().'administrator/setting/seo' ?>">Seo</a></li>
</ul><!--maintabmenu-->

<div class="content">
    
    <form class="stdform" action="<?php echo base_url().'administrator/setting' ?>" method="post">    	        
        <p>
        	<label>Site Title:</label>
            <span class="field"><input type="text" name="site_title" class="mediuminput" value="<?php echo $site_title; ?>" /></span>
        </p>
        <p>
        	<label>Site Name:</label>
            <span class="field"><input type="text" name="site_name" class="mediuminput" value="<?php echo $site_name; ?>"/></span>
        </p>        
        <p>
        	<label>Site Url:</label>
            <span class="field"><input type="text" name="site_url" class="mediuminput" value="<?php echo $site_url; ?>"/></span>
        </p>
        <p>
        	<label>Template:</label>
            <span class="field"><input type="text" name="template" class="mediuminput" value="<?php echo $template; ?>"/></span>
        </p>
        <p>
        	<label>Email Admin:</label>
            <span class="field"><input type="text" name="email_admin" class="mediuminput" value="<?php echo $email_admin; ?>" /></span>
        </p>
                
        <p>
        	<label>Site Description:</label>
            <span class="field"><textarea cols="80" name="site_description"rows="5" class="longinput" ><?php echo $site_description; ?></textarea></span> 
        </p>
        <br clear="all" /><br />
        
        <p class="stdformbutton">
        	<button class="submit radius2" name="submit">Submit</button>
            <input type="reset" class="reset radius2" value="Reset" />
        </p>
        
        
    </form>
    
    
    <br clear="all" /><br />
      
</div><!--content-->