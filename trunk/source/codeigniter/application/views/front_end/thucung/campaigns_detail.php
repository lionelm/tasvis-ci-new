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
                                                    <div class="contentpane">
                                                        <div class="componentheading">
                                                            <?php echo $campaign->name;?>
                                                            <a class="register-button" href="<?php echo base_url();?>campaigns/register/<?php echo $campaign->id;?>">
                                                                <img src="<?php echo base_url();?>content/thucung/images/register-icon.png" title="Đăng ký dự thi"/>                                                                                                                                
                                                            </a>                                                            
                                                        </div>
                                                        <div class="article_indent">
                                                            <div class="width">
                                                                <div id="bxh" class="tab tl-tab pkg">
                                                                    <ul class="nav pkg">
                                                                        <li class="nav-1"><a class="faq-1" href="#faq-1"><span>Giới thiệu chung</span></a></li>
                                                                        <li class="nav-2"><a class="faq-2" href="#faq-2"><span>Hình thức dự thi</span></a></li>
                                                                        <li class="nav-3"><a class="faq-3" href="#faq-3"><span>Phương thức tính giải</span></a></li>
                                                                        <li class="nav-4"><a class="faq-4" href="#faq-4"><span>Hệ thống giải thưởng</span></a></li>
                                                                    </ul>
                                                                    <div class="list-wrap pkg">
                                                                        <div id="faq-1">
                                                                            <?php echo $campaign->description;?>
                                                                        </div>
                                                                        <div id="faq-2">
                                                                            <?php echo $campaign->contestform;?>
                                                                        </div>
                                                                        <div id="faq-3">
                                                                            <?php echo $campaign->awardmethod;?>
                                                                        </div>
                                                                        <div id="faq-4">
                                                                            <?php echo $campaign->award;?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>