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
        if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('customs.index'))))
        redirect('administrator/index'); 
        $data['view'] = 'custom_index';
        $this->load->view('back_end/template_noright',$data);
    }    
    
    function text()
    {
        if(!($this->session->userdata('login')&& ($this->User_identity->check_acess('customs.text'))))
        redirect('administrator/index'); 
        if($this->input->post('txtLabel'))
        {
            //Get Param
            $label = $this->input->post('txtLabel');
            $name = $this->input->post('txtName');
            $description = $this->input->post('txtDescription');
            $type = "text";
            $extra = $this->input->post('txtExtra');
            $class = $this->input->post('txtClass');
            $default = $this->input->post('txtDefault');
            $required = 0;
            if($this->input->post('txtDefault'))
            {
                $required = 1;
            }
            $multi = 0;
            if($this->input->post('checkRepeatable'))
            {
                $multi = 1;
            }
            $rule = $this->input->post('selectValidate');
            $post = 0;
            if($this->input->post('checkPost'))
            {
                $post = 1;
            }
            $page = 0;
            if($this->input->post('checkPage'))
            {
                $page = 1;
            }
            
            //Add text cuscom field
            $custom = new Custom();
            $custom->name = $name;
            $custom->label = $label;
            $custom->description = $description;
            $custom->type = $type;
            $custom->extra = $extra;
            $custom->class = $class;
            $custom->required = $required;
            $custom->multi = $multi;
            $custom->rule = $rule;
            
            if($custom->save())
            {
                //add custom detail
                $customdetail = new Customdetail();
                $customdetail->display = "";
                $customdetail->value = $default;
                $customdetail->default = 1;
                $customdetail->save($custom);
                
                //add customfor
                if($post==1)
                {
                    $customfor = new Customfor();
                    $customfor->apply = 'post';
                    $customfor->save($custom);
                }
                if($page==1)
                {
                    $customfor = new Customfor();
                    $customfor->apply = 'page';
                    $customfor->save($custom);
                }                
            }
                    
        }
        else {
            $data['view'] = 'custom_text';
            $this->load->view('back_end/template_noright',$data);
        }
        
    }
}

?>
