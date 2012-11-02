<?php
/*
 * 
 * 
 * 
 * 
 * 
 */
class Campaigns extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('pagination'); 
        $this->load->library('session');
    }
    
    function index($row=0)
    {        
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/campaigns/index/"; 
        
        $campaign = new Campaign();        
        $config['total_rows']= $campaign->count();   
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $campaign = new Campaign();        
        $data['lstCampaign'] = $campaign->limit($config['per_page'], $row)
                                        ->order_by("id","DESC")
                                        ->get();
        $data['view'] = 'campaign_index';
        $this->load->view('back_end/template_noright',$data);
    }
    
    function add()
    {        
        if($this->input->post("txttitle"))
        {
            $name = $this->input->post("txttitle");
            $summary = $this->input->post("txtexcerpt");
            $description = $this->input->post("txtcontent");
            $image = $this->input->post("hdffeatured_image");
            $date_start = date('Y-m-d H:i:s');
            $post_date_start = $this->input->post('txtDateStart');
            if($post_date_start)
            {
                $format = 'd-m-Y H:i:s';
                $date_start = DateTime::createFromFormat($format, $post_date_start);
                $date_start = $date_start->format('Y-m-d H:i:s');                
            }  
            
            $date_end = date('Y-m-d H:i:s');
            $post_date_end = $this->input->post('txtDateEnd');
            if($post_date_end)
            {
                $format = 'd-m-Y H:i:s';
                $date_end = DateTime::createFromFormat($format, $post_date_end);
                $date_end = $date_end->format('Y-m-d H:i:s');                
            }
            
            $create_date = date('Y-m-d H:i:s');
            $update_date = date('Y-m-d H:i:s');
            $status = $this->input->post("ddlTrangThai");
            $user_creat = $this->session->userdata("id");
            $user_update = $this->session->userdata("id");
            
            //Add Campaign
            $campaign = new Campaign();
            $campaign->name = $name;
            $campaign->summary = $summary;
            $campaign->description = $description;
            $campaign->image = $image;
            $campaign->start_date = $date_start;
            $campaign->end_date = $date_end;
            $campaign->status = $status;
            $campaign->create_date = $create_date;
            $campaign->update_date = $update_date;
            $campaign->created_user = $user_creat;
            $campaign->updated_user = $user_update;
            
            $campaign->save();
            
            redirect("administrator/campaigns");
            
        }
        else {
            $data['view'] = 'campaign_add';
            $this->load->view('back_end/template_noright',$data);
        }        
    }
    
    function delete()
    {
        $id = $this->input->post('param');
        $campaign = new Campaign();
        $campaign->where('id',$id)->get();
        $campaign->delete();        
    }
    
    function edit($id=0)
    {
        if($this->input->post("txttitle"))
        {
            $campaign_id = $this->input->post("campaign_id");
            $name = $this->input->post("txttitle");
            $summary = $this->input->post("txtexcerpt");
            $description = $this->input->post("txtcontent");
            $image = $this->input->post("hdffeatured_image");
            $date_start = date('Y-m-d H:i:s');
            $post_date_start = $this->input->post('txtDateStart');
            if($post_date_start)
            {
                $format = 'd-m-Y H:i:s';
                $date_start = DateTime::createFromFormat($format, $post_date_start);
                $date_start = $date_start->format('Y-m-d H:i:s');                
            }  
            
            $date_end = date('Y-m-d H:i:s');
            $post_date_end = $this->input->post('txtDateEnd');
            if($post_date_end)
            {
                $format = 'd-m-Y H:i:s';
                $date_end = DateTime::createFromFormat($format, $post_date_end);
                $date_end = $date_end->format('Y-m-d H:i:s');                
            }
            
            $create_date = date('Y-m-d H:i:s');
            $update_date = date('Y-m-d H:i:s');
            $status = $this->input->post("ddlTrangThai");            
            $user_update = $this->session->userdata("id");
            
            //Edit Campaign
            $campaign = new Campaign();
            $campaign->where('id',$campaign_id)->get();
            $campaign->name = $name;
            $campaign->summary = $summary;
            $campaign->description = $description;
            $campaign->image = $image;
            $campaign->start_date = $date_start;
            $campaign->end_date = $date_end;
            $campaign->status = $status;
            $campaign->create_date = $create_date;
            $campaign->update_date = $update_date;            
            $campaign->updated_user = $user_update;
            
            $campaign->save();
            
            redirect("administrator/campaigns");
        }
        else
        {
            $campaign = new Campaign();
            
            $data['campaign'] = $campaign->where('id',$id)->get();            
            $data['view'] = 'campaign_edit';
            $this->load->view('back_end/template_noright',$data);
        }
    }
}
?>
