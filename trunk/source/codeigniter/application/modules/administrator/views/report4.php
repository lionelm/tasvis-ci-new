<?php
        echo "<br><br><font color= 'red' > >>> </font>Tài khoản của bạn đã được kích hoạt thành công, Hãy truy cập địa chỉ email " ;
            echo "<font color='red'>".$this->session->userdata('email')."</font>";
            echo " để xem thông tin chi tiết. Xin cảm ơn!<br>"; 
            echo "<br>";
?>