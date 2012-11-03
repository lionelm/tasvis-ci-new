jQuery.noConflict();
jQuery(document).ready(function(){
    //Validate function
    jQuery("#formID").validationEngine();
    
    //Login Form    
    jQuery("#link-login").colorbox({
        rel: 'colorbox',
        inline:true,
        html: true,        
        maxWidth:'780px',        
        opacity:0.8,
        open:false,
        returnFocus:false,
        fixed: false,
        title: false,
        transition:'elastic',
        overlayClose:true
    });
    
});

function checkExitUser(inputString)
{
    var url = jQuery("#txtlogin").attr("urllink");
    if(inputString.length>0)
    {
        jQuery.post(url,{username:inputString},function(data) {
            if(data=='1')
            {
                jQuery("#checkExistUser").show();
                jQuery("#successUser").hide();            
            }
            else
            {
                jQuery("#checkExistUser").hide();
                jQuery("#successUser").show();  
            }
        });
    }
    
}

function checkExitEmail(inputString)
{
    var url = jQuery("#txtEmail").attr("urllink");
    
    if(inputString.length>0)
    {
        jQuery.post(url,{email:inputString},function(data) {
            if(data=='1')
            {
                jQuery("#checkExistEmail").show();
                //jQuery("#successEmail").hide();            
            }
            else
            {
                jQuery("#checkExistEmail").hide();
                //jQuery("#successEmail").show();  
            }
        });
    }
    
}