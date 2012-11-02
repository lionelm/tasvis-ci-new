<ul class="maintabmenu multipletabmenu">  
    <li ><a href="<?php echo base_url();?>administrator/users">Tất cả người dùng</a></li>
    <li><a href="<?php echo base_url();?>administrator/users/add">Thêm mới người dùng</a></li> 
    <li class="current"><a href="<?php echo base_url();?>administrator/users/edit">Cập nhật người dùng</a></li> 
</ul> 
<div class="content">                	
        <div class="edit-left">
            <form action="<?php echo base_url();?>administrator/users/edit" method="post" accept-charset="utf-8" id="formID" class="stdform">                    		
                <input type="hidden" value="<?php echo $user4->id;?>" name="txtid">
                <p><label>Họ tên</label></p>
                <p><span class="field"><input name="txtnicename" value="<?php echo $user4->user_nicename;?>" id="txtnicename" class="longinput validate[required]" type="text"></span></p>
                <br>
                
                <p><label>Tên truy cập [ Không được thay đổi ]</label></p>
                <p><span class="field"><input value="<?php echo $user4->user_login;?>" class="longinput validate[required]" disabled="disable" name="txtlogin" type="text"></span></p>
                <br>     
                
                 <p><label>Mật khẩu[ Không được thay đổi ]</label></p>
                <p><span class="field"><input value="<?php echo $user4->user_pass;?>" class="longinput validate[required]" disabled="disable"  name="txtpass" type="password"></span></p>
                <br>  
                
                <p><label>Email</label></p>
                <p><span class="field"><input value="<?php echo $user4->user_email;?>" class="longinput validate[required,custom[email]]" name="txtemail" type="text"></span></p>
                <br> 
                
                
                <!--dạng select
                 
                  <p><label>Quyền[ Roles ]</label></p>
                <p>   <select name="slrole">                    
                            <?php 
                             //foreach($lstrole as $role)
                             //{
                             ?>
                             
                            <option value="<?php //echo $role->id; ?>" 
                            <?php //if($user4->authitem_id == $role->id ){ echo " selected " ; } ?> >
                                <?php //echo $role->name; ?> 
                            </option>
                            
                            <?php //} ?>
                    
                    </select> </p>
                <br> 
                
                -->
                
                <!-- dạng checkbox -->
                <td><?php                     
                        // lấy tất cả role cho user này.
                      $user4->authitem->include_join_fields()->get();
                      $flag = false;
                      foreach($lstrole as $role){   
                        $flag = false;
                          foreach($user4->authitem as $authitem_role){ 
                      ?>
                               <?php if($authitem_role->id == $role->id) { $flag = true;}
                               }
                               if($flag == true){ ?>
                                <input type="checkbox" name="ckrole[]" value="<?php echo $role->id; ?>" checked="checked"  />  <?php echo $role->name; ?> 
                                 
                                <?php }else{ ?>
                                     <input type="checkbox" name="ckrole[]" value="<?php echo $role->id; ?>"  />  <?php echo $role->name; ?>
                              
                          <?php }}?>
                      
                     
                     </td>
                     
                   
                <p class="stdformbutton">
                    <input name="submit" value="Cập nhật" class="submit radius2" type="submit">                                
                    <input value="Hủy" class="reset radius2" type="reset">
                </p>                            
            </form>                                        
        </div>
                                
</div><!--content-->
