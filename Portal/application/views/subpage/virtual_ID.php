<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/virtual_ID.css">
    <script src="<?php echo base_url(); ?>assets/javascript/borrow_book_confirmation.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);"  onload="generateQR()">
    <div class="header">
        <div class="header-container">
            <button onclick="mobile_nav()"><i class="fa-solid fa-bars"></i></button>
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
        <div class="side">
            <h4><i class="fa-solid fa-book"></i> Library</h4>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a class="active" href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="mobile_side">
            <h4><i class="fa-solid fa-book-open-reader"></i> History</h4>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a class="active" href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="col-1">
                <div class="virtual_ID_front" style="background-image: url(<?php echo base_url('assets/image/ID_BG.jpg') ?>);">
                    <div class="group1">
                        <div class="group-1_column-1">
                            <img src="<?php echo base_url('assets/image/USTP-Logo.png'); ?>" alt="" srcset="">
                            <div class="tag">
                                <h6>UNIVERSITY OF SCIENCE AND TECHNOLOGY</h6>
                                <h6>OF SOUTHERN PHILIPPINES</h6>
                                <P>USTP Villanueva Campus (Annex)</P>
                            </div>
                        </div>
                        <div class="group-1_column-2">
                            <img src="<?php echo base_url('assets/image/Logo.png'); ?>" alt="" srcset="">
                        </div>
                    </div>
                    <div class="group2">
                        <?php foreach($data as $row):?>
                            <div class="group-2_column-1">
                                <div class="ID_picture">
                                    <img class="profile-image" src="<?php echo base_url('assets/image/uploads/'); ?><?php echo $row->profile; ?>" alt="" srcset="">
                                </div>
                            </div>
                        
                            <div class="group-2_column-2">
                                <h4><?php echo $row->Lname; ?>, <?php echo $row->Fname; ?>  <?php echo $row->Suffix; ?>  <?php echo $row->MI; ?>.</h4>
                                <div class="student-info">
                                    <div class="label">
                                        <h6>Student ID</h6>
                                        <h6>Section</h6>
                                        <h6>Course</h6>
                                        <h6>Address</h6>
                                    </div>
                                    <div class="content">
                                        <h6>:<?php echo $row->Student_ID; ?></h6>
                                        <h6>:<?php echo $row->Section; ?></h6>
                                        <h6>:<?php echo $row->Course; ?></h6>
                                        <h6>:<?php echo $row->Address; ?></h6>
                                    </div>
                                </div>
                                <div class="Studentqr">
                                    <div class="qrBox">
                                        <img id="qrImage">
                                    </div>
                                    <script>
                                        let qrImgss = document.getElementById("qrImage");
                                        let qrTxt = document.getElementById("studentID");

                                        function generateQR(){
                                            qrImgss.src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=" + "<?php echo $row->Student_ID; ?>";

                                            const sidebar = document.querySelector('.qrBox')
                                            sidebar.style.display = 'block'
                                        }
                                    </script>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>