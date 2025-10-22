<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css">
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS|ADMIN</title>
    
</head>
<body style="background-image: url(<?php echo base_url(); ?>assets/image/background_Admin.jpg);">
    <div class="header">
        <img class="img1" src="<?php echo base_url(); ?>assets/image/USTP-Logo.png" alt="">
        <img class="img2" src="<?php echo base_url(); ?>assets/image/label.png" alt="">
    </div>
    <div class="body">
        <div class="body-content">
            <div class="content">
                <img src="<?php echo base_url(); ?>assets/image/Logo.png" alt="">
                <h2>IIS Library Management System</h2>
                <h4>(iRead Talakag Bukidnon)</h4>

                <form action="<?=base_url('Auth/login')?>" method="post" enctype="multipart/form-data">
                    <h1>LOGIN</h1>
                    <input type="text" name="Email" id="Email" placeholder="Email">
                    <input type="password" name="Password" id="Password" placeholder="Password">
                    <button type="submit">Login</button>

                    <?php
                        if($this->session->flashdata('error')) {	?>
                        <p class="text-danger text-center" style="margin-top: 10px; color:red; text-align:center;"> <?=$this->session->flashdata('error')?></p>
                    <?php } ?>
                </form>
            </div>
            <div class="content"></div>
        </div>
    </div>
</body>
</html>