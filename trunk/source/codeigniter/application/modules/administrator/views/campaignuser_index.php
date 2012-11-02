<ul class="maintabmenu multipletabmenu">        
    <li class="current"><a href="<?php echo base_url();?>administrator/campaignusers">Tất cả thí sinh</a></li>    
</ul>
<div class="content">                                  
    <div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Danh sách thí sinh</span></h2>
    </div><!--contenttitle-->
    <div class="tableoptions">    
        <form name="frmfilter" method="post" action="<?php echo base_url();?>administrator/campaignusers/index/" >                        	
            <button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>administrator/campaignusers/delete">Delete Selected</button> &nbsp;                         
            <select name="ddlCampaign">
                <option value="0">--Chọn cuộc thi --</option>
                <?php 
                    foreach ($lstCampaign as $item)
                    {
                ?>
                <option value="<?php echo $item->id;?>" <?php if($item->id == $campaign) echo "selected='selected'" ?>><?php echo $item->name;?></option>
                <?php }?>
            </select>           
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
            <col class="con0" />
        </colgroup>
        <thead>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Mã thí sinh</th>                                
                <th class="head0">Trạng thái</th>
                <th class="head1">Ngày tham gia</th>
                <th class="head0">Lượt view</th>
                <th class="head1">Lượt bình chọn</th>
                <th class="head0">Lượt chia sẻ</th>
                <th class="head1">Lượt bình luận</th>
                <th class="head0" width="60">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Mã thí sinh</th>                                
                <th class="head0">Trạng thái</th>
                <th class="head1">Ngày tham gia</th>
                <th class="head0">Lượt view</th>
                <th class="head1">Lượt bình chọn</th>
                <th class="head0">Lượt chia sẻ</th>
                <th class="head1">Lượt bình luận</th>
                <th class="head0" width="60">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>                               	
            <?php 
                foreach ($lstCampaignUser as $campaignUser)
                {
            ?>
            <tr>
                <td class="center"><input value="<?php echo $campaignUser->id;?>" type="checkbox"></td>
                <td><?php echo $campaignUser->code;?></td>
                <td><?php echo $campaignUser->status;?></td>
                <td><?php echo date_format(date_create($campaignUser->created_date),'d-m-Y H:i:s');?></td>
                <td><?php echo $campaignUser->view;?></td>
                <td><?php echo $campaignUser->vote;?></td>
                <td><?php echo $campaignUser->share;?></td>
                <td><?php echo $campaignUser->comment;?></td>                
                <td class="center">
                    <a class="edit" href="<?php echo base_url();?>administrator/campaignusers/edit/<?php echo $campaignUser->id;?>">Sửa</a> &nbsp; 
                    <a class="delete" name="delete_post" id="<?php echo $campaignUser->id;?>" href="<?php echo base_url();?>administrator/campaignusers/delete">Xóa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>    
    
</div><!--content-->