<ul class="maintabmenu multipletabmenu">
	<li><a href="<?php echo base_url().'administrator/setting' ?>">General Settings</a></li>
    <li><a href="<?php echo base_url().'administrator/setting/email' ?>">Email</a></li>
    <li class="current"><a href="<?php echo base_url().'administrator/setting/seo' ?>">Seo</a></li>
</ul><!--maintabmenu-->

<div class="content">
    
    <form class="stdform" action="<?php echo base_url().'administrator/setting/seo' ?>" method="post">
    	
        
        <p>
        	<label>Seo Title:</label>
            <span class="field"><input type="text" name="seo_title" class="mediuminput" value="<?php echo $seo_title ?>"/></span>
        </p>
       <p>
        	<label>Seo Description:</label>
            <span class="field"><textarea cols="80" rows="5" name="seo_description" class="longinput"  ><?php echo $seo_description ?></textarea></span> 
        </p>        
       <p>
        	<label>Seo Keyword:</label>
            <span class="field"><textarea cols="80" rows="5" name="seo_keyword" class="longinput" ><?php echo $seo_keyword ?></textarea></span> 
        </p>
       
        <br clear="all" /><br />
        
        <p class="stdformbutton">
        	<button class="submit radius2" name="submit">Submit</button>
            <input type="reset" class="reset radius2" value="Reset" />
        </p>
        
        
    </form>
    
    
    <br clear="all" /><br />
      
</div><!--content-->