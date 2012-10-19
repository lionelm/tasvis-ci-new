<?php
    /*
     * Create by HungPV
     * Date create: 19/10/2012
     * File name: comments.php
     */
    class Comments extends MX_Controller
    {
        public function __construct() {
            parent::__construct();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $this->load->library('pagination');
        }
        
        public function index()
        {
            $data['view'] = 'comment_index';
            $this->load->view('back_end/template_noright',$data);
        }
    }
?>
