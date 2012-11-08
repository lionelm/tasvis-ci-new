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
                                                            Danh sách cuộc thi	
                                                        </div>
                                                        <div class="article_indent">
                                                            <div class="width">
                                                                <?php 
                                                                    foreach ($lstCampaign as $campaign)
                                                                    {
                                                                ?>
                                                                <div class="campaign-item">
                                                                    <a class="campaign-link" href="<?php echo base_url();?>campaigns/detail/<?php echo $campaign->id;?>"><img src="<?php echo $campaign->image; ?>"/></a>
                                                                    <span class="description">
                                                                        <?php echo $campaign->summary;?>
                                                                    </span>
                                                                    <a class="campaign-detail" href="<?php echo base_url();?>campaigns/detail/<?php echo $campaign->id;?>">Chi tiết</a>
                                                                </div>  
                                                                <?php }?>
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