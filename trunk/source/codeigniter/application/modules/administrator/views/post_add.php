
<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/posts">Tất cả bài viết</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/posts/add">Thêm mới bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/category">Danh mục bài viết</a></li>    
    <li><a href="<?php echo base_url();?>administrator/tags">Danh mục tag</a></li>
</ul>
<div class="content">                	
    <form method="post" action="<?php echo base_url();?>administrator/posts/add" class="stdform" id="formID">
        <div class="edit-main"> 
            <?php 
                $str='';
                if(count($lstLang)>0)
                {
                    foreach ($lstLang as $lang)
                    {
                        $str.=$lang->code.',';
                    }
                    $str = substr($str,0,strlen($str)-1);
                }
                
            ?>
            <input type="hidden" id="lstLangCode" value="<?php echo $str;?>">
            <div id="wizard" class="wizard post-lang">
                <ul class="tabbedmenu anchor">
                    <?php 
                        foreach ($lstLang as $lang)
                        {
                    ?>
                    <li>
                        <a href="#divlang_<?php echo $lang->code;?>" class="sel" isdone="1" rel="1">                            
                            <span class="label"><?php echo $lang->name;?></span>
                        </a>
                    </li>
                    <?php }?>                    
                </ul>
                <br>
                <div class="stepContainer">
                     <?php 
                        foreach ($lstLang as $lang)
                        {
                    ?>
                    <div id="divlang_<?php echo $lang->code;?>">
                        <p><label>Tiêu đề <strong>(<?php echo $lang->name;?>)</strong>:</label></p>
                        <p><span class="field"><input type="text" class="longinput validate[required]" name="txttitle<?php echo $lang->code;?>"></span></p>
                        </br>
                        <p><label>Tóm tắt <strong>(<?php echo $lang->name;?>)</strong>:</label></p>                            
                        <p><span class="field"><textarea name="txtexcerpt<?php echo $lang->code;?>" class="validate[required]"></textarea></span></p>
                        </br>
                        <p><label>Nội dung <strong>(<?php echo $lang->name;?>)</strong>:</label></p>                            
                        <p><textarea name="txtcontent<?php echo $lang->code;?>" id="editor_content<?php echo $lang->code;?>" class="validate[required]"></textarea></p>            
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
                                        <input class="mediuminput" type="text" name="txtTitleSeo<?php echo $lang->code;?>" onkeyup="countCharactor(this.value,'<?php echo 'txtlength_'.$lang->code;?>');">
                                    </span>
                                    <input type="text" id="txtlength_<?php echo $lang->code;?>" class="length-count" value="0" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                                    <small class="desc small-desc"> Most search engines use a maximum of 60 chars for the title.</small>
                                </p>
                                <p>
                                    <label>Description</label>
                                    <span class="field small-form">
                                        <textarea id="location" class="mediuminput" name="txtDescSeo<?php echo $lang->code;?>" rows="5" cols="80" onkeyup="countCharactors(this.value,'<?php echo 'txtlength2_'.$lang->code;?>');"></textarea>
                                    </span>
                                    <input type="text" id="txtlength2_<?php echo $lang->code;?>" class="length-count" value="0" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                                    <small class="desc small-desc"> Most search engines use a maximum of 160 chars for the description.</small>
                                </p>
                                <p>
                                    <label>Keywords</label>
                                    <span class="field small-form">
                                        <input class="mediuminput" type="text" name="txtKeywordSeo<?php echo $lang->code;?>">
                                    </span>                        
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php }?>                          
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
                        <input type="text" id="txtDatePublish" class="datetimepicker validate[required]" name="txtDatePublish" value="<?php echo date("d-m-Y H:i:s")?>">
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
                    foreach ($term_option as $term)
                    {
                    ?>     
                    <input type="checkbox" name="cbcategory[]" value="<?php echo $term->id; ?>">&nbsp;&nbsp;&nbsp;<?php echo $term->name_display;?><br>
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
                        <input type="hidden" id="lstTagAdded" name="lstTagAdded" value=",">
                        <div class="tagchecklist">
                                                       
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
                    <input type="hidden" id="featured_image" name="hdffeatured_image" >
                    <img src="" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />
                    <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                </div>
            </div>
        </div>
    </form>              
</div><!--content-->
<script type="text/javascript">
    var lstLang = jQuery('#lstLangCode').attr('value');
    var list = lstLang.split(',');
    if(list.length>0)
    {
        for(var i=0;i<list.length;i++)
        {
            var editor = CKEDITOR.replace( 'editor_content'+list[i],
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
        }
    }
	

</script>