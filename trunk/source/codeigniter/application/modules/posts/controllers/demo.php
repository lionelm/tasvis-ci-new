<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Demo extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        //get theme
        $option = new Option();
        $option->where('option_name','template')->get();
        $theme = $option->option_value;        
        
        if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
        {
            $data['view'] = "front_end/thucung/left";
            $this->load->view('front_end/'.$theme.'/template',$data);
        }
        else {
            $this->load->view('front_end/base/template');
        }
    }
}
?>



