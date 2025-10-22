<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/settings.css">
    <script src="<?php echo base_url(); ?>assets/javascript/display_upload.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/hide-show-pass.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/check_inputs.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS | ADMIN</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/home");?>"><i class="fa-solid fa-arrow-left"></i> Settings</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li class="active"><a href="#"><i class="fa-solid fa-user"></i> Account</a></li>
            <li><a href="<?php echo base_url("Auth/Set_Sem");?>"> <i class="fas fa-calendar-alt icon"></i> Year and Semester </a></li>
            <li><a href=""> <i class="fa-solid fa-clipboard-list"></i> Library schedule </a></li>
        </ul>
    </div>
    <div class="main" style="background-image: url(<?php echo base_url('assets/image/Main-Library.png') ?>);">
        <div class="container">
        <?php foreach($data as $row):?>
            <div class="col-1">
                <h5>General Account Settings</h5>
                <p class="desc">The Account Settings section of a Library Management System is where user can configure and manage their personal or system-wide account preferences. </p>
            </div>
            <hr>
            <div class="col-2">
                <form name="settings_form" action="<?php echo base_url("Post/updateAdmin/$row->Emp_ID")?>" onsubmit="return filename()" method="post" enctype="multipart/form-data">
                    <div class="content-1">
                        <div class="profile">
                            <div class="profile-img">
                                <img id="imageDisplay" src="<?php echo base_url('assets/image/uploads/') ?><?php echo $row->profile; ?>" alt="Image Preview">
                                <div class="profile-desc">
                                    <h6>Profile picture</h6>
                                    <p>PNG, JPEG only</p>
                                </div>
                            </div>
                            <div class="select-img">
                                <div class="file-upload-container">
                                    <p id="warning_filename" class="text-danger text-center" style="margin-top: 0px; color: red; text-align: center; font-size: 11px;"> </p>
                                    <label for="file-upload" class="file-upload-button">Upload new picture</label>
                                    <input type="file" onchange="loadFile(event)" name="file-upload" id="file-upload" class="file-input" accept="image/png, image/jpeg" >
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-details">
                            <h5>User inforation</h5>
                            <div class="profile-container">
                                <div class="input" style="width: 35%;">
                                    <p>First name</p>
                                    <input type="text" name="fname" id="fname" value="<?php echo $row->Fname; ?>">
                                </div>
                                <div class="input" style="width: 35%;">
                                    <p>Last name</p>
                                    <input type="text" name="lname" id="lname" value="<?php echo $row->Lname; ?>">
                                </div>
                                <div class="input" style="width: 10%;">
                                    <p>M.I</p>
                                    <input type="text" name="MI" id="MI" value="<?php echo $row->MI; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="content-2">
                        <div class="contact-container">
                            <div class="contact-details">
                                <p>Email</p>
                                <div class="input-email">
                                    <input type="text" name="email" id="email" value="<?php echo $row->Email; ?>">
                                </div>
                            </div>
                            <div class="contact-details">
                                <p>Password</p>
                                <div class="input-email">
                                    <input type="password" name="password" id="password" value="<?php echo $row->Password; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <input type="submit" name="submit" value="update">
                        </div>
                    </div>
                </form>
            </div>


            <?php endforeach; ?>
        </div>
        <hr>
    </div>
</body>
</html>