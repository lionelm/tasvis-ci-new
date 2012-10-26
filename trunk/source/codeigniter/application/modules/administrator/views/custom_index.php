<ul class="maintabmenu multipletabmenu">        
    <li class="current"><a href="<?php echo base_url();?>administrator/customs">Custom Field Type</a></li>    
</ul>          
     
<div class="content">              	                            
    <div class="contenttitle radiusbottom0">
    <h2 class="table"><span>List Of Custom Field Type</span></h2>
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
                <th class="head0" width="30">&nbsp;</th>
                <th class="head1" width="100">Field type</th>                                
                <th class="head0">Desciption</th>                
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="head0" width="30">&nbsp;</th>
                <th class="head1" width="100">Field type</th>                                
                <th class="head0">Desciption</th>                
                <th class="head1" width="60">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>                               	
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/checkbox">
                        <img src="<?php echo base_url();?>content-admin/images/checkbox_1.png"/>
                    </a>
                </td>
                <td>
                    Checkbox
                </td>
                <td>
                    <p>
                        Checkbox fields implement the standard <?php echo htmlspecialchars('<input="checkbox">');?> element."Extra" parameters, e.g. "alt" can be specified in the definition.                    
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/checkbox"" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/colorpicker">
                        <img src="<?php echo base_url();?>content-admin/images/colorselector.png"/>
                    </a>
                </td>
                <td>
                    Color Picker
                </td>
                <td>
                    <p>
                        Color Picker fields implement a <?php echo htmlspecialchars('<input type="color">');?> element with a special Javascript color selection popup.                      
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/colorpicker" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/datetime">
                        <img src="<?php echo base_url();?>content-admin/images/date.png"/>
                    </a>
                </td>
                <td>
                    Date and Time
                </td>
                <td>
                    <p>
                        Use these fields to store dates and times.
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/datetime" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/dropdown">
                        <img src="<?php echo base_url();?>content-admin/images/dropdown.png"/>
                    </a>
                </td>
                <td>
                    Dropdown
                </td>
                <td>
                    <p>
                        Dropdown fields implement a <?php echo htmlspecialchars('<select>') ?> element which lets you select a single item. "Extra" parameters, e.g. "alt" can be specified in the definition.
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/dropdown" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/hidden">
                        <img src="<?php echo base_url();?>content-admin/images/hidden.png"/>
                    </a>
                </td>
                <td>
                    Hidden
                </td>
                <td>
                    <p>
                        Hidden fields implement the standard <?php echo htmlspecialchars('<input="hidden">') ?> element. They can be used to store data programmatically, out of view from users.
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/hidden" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/image">
                        <img src="<?php echo base_url();?>content-admin/images/image.png"/>
                    </a>
                </td>
                <td>
                    Image
                </td>
                <td>
                    <p>
                        Image fields are used to store references to any image that has been uploaded via the media uploader. 
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/image" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/media">
                        <img src="<?php echo base_url();?>content-admin/images/media.png"/>
                    </a>
                </td>
                <td>
                    Media
                </td>
                <td>
                    <p>
                        Media fields are used to store references to any type of media file that has been uploaded via the media uploader, e.g. images, videos, mp3s.
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/media" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/multiselect">
                        <img src="<?php echo base_url();?>content-admin/images/multiselect.png"/>
                    </a>
                </td>
                <td>
                    Multiselect
                </td>
                <td>
                    <p>
                        Multi-select fields implement a <?php echo htmlspecialchars('<select>') ?> element which lets you select mutliple items. "Extra" parameters, e.g. "size" can be specified in the definition.
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/multiselect" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/text">
                        <img src="<?php echo base_url();?>content-admin/images/text.png"/>
                    </a>
                </td>
                <td>
                    Text
                </td>
                <td>
                    <p>
                        Text fields implement the standard <?php echo htmlspecialchars('<input="text">') ?> element. "Extra" parameters, e.g. "size" can be specified in the definition. 
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/text" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/textarea">
                        <img src="<?php echo base_url();?>content-admin/images/textarea.png"/>
                    </a>
                </td>
                <td>
                    Textarea
                </td>
                <td>
                    <p>
                        Textarea fields implement the standard <?php echo htmlspecialchars('<textarea>') ?> element. "Extra" parameters, e.g. "cols" can be specified in the definition.
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/textarea" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="<?php echo base_url();?>administrator/customs/wysiwyg">
                        <img src="<?php echo base_url();?>content-admin/images/wysiwyg.png"/>
                    </a>
                </td>
                <td>
                    Wysiwyg
                </td>
                <td>
                    <p>
                        What-you-see-is-what-you-get (WYSIWYG) fields implement a <?php echo htmlspecialchars('<textarea>') ?> element with formatting controls. "Extra" parameters, e.g. "cols" can be specified in the definition, however a minimum size is required to make room for the formatting controls. 
                    </p>
                </td>
                <td>
                    <a class="btn btn2 btn_archive" href="<?php echo base_url();?>administrator/customs/wysiwyg" style="background-color: rgb(247, 247, 247);">
                        <span>Create</span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>        
</div><!--content-->