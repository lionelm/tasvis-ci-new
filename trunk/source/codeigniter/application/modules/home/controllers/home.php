<?php
/**
* Home
* 
* @author HungPV
* @deprecated Home Controller
* @access public
*/
class Home extends MX_Controller
{
    /**
     * __construct()
     * @name __construct()
     * @author HungPV  <hungpv@tasvis.com.vn>
     * @deprecated function init for controller.
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * index()
     * @name index()
     * @author HungPV  <hungpv@tasvis.com.vn>
     * @deprecated index action for home comtroller.
     */
    function index()
    {
        
        
        //get theme
        $option = new Option();
        $option->where('option_name','template')->get();
        $theme = $option->option_value;       

        
        if(get_file_info('application/views/front_end/'.$theme.'/home_index.php'))
        {
            $data['view'] = "front_end/".$theme."/home_index";
        }
        else {
            $data['view'] = "front_end/base/home_index";
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
?>
