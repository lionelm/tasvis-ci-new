<ul class="maintabmenu multipletabmenu">
    <li><a href="<?php echo base_url();?>">Tất cả bài viết</a></li>
    <li><a href="<?php echo base_url();?>">Thêm mới bài viết</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/tags">Danh mục Tag</a></li>
</ul>
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/tags" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Tên Tag:</label></p>
            <p><span class="field"><input name="txttitle" value="" id="txttitle" class="longinput validate[required]" type="text"></span></p>
            <br>
            <p><label>Đường dẫn:</label></p>
            <p><span class="field"><input id="txtslug" urlload="<?php echo base_url();?>administrator/tags/checkSlugAjax" class="longinput" name="txtslug" type="text" onkeyup="checkslug(this.value);"></span></p>
            <br>            
            <div id="message-check">
                <input type="hidden" id="hdfCheckSlug" value="" >
                <input type="hidden" id="hdfOldSlug" value="">
                <div class="loaders">
                    <img alt="Loading..." src="<?php echo base_url();?>content-admin/images/loaders/loader4.gif">
                    <span>Đang kiểm tra đường dẫn ...</span>
                </div>
                <div class="notification msgsuccess message-success">
                    <a class="close"></a>
                    <p>Bạn có thể sử dụng đường dẫn này.</p>
                </div>
                <div class="notification msgalert message-box">
                    <a class="close"></a>
                    <p>Đường dẫn đã tồn tại.</p>
                </div>
                <?php 
                    if($this->session->flashdata('message')== 'loi')
                    {
                ?>
                <div class="notification msgalert">
                    <a class="close"></a>
                    <p>Đường dẫn đã tồn tại.</p>
                </div>
                <?php
                    }
                ?>
            </div>
            <p><label>Mô tả:</label></p>                            
            <p><span class="field"><textarea name="txtexcerpt"></textarea></span></p>
            <br>
            
            <p class="stdformbutton">
                <input name="submit" value="Thêm mới" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        </div>
    <div class="list-right">
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Danh mục Tag</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/tags/delete" title="table2">Delete Selected</button> &nbsp;                           
        </div><!--tableoptions-->	
        <table id="table2" class="stdtable stdtablecb" border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">

            </colgroup>
            <thead>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên Tag</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên Tag</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach ($lstTerms as $item)
                    {                        
                ?>
                    <tr>
                        <td class="center"><input value="<?php echo $item->id;?>" type="checkbox"></td>
                        <td>
                        <?php 
                            echo $item->name;
                        ?>
                        </td>
                        <td><?php echo $item->term_taxonomy_description;?></td>
                        <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>administrator/tags/edit/<?php echo $item->id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $item->id;?>" name="delete" title="Xóa Tag" href="<?php echo base_url();?>administrator/tags/delete">Xóa</a></td>
                    </tr>   
                <?php }?>
            </tbody>
        </table>
    </div>                                  
</div><!--content-->                
