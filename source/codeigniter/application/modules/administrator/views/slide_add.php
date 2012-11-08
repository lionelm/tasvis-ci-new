<ul class="maintabmenu multipletabmenu">        
    <li  class="current"><a href="<?php echo base_url();?>administrator/slides/add">Quản lý slide</a></li>    
</ul>
<div class="content">                	
    <div class="edit-left">
        <form action="<?php echo base_url();?>administrator/slides/add" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Tên ngôn ngữ:</label></p>
            <p><span class="field"><input name="txttitle" value="" id="txttitle" class="longinput validate[required]" type="text"></span></p>
            <br>
            <p><label>Mã ngôn ngữ:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtcode" type="text"></span></p>
            <br>            
            <p class="stdformbutton">
                <input name="submit" value="Thêm mới" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        
    </div>                      
</div><!--content-->                
