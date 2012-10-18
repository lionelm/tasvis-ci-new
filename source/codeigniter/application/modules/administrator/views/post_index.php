<ul class="maintabmenu multipletabmenu">        
    <li class="current"><a href="<?php echo base_url();?>administrator/posts">Tất cả bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/posts/add">Thêm mới bài viết</a></li>
    <li><a href="<?php echo base_url();?>administrator/category">Danh mục bài viết</a></li>   
    <li><a href="<?php echo base_url();?>administrator/tags">Danh mục tag</a></li>
</ul>               
<div class="content">   
    <div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Danh sách bài viết</span></h2>
    </div><!--contenttitle-->
    <div class="tableoptions">
        <form name="frmfilter" method="post" action="<?php echo base_url();?>administrator/posts/index/" >                        	
            <button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>admin/posts/delete">Delete Selected</button> &nbsp;               
                
            <select name="ddlTerm">
                    <option value="0">-- Tất cả --</option>
                    <?php 
                        foreach ($term_option as $term)
                        {
                    ?>
                    <option value="<?php echo $term->slug;?>" <?php if($term->slug == $category) echo "selected='selected'";?>><?php echo $term->name;?></option>
                    <?php }?>                    
            </select> &nbsp;
            <input type="text" value="<?php if($key_word!='~')echo $key_word;?>" name="txtKeyWord" class="input-keyword">&nbsp;
           
            <input type="submit" class="btn" value="Tìm kiếm"/>
        </form>
    </div><!--tableoptions-->	
    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
        <colgroup>
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
        </colgroup>
        <thead>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1" width="250">Tiêu đề</th>                                
                <th class="head0">Tóm tắt</th>
                <th class="head1">Ngôn ngữ</th>
                <th class="head0">Ngày cập nhật</th>
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1" width="250">Tiêu đề</th>                                
                <th class="head0">Tóm tắt</th>
                <th class="head1">Ngôn ngữ</th>
                <th class="head0">Ngày cập nhật</th>
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>                               	
            <?php 
                foreach ($lstPost as $post)
                {
            ?>
            <tr>
                <td class="center"><input value="<?php echo $post->id;?>" type="checkbox"></td>
                <td><?php echo $post->post_title;?></td>

                <td><?php echo $post->post_excerpt;?></td>
                <td><?php 
                        $lstPostLang = new Post();
                        $lstPostLangs = $lstPostLang->getPostLang($post->id);
                        foreach ($lstPostLangs as $pl)
                        {                            
                    ?>
                    <a href="<?php echo base_url()?>administrator/posts/edit/<?php echo $pl->id;?>"><?php echo $pl->language_name;?></a>&nbsp;
                    <?php }?>
                </td>
                <td><?php
                if($post->post_modified=='0000-00-00 00:00:00')
                {                                     	
                    echo date_format(date_create($post->post_date),'d-m-Y H:i:s');
                }
                else 
                {
                    echo date_format(date_create($post->post_modified),'d-m-Y H:i:s');
                }
                ?></td>
                <td class="center">
                    <a class="edit" href="<?php echo base_url();?>administrator/posts/edit/<?php echo $post->id;?>">Sửa</a> &nbsp; 
                    <a class="delete" name="delete_post" id="<?php echo $post->id;?>" href="<?php echo base_url();?>administrator/posts/delete">Xóa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>    
    <?php echo $list_link;?>
</div><!--content-->