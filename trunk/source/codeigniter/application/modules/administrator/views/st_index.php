<ul class="maintabmenu multipletabmenu">        
    <li  class="current"><a href="<?php echo base_url();?>administrator/students">Quan li sinh vien.</a></li>    
</ul>
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/students" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Ten sinh vien:</label></p>
            <p><span class="field"><input name="txtname" value="" id="txtname" class="longinput validate[required]" type="text"></span></p>
            <br>
			
            <p><label>Mat khau:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtpass" type="text"></span></p>
            <br>  
			
			<p><label>Tuoi:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtage" type="text"></span></p>
            <br>   
         	
            <p class="stdformbutton">
                <input name="submit" value="Them moi" class="submit radius2" type="submit">                                
                <input value="Huy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        </div>
    <div class="list-right">
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Danh sach sinh vien.</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/students/delete" title="table2">Delete Selected</button> &nbsp;                           
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
                    <th class="head1">Ten sinh vien</th>
                    <th class="head0">Mat khau</th>
					<th class="head0">Tuoi</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Ten sinh vien</th>
                    <th class="head0">Mat khau</th>
					<th class="head0">Tuoi</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach ($lststudent as $student)
                    {
                ?>
                <tr>
                    <td class="center"><input value="<?php echo $student->id;?>" type="checkbox"></td>
                    <td>
                    <?php 
                        echo $student->name;
                    ?>
                    </td>
                    <td><?php echo $student->pass;?></td>
					<td><?php echo $student->age;?></td>
					<td><a href="<?php echo base_url();?>administrator/students/delete/<?php echo $student->id;?>">Xoa</a></td>
                    <td class="center"><a class="edit" title="Sua" href="<?php echo base_url();?>administrator/students/edit/<?php echo $student->id;?>">Sua</a> &nbsp; <a class="delete" id="<?php echo $student->id;?>" name="delete" title="Xoa danh muc" href="<?php echo base_url();?>administrator/students/delete/<?php echo $student->id;?>">Xoa</a></td>
                </tr>  
                <?php
                    }
                ?>
            </tbody>
           
        </table>         
    </div>                                  
</div><!--content-->                
