
<ul class="maintabmenu multipletabmenu">     
    <li class="current"><a href="<?php echo base_url();?>administrator/users">Tất cả người dùng</a></li>
    <li><a href="<?php echo base_url();?>administrator/users/add">Thêm mới người dùng</a></li>    
</ul>    

<div class="content">                	
       <div class="contenttitle radiusbottom0">        
            <h2 class="table"><span>Danh sách người dùng</span></h2>
        </div><!--contenttitle-->
        <div class="tableoptions">
           
           
           
        <form name="frmfilter" method="post" action="<?php echo base_url();?>administrator/users/index/" >                        	
            <button class="deletebutton radius3" name="delete_term" value="<?php echo base_url();?>administrator/users/delete" title="table2">Delete Selected</button> &nbsp;               
                
                               
                <select name="slrole">
                    <option value="0">-- Tất cả --</option>
                    <?php foreach($lstrole as $rl){ ?>
                    <option value="<?php echo $rl->id;  ?>" <?php if($rl->id == $role) echo "selected='selected'";?> > <?php echo $rl->name; ?></option>
                    <?php } ?>
                </select>
            <input type="text" name="txtkeyword" value="<?php if($keyword != '~') echo $keyword; ?>" class="input-keyword">&nbsp;
           
            <input type="submit" class="btn" value="Tìm kiếm"/>
        </form>
        
        
        
    
        
        
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
                    <th class="head1">Họ tên</th>
                    <th class="head0">Tên truy cập</th>                    
                    <th class="head0">Email</th>
                    <th class="head0">Quyền</th>
                    <th class="head0">Trạng thái</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="head0" width="10"><input class="checkall" type="checkbox"></th>
                    <th class="head1">Họ tên</th>
                    <th class="head0">Tên truy cập</th>                    
                    <th class="head0">Email</th>
                    <th class="head0">Quyền</th>
                    <th class="head0">Trạng thái</th>
                    <th class="head0" width="60">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    foreach ($lstuser as $user)
                    {
                ?>
                <tr>
                    <td class="center"><input value="<?php echo $user->id;?>" type="checkbox"></td>
                    <td>
                    <?php 
                        echo $user->user_nicename;
                    ?>
                    </td>
                    <td><?php echo $user->user_login;?></td>                    
                    <td><?php echo $user->user_email;?></td>   
                    
                          
                          <!-- dạng checkbox -->            
                    <td><?php 
                    
                        // lấy tất cả role cho user này.
                     $user->authitem->include_join_fields()->get();
                     foreach($user->authitem as $authitem_role)
                     {
                        echo "<a href=''>".$authitem_role->name."</a>";
                        echo "&nbsp; &nbsp; &nbsp;";
                     }
                     ?></td>
                        
                    <td><?php if($user->user_status == 1)
                                {
                                    echo "<font color='green'> Active </font>";
                                }
                                else{
                                    echo "<font color='red'> Pending... </font>";
                                }
                        ?></td>                 
                    <td class="center"><a class="edit" title="Sửa" href="<?php echo base_url();?>administrator/users/edit/<?php echo $user->id;?>">Sửa</a> &nbsp; <a class="delete" id="<?php echo $user->id;?>" name="delete" title="Xóa" href="<?php echo base_url();?>administrator/users/delete/">Xóa</a></td>
                </tr>  
                <?php
                    }
                ?>
            </tbody>
           
        </table>         
        <?php echo $list_link;?>                          
</div><!--content-->                
