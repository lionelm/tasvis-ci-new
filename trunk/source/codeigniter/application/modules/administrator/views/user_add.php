    
<ul class="maintabmenu multipletabmenu">  
    <li ><a href="<?php echo base_url();?>administrator/users">Tất cả người dùng</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/users/add">Thêm mới người dùng</a></li> 
</ul> 

    
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/users/add" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Họ tên:</label></p>
            <p><span class="field"><input name="txtnicename" value="" id="txtnicename" class="longinput validate[required]" type="text"></span></p>
            <br>
            
            <p><label>Tên truy cập:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtlogin" type="text"></span></p>
            <br> 
            
            <p><label>Mật khẩu:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtpass" type="password"></span></p>
            <br>
            
            <p><label>Email:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtemail" type="text"></span></p>
            <br>
            
            <p><label>Trạng thái:</label></p>
            <p><span class="field"><input type="radio" name="rdtrangthai" value="1" checked="checked"/>Hiện 
                                    <input type="radio" name="rdtrangthai" value="0" />Ẩn</span></p>
            <br>
            
                       
            <p class="stdformbutton">
                <input name="submit" value="Thêm mới" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        
        </div>
 </div>       
 