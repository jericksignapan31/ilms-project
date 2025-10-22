<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profile.css">
    <script src="<?php echo base_url(); ?>Portal/assets/javascript/borrow_book_confirmation.js"></script>
    <script src="<?php echo base_url(); ?>Portal/assets/javascript/check_input.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/diplay_upload.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);">
    <div class="header">
        <div class="header-container">
        <div class="image">
                <img src="<?php echo base_url(); ?>assets/image/USTP-Logo2.png" alt="">
            </div>
        </div>
        <div class="header-container">
            <?php foreach($data as $row):?>
            <h6><?php echo $row->Student_ID; ?></h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="body">

        <div class="main">
            <div class="profile-container">
                <br>
                <a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a>
                <?php foreach($data as $row):?>
                    <form action="<?php echo base_url("Post/update_user/$row->Student_ID")?>" onsubmit="return checkStudentInfo()" method="POST" enctype="multipart/form-data">
                        <div class="col-1">
                            <div class="group1">
                            <img class="profile-picture" id="imageDisplay"  src="<?php echo base_url('assets/image/uploads/'); ?><?php echo $row->profile; ?>" alt="" srcset="">
                                <div class="group1_col1">
                                    <div class="profile-desc">
                                        <h6>Profile picture</h6>
                                        <p>PNG, JPEG only</p>
                                    </div>
                                    <div class="select-img">
                                        <div class="file-upload-container">
                                            <label for="file-upload" class="file-upload-button">Upload new picture</label>
                                            <input type="file" onchange="loadFile(event)" name="file-upload" id="file-upload" class="file-input" accept="image/png, image/jpeg" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group2">
                                <div class="qrBox">
                                    <img id="profileQrImage">
                                </div>
                                <script>
                                    (function() {
                                        let profileQrImg = document.getElementById("profileQrImage");
                                        profileQrImg.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + "<?php echo $row->Student_ID; ?>";
                                    })();
                                </script>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="col-2">
                            <p>Student Information</p> 
                            <span id="Errors" class="error"></span>
                            <?php
                                if($this->session->flashdata('erroremail')) {	?>
                                <p class="text-danger text-center" style="margin-top: 10px; color:red; text-align:left; font-weight: normal;"> <?=$this->session->flashdata('erroremail')?></p>
                            <?php } ?>
                            <p>Student ID: <?php echo $row->Student_ID; ?></p>
                            <div class="s_info_group-1">
                                <div class="s_info_group1">
                                    <label for="">Last name</label>
                                    <input type="text" name="lname" value="<?php echo $row->Lname; ?>">
                                </div>

                                <div class="s_info_group1">
                                    <label for="">First name</label>
                                    <input type="text" name="fname" value="<?php echo $row->Fname; ?>">
                                </div>

                                <?php if($row->Suffix):?>
                                    <div class="s_info_group1" style="width:70px;">
                                        <label for="">Suffix</label>
                                        <input type="text" name="suffix" value="<?php echo $row->Suffix; ?>">
                                    </div>
                                <?php endif;?>

                                <div class="s_info_group1" style="width:30px;">
                                    <label for="">M.I</label>
                                    <input type="text" name="MI" value="<?php echo $row->MI; ?>">
                                </div>
                            </div>

                            <div class="s_info_group-2">
                                <div class="s_info_group2">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="<?php echo $row->Address; ?>">
                                </div>

                                <div class="s_info_group2">
                                    <label for="">Contact number</label>
                                    <input type="text" name="contact_Number" value="<?php echo $row->Contact_Number; ?>">
                                </div>
                            </div>

                            <div class="s_info_group-3">
                                <div class="s_info_group3">
                                    <label for="">Course</label>
                                    <input type="text" name="course" value="<?php echo $row->Course; ?>">
                                </div>

                                <div class="s_info_group3">
                                    <label for="">Year</label>
                                    <input type="text" name="year" value="<?php echo $row->Year; ?>">
                                </div>

                                <div class="s_info_group3">
                                    <label for="">Section</label>
                                    <input type="text" name="section" value="<?php echo $row->Section; ?>">
                                </div>

                                <div class="s_info_group3">
                                    <label for="">Birthdate</label>
                                    <input type="date" name="birthdate" value="<?php echo htmlspecialchars($row->Birthdate ? date('Y-d-m', strtotime($row->Birthdate)) : ''); ?>">
                                </div>
                            </div>

                            <div class="s_info_group-4">
                                <div class="s_info_group4">
                                    <label for="">Email</label>
                                    <input type="Email" name="email" value="<?php echo $row->Email; ?>">
                                </div>

                                <div class="s_info_group4">
                                    <label for="">Password</label>
                                    <input type="Password" name="password" value="<?php echo $row->Password; ?>">
                                </div>
                            </div>

                            <div class="s_info_group-5">
                                <div class="s_info_group5">
                                    <input type="submit" name="submit" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>