<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/posts">Tất cả bài viết</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/posts/add">Thêm mới bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/category">Danh mục bài viết</a></li>    
</ul>
<div class="content">                	
    <form method="post" action="<?php echo base_url();?>administrator/posts/add" class="stdform" id="formID">
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
                <div class="title"><h2 class="general"><span>Xuất bản</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <p class="status-ddl">
                        Trạng thái:
                        <select name="ddlTrangThai">
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                            <option value="pending">Pending</option>
                        </select>                         
                    </p>
                    <p class="status-ddl">
                        Thời gian xuất bản:
                        <input type="text" id="txtDatePublish" class="datetimepicker" name="txtDatePublish">
                    </p>
                    <p class="stdformbutton">
                        <button class="submit radius2">Xuất bản</button>
                        <input type="reset" value="Hủy" class="reset radius2">
                    </p>
                </div><!--widgetcontent-->
            </div>

            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Danh mục bài viết</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <?php 
                    foreach ($lstTerm as $term_item)
                    {
                    ?>     
                    <input type="checkbox" name="cbcategory[]" value="<?php echo $term_item->id; ?>">&nbsp;&nbsp;&nbsp;<?php if($term_item->is_child) echo "----";?><?php echo $term_item->name;?><br>
                    <?php }?>
                </div>
            </div>
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Tags</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="text" id="txtTag" name="txtTag">
                    <button id="btnAddTag" class="submit radius2" >Add tag</button>
                    <div>
                        Danh sách tag đã chọn:
                    </div>
                    <div class="choose-tag">
                        <a href="" id="addTagLink">Chọn trong danh sách tag phổ biến</a>
                        <div id="tag-list">
                            <a class="tag-link-18" style="font-size: 8pt;" title="1 topic" href="#">bảng giá email hosting</a>
                            <a class="tag-link-16" style="font-size: 8pt;" title="1 topic" href="#">bảng giá hosting</a>
                            <a class="tag-link-17" style="font-size: 8pt;" title="1 topic" href="#">email hosting</a>
                            <a class="tag-link-12" style="font-size: 8pt;" title="1 topic" href="#">giám sát thiết kế website</a>
                            <a class="tag-link-11" style="font-size: 8pt;" title="1 topic" href="#">tư vấn thiết kế website</a>
                        </div>
                    </div>
                </div>
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