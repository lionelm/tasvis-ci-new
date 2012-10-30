    
<ul class="maintabmenu multipletabmenu">    
    <li class="current"><a href="<?php echo base_url();?>administrator/signup/">Đăng ký thành viên</a></li> 
</ul> 

    
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/signup/" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Họ tên</label></p>
            <p><span class="field"><input name="txtnicename" value="" id="txtnicename" class="longinput validate[required]" type="text"></span></p>
            <br>
            
            <p><label>Tên truy cập</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtlogin" type="text"></span></p>
            <br> 
            
            <p><label>Mật khẩu</label></p>
            <p><span class="field"><input class="longinput validate[required]" id="txtpass" name="txtpass" type="password"></span></p>
            <br>
            
            <p><label>Xác nhận mật khẩu</label></p>
            <p><span class="field"><input class="longinput validate[required,equals[txtpass]" name="txtconfirmpass" type="password"></span></p>
            <br>
            
            <p><label>Email</label></p>
            <p><span class="field"><input class="longinput validate[required,custom[email]" name="txtemail" type="text"></span></p>
            <br>
           
            <p><span class="field"><input type="hidden" name="hdtrangthai" value="0" /> </p>
            <br>
            
            <p class="stdformbutton">
                <input name="submit" value="Đăng ký" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        
        </div>
 </div>       
 