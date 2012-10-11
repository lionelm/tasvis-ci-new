<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order - Online | Quản Trị</title>

<link href="<?php echo base_url();?>content-admin/css/datepicker-style.css" type="text/css" media="all" rel="stylesheet">

<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/jquery-ui-timepicker-addon.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>content-admin/js/custom/general.js"></script>

</head>
<body class="loggedin">
    <!-- START OF HEADER -->
    <div class="header radius3">
        <?php $this->load->view('back_end/header');?>
    </div>
     <!-- END OF HEADER -->
     
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
        <div class="mainwrapperinner">
            <div class="mainleft">
                <?php $this->load->view('back_end/left');?>
            </div>
            <div class="maincontent noright">
                <div class="maincontentinner">
                    <?php $this->load->view($view);?>
                </div><!--maincontentinner-->       
                <div class="footer">
                    <?php $this->load->view('back_end/footer');?>
                </div><!--footer-->
            </div>            
        </div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
    <!-- END OF MAIN CONTENT -->
</body>
</html>