<ul class="maintabmenu multipletabmenu">                	
    <li class="current"><a href="<?php echo base_url();?>administrator/comments">Cập nhật bình luận</a></li>                    
</ul>
<div class="content">            
    <form method="post" action="<?php echo base_url();?>administrator/comments/edit" class="stdform" id="formID">                             
        <div class="edit-main">                    	                    	                            
            <input type="hidden" value="<?php echo $Comment->id;?>" name="comment_id" />
            <p><label>Tiêu đề:</label></p>
            <p><span class="field"><input type="text" class="longinput validate[required]" name="txttitle" value="<?php echo $Comment->comment_agent;?>"></span></p>
            <br/>
            <p><label>Người đăng:</label></p>                            
            <p><span class="field"><input type="text" readonly="readonly" class="longinput" name="txtauthor" value="<?php echo $Comment->comment_author;?>" ></span></p>
            <br/>
            <p><label>Email:</label></p>                            
            <p><span class="field"><input type="text" readonly="readonly" class="longinput" name="txtemail" value="<?php echo $Comment->comment_author_email;?>" ></span></p>
            <br/>
            <p><label>Nội dung:</label></p>                            
            <p><textarea name="txtcontent" id="txtcontent" class="validate[required]"><?php echo $Comment->comment_content;?></textarea></p>
            <br/>
            <p><label>Trạng thái:</label></p>
            <p>
                <select name="slStatus">                       
                    <option value="approved" <?php if($Comment->comment_approved == 'approved') echo "selected='selected'";?>>Phê duyệt</option>
                    <option value="pending" <?php if($Comment->comment_approved == 'pending') echo "selected='selected'";?>>Chưa phê duyệt</option>                       
                    <option value="spam" <?php if($Comment->comment_approved == 'spam') echo "selected='selected'";?>>Spam</option>                       
                    <option value="trash" <?php if($Comment->comment_approved == 'trash') echo "selected='selected'";?>>Trash</option>                       
                </select>
            </p>
            <br/>
            <p>
                <button class="submit radius2">Cập nhật</button>
                <input type="reset" value="Hủy" onclick="javascript:history.back(-1);" class="reset radius2">
            </p>
    </div>
   
</form>    
             
</div><!--content-->