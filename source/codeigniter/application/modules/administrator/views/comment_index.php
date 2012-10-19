<ul class="maintabmenu multipletabmenu">                	
    <li class="current"><a href="<?php echo base_url();?>administrator/comments">Tất cả bình luận</a></li>                    
</ul>                
<div class="content">
        <h1 id="ajaxtitle"></h1>                       	                            
    <div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Danh sách bình luận</span></h2>
    </div><!--contenttitle-->
    <div class="tableoptions">
        <form name="frmfilter" method="post" action="<?php echo base_url();?>administrator/comments" >                        	
            <button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>admin/comments/delete">Delete Selected</button> &nbsp;
            <select class="category" name="slstatus">
                <option value="~">--- Tất cả ---</option>     
                <option value="approved" <?php if($status == 'approved') echo "selected='selected'";?>>Phê duyệt</option>                                
                <option value="pending" <?php if($status == 'pending') echo "selected='selected'";?>>Chưa phê duyệt</option>                                       
                <option value="spam" <?php if($status == 'spam') echo "selected='selected'";?>>Spam</option>
                <option value="trash" <?php if($status == 'trash') echo "selected='selected'";?>>Trash</option>
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
        </colgroup>
        <thead>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Tiêu đề</th>
                 <th class="head0">Nội dung</th>
                <th class="head1">Người đăng</th>
                <th class="head0">Email</th>
                <td class="head1">Ngày đăng</td>
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Tiêu đề</th>
                <th class="head0">Nội dung</th>
                <th class="head1">Người đăng</th>
                <th class="head0">Email</th>                                
                <td class="head1">Ngày đăng</td>
                <th class="head0" width="60">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>
            <?php 
            foreach ($lstComment as $comment)
            {
            ?>
            <tr>
                <td class="center"><input value="<?php echo $comment->id;?>" type="checkbox"></td>                
                <td><?php echo $comment->comment_agent;?></td>
                <td><?php echo $comment->comment_content?></td>
                <td><?php echo $comment->comment_author;?></td>
                <td><?php echo $comment->comment_author_email;?></td>
                <td><?php echo date_format(date_create($comment->comment_date),'d-m-Y H:i:s');?></td>
                <td class="center">
                    <a class="edit" href="<?php echo base_url();?>administrator/comments/edit/<?php echo $comment->id;?>">Sửa</a> &nbsp; 
                    <a class="delete" name="delete_post" id="<?php echo $comment->id;?>" href="<?php echo base_url();?>administrator/comments/delete">Xóa</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>    
    <?php echo $list_link;?>       
</div><!--content-->