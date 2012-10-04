<html>
    <head>
        <title>CodeIgniter Sample Application</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>css/style.css">
    </head>
<body>
    <?php 
    foreach ($lstUser as $u)
    {    
    ?>
    <h1><?php echo $u->user_login;?></h1>
    <?php }?>
</body>
</html>