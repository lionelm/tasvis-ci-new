jQuery.noConflict();
jQuery(document).ready(function(){
    //Validate function
    jQuery("#formID").validationEngine();
    
    //Login Form    
    jQuery("#link-login").click(function(){
        // Getting the variable's value from a link 
        var loginBox = jQuery(this).attr('href');
        
        //Fade in the Popup and add close button
        jQuery(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = (jQuery(loginBox).height() + 24) / 2; 
        var popMargLeft = (jQuery(loginBox).width() + 24) / 2; 

        jQuery(loginBox).css({ 
                'margin-top' : -popMargTop,
                'margin-left' : -popMargLeft
        });

        // Add the mask to body
        jQuery('body').append('<div id="mask"></div>');
        jQuery('#mask').fadeIn(300);

        return false;
    });
    
    //Login Form    
    jQuery("#login-link").click(function(){
        // Getting the variable's value from a link 
        var loginBox = jQuery(this).attr('href');
        
        //Fade in the Popup and add close button
        jQuery(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = (jQuery(loginBox).height() + 24) / 2; 
        var popMargLeft = (jQuery(loginBox).width() + 24) / 2; 

        jQuery(loginBox).css({ 
                'margin-top' : -popMargTop,
                'margin-left' : -popMargLeft
        });

        // Add the mask to body
        jQuery('body').append('<div id="mask"></div>');
        jQuery('#mask').fadeIn(300);

        return false;
    });
    
    // When clicking on the button close or the mask layer the popup closed
    jQuery('a.close, #mask').live('click', function() { 
        jQuery('#mask , .login-popup').fadeOut(300 , function() {
              jQuery('#mask').remove();  
        }); 
        return false;
    });
    
    jQuery(".button-login").click(function(){
        var username = jQuery("#username").attr("value");
        var pass = jQuery("#password").attr("value");
        var url = jQuery("#login-form").attr("action");
        var outlink = jQuery(this).attr("outlink");
        jQuery.post(url, {username:username,password:pass}, function(data){
            if(data==1)
            {
                jQuery('#mask , .login-popup').fadeOut(300 , function() {
                    jQuery('#mask').remove();  
                }); 
                jQuery("#link-login").attr("href",outlink);
                jQuery("#link-login").text("Logout");
            }
            else
            {
                jQuery("#p-message").slideDown();
            }
        });
        
        return false;
    });
    
    //Tab
    jQuery(".tab").smartTab({
        transitionEffect:'fade'
       
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
