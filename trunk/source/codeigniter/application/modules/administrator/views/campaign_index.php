<ul class="maintabmenu multipletabmenu">        
    <li class="current"><a href="<?php echo base_url();?>administrator/campaigns">Tất cả cuộc thi</a></li>
    <li><a href="<?php echo base_url();?>administrator/campaigns/add">Thêm mới cuộc thi</a></li>    
</ul>
<div class="content">                                  
    <div class="contenttitle radiusbottom0">
        <h2 class="table"><span>Danh sách cuộc thi</span></h2>
    </div><!--contenttitle-->
    <div class="tableoptions">                               	
        <button class="deletebutton radius3" title="table2" name="delete_post" value="<?php echo base_url();?>administrator/campaigns/delete">Delete Selected</button> &nbsp;                         
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
                <th class="head1">Tên</th>                                
                <th class="head0">Mô tả</th>
                <th class="head1">Thời gian bắt đầu</th>
                <th class="head0">Thời gian kết thúc</th>
                <th class="head1">Ngày cập nhật</th>
                <th class="head0" width="60">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0" width="10"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Tên</th>                                
                <th class="head0">Mô tả</th>
                <th class="head1">Thời gian bắt đầu</th>
                <th class="head0">Thời gian kết thúc</th>
                <th class="head1">Ngày cập nhật</th>
                <th class="head0" width="60">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>                               	
            <?php 
                foreach ($lstCampaign as $campaign)
                {
            ?>
            <tr>
                <td class="center"><input value="<?php echo $campaign->id;?>" type="checkbox"></td>
                <td><?php echo $campaign->name;?></td>
                <td><?php echo $campaign->summary;?></td>
                <td><?php echo date_format(date_create($campaign->start_date),'d-m-Y H:i:s');?></td>
                <td><?php echo date_format(date_create($campaign->end_date),'d-m-Y H:i:s');?></td>
                <td><?php echo date_format(date_create($campaign->update_date),'d-m-Y H:i:s');?></td>
                <td class="center">
                    <a class="edit" href="<?php echo base_url();?>administrator/campaigns/edit/<?php echo $campaign->id;?>">Sửa</a> &nbsp; 
                    <a class="delete" name="delete_post" id="<?php echo $campaign->id;?>" href="<?php echo base_url();?>administrator/campaigns/delete">Xóa</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>    
    <?php echo $list_link;?>
</div><!--content-->