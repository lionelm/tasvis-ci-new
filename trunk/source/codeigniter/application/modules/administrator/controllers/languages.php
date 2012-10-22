<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Languages extends MX_Controller
    {   
        function __construct() {
            parent::__construct();                               
            // load session library
            $this->load->library('pagination');  
            
        }
        
        function index()
        {   
            if($this->input->post('txttitle'))
            {
                $lang_name = $this->input->post('txttitle');
                $lang_code = $this->input->post('txtcode');
                if(!$this->checkexits($lang_code))
                {
                    $language = new Language();
                    $language->name = trim($lang_name);
                    $language->code = trim($lang_code);
                    $language->save();
                }
            }
            
            $lang = new Language();            
            $data['lstLang'] = $lang->get();
            $data['view'] = 'lang_index';
            $this->load->view('back_end/template_noright',$data);
        }   
        
        function delete()
        {
            $id = $this->input->post('param');
            $lang = new Language();
            $lang->where('id',$id)->get();
            $lang->delete_all();
        }
        
        function edit($id=0)
        {
            if($this->input->post('txttitle'))
            {
                $lang_name = $this->input->post('txttitle');
                $lang_code = $this->input->post('txtcode');
                
                $lang_id = $this->input->post('txtLangId');

                $language = new Language();
                $language->where('id', $lang_id)->get();
                $code = $language->code;
                if($code!=trim($lang_code))
                {
                    if(!$this->checkexits(trim($lang_code)))
                    {
                        $language->code = trim($lang_code);
                    }
                }
                $language->name = trim($lang_name);                
                $language->save();
                redirect('administrator/languages');
            }
            else{   
                
                //$id = $this->uri->segment(4); // co the su dung cach nay
                $language = new Language();
                $data['language'] = $language->where('id',$id)->get();
                $lang = new Language();            
                $data['lstLang'] = $lang->get();
                $data['view'] = 'lang_edit';
                $this->load->view('back_end/template_noright',$data);
            }
            
        }
        
        function checkexits($code)
        {
            $lang = new Language();
            $count = $lang->where('code',$code)->count();
            if($count>0)
            {
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
    }
?>
