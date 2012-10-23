<ul class="maintabmenu multipletabmenu">
    <li><a href="<?php echo base_url();?>administrator/roles">Roles</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/tasks/">Cập nhật Tasks</a></li>   
    <li><a href="<?php echo base_url();?>administrator/operations">Operations</a></li>
</ul>
<div class="content">    
    
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/tasks/edit" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
                <input type="hidden" name="hdfID" value="<?php echo $authitem->id;?>"/>
                <p><label>Tên task:</label></p>
                <p><span class="field"><input name="txttitle" value="<?php echo $authitem->name;?>" id="txttitle" class="longinput validate[required]" type="text"></span></p>
                <br>              
                <p><label>Mô tả:</label></p>                            
                <p><span class="field"><textarea name="txtexcerpt"><?php echo $authitem->description;?></textarea></span></p>
                <br>  
                <p><label>Add Child:</label></p>                            
                <p>
                    <select name="ddlAuth" class="select" style="min-width: 75%;">
                        <optgroup label="Tasks">
                            <?php foreach ($lstTask as $task){ if($task->id!=$authitem->id){?>
                            <option value="<?php echo $task->id?>"><?php echo $task->name;?></option>
                            <?php }}?>
                        </optgroup>
                        <optgroup label="Operations">
                            <?php foreach ($lstOperation as $operation){?>
                            <option value="<?php echo $operation->id?>"><?php echo $operation->name;?></option>
                            <?php }?>
                        </optgroup>
                    </select>
                    &nbsp;
                    <button id="btnAddChildTask" class="stdbtn btn_black" style="opacity: 1;">Add Child</button>
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
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">

            </colgroup>
            <thead>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên</th>
                    <th class="head0">Mô tả</th>
                    <th class="head0">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
               
            </tbody>
        </table> 
        <br>
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Child Relation</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/tasks/delete" title="table2">Delete Selected</button> &nbsp;                           
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
            <tbody>
               
            </tbody>
        </table>
    </div>                                  
</div><!--content-->                

