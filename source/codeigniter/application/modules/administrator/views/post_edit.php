<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/posts">Tất cả bài viết</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/posts/add">Cập nhật bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/category">Danh mục bài viết</a></li>    
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
        </div>
        <div class="edit-right">
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Xuất bản</span></h2></div>
                <div class="widgetcontent" style="display: block;">

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
                    foreach ($lstTerm as $term_item)
                    {
                    ?>    
                        <?php $flag=false;?>
                        <?php $term_id = $term_item->id;?>
                        <?php foreach($term_post as $tp){
                            if($term_id == $tp->term_id){$flag=true;}		
                            }?>                                	
                                <?php if($flag){?>
                                <input type="checkbox" checked="checked" value="<?php echo $term_item->id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php if($term_item->is_child) echo "----";?><?php echo $term_item->name;?>
                                <br>                                    
                            <?php }else{?>
                                <input type="checkbox" value="<?php echo $term_item->id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php if($term_item->is_child) echo "----";?><?php echo $term_item->name;?>
                                <br>
                            <?php }?>
                    <?php }?>
                </div>
            </div>

            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Ảnh đại diện</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <input type="hidden" id="featured_image" name="hdffeatured_image" value="<?php echo $post->postmeta_meta_value;?>" >
                    <img src="<?php echo $post->postmeta_meta_value;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
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