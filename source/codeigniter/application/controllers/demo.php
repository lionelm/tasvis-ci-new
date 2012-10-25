<?php 
    class Demo extends MX_Controller
    {
        function __construct() {
            parent::__construct();
        }
        
        function index()
        {
            $this->email->from('dangky@butdanh.com','Bút Danh');            
                                        
                                        
            $this->email->to('dinhhv@tasvis.com.vn');  
            $this->email->subject('Ðãng k? thành viên');
            $email_msg='Chào m?ng b?n ð?n v?i '.base_url().' <br/><br/>';
            $email_msg.='H?y nh?n vào ðý?ng d?n sau ð? kích ho?t tài kho?n c?a b?n: <br/>';
            $email_msg.=base_url().'home/verify/';
            $this->email->message($email_msg);  
            $this->email->send();   
        }
    }
?>