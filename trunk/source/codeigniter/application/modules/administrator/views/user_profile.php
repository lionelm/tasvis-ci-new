<ul class="maintabmenu multipletabmenu">  
 
    <li class="current"><a href="<?php echo base_url();?>administrator/users/profile">Profile</a></li> 
</ul> 
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/users/profile" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
                <input type="hidden" value="<?php echo $user4->id;?>" name="txtid">
                
                <p><label>Tên truy cập [ Không được thay đổi ]</label></p>
                <p><span class="field"><input value="<?php echo $user4->user_login;?>"  disabled="disabled" class="longinput validate[required]" name="txtlogin" type="text"></span></p>
                <br>   
                
                <p><label>Họ tên</label></p>
                <p><span class="field"><input name="txtnicename" value="<?php echo $user4->user_nicename;?>" id="txtnicename" class="longinput validate[required]" type="text"></span></p>
                <br>               
                                 
                 <p><label>Email</label></p>
                <p><span class="field"><input value="<?php echo $user4->user_email;?>" class="longinput validate[required,custom[email]]" name="txtemail" type="text"></span></p>
                <br> 
                
                <p><label>Mật khẩu</label></p>
                <p><span class="field"><input value="<?php echo $user4->user_pass;?>" class="longinput validate[required]" name="txtpass" type="password"></span></p>
                <br>  
              
                       
                <p class="stdformbutton">
                    <input name="submit" value="Cập nhật" class="submit radius2" type="submit">                                
                    <input value="Hủy" class="reset radius2" type="reset">
                </p>                            
            </form>                                        
        </div>
   
