<ul class="maintabmenu multipletabmenu">        
    <li  class="current"><a href="<?php echo base_url();?>administrator/donors">Quản lý nhà tài trợ</a></li>    
</ul>
<div class="content">                	
    <div class="edit-left">
        <form action="<?php echo base_url();?>administrator/donors/edit" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <input type="hidden" name="hdfID" value="<?php echo $curDonor->id;?>">
            <p><label>Tên nhà tài trợ:</label></p>
            <p><span class="field"><input name="txtname" value="<?php echo $curDonor->name;?>" id="txttitle" class="longinput validate[required]" type="text"></span></p>
            <br>
            <p><label>Mô tả:</label></p>
            <p><span class="field"><input class="longinput validate[required]" value="<?php echo $curDonor->description;?>" name="txtdesc" type="text"></span></p>
            <br>  
            <p><label>Url:</label></p>
            <p><span class="field"><input class="longinput validate[required,custom[url]" value="<?php echo $curDonor->url;?>" name="txturl" type="text"></span></p>
            <br>            
            <div class="widgetcontent" style="display: block;">
                <button id="imageUpload" class="submit radius2" >Chọn ảnh đại diện</button>
                <input type="hidden" id="featured_image" name="hdffeatured_image" value="<?php echo $curDonor->image;?>">
                <img src="<?php echo $curDonor->image;?>" id="featured_image_src" width="100%" height="auto" style="margin-bottom:10px;" />                
            </div>
            <br>
            <p><label>Cuộc thi</label></p>
            <p>
                <span class="field">
                    <select name="ddlCampaign">
                        <?php 
                            foreach ($lstCampaign as $campaign)
                            {
                        ?>
                        <option value="<?php echo $campaign->id;?>" <?php if($curDonor->campaign_id== $campaign->id) echo "selected='selected'"?>><?php echo $campaign->name;?></option>
                        <?php }?>
                    </select>
                </span>
            </p>
            <br>
            <p class="stdformbutton">
                <input name="submit" value="Cập nhật" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        
    </div>
    <div class="list-right">
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Danh sách nhà tài trợ</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/donors/delete" title="table2">Delete Selected</button> &nbsp;                           
        </div><!--tableoptions-->	
        <table id="table2" class="stdtable stdtablecb" border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
            </colgroup>
            <thead>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên nhà tài trợ</th>
                    <th class="head0">Mô tả</th>
                    <th class="head1">Url</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên nhà tài trợ</th>
                    <th class="head0">Mô tả</th>
                    <th class="head1">Url</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
               <?php foreach ($lstDonor as $donor){?>
                <tr>
                    <td class="center"><input value="<?php echo $donor->id;?>" type="checkbox"></td>
                    <td>
                    <?php 
                        echo $donor->name;
                    ?>
                    </td>
                    <td><?php echo $donor->description;?></td>
                    <td><?php echo $donor->url;?></td>
                    <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>administrator/donors/edit/<?php echo $donor->id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $donor->id;?>" name="delete" title="Xóa danh mục" href="<?php echo base_url();?>administrator/donors/delete">Xóa</a></td>
                </tr>
                <?php }?>
            </tbody>
           
        </table>   
        <?php echo $list_link;?>
    </div>                                  
</div><!--content-->                
