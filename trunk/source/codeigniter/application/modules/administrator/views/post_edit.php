<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/posts">Tất cả bài viết</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/posts/add">Cập nhật bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/category">Danh mục bài viết</a></li>    
    <li><a href="<?php echo base_url();?>administrator/tags">Danh mục tag</a></li>
</ul>
<div class="content">                	
    <form method="post" action="<?php echo base_url();?>administrator/posts/edit/<?php echo $post->id;?>" class="stdform" id="formID">
        <div class="edit-main">      
            <input type="hidden" name="hdfPostID" value="<?php echo $post->id;?>"/>
            <p><label>Tiêu đề:</label></p>
            <p><span class="field"><input type="text" class="longinput validate[required]" name="txttitle" value="<?php echo $post->post_title;?>"></span></p>
            </br>
            <p><label>Tóm tắt:</label></p>                            
            <p><span class="field"><textarea name="txtexcerpt" class="validate[required]"><?php echo $post->post_excerpt;?></textarea></span></p>
            </br>
            <p><label>Nội dung:</label></p>                            
            <p><textarea name="txtcontent" id="editor_content" class="validate[required]"><?php echo $post->post_content;?></textarea></p>            
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
                            <input class="mediuminput" value="<?php echo $seoTitle;?>" type="text" name="txtTitleSeo" onkeyup="countCharactor(this.value);">
                        </span>
                        <input type="text" id="txtlength" class="length-count" value="<?php echo strlen($seoTitle);?>" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                        <small class="desc small-desc"> Most search engines use a maximum of 60 chars for the title.</small>
                    </p>
                    <p>
                        <label>Description</label>
                        <span class="field small-form">
                            <textarea id="location" class="mediuminput" name="txtDescSeo" rows="5" cols="80" onkeyup="countCharactors(this.value);"><?php echo $seoDesc;?></textarea>
                        </span>
                        <input type="text" id="txtlength2" class="length-count" value="<?php echo strlen($seoDesc);?>" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                        <small class="desc small-desc"> Most search engines use a maximum of 160 chars for the description.</small>
                    </p>
                    <p>
                        <label>Keywords</label>
                        <span class="field small-form">
                            <input class="mediuminput" value="<?php echo $seoKey;?>" type="text" name="txtKeywordSeo">
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
                            <option value="publish" <?php if($post->post_status =='publish') echo "selected='selected'";?>>Publish</option>
                            <option value="draft" <?php if($post->post_status =='draft') echo "selected='selected'";?>>Draft</option>
                            <option value="pending" <?php if($post->post_status =='pending') echo "selected='selected'";?>>Pending</option>
                        </select>                         
                    </p>
                    <p class="status-ddl">
                        Thời gian xuất bản:
                        <input type="text" value="<?php echo date_format(date_create($post->post_date_gmt),'d-m-Y H:i:s');?>" class="datetimepicker validate[required]" name="txtDatePublish">
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
                    <?php $flag=false;?>
                    <?php 
                    foreach ($term_option as $term)
                    {
                    ?>    
                        <?php $flag=false;?>
                        <?php $term_id = $term->id;?>
                        <?php foreach($term_post as $tp){
                            if($term_id == $tp->term_id){$flag=true;}		
                            }?>                                	
                                <?php if($flag){?>
                                <input type="checkbox" checked="checked" value="<?php echo $term->id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $term->name;?>
                                <br>                                    
                            <?php }else{?>
                                <input type="checkbox" value="<?php echo $term->id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $term->name;?>
                                <br>
                            <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Tags</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="text" id="txtTag" name="txtTag">
                    <button id="btnAddTag" urllink="<?php echo base_url();?>administrator/tags/addTagAjax" class="submit radius2" >Add tag</button>
                    <div>
                        Danh sách tag đã chọn:
                        <?php 
                            if(count($lst_post_tag)>0)
                            {
                                $str = ',';
                                foreach ($lst_post_tag as $pt)
                                {
                                    $str =  $str.$pt->term_id.',';
                                }
                        ?>
                        <input type="hidden" id="lstTagAdded" name="lstTagAdded" value="<?php echo $str;?>">
                        <?php
                            }
                            else{
                        ?>
                        <input type="hidden" id="lstTagAdded" name="lstTagAdded" value=",">
                        <?php }?>                        
                        <div class="tagchecklist">
                           <?php 
                            foreach ($lst_post_tag as $post_tag)
                            {
                           ?>
                                <span>
                                    <a id="tag-stt-<?php echo $post_tag->term_id;?>" class="ntdelbutton" valuetag="<?php echo $post_tag->term_id;?>">X</a>
                                     <?php echo $post_tag->term_name;?>
                                </span>
                            <?php }?>
                        </div>
                    </div>
                    <div class="choose-tag">
                        <a href="" id="addTagLink">Chọn trong danh sách tag phổ biến</a>
                        <div id="tag-list" class="toggleshow">
                            <?php 
                                foreach ($lstTag as $tag)
                                {
                            ?>
                            <a style="font-size: 8pt;" href="" class="link-tag" valuetag="<?php echo $tag->term_id;?>" id="tag-num-<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
                            <?php }?>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" id="featured_image" name="hdffeatured_image" value="<?php echo $featured_image;?>" >
                    <img src="<?php echo $featured_image;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
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