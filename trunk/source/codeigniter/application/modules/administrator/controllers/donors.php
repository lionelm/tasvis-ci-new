<?php
class Donors extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->library('pagination'); 
    }
    
    function index($row=0)
    {
        if($this->input->post('txtname'))
        {
            $donor = new Donor();
            $donor->name = $this->input->post("txtname");
            $donor->description = $this->input->post("txtdesc");
            $donor->url = $this->input->post("txturl");
            $donor->campaign_id = $this->input->post("ddlCampaign");
            $donor->image = $this->input->post("hdffeatured_image");
            $donor->save();
        }
        
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/donors/index/"; 
        
        $campaign = new Campaign();
        $lstCampaign = $campaign->get();
        $data['lstCampaign'] = $lstCampaign;
        
        $donor = new Donor();        
        $config['total_rows']= $donor->count();   
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $donor = new Donor();           
        $data['lstDonor'] = $donor->limit($config['per_page'], $row)
                                        ->order_by("id","DESC")
                                        ->get();
        $data['view'] = 'donor_index';
        $this->load->view('back_end/template_noright',$data);
    }    
    
    function delete()
    {
        $id = $this->input->post('param');
        $donor = new Donor();
        $donor->where('id',$id)->get();
        $donor->delete();
    }
    
    function edit($id=0,$row=0)
    {
        if($this->input->post('txtname'))
        {
            $id = $this->input->post("hdfID");
            $donor = new Donor();
            $donor->where("id",$id)->get();
            $donor->name = $this->input->post("txtname");
            $donor->description = $this->input->post("txtdesc");
            $donor->url = $this->input->post("txturl");
            $donor->campaign_id = $this->input->post("ddlCampaign");
            $donor->image = $this->input->post("hdffeatured_image");
            $donor->save();
            
            redirect('administrator/donors');
        }
        
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/donors/edit/".$id."/"; 
        
        $campaign = new Campaign();
        $lstCampaign = $campaign->get();
        $data['lstCampaign'] = $lstCampaign;
        
        $donor = new Donor();        
        $config['total_rows']= $donor->count();   
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $donor = new Donor();           
        $data['lstDonor'] = $donor->limit($config['per_page'], $row)
                                        ->order_by("id","DESC")
                                        ->get();
        $curDonor = new Donor();
        $data['curDonor'] = $curDonor->where('id',$id)->get();
        $data['view'] = 'donor_edit';
        $this->load->view('back_end/template_noright',$data);
    }
}
?>
