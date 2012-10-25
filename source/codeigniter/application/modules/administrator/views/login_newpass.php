    
<ul class="maintabmenu multipletabmenu">  
    
    <li class="current"><a href="">Cập nhật password mới</a></li> 
</ul> 

<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/login/newpass" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
                         
            <p><label>Mật khẩu:</label></p>
            <p><span class="field"><input class="longinput validate[required]" id="txtpass" name="txtpass" type="password"></span></p>
            <br>
            
            <p><label>Xác nhận mật khẩu:</label></p>
            <p><span class="field"><input class="longinput validate[required,equals[txtpass]" name="txtconfirmpass" type="password"></span></p>
            <br>
                       
            <p class="stdformbutton">
                <input name="submit" value="Cập nhật" class="submit radius2" type="submit">                                
                
            </p>                            
        </form>                                        
        </div>
 </div>       
 