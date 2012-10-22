<ul class="maintabmenu">
    <li class="current"><a href="<?php echo base_url();?>administrator/menus/index">Main Menu</a></li>
	<li class=""><a href="<?php echo base_url();?>administrator/menus/menu">Menu Detail</a></li>
</ul><!--maintabmenu-->

<div class="content">
    <div class="widgetbox" style="width: 500px">
        <div class="title"><h2 class="general"><span>Create Menu</span></h2></div>
        <div class="widgetcontent stdform stdformwidget">
            <form class="stdform" action="<?php echo base_url().'administrator/menus/add_main_menu' ?>" method="post">   
                <div class="par">
                	<label>Name</label>               
                    <input type="text" name="name_menu" class="longinput" />               
                </div><!--par-->                        
               <p class="stdformbutton">
                	<button class="submit radius2">Add</button>
                    <input type="reset" class="reset radius2" value="Reset" />
                </p>
            </form>  
        </div><!--widgetcontent-->
    </div><!--widgetbox-->
    <div class="contenttitle radiusbottom0">
    	<h2 class="table"><span>List Main Menu</span></h2>
    </div><!--contenttitle-->
           
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
                <td><?php echo $term->name; ?></td>
                <td>English</td>                                
                <td class="center"><a href="" class="edit">Edit</a> &nbsp; <a href="" class="delete">Delete</a></td>
            </tr>
            
            <?php }?>
        </tbody>
          
    </table>     
         
</div><!--content-->