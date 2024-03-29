<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/posts">Tất cả bài viết</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/posts/add">Cập nhật bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/category">Danh mục bài viết</a></li>    
    <li><a href="<?php echo base_url();?>administrator/tags">Danh mục tag</a></li>
</ul>
<div class="content">                	
    <form method="post" action="<?php echo base_url();?>administrator/posts/edit/<?php echo $post->id;?>" class="stdform" id="formID">
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
            <input type="hidden" id="txtLangNum" value="<?php echo $lang_num;?>">
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
                        <input type="hidden" name="postlang_id_<?php echo $lang->code;?>" value="<?php 
                                                            foreach ($lstPost as $post_item) 
                                                            {
                                                                if($lang->id == $post_item->language_id)
                                                                {
                                                                    echo $post_item->id;
                                                                }
                                                            }
                                                        ?>">
                        <p><label>Tiêu đề <strong>(<?php echo $lang->name;?>)</strong>:</label></p>
                        <p><span class="field">
                                <input type="text" value="<?php 
                                                            foreach ($lstPost as $post_item) 
                                                            {
                                                                if($lang->id == $post_item->language_id)
                                                                {
                                                                    echo $post_item->post_title;
                                                                }
                                                            }
                                                        ?>" 
                                        class="longinput validate[required]" name="txttitle<?php echo $lang->code;?>">
                            </span></p>
                        </br>
                        <p><label>Tóm tắt <strong>(<?php echo $lang->name;?>)</strong>:</label></p>                            
                        <p><span class="field"><textarea name="txtexcerpt<?php echo $lang->code;?>" class="validate[required]"><?php 
                                                            foreach ($lstPost as $post_item) 
                                                            {
                                                                if($lang->id == $post_item->language_id)
                                                                {
                                                                    echo $post_item->post_excerpt;
                                                                }
                                                            }
                                                        ?></textarea></span></p>
                        </br>
                        <p><label>Nội dung <strong>(<?php echo $lang->name;?>)</strong>:</label></p>                            
                        <p><textarea name="txtcontent<?php echo $lang->code;?>" id="editor_content<?php echo $lang->code;?>" class="validate[required]">
                                <?php 
                                    foreach ($lstPost as $post_item) 
                                    {
                                        if($lang->id == $post_item->language_id)
                                        {
                                            echo $post_item->post_content;
                                        }
                                    }
                                ?>
                            </textarea>
                        </p>            
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
                                        <input class="mediuminput" type="text" name="txtTitleSeo<?php echo $lang->code;?>" onkeyup="countCharactor(this.value,'<?php echo 'txtlength_'.$lang->code;?>');"
                                               value="<?php 
                                                            $seotitle = '';
                                                            foreach ($lstPost as $post_item) 
                                                            {
                                                                if($lang->id == $post_item->language_id)
                                                                {
                                                                    $seotitle = $post_item->getPostMeta($post_item->id, 'seo_title');
                                                                    echo $post_item->getPostMeta($post_item->id, 'seo_title');
                                                                }
                                                            }
                                                        ?>"
                                               >
                                    </span>
                                    <input type="text"  id="txtlength_<?php echo $lang->code;?>" class="length-count" value="<?php echo mb_strlen($seotitle,'utf-8');?>" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                                    <small class="desc small-desc"> Most search engines use a maximum of 60 chars for the title.</small>
                                </p>
                                <p>
                                    <label>Description</label>
                                    <span class="field small-form">
                                        <textarea id="location" class="mediuminput" name="txtDescSeo<?php echo $lang->code;?>" rows="5" cols="80" onkeyup="countCharactors(this.value,'<?php echo 'txtlength2_'.$lang->code;?>');"><?php 
                                                $seodesc = '';
                                                foreach ($lstPost as $post_item) 
                                                {
                                                    
                                                    if($lang->id == $post_item->language_id)
                                                    {
                                                        $seodesc = $post_item->getPostMeta($post_item->id, 'seo_description');
                                                        echo $post_item->getPostMeta($post_item->id, 'seo_description');
                                                    }
                                                }
                                            ?></textarea>
                                    </span>
                                    <input type="text" id="txtlength2_<?php echo $lang->code;?>" class="length-count" value="<?php echo mb_strlen($seodesc,'utf-8');?>" style="text-align:center;" maxlength="3" size="3" name="lengthT" readonly="">
                                    <small class="desc small-desc"> Most search engines use a maximum of 160 chars for the description.</small>
                                </p>
                                <p>
                                    <label>Keywords</label>
                                    <span class="field small-form">
                                        <input class="mediuminput" type="text" name="txtKeywordSeo<?php echo $lang->code;?>"
                                               value="<?php 
                                                            foreach ($lstPost as $post_item) 
                                                            {
                                                                if($lang->id == $post_item->language_id)
                                                                {
                                                                    echo $post_item->getPostMeta($post_item->id, 'seo_keyword');;
                                                                }
                                                            }
                                                        ?>"
                                               >                                               
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
                                <input type="checkbox" checked="checked" value="<?php echo $term->id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $term->name_display;?>
                                <br>                                    
                            <?php }else{?>
                                <input type="checkbox" value="<?php echo $term->id; ?>" name="cbcategory[]">&nbsp;&nbsp;&nbsp;<?php echo $term->name_display;?>
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
                                <?php $flag=false;?>
                                <?php $tag_id = $tag->term_id;?>
                                <?php foreach($lst_post_tag as $post_tag){
                                    if($tag_id == $post_tag->term_id){$flag=true;}		
                                }?> 
                                    <?php if($flag){?>
                                    <a style="font-size: 8pt;" href="" class="link-tag added" valuetag="<?php echo $tag->term_id;?>" id="tag-num-<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
                                    <?php }else{?>
                                    <a style="font-size: 8pt;" href="" class="link-tag" valuetag="<?php echo $tag->term_id;?>" id="tag-num-<?php echo $tag->term_id;?>"><?php echo $tag->name;?></a>
                                    <?php }?>                            
                            <?php }?>                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="widgetbox">
                <div class="title"><h2 class="general"><span>Cuộc thi</span></h2></div>
                <div class="widgetcontent" style="display: block;">
                    <select name="ddlCampaign" style="width: 100%;">
                        <?php 
                        foreach ($lstCampaign as $campaign)
                        {
                        ?>     
                        <option value="<?php echo $campaign->id;?>" <?php if($campaign->id==$post->campaign_id) echo "selected='selected'"?>><?php echo $campaign->name;?></option>
                        <?php }?>
                    </select>
                    
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