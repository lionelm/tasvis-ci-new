 <?php
    echo "<br><br>";    
    echo "<font color= 'red' > >>> </font> Chúng tôi đã gửi email xác nhận quên password đến địa chỉ email: " ;
    echo "<font color='red'>".$this->session->userdata('email')."</font>";
    echo " của bạn<br>"; 
    echo " <font color= 'red' > >>> </font> Bạn vui lòng kiểm tra email và thực hiện theo hướng dẫn để xác nhận quên mật khẩu.<br>
    <font color= 'red' > >>> </font> Nếu bạn không nhận được email xác nhận quên password, vui lòng kiểm tra hộp thư rác (bulk mail) hoặc thực hiện lại thao tác quên password . ";
    echo "<br><br>";  
 ?>