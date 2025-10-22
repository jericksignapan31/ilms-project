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
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li>
                        <a href="#" onclick="toggleLibraryMenu(event)"><i class="fa-solid fa-book"></i> Library <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="submenu" id="librarySubmenu">
                            <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
                            <li><a href="<?php echo base_url("Auth/ebooks")?>"><i class="fa-solid fa-tablet-screen-button"></i> E-books</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> Borrowing History</a></li>
                    <li><a class="active" href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="mobile_side">
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li>
                        <a href="#" onclick="toggleLibraryMenuMobile(event)"><i class="fa-solid fa-book"></i> Library <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="submenu" id="librarySubmenuMobile">
                            <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
                            <li><a href="<?php echo base_url("Auth/ebooks")?>"><i class="fa-solid fa-tablet-screen-button"></i> E-books</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> Borrowing History</a></li>
                    <li><a class="active" href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
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
                                <h6>INDULANG INTEGRATED SCHOOL</h6>
                                <h6>Talakag Bukidnon</h6>
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

    <style>
        /* Submenu styling */
        .submenu {
            display: none;
            list-style: none;
            padding-left: 15px;
            margin: 5px 0;
            background: rgba(255, 255, 255, 0.5);
            border-left: 3px solid #2237a2;
            border-radius: 5px;
        }
        .submenu.active {
            display: block;
            animation: slideDown 0.3s ease;
        }
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .submenu li {
            margin: 2px 0;
        }
        .submenu li a {
            font-size: 14px;
            padding: 10px 15px;
            display: block;
            color: #666;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        .submenu li a:hover {
            background: linear-gradient(135deg, #e8ecff 0%, #d4dbff 100%);
            color: #2237a2;
            padding-left: 25px;
            box-shadow: 0 2px 8px rgba(34, 55, 162, 0.15);
        }
        .submenu li a.active {
            background: linear-gradient(135deg, #2237a2 0%, #1a2c7f 100%);
            color: #fff !important;
            box-shadow: 0 3px 10px rgba(34, 55, 162, 0.3);
            font-weight: 600;
        }
        .submenu li a.active:hover {
            background: linear-gradient(135deg, #2237a2 0%, #1a2c7f 100%);
            color: #fff;
            transform: none;
            padding-left: 25px;
        }
        .submenu li a i {
            margin-right: 10px;
            font-size: 14px;
        }
        nav ul li > a i.fa-chevron-down {
            float: right;
            transition: transform 0.3s ease;
            font-size: 12px;
        }
        nav ul li > a.active-dropdown i.fa-chevron-down {
            transform: rotate(180deg);
        }
    </style>

    <script>
        function toggleLibraryMenu(event) {
            event.preventDefault();
            const submenu = document.getElementById('librarySubmenu');
            const link = event.currentTarget;
            
            submenu.classList.toggle('active');
            link.classList.toggle('active-dropdown');
        }

        function toggleLibraryMenuMobile(event) {
            event.preventDefault();
            const submenu = document.getElementById('librarySubmenuMobile');
            const link = event.currentTarget;
            
            submenu.classList.toggle('active');
            link.classList.toggle('active-dropdown');
        }
    </script>
</body>
</html>