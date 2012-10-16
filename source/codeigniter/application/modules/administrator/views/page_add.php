<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/pages">Tất cả trang</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/pages/add">Thêm mới trang</a></li>    
</ul>
<div class="content">                	
    <form method="post" action="<?php echo base_url();?>administrator/pages/add" class="stdform" id="formID">
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
            
            <div class="seo-packages widgetbox">
                <div class="contenttitle">
                    <h2 class="form">
                        <span>All in One SEO Pack</span>
                    </h2>
                </div>                
                <div class="widgetcontent">
                    <p>
                        <label>Title</label>
                        <span class="field small-form">
                            <input class="mediuminput" type="text" name="txtTitleSeo" onkeyup="countCharactor(this.value);">
                        </span>
                        <input type="text" id="txtlength" class="length-count" value="0" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                        <small class="desc small-desc"> Most search engines use a maximum of 60 chars for the title.</small>
                    </p>
                    <p>
                        <label>Description</label>
                        <span class="field small-form">
                            <textarea id="location" class="mediuminput" name="txtDescSeo" rows="5" cols="80" onkeyup="countCharactors(this.value);"></textarea>
                        </span>
                        <input type="text" id="txtlength2" class="length-count" value="0" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                        <small class="desc small-desc"> Most search engines use a maximum of 160 chars for the description.</small>
                    </p>
                    <p>
                        <label>Keywords</label>
                        <span class="field small-form">
                            <input class="mediuminput" type="text" name="txtKeywordSeo">
                        </span>                        
                    </p>
                </div>
            </div>            
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
                        <input type="text" id="txtDatePublish" class="datetimepicker validate[required]" name="txtDatePublish">
                    </p>
                    <p class="stdformbutton">
                        <button class="submit radius2">Xuất bản</button>
                        <input type="reset" value="Hủy" class="reset radius2">
                    </p>
                </div><!--widgetcontent-->
            </div>

            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Page Parent</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <select name="ddlPageParent" style="width: 100%;">
                        <option value="0">-- Chưa chọn page cha --</option>
                        <?php 
                        foreach ($lstPage as $page)
                        {
                        ?>
                        <option value="<?php echo $page->id;?>"><?php echo $page->post_title;?></option>
                        <?php
                        }
                        ?>
                    </select>
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