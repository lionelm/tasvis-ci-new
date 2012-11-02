<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/campaigns">Tất cả cuộc thi</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/campaigns/add">Thêm mới cuộc thi</a></li>    
</ul>
<div class="content">    
    <form method="post" action="<?php echo base_url();?>administrator/campaigns/add" class="stdform" id="formID">
        <div class="edit-main">                
            <p><label>Tiêu đề:</label></p>
            <p><span class="field"><input type="text" class="longinput validate[required]" name="txttitle"></span></p>
            </br>
            <p><label>Tóm tắt:</label></p>                            
            <p><span class="field"><textarea name="txtexcerpt" class="validate[required]"></textarea></span></p>
            </br>
            <p><label>Nội dung:</label></p>                            
            <p><textarea name="txtcontent" id="editor_content" class="validate[required]"></textarea></p>            
            </br>              
        </div>
        <div class="edit-right">
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Thông tin</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <p class="status-ddl">
                        Trạng thái:
                        <select name="ddlTrangThai">
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>                            
                        </select>                         
                    </p>
                    <p class="status-ddl">
                        Thời gian bắt đầu:
                        <input type="text" id="txtDateStart" class="datetimepicker validate[required]" id="txtDateStart" name="txtDateStart">
                    </p>
                    <p class="status-ddl">
                        Thời gian kết thúc:
                        <input type="text" id="txtDateEnd" class="datetimepicker2 validate[required]"  id="txtDateEnd" name="txtDateEnd">
                    </p>
                    <p class="stdformbutton">
                        <button class="submit radius2">Thêm</button>
                        <input type="reset" value="Hủy" class="reset radius2">
                    </p>
                </div><!--widgetcontent-->
            </div>           
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" id="featured_image" name="hdffeatured_image" >
                    <img src="" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                    <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                </div>
            </div>
        </div>
    </form>              
</div><!--content-->
<script type="text/javascript">    
    var editor = CKEDITOR.replace( 'editor_content',
    {			
        filebrowserBrowseUrl : '<?php echo base_url();?>elfinder/elfinder.php?mode=file',
        filebrowserImageBrowseUrl : '<?php echo base_url();?>elfinder/elfinder.php?mode=image',
        filebrowserFlashBrowseUrl : '<?php echo base_url();?>elfinder/elfinder.php?mode=flash',
        filebrowserImageUploadUrl : '<?php echo base_url();?>elfinder/elfinder.php?mode=image',
        filebrowserFlashUploadUrl : '<?php echo base_url();?>elfinder/elfinder.php?mode=flash',
        filebrowserImageWindowWidth : '950',
        filebrowserImageWindowHeight : '490',
        filebrowserWindowWidth : '950',
        filebrowserWindowHeight : '490'
    });
</script>