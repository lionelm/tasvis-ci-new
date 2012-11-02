<ul class="maintabmenu multipletabmenu">        
    <li><a href="<?php echo base_url();?>administrator/customs">Custom field list</a></li>
    <li class="current"><a href="<?php echo base_url();?>administrator/customs/text">Create custom text</a></li>    
</ul>
<div class="content">    
    <table class="custom_field_info">
        <tbody>
            <tr>
                <td colspan="2">
                    <h3 class="field_type_name">Text</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="custom_field_icon"><img id="cctm-field-icon-text" class="cctm-field-icon" src="<?php echo base_url();?>content-admin/images/text.png"></span>
                </td>
                <td>
                    <span class="custom_field_description">
                        Text fields implement the standard &lt;input="text"&gt; element. "Extra" parameters, e.g. "size" can be specified in the definition.                        
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <form class="stdform" id="formID" accept-charset="utf-8" method="post" action="<?php echo base_url();?>/administrator/customs/text">
        <div class="edit-left">                            		
            <p><label>Label:</label></p>
            <p><span class="field"><input type="text" class="longinput validate[required]" id="txttitle" value="" name="txtLabel"></span></p>
            <br>
            <p><label>Name:</label></p>
            <p><span class="field"><input type="text" name="txtName" class="longinput validate[required]"></span></p>
            <br>
            <p><label>Default value:</label></p>                            
            <p><span class="field"><input type="text" name="txtDefault" class="longinput"></span></p>
            <br> 
            <p><label>Extra:</label></p>                            
            <p><span class="field"><input type="text" name="txtExtra" class="longinput"></span></p>
            <br>
            <p><label>Class:</label></p>                            
            <p><span class="field"><input type="text" name="txtClass" class="longinput"></span></p>
            <br>
            <p><label>Description:</label></p>                            
            <p><span class="field"><textarea name="txtDescription"></textarea></span></p>
            <br>
            <p class="stdformbutton">
                <input type="submit" class="submit radius2" value="Thêm mới" name="submit">                                
                <input type="reset" class="reset radius2" value="Hủy">
            </p>                                                   
        </div>     
        <div class="edit-right" style="width: 57%;">
            <p><label for="checkRepeatable"><b>Is Repeatable?</b></label></p> 
            <p>
                <span class="checkbox">
                    <input type="checkbox" name="checkRepeatable" id="checkRepeatable">
                </span>
                If selected, the user will be able to enter multiple instances of this field, e.g. multiple images. Storing multiple values infers storing an array of values, so you will have to use the "to_array" output filter, even if you only use one instance of the field.
            </p>
            <br>
            <p><label for="checkRequired"><b>Required?</b></label></p> 
            <p>
                <span class="checkbox">
                    <input type="checkbox" name="checkRequired" id="checkRequired">
                </span>
                If checked, users must add a value to this field before the page can be published.
            </p>
            <br>
            <p><label for="selectValidate"><b>Validate Rule?</b></label></p> 
            <p>
                <span class="field">
                    <select name="selectValidate">
                        <option value="">-- None --</option>
                        <option value="email">Email</option>
                        <option value="number">Number</option>
                        <option value="url">Url</option>                        
                    </select>
                </span>                
            </p>
            <br>
            <p><label><b>Apply for?</b></label></p> 
            <p>
                <span class="formwrapper" style="margin-left: 0px;">
                    <span class="checkbox"><input type="checkbox" value="true" name="checkPost"></span> Post &nbsp;&nbsp;
                    <span class="checkbox"><input type="checkbox" value="true" name="checkPage"></span> Page &nbsp;&nbsp;                    
                </span>                
            </p>
        </div>        
    </form>    
</div>