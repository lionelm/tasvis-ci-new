<ul class="maintabmenu">
	<li class="current"><a href="./dashboard.html">Menus</a></li>
</ul><!--maintabmenu-->

<div class="content">
    
    <div class="one_half">
        <p>
        	<label>Select</label>
            <span class="field">
            <select name="main_menu">
                <?php foreach($list_menu as $menu ) {?>
            	<option value="<?php echo $menu->id; ?>"><?php echo $menu->name ?></option>
                <?php }?>
            </select>
            </span>
        </p>
        <?php foreach ($child_menu as $term) {?>                
    	   <input type="checkbox" name="check2" value=" <?php echo  $term->id;?>"/> <?php echo $term->name;?><br />                    
        <?php } ?> 
    	<div class="widgetbox">
            <div class="title"><h2 class="general"><span>menu1</span></h2></div>
            <div class="widgetcontent">
                <p>
                	<label>URL</label>
                    <span class="field"><input type="text" name="input1" class="smallinput" /></span>                    
                </p>   
                <p>
                	<label>Label</label>
                    <span class="field"><input type="text" name="input1" class="smallinput" /></span>                    
                </p>       
            </div><!--widgetcontent-->
        </div><!--widgetbox-->
    </div><!--one_half-->
    <div class="one_third last">
    	<h2>Option</h2>
        <br />
    	<div class="widgetbox">
            <div class="title"><h2 class="general"><span>Custom Links</span></h2></div>
            <div class="widgetcontent">
                <p>
                	<label>URL</label>
                    <span class="field"><input type="text" name="input1" class="smallinput" /></span>                    
                </p>   
                <p>
                	<label>Label</label>
                    <span class="field"><input type="text" name="input1" class="smallinput" /></span>                    
                </p>       
            </div><!--widgetcontent-->
        </div><!--widgetbox-->
        <div class="widgetbox" style="width: 300px">
            <div class="title"><h2 class="tabbed"><span>Pages</span></h2></div>
            <div class="widgetcontent padding0 tab_categories">
                <div id="tabs_menu" class="ui_tabs_menu">
                    <ul  class="menu_tabs_nav">
                        <li class="tab_menu_item"><a href="#tabs-1">Products</a></li>
                        <li class="tab_menu_item"><a href="#tabs-2">Posts</a></li>
                        <li class="tab_menu_item"><a href="#tabs-3">Media</a></li>
                    </ul>
                    <div id="tabs-1" >
                        1
                    </div>
                    <div id="tabs-2">
                        2
                    </div>
                    <div id="tabs-3">
                        3   
                    </div>
                </div><!--#tabs-->
            </div><!--widgetcontent-->
        </div><!--widgetbox-->
        <div class="widgetbox" style="width: 300px">
            <div class="title"><h2 class="tabbed"><span>Categories</span></h2></div>
            <div class="widgetcontent padding0 tab_categories">
                <div id="tabs_menu1" class="ui_tabs_menu">
                    <ul  class="menu_tabs_nav">
                        <li class="tab_menu_item"><a href="#tabs-11">Categories</a></li>
                        <li class="tab_menu_item"><a href="#tabs-21">Posts</a></li>
                        <li class="tab_menu_item"><a href="#tabs-31">Search</a></li>
                    </ul>
                    <div id="tabs-11" >    
                    <br />
                        <?php foreach ($term_option as $term) {?>                
                    	<input type="checkbox" name="check2" value=" <?php echo  $term->id;?>"/> <?php echo $term->name;?><br />                    
                        <?php } ?> 
                    </div>
                    <div id="tabs-21">
                        2
                    </div>
                    <div id="tabs-31">
                        3   
                    </div>
                </div><!--#tabs-->
                <button class="stdbtn btn_blue">Add</button>
            </div><!--widgetcontent-->
        </div><!--widgetbox-->
    </div><!--one_half-->
        
    <br clear="all" /><br />        
</div><!--content-->