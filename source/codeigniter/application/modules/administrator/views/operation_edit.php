<ul class="maintabmenu multipletabmenu">
    <li><a href="<?php echo base_url();?>administrator/roles">Roles</a></li>
    <li><a href="<?php echo base_url();?>administrator/tasks/">Tasks</a></li>   
    <li class="current"><a href="<?php echo base_url();?>administrator/operations">Cập nhật Operations</a></li>
</ul>
<div class="content">    
    
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/operations/edit" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
                <input type="hidden" name="hdfID" value="<?php echo $authitem->id;?>"/>
                <p><label>Tên Operation:</label></p>
                <p><span class="field"><input name="txttitle" value="<?php echo $authitem->name;?>" id="txttitle" class="longinput validate[required]" type="text"></span></p>
                <br>              
                <p><label>Mô tả:</label></p>                            
                <p><span class="field"><textarea name="txtexcerpt"><?php echo $authitem->description;?></textarea></span></p>
                <br>            
                <p class="stdformbutton">
                    <input name="submit" value="Cập nhật" class="submit radius2" type="submit">                                
                    <input value="Hủy" class="reset radius2" type="reset">
                </p>                            
            </form>                                        
        </div>
    <div class="list-right">
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Danh sách Operation</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/operations/delete" title="table2">Delete Selected</button> &nbsp;                           
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
                    <th class="head1">Tên Operation</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên Operation</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($lstAuthitem as $auth){?>
                <tr>
                    <td class="center"><input value="<?php echo $auth->id;?>" type="checkbox"></td>
                        <td>
                        <?php 
                            echo $auth->name;
                        ?>
                        </td>
                        <td><?php echo $auth->description;?></td>
                        <td class="center">
                            <a class="edit" title="Sửa" href="<?php echo base_url();?>administrator/operations/edit/<?php echo $auth->id;?>">Sửa</a> &nbsp; 
                            <a class="delete" id="<?php echo $auth->id;?>" name="delete" title="Xóa Operation" href="<?php echo base_url();?>administrator/operations/delete">Xóa</a>
                        </td>
                </tr>
                <?php } ?>
            </tbody>
        </table> 
        <?php echo $list_link;?>
    </div>                                  
</div><!--content-->                

