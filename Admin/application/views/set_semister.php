<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sem.css">
    <script src="<?php echo base_url(); ?>assets/javascript/display_upload.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/hide-show-pass.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/check_inputs.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP | ADMIN</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/home");?>"><i class="fa-solid fa-arrow-left"></i> Settings</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a href="<?php echo base_url("Auth/settings");?>"><i class="fa-solid fa-user"></i> Account</a></li>
            <li class="active"><a href="#"> <i class="fas fa-calendar-alt icon"></i> Year and Semester </a></li>
            <li><a href=""> <i class="fa-solid fa-clipboard-list"></i> Library schedule </a></li>
        </ul>
    </div>
    <div class="main" style="background-image: url(<?php echo base_url('assets/image/Main-Library.png') ?>);">
        <div class="container">
            <div class="col-1">
                <h5>General Account Settings</h5>
                <p class="desc">The Account Settings section of a Library Management System is where user can configure and manage their personal or system-wide account preferences. </p>
            </div>
            <hr>
            <div class="col-2">
                <form name="Form_semister" action="<?php echo base_url("Post/update_semister")?>" onsubmit="return check_sem_input()" method="post">
                    <div class="sem_div">
                        <div class="contact-container">
                            <div class="contact-details">
                                <p>School Year</p>
                                <div class="input-email">
                                    <input type="text" name="sy" id="sy" placeholder="(Example: 2023-2024)">
                                </div>
                            </div>
                            <div class="contact-details">
                                <p>Semister</p>
                                <div class="input-email">
                                    <select name="term" id="term">
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php
                            if($this->session->flashdata('error')) {	?>
                            <p class="text-danger text-center" id="warning-term" style="font-size:10px; color:red;"><?=$this->session->flashdata('error')?></p>
                        <?php } ?>
                        <div class="contact-btn">
                            <input type="submit" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>
</body>
</html>