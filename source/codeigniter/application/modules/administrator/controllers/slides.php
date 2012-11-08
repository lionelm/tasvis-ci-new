<?php
class Slides extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('pagination'); 
    }
    
    function index($row=0)
    {
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/slides/index/"; 
        
        $slide = new Slide();        
        $config['total_rows']= $slide->count();   
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $slide = new Slide();         
        $data['lstSlide'] = $slide->limit($config['per_page'], $row)
                                        ->order_by("id","DESC")
                                        ->get();
        $data['view'] = 'slide_index';
        $this->load->view('back_end/template_noright',$data);
    }
    
    function add()    
    {
        $data['view'] = 'slide_add';
        $this->load->view('back_end/template_noright',$data);
    }
}
?>
