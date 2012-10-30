<?php
 class Students extends MX_Controller
 {
    public function _construct()
    {
        parent::__construct();
        $this->load->library('pagination');
    }
    
    function index()
    {
        if($this->input->post('txtname'))
        {
            $st_name = $this->input->post('txtname');
            $st_pass = $this->input->post('txtpass');
            $st_age = $this->input->post('txtage');
            
            if(!$this->checkstudents($st_pass))
            {
                $st1 = new Student();
                $st1->name = $st_name;
                $st1->pass = $st_pass;
                $st1->age = $st_age;
                $st1->save();
            }
        }
        
        $st2 = new Student();
        $data['lststudent'] = $st2->get();
        $data['view'] = 'st_index';
        $this->load->view('back_end/template_noright',$data);
    }
    
    function delete()
    {
        $id = $this->uri->segment(4);
        //$id = $this->input->post('param');
        $st3 = new Student();
        $st3->where('id',$id)->get();
        $st3->delete();
		redirect('administrator/students');
		
		
    }
    
    
    function checkstudents($pass)
    {
        $st = new Student();
        $count = $st->where('pass',$pass)->count();
        if($count>0)
        {
            return true;
        }else{
            return false;
        }
    }
 }

?>