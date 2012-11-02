<?php
/*
 * Create by: HungPV
 * Date create: 30/10/2012
 * File name: campaignusers.php
 * 
 */
class Campaignusers extends MX_Controller
{
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('pagination');
    }
    
    function index($campaign=0,$keyword='~',$row=0)
    {
        $data['campaign'] = $campaign;      
        if($this->input->post('ddlCampaign'))
        {
            $data['campaign'] = $this->input->post('ddlCampaign');
        }  
        
        
        $data['key_word'] = urldecode($keyword);
        if($this->input->post('txtKeyWord'))
        {
            $data['key_word'] = $this->input->post('txtKeyWord');
        }
        
        //paging
        include('paging.php');
        $config['per_page'] = 10;		
        $config['base_url']= base_url()."/administrator/campaignusers/index/".$data['campaign'].'/'.$data['key_word'].'/'; 
        
        $campaignuser = new Campaignuser();  
        if($data['campaign']>0)
        {
            $campaignuser->include_related('campaign',array('id','name'))
                    ->where_related('campaign', 'id', $data['campaign']);
            
        }
        if($data['key_word']!='~')
        {
            $campaignuser->like('code', $data['key_word']);
        }
        $config['total_rows']= $campaignuser->count();        
        $config['cur_page']= $row;		
        $this->pagination->initialize($config);
        $data['list_link'] = $this->pagination->create_links();	
        
        $campaignuser = new Campaignuser();
        if($data['campaign']>0)
        {
            $campaignuser->include_related('campaign',array('id','name'))
                    ->where_related('campaign', 'id', $data['campaign']);
            
        }
        if($data['key_word']!='~')
        {
            $campaignuser->like('code', $data['key_word']);
        }   
        $campaignuser->limit($config['per_page'], $row)
                ->order_by('code','DESC');               
        $data['lstCampaignUser'] = $campaignuser->get();
        
        $campaign = new Campaign();
        $data['lstCampaign'] = $campaign->get();
        $data['view'] = 'campaignuser_index';
        $this->load->view('back_end/template_noright',$data);
    }
}
?>
