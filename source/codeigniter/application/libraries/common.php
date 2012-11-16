<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Common extends MX_Controller{        
    function load_template($view = '',$data)
    {          	
        $option = new Option();
        $option->where('option_name','template')->get();
        $theme = $option->option_value;       
    
        
        if(get_file_info('application/views/front_end/'.$theme.'/'.$view.'.php'))
        {
            $data['view'] = "front_end/".$theme."/".$view;
        }
        else {
            $data['view'] = "front_end/base/".$view;
        }
    
        if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
        {            
            $this->load->view('front_end/'.$theme.'/template',$data);
        }
        else {
            $this->load->view('front_end/base/template');
        }
     }   
}