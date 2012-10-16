<ul class="maintabmenu multipletabmenu">        
    <li  class="current"><a href="<?php echo base_url();?>administrator/languages">Quản lý ngôn ngữ</a></li>    
</ul>
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/languages" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
            <p><label>Tên ngôn ngữ:</label></p>
            <p><span class="field"><input name="txttitle" value="" id="txttitle" class="longinput validate[required]" type="text"></span></p>
            <br>
            <p><label>Mã ngôn ngữ:</label></p>
            <p><span class="field"><input class="longinput validate[required]" name="txtcode" type="text"></span></p>
            <br>            
            <p class="stdformbutton">
                <input name="submit" value="Thêm mới" class="submit radius2" type="submit">                                
                <input value="Hủy" class="reset radius2" type="reset">
            </p>                            
        </form>                                        </div>
    <div class="list-right">
        <div class="contenttitle radiusbottom0">
            <h2 class="table"><span>Danh sách ngôn ngữ</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/languages/delete" title="table2">Delete Selected</button> &nbsp;                           
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
                    <th class="head1">Tên ngôn ngữ</th>
                    <th class="head0">Mã ngôn ngữ</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Tên ngôn ngữ</th>
                    <th class="head0">Mã ngôn ngữ</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach ($lstLang as $lang)
                    {
                ?>
                <tr>
                    <td class="center"><input value="<?php echo $lang->id;?>" type="checkbox"></td>
                    <td>
                    <?php 
                        echo $lang->name;
                    ?>
                    </td>
                    <td><?php echo $lang->code;?></td>
                    <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>administrator/languages/edit/<?php echo $lang->id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $lang->id;?>" name="delete" title="Xóa danh mục" href="<?php echo base_url();?>administrator/languages/delete">Xóa</a></td>
                </tr>  
                <?php
                    }
                ?>
            </tbody>
           
        </table>         
    </div>                                  
</div><!--content-->                
