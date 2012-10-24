
<ul class="maintabmenu multipletabmenu">
    <li class="current"><a href="<?php echo base_url();?>administrator/roles">Cập nhật Roles</a></li>
    <li><a href="<?php echo base_url();?>administrator/tasks/">Tasks</a></li>   
    <li><a href="<?php echo base_url();?>administrator/operations">Operations</a></li>
</ul>
<div class="content">    
    
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/roles/edit" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
                <input type="hidden" id="hdfID" name="hdfID" value="<?php echo $authitem->id;?>"/>
                <p><label>Tên task:</label></p>
                <p><span class="field"><input name="txttitle" value="<?php echo $authitem->name;?>" id="txttitle" class="longinput validate[required]" type="text"></span></p>
                <br>              
                <p><label>Mô tả:</label></p>                            
                <p><span class="field"><textarea name="txtexcerpt"><?php echo $authitem->description;?></textarea></span></p>
                <br>  
                <p><label>Add Child:</label></p>                            
                <p>
                    <select id="ddlAuth" name="ddlAuth" class="select" style="min-width: 75%;">
                        <optgroup label="Roles">
                            <?php foreach ($lstRole as $role){ if($role->id!=$authitem->id){?>
                            <option title="<?php echo $role->description;?>" value="<?php echo $role->id?>"><?php echo $role->name;?></option>
                            <?php }}?>
                        </optgroup>
                        <optgroup label="Tasks">
                            <?php foreach ($lstTask as $task){ ?>
                            <option title="<?php echo $task->description;?>" value="<?php echo $task->id?>"><?php echo $task->name;?></option>
                            <?php }?>
                        </optgroup>
                        <optgroup label="Operations">
                            <?php foreach ($lstOperation as $operation){?>
                            <option title="<?php echo $operation->description;?>" value="<?php echo $operation->id?>"><?php echo $operation->name;?></option>
                            <?php }?>
                        </optgroup>
                    </select>
                    &nbsp;
                    <button id="btnAddChildTask" typeauth="roles" baselink="<?php echo base_url();?>" urllink="<?php echo base_url();?>administrator/roles/addChild" class="stdbtn btn_black" style="opacity: 1;">Add Child</button>
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
            <h2 class="table"><span>Parent Relation</span></h2>
        </div><!--contenttitle-->        	
        <table id="table2" class="stdtable stdtablecb" border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                
                <col class="con1">
                <col class="con0">
                <col class="con1">

            </colgroup>
            <thead>
                <tr>
                    
                    <th class="head1">Tên</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    
                    <th class="head1">Tên</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($lstParent as $parent){?>
                <?php $item =  new Authitem(); $item->where('id',$parent->parent_id)->get();?>
                <tr>
                    
                        <td>
                        <?php 
                            echo $item->name;
                        ?>
                        </td>
                        <td><?php echo $item->description;?></td>
                        <td class="center">                            
                            
                        </td>
                </tr>
                <?php }?>
            </tbody>
        </table> 
        <br>
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Child Relation</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebuttonchild radius3" name="delete_term" value="<?php echo base_url();?>administrator/roles/deletechild" title="tblChildTask">Remove Selected</button> &nbsp;                           
        </div><!--tableoptions-->	
        <table id="tblChildTask" class="stdtable stdtablecb" border="0" cellpadding="0" cellspacing="0">
            <colgroup>
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">

            </colgroup>
            <thead>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên Task</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên Task</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody id="tbodyChildTask">
                <?php foreach ($lstOperationChild as $child){?>
                <tr>
                    <td class="center"><input value="<?php echo $child->id;?>" type="checkbox"></td>
                        <td>
                        <?php 
                            echo $child->name;
                        ?>
                        </td>
                        <td><?php echo $child->description;?></td>
                        <td class="center">                            
                            <a class="deletechild" id="<?php echo $child->id;?>" name="delete" title="Remove Child" href="<?php echo base_url();?>administrator/roles/deletechild">Remove</a>
                        </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>                                  
</div><!--content-->                

