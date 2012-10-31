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
        /*
        // Create new Student
        $st = new Student();
        
        // Enter values into required fields
        $st->name = "vidic";
        $st->age = "19";        
        
        // Get country object for china
        $c = new Country();
        $c->where('name', 'china')->get();
        
        // Save new Student and also save a relationship to the country
        $st->save($c);
        */
        
        // Create a Country object and get the record for china
        $c = new Country();
        $c->where('name', 'vietnam')->get();
        
        // Populate the related users object with all related records
        // Note: get_iterated is used because we are only looping over the users list once.
        $c->student->get_iterated();
        
        // Loop through to see all related users
        foreach ($c->student as $u)
        {
            echo $u->name . '<br />';
        }
        
        
    }
    
    
    function index11111()
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