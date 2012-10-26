<?php
/*
 * Create by: HungPV
 * Create date:26/10/2012
 * file name: customs.php
 * description: management cusctom fields.
 */

class Customs extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    function index()
    {        
        $data['view'] = 'custom_index';
        $this->load->view('back_end/template_noright',$data);
    }    
    
    function text()
    {
        
        $data['view'] = 'custom_text';
        $this->load->view('back_end/template_noright',$data);
    }
}

?>
