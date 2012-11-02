<div class="container-indent">
    <div class="clear">
        <div class="clear container-box">
            <div class="border-top">
                <div class="border-bot">
                    <div class="border-left">
                        <div class="border-right">
                            <div class="corner-top-left">
                                <div class="corner-top-right">
                                    <div class="corner-bot-left">
                                        <div class="corner-bot-right">
                                            <div class="container-box-indent">
                                                <div class="clear">
                                                   <form action="<?php echo base_url();?>users/register/" method="post" accept-charset="utf-8" id="formID" class="stdform">
                                                        <div class="componentheading">
                                                            Đăng ký thành viên
                                                        </div>
                                                        <div class="article_indent">
                                                            <div class="width">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" class="contentpane">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="30%" height="40">
                                                                                <label for="txtnicename" id="namemsg" class="invalid">
                                                                                    Họ tên:
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" maxlength="50" class="inputbox required invalid validate[required]" value="" size="40" id="txtnicename" name="txtnicename"> * 
                                                                                
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="40">
                                                                                <label for="txtlogin" id="usernamemsg">
                                                                                    Tên đăng nhập:
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" maxlength="25" class="inputbox validate[required] validate-username" 
                                                                                       value="" size="40" name="txtlogin" id="txtlogin" urllink="<?php echo base_url();?>users/checkExistUsername"
                                                                                       onkeyup="checkExitUser(this.value)"> *
                                                                                &nbsp; <span id="checkExistUser" style="color: red; display: none;">Người dùng đã tồn tại!</span>                                                                                
                                                                                <span id="successUser" style="display: none;">Tên đăng nhập khả dụng</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="40">
                                                                                <label for="txtemail" id="emailmsg">
                                                                                    E-mail:
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" maxlength="100" class="inputbox validate[required,custom[email]" 
                                                                                       urllink="<?php echo base_url();?>users/checkExistUserEmail" 
                                                                                       value="" size="40" name="txtEmail" id="txtEmail" onkeyup="checkExitEmail(this.value)"> *
                                                                                &nbsp; <span id="checkExistEmail" style="color: red; display: none;">Email đã tồn tại!</span>                                                                                
                                                                                <span id="successEmail" style="display: none;">Email khả dụng</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="40">
                                                                                <label for="txtemailre" id="emailmsg2">
                                                                                   Nhập lại E-mail:
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" maxlength="100" class="inputbox validate[required,equals[txtEmail]" value="" size="40" name="txtemailre" id="txtemailre"> *
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="40">
                                                                                <label for="password" id="txtpass">
                                                                                    Mật khẩu:
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="password" value="" size="40" name="txtpassword" id="txtpassword" class="inputbox validate[required]"> *
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="40">
                                                                                <label for="txtconfirmpass" id="pw2msg">
                                                                                    Xác nhận mật khẩu:
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <input type="password" value="" size="40" name="txtconfirmpass" id="txtconfirmpass" class="inputbox validate[required,equals[txtpassword]"> *
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="40" colspan="2">
                                                                                Các thông tin bắt buộc được đánh dấu (*).	</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <button type="submit" class="button validate">Đăng ký</button>
                                                            </div>
                                                        </div>                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>