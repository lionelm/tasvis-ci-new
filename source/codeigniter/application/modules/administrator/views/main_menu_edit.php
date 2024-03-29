<ul class="maintabmenu">
    <li class="current"><a href="<?php echo base_url();?>administrator/menus/index">Main Menu</a></li>	
</ul><!--maintabmenu-->

<div class="content">
    <div class="widgetbox" style="width: 500px">
        <div class="title"><h2 class="general"><span>Create Menu</span></h2></div>
        <div class="widgetcontent stdform stdformwidget">
            <form class="stdform" action="<?php echo base_url().'administrator/menus/edit_main_menu' ?>" method="post">   
                <div class="par">
                	<label>Name</label>               
                    <input type="text" name="name" class="longinput" value="<?php echo $main_menu->name; ?>" />
                    <input type="hidden" name="id" value="<?php echo $main_menu->id; ?>" />               
                </div><!--par-->                        
               <p class="stdformbutton">
                	<button class="submit radius2">Update</button>
                    <input type="reset" class="reset radius2" value="Reset" />
                </p>
            </form>  
        </div><!--widgetcontent-->
    </div><!--widgetbox-->
    <div class="contenttitle radiusbottom0">
    	<h2 class="table"><span>List Main Menu</span></h2>
    </div><!--contenttitle-->
    <div class="tableoptions">
    	<button class="deletebutton radius3" title="table1">Delete Selected</button> &nbsp;
        
    </div><!--tableoptions-->	       
    <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
        <colgroup>
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            
           
        </colgroup>
        <thead>
            <tr>
            	<th class="head0"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Name</th>
                <th class="head0">Language</th>                
                
                <th class="head1">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            	<th class="head0"><input type="checkbox" class="checkall" /></th>
                <th class="head1">Name</th>                
                <th class="head0">Language</th>
                
                <th class="head1">&nbsp;</th>
            </tr>
        </tfoot>
        
        <tbody>
            <?php foreach($list_menu as $term ) {?> 
            <tr>
            	<td class="center"><input type="checkbox" /></td>
                <td><a href="<?php echo base_url().'administrator/menus/menu/'.$term->id; ?>"><?php echo $term->name; ?></a></td>
                <td>English</td>                                
                <td class="center"><a href="<?php echo base_url().'administrator/menus/edit_main_menu/'.$term->id; ?>" class="edit">Edit</a> &nbsp; <a href="<?php echo base_url().'administrator/menus/delete_main_menu' ?>" id="<?php echo $term->id; ?>" class="delete">Delete</a></td>
            </tr>
            
            <?php }?>
        </tbody>
          
    </table>     
         
</div><!--content-->