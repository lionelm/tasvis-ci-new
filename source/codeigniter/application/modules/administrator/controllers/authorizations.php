<?php
/*
 * Create by: HungPV
 * Date Create: 22/10/2012
 * File Name: authorizations.php
 */

    class Authorizations extends MX_Controller
    {
        function __construct() {
            parent::__construct();
        }
        
        function add($type="operation")
        {
            
            $data['view'] = 'auth_add';
            $this->load->view('back_end/template_noright',$data);
        }
    }
?>
