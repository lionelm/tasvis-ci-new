<?php 
    class Demo extends MX_Controller
    {
        function __construct() {
            parent::__construct();
        }
        
        function index()
        {
            $this->email->from('dangky@butdanh.com','B�t Danh');            
                                        
                                        
            $this->email->to('dinhhv@tasvis.com.vn');  
            $this->email->subject('��ng k? th�nh vi�n');
            $email_msg='Ch�o m?ng b?n �?n v?i '.base_url().' <br/><br/>';
            $email_msg.='H?y nh?n v�o ��?ng d?n sau �? k�ch ho?t t�i kho?n c?a b?n: <br/>';
            $email_msg.=base_url().'home/verify/';
            $this->email->message($email_msg);  
            $this->email->send();   
        }
    }
?>