<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
    <script src="<?php echo base_url(); ?>assets/javascript/RealtimeUpdate.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
</head>
<body>
    <div class="body">
        <img src="<?php echo base_url(); ?>assets/image/USTP-Logo2.png" alt="">
        <h2>Library Management System</h2>
        <h4>(iRead USTP Villanueva)</h4>

        <form action="<?php echo base_url("Post/login")?>" method="post" enctype="multipart/form-data">
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
</body>
</html>