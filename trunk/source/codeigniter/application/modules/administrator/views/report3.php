<?php
        echo "<br><br><font color= 'red' > >>> </font>Tài khoản của bạn đã được đăng ký, Hãy truy cập địa chỉ email " ;
            echo "<font color='red'>".$this->session->userdata('email')."</font>";
            echo " để kích hoạt tài khoản<br>"; 
            echo "<br>";
?>