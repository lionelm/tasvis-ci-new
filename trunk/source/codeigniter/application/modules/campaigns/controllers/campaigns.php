<?php
/**
 * campaigns
 * @author HungPV <hungpv@tasvis.com.vn>
 * @deprecated 
 */
class Campaigns extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }
    
    /**
     * index()
     * @author HungPV <hungpv@tasvis.com.vn>
     * 
     */
    function index()
    {
        $campaign = new Campaign();
        $lstCampaign = $campaign->where('status','enable')->get();
        echo $campaign->where('status','enalbe')->count();
        $data['lstCampaign'] = $lstCampaign;
        
        //get theme
        $option = new Option();
        $option->where('option_name','template')->get();
        $theme = $option->option_value;       

        
        if(get_file_info('application/views/front_end/'.$theme.'/campaigns_index.php'))
        {
            $data['view'] = "front_end/".$theme."/campaigns_index";
        }
        else {
            $data['view'] = "front_end/base/campaigns_index";
        }

        if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
        {            
            $this->load->view('front_end/'.$theme.'/template',$data);
        }
        else {
            $this->load->view('front_end/base/template');
        }
    }  
    
    /**
     * 
     * @param int $id
     */
    function detail($id=0)
    {
        $campaign = new Campaign();        
        $curCampaign = $campaign->where('id',$id)->get();
        
        
        $data['campaign'] = $curCampaign;
        
        //get theme
        $option = new Option();
        $option->where('option_name','template')->get();
        $theme = $option->option_value;       

        
        if(get_file_info('application/views/front_end/'.$theme.'/campaigns_detail.php'))
        {
            $data['view'] = "front_end/".$theme."/campaigns_detail";
        }
        else {
            $data['view'] = "front_end/base/campaigns_detail";
        }

        if(get_file_info('application/views/front_end/'.$theme.'/template.php'))
        {            
            $this->load->view('front_end/'.$theme.'/template',$data);
        }
        else {
            $this->load->view('front_end/base/template');
        }
    }    
}
?>
