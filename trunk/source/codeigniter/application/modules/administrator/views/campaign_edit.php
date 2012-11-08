<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/campaigns">Tất cả cuộc thi</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/campaigns/add">Cập nhật cuộc thi</a></li>    
</ul>
<div class="content">    
    <form method="post" action="<?php echo base_url();?>administrator/campaigns/edit" class="stdform" id="formID">
        <div class="edit-main">      
            <input type="hidden" name="campaign_id" value="<?php echo $campaign->id;?>">
            <p><label>Tiêu đề:</label></p>
            <p><span class="field"><input type="text" value="<?php echo $campaign->name;?>" class="longinput validate[required]" name="txttitle"></span></p>
            </br>
            <p><label>Tóm tắt:</label></p>                            
            <p><span class="field"><textarea name="txtexcerpt" class="validate[required]"><?php echo $campaign->summary;?></textarea></span></p>
            </br>
            <p><label>Nội dung:</label></p>                            
            <p><textarea name="txtcontent" id="editor_content" class="validate[required]"><?php echo $campaign->description;?></textarea></p>            
            </br>   
            <p><label>Hình thức dự thi:</label></p>                            
            <p><textarea name="txtcontent1" id="editor_content1" class="validate[required]"><?php echo $campaign->contestform;?></textarea></p>            
            </br>
            <p><label>Phương thức tính giải:</label></p>                            
            <p><textarea name="txtcontent2" id="editor_content2" class="validate[required]"><?php echo $campaign->awardmethod;?></textarea></p>            
            </br>
            <p><label>Hệ thống giải thưởng:</label></p>                            
            <p><textarea name="txtcontent3" id="editor_content3" class="validate[required]"><?php echo $campaign->award;?></textarea></p>            
            </br>
        </div>
        <div class="edit-right">
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Thông tin</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <p class="status-ddl">
                        Trạng thái:
                        <select name="ddlTrangThai">
                            <option value="enable" <?php if($campaign->status=="enable") echo "selected='selected'";?>>Enable</option>
                            <option value="disable" <?php if($campaign->status=="disable") echo "selected='selected'";?>>Disable</option>                            
                        </select>                         
                    </p>
                    <p class="status-ddl">
                        Thời gian bắt đầu:
                        <input type="text" value="<?php echo date_format(date_create($campaign->start_date),'d-m-Y H:i:s');?>" class="datetimepicker validate[required]" name="txtDateStart">
                    </p>
                    <p class="status-ddl">
                        Thời gian kết thúc:
                        <input type="text" value="<?php echo date_format(date_create($campaign->end_date),'d-m-Y H:i:s');?>"  class="datetimepicker2 validate[required]" name="txtDateEnd">
                    </p>
                    <p class="stdformbutton">
                        <button class="submit radius2">Cập nhật</button>
                        <input type="reset" value="Hủy" class="reset radius2">
                    </p>
                </div><!--widgetcontent-->
            </div>           
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" id="featured_image" value="<?php echo $campaign->image;?>" name="hdffeatured_image" >
                    <img src="<?php echo $campaign->image;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
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
    var editor = CKEDITOR.replace( 'editor_content1',
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
    var editor = CKEDITOR.replace( 'editor_content2',
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
    var editor = CKEDITOR.replace( 'editor_content3',
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