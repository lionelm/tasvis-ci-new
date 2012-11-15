<ul class="maintabmenu">
    <li class=""><a href="<?php echo base_url();?>administrator/menus/index">Main Menu</a></li>
	<li class="current"><a href="<?php echo base_url();?>administrator/menus/menu/<?php echo $object_id; ?>">Menu Detail</a></li>
</ul><!--maintabmenu-->

<div class="content">
    <input type="hidden" value="<?php echo base_url()?>" id="base_url" />
    <input type="hidden" value="<?php echo $object_id; ?>" id="object_id" />
    <div class="one_half menu_add_new">
        <h2><?php  echo $name_main_menu;?></h2>
        <br />
        <?php if (count($child_menu)>0)  foreach ($child_menu as $menu) {            
            if ($menu->type == 'custom'){
        ?>                    	                              
    	<div class="widgetbox" id="menu_item_<?php echo $menu->id; ?>" >
            <form class="stdform" action="<?php echo base_url().'administrator/menus/save_detail/'.$object_id ?>" method="post">   
                <div class="title1"><h2 class="general"><span><?php echo $menu->label_display; ?><input type="text" name="order" class="order_menu" size="1" value="<?php echo $menu->order; ?>"/></span></h2></div>
                <div class="widgetcontent menu_detail">
                    <p>
                    	<label>Menu ID: <?php echo $menu->id; ?> </label>
                        <input type="hidden" name="id" class="smallinput" value="<?php echo $menu->id; ?>" id="id<?php echo $menu->id; ?>"/>                    
                    </p>
                    <p>
                    	<label>URL:</label>
                        <span class="field"><input type="text" name="url" class="smallinput" value="<?php echo $menu->url; ?>" id="url<?php echo $menu->id; ?>"/></span>                    
                    </p>   
                    <p>
                    	<label>Label:</label>
                        <span class="field"><input type="text" name="label" class="smallinput" value="<?php echo $menu->label; ?>" id="label<?php echo $menu->id; ?>"/></span>                    
                    </p> 
                    <p>
                        <label>Status:</label>
                        <span class="field"><input type="text" name="status" class="smallinput" value="<?php echo $menu->status; ?>" id="status<?php echo $menu->id; ?>"/></span>
                    </p>
                    <p><label>Parent:</label></p>                            
                    <p>
                        <select name="parent" id="parent<?php echo $menu->id; ?>">
                            <option value="<?php echo $menu->parent; ?>">-- Không thay đổi --</option>
                            <?php 
                                foreach ($parent_option as $term)
                                {
                                    if($term->id != $menu->id)
                                    {
                            ?>
                                    <option value="<?php echo $term->id;?>"><?php echo $term->label_display;?></option>
                            <?php   } else
                                    {
                            ?>
                                    <option value="<?php echo $menu->parent;?>"><?php echo $term->label_display;?></option>
                            <?php   }                                                        
                                }
                            ?>                    
                        </select>
                    </p>
                    <p>
                    	<label>Title Attribute:</label>
                        <span class="field"><input type="text" name="title_attribute" class="smallinput" value="<?php echo $menu->title_attribute; ?> " id="title_attribute<?php echo $menu->id; ?>"/></span>                    
                    </p>      
                    <p>
                        <label>Open link in a new window/tab:</label>
                        <input id="open_link<?php echo $menu->id; ?>" type="checkbox" name="open_link" value=" <?php echo '1';?>" <?php if ($menu->open_link == 1 ) echo 'checked';?>/> <?php ?><br />
                    </p>
                    <p>
                        <label>CSS Class:</label>
                        <span class="field"><input id="css_class<?php echo $menu->id; ?>" type="text" name="css_class" class="smallinput" value="<?php echo $menu->css_class; ?>"/></span>
                    </p>
                    <input type="hidden" value="custom" name="type" />
                    <input type="hidden" value="<?php echo $object_id?>" name="object_id" />
                    <p class="btn_menu">
                    	<button class="submit radius2" name="submit">Save</button>
                        <input type="reset" class="reset radius2" value="Reset" />
                        <button id="btn_delete_menu" value="<?php echo $menu->id; ?>" class="stdbtn btn_red">Delete</button>
                        
                    </p>
                </div><!--widgetcontent-->                                
            </form>
        </div><!--widgetbox-->
        <?php } elseif ($menu->type == 'page'){?>
        <div class="widgetbox" id="menu_item_<?php echo $menu->id; ?>">
            <form class="stdform" action="<?php echo base_url().'administrator/menus/save_detail/'.$object_id ?>" method="post">
            <div class="title1"><h2 class="general"><span><?php echo $menu->label_display; ?><input type="text" name="order" class="order_menu" size="1" value="<?php echo $menu->order; ?>" /></span></h2></div>
            <div class="widgetcontent menu_detail">
                  
                <p>
                    	<label>Menu ID: <?php echo $menu->id; ?> </label>
                        <input type="hidden" name="id" class="smallinput" value="<?php echo $menu->id; ?>" />                    
                </p>
                <p>
                	<label>Original:</label>
                    <span class="field"><input type="text" name="post_id" class="smallinput" value="<?php echo $menu->post_id; ?>"/></span>                    
                </p>   
                <p>
                	<label>Label:</label>
                    <span class="field"><input type="text" name="label" class="smallinput" value="<?php echo $menu->label; ?>" /></span>                    
                </p> 
                <p>
                    <label>Status:</label>
                    <span class="field"><input type="text" name="status" class="smallinput" value="<?php echo $menu->status; ?>"/></span>
                </p>
                <p><label>Parent:</label></p>                            
                    <p>
                        <select name="parent">
                            <option value="<?php echo $menu->parent; ?>">-- Không thay đổi --</option>
                            <?php 
                                foreach ($parent_option as $term)
                                {
                                    if($term->id != $menu->id)
                                    {
                            ?>
                            <option value="<?php echo $term->id;?>"><?php echo $term->label_display;?></option>
                            <?php   }
                                else
                                    {?>
                                        <option value="<?php echo $menu->parent;?>"><?php echo $term->label_display;?></option>
                                    <?php 
                                    }
                                }?>                    
                        </select>
                    </p>
                <p>
                	<label>Title Attribute:</label>
                    <span class="field"><input type="text" name="title_attribute" class="smallinput" value="<?php echo $menu->title_attribute; ?>" /></span>                    
                </p>      
                <p>
                    <label>Open link in a new window/tab:</label>
                    <input type="checkbox" name="open_link" value=" <?php echo '1';?>" <?php if ($menu->open_link == 1 ) echo 'checked';?>/> <?php ?><br />
                </p>
                <p>
                    <label>CSS Class:</label>
                    <span class="field"><input type="text" name="class" class="smallinput" value="<?php echo $menu->css_class; ?>"/></span>
                </p>
                <input type="hidden" value="page" name="type" />
                <input type="hidden" value="<?php echo $object_id?>" name="object_id" />
                    <p class="btn_menu">
                    	<button class="submit radius2" name="submit">Save</button>
                        <input type="reset" class="reset radius2" value="Reset" />
                        <button id="btn_delete_menu" value="<?php echo $menu->id; ?>" class="stdbtn btn_red">Delete</button>
                    </p>
                </div><!--widgetcontent-->
                                
            </form>
        </div><!--widgetbox-->
        <?php } elseif ($menu->type == 'category'){ ?>
        <div class="widgetbox"  id="menu_item_<?php echo $menu->id; ?>">
            <form class="stdform" action="<?php echo base_url().'administrator/menus/save_detail/'.$object_id ?>" method="post">
            <div class="title1">
                <h2 class="general">
                <span><?php echo $menu->label_display; ?>
            	   <input type="text" name="order" class="order_menu" size="1" value="<?php echo $menu->order; ?>"/>                    
                </span>
                </h2>                
            </div>
            <div class="widgetcontent menu_detail">
               <p>
                    	<label>Menu ID: <b><?php echo $menu->id; ?></b> </label>
                        <input type="hidden" name="id" class="smallinput" value="<?php echo $menu->id; ?>" />                    
                </p>
                <p>
                	<label>Category: <b>
                        <?php 
                            //echo $menu->post_id;
                            $temp_cat = new Term();
                            $temp_cat->get_by_id($menu->post_id);
                            echo $temp_cat->name; 
                        ?></b>
                    </label>
                </p>   
                <p>
                	<label>Label:</label>
                    <span class="field"><input type="text" name="label" class="smallinput" value="<?php echo $menu->label; ?>" /></span>                    
                </p> 
                <p>
                    <label>Status:</label>
                    <span class="field"><input type="text" name="status" class="smallinput" value="<?php echo $menu->status; ?>"/></span>
                </p>
                <p><label>Parent:</label></p>                            
                    <p>
                        <select name="parent">
                            <option value="<?php echo '0'; ?>">-- Root --</option>
                            <?php 
                                foreach ($parent_option as $term)
                                {
                                    if($term->id != $menu->id)
                                    {
                            ?>
                                    <option value="<?php echo $term->id;?>"><?php echo $term->label_display;?></option>
                            <?php   } else
                                    {
                            ?>
                                    <option value="<?php echo $menu->parent;?>"><?php echo $term->label_display;?></option>
                            <?php 
                                    }
                                }
                            ?>                    
                        </select>
                    </p>
                <p>
                	<label>Title Attribute:</label>
                    <span class="field"><input type="text" name="title_attribute" class="smallinput" value="<?php echo $menu->title_attribute; ?>" /></span>                    
                </p>      
                <p>
                    <label>Open link in a new window/tab:</label>
                    <input type="checkbox" name="open_link" value=" <?php echo '1';?>" <?php if ($menu->open_link == 1 ) echo 'checked';?>/> <?php ?><br />
                </p>
                <p>
                    <label>CSS Class:</label>
                    <span class="field"><input type="text" name="class" class="smallinput" value="<?php echo $menu->css_class; ?>"/></span>
                </p>
                <input type="hidden" value="category" name="type" />
                <input type="hidden" value="<?php echo $object_id?>" name="object_id" />
                    <p class="btn_menu">
                    	<button class="submit radius2" name="submit">Save</button>
                        <input type="reset" class="reset radius2" value="Reset" />
                        <button id="btn_delete_menu" value="<?php echo $menu->id; ?>" class="stdbtn btn_red">Delete</button>
                    </p>
                </div><!--widgetcontent-->                                
            </form>
        </div><!--widgetbox-->
            <?php } ?>
        <?php } ?>
        
    </div><!--one_half-->
    <div class="one_third last">
    	<h2>Option</h2>
        <br />
    	<div class="widgetbox">
            <div class="title"><h2 class="general"><span>Custom Links</span></h2></div>
            <div class="widgetcontent">
                <div class="stdform">
                <p>
                	<label>URL:</label>
                    <span class="field"><input size="45" type="text" name="input1" id="txt_url" value="http://"/></span>                    
                </p>   
                <p>
                	<label>Label:</label>
                    <span class="field"><input size="45" type="text" name="input1" id="txt_label"/></span>                    
                </p>   
                </div> 
                <button id="btn_add_custom_link" class="stdbtn btn_blue">Add</button>   
            </div><!--widgetcontent-->
            
        </div><!--widgetbox-->
        <div class="widgetbox" style="width: 300px">
            <div class="title"><h2 class="tabbed"><span>Pages</span></h2></div>
            <div class="widgetcontent padding0 tab_categories">
                <div id="tabs_menu" class="ui_tabs_menu div_tabs_menu">
                    <ul  class="menu_tabs_nav">
                        <li class="tab_menu_item"><a href="#tabs-1">Pages</a></li>
                        <!--<li class="tab_menu_item"><a href="#tabs-2">Search</a></li>-->                        
                    </ul>
                    <div id="tabs-1" class="tab_option" >
                        <br />
                        <?php foreach ($lstPost as $page) {?>                
                    	<input type="checkbox" name=" <?php echo $page->post_title;?>" value=" <?php echo  $page->id;?>"/> <?php echo $page->post_title;?><br />                    
                        <?php } ?> 
                    </div>
                    <!--
                    <div id="tabs-2" class="tab_option">
                        2sssssssssssss
                    </div>
                    -->
                </div><!--#tabs-->
                <button id="btn_add_page" class="stdbtn btn_blue">Add</button>
            </div><!--widgetcontent-->
        </div><!--widgetbox-->
        <div class="widgetbox" style="width: 300px">
            <div class="title"><h2 class="tabbed"><span>Categories</span></h2></div>
            <div class="widgetcontent padding0 tab_categories">
                <div id="tabs_menu1" class="ui_tabs_menu div_tabs_menu">
                    <ul  class="menu_tabs_nav">
                        <li class="tab_menu_item"><a href="#tabs-11">Categories</a></li>
                        <!--<li class="tab_menu_item"><a href="#tabs-21">Search</a></li>-->
                       
                    </ul>
                    <div id="tabs-11"  class="tab_option">    
                    <br />
                        <?php foreach ($term_option as $term) {?>                
                    	<input type="checkbox" name=" <?php echo $term->name;?>" value=" <?php echo  $term->id;?>"/> <?php echo $term->name_display;?><br />                    
                        <?php } ?> 
                    </div>
                    <!--
                    <div id="tabs-21" class="tab_option">
                        2
                    </div>
                    -->
                </div><!--#tabs-->
                <button id="btn_add_category" class="stdbtn btn_blue">Add</button>
            </div><!--widgetcontent-->
        </div><!--widgetbox-->
    </div><!--one_half-->
        
    <br clear="all" /><br />        
</div><!--content-->