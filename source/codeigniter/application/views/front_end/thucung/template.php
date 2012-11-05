<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
        <title>Pets Contest</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>content/thucung/css/style.css" media="all" /> 
        <link rel="stylesheet" media="screen" href="<?php echo base_url();?>content/thucung/css/validationEngine.jquery.css"/>
        <script type="text/javascript" language="javascript" src="<?php echo base_url()?>content/thucung/js/jquery-1.8.2.min.js"></script>        
        <script language="javascript" type="text/javascript" src="<?php echo base_url();?>content/thucung/js/jquery.validationEngine-vi.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url();?>content/thucung/js/jquery.validationEngine.js"></script>        
        <script language="javascript" type="text/javascript" src="<?php echo base_url();?>content/thucung/js/jquery.colorbox.js"></script>        
        <script type="text/javascript" language="javascript" src="<?php echo base_url()?>content/thucung/js/script.js"></script>
    </head>
    <body id="body">
        <div id="wrapper">
            <div class="tail-header">
                <div class="main">
                    <div class="top-menu clear">
                        <div class="moduletable">
                            <?php $this->load->view('front_end/thucung/menu-top');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tail-content">
                <div class="main">
                    <div class="row-search">
                        <?php $this->load->view('front_end/thucung/search');?>
                    </div>
                    <div id="content">
                        <div class="content-row-indent">
                            <div class="clear">
                                <div id="right" class="equal">
                                    <?php if(isset($view_right)) $this->load->view('front_end/thucung/right');?>
                                </div>
                                <div id="left" class="equal">                                    
                                    <?php $this->load->view('front_end/thucung/left');?>
                                </div>    
                                <div id="container" class="equal">
                                    
                                    <?php $this->load->view('front_end/thucung/login');?>
                                    
                                    <?php $this->load->view($view);?>                                    
                                </div>    
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </body>
</html>