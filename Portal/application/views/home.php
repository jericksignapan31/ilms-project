<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);" onload="generateQR(), notify()">

    <script type="text/javascript">
        function notify(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function(){
                document.getElementById("notification").innerHTML = this.responseText;
            }
            xhttp.open("GET", "<?php echo base_url("Auth/notification")?>")
            xhttp.send();
        }

        setInterval(function(){
            notify();
        }, 10);
    </script>

    <div class="header">
        <div class="header-container">
            <button onclick="mobile_nav(), mobilegenerateQR()"><i class="fa-solid fa-bars"></i></button>
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/image/USTP-Logo2.png" alt="">
            </div>
        </div>
        <div class="header-container">
            <div class="notification" id="notification">
                
            </div>
            <a href="#" onclick="showHideNavigation()"><i class="fa-regular fa-envelope"></i></a>
            <?php foreach($data as $row):?>
                <h6><?php echo $row->Student_ID; ?></h6>
                
            <?php endforeach; ?>
        </div>
    </div>
    <div class="body">
        <div class="side">
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <?php foreach($data as $row):?>
            <div class="user-info">
                <div class="qrBox">
                    <img id="mobileqrImage">
                </div>
                <script>
                    let mobileqrImg = document.getElementById("mobileqrImage");
                    let mobileqrTxt = document.getElementById("studentID");

                    function generateQR(){
                        mobileqrImg.src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" + "<?php echo $row->Student_ID; ?>";

                        const sidebar = document.querySelector('.qrBox')
                        sidebar.style.display = 'block'
                    }
                </script>

                <h6><?php echo $row->Fname; ?> <?php echo $row->MI; ?> <?php echo $row->Lname; ?></h6>
                <p>Full name</p>
                <h6 class="sID"><?php echo $row->Course; ?> <?php echo $row->Year; ?> <?php echo $row->Section; ?></h6>
                <p>Course, Year, and Section</p>
                <h6 class="sID"><?php echo $row->Email; ?></h6>
                <p>Email</p>
                <h6 class="sID"><?php echo $row->Address; ?></h6>
                <p>Address</p>
            </div>
            <?php endforeach; ?>
            <nav>
                <ul>
                    <li><a class="active" href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="mobile_side">
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <?php foreach($data as $row):?>
            <div class="user-info">
                <div class="qrBox">
                    <img id="qrImage">
                </div>
                <script>
                    let qrImg = document.getElementById("qrImage");
                    let qrTxt = document.getElementById("studentID");

                    function mobilegenerateQR(){
                        qrImg.src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" + "<?php echo $row->Student_ID; ?>";

                        const sidebar = document.querySelector('.qrBox')
                        sidebar.style.display = 'block'
                    }
                </script>
                
                <h6><?php echo $row->Fname; ?> <?php echo $row->MI; ?> <?php echo $row->Lname; ?></h6>
                <p>Full name</p>
                <h6 class="sID"><?php echo $row->Course; ?> <?php echo $row->Year; ?> <?php echo $row->Section; ?></h6>
                <p>Course, Year, and Section</p>
                <h6 class="sID"><?php echo $row->Email; ?></h6>
                <p>Email</p>
                <h6 class="sID"><?php echo $row->Address; ?></h6>
                <p>Address</p>
            </div>
            <?php endforeach; ?>
            <nav>
                <ul>
                    <li><a class="active" href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>


        <div class="main">
            <?php if(isset($notification_view)):?>
                <?php foreach($notification_view as $rowsss):?>
                    <div class="view_notification">
                        <div class="notification_image">
                            <?php if(empty($rowsss->thumbnail)): ?>
                                <span>Image not available</span>
                            <?php else: ?>
                                <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $rowsss->thumbnail; ?>" alt="Book Thumbnail">
                            <?php endif; ?>
                        </div>
                    
                        <div class="details">
                                <h5><?php echo $rowsss->title; ?></h5>
                                <p>Author: <?php echo $rowsss->author; ?></p>
                                <p>Edition: <?php echo $rowsss->edition; ?></p>
                                <p>Volume: <?php echo $rowsss->volume; ?></p>
                                <p>Pages: <?php echo $rowsss->pages; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else:?>
            <div class="col-1">
                <?php foreach($data as $row):?>
                    <h1>Hi <?php echo $row->Fname; ?>, Welcome back!</h1>
                <?php endforeach; ?>
                <p>Your library portal dashboard.</p>
            </div>
            <?php endif?>
        </div>

        <div class="notification_class">
            <h5>Notifications</h5>
            
            <?php foreach($notification as $rows): ?>
                <?php if ($rows->status == ""): ?>
                    <a href="<?php echo base_url("Auth/view_notification/$rows->book_ID/$rows->id") ?>">
                        <div class="notify">
                            <p id="unread"><?php echo $rows->notification; ?> notification</p>
                            <p id="unread"><?php echo $rows->message; ?></p>
                            <!-- Add a data attribute for the timestamp -->
                            <p id="time" class="time-relative" data-timestamp="<?php echo $rows->created_at; ?>" style="color: #1062e7; font-weight: bold;">
                                <?php echo $rows->created_at; ?>
                            </p>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="<?php echo base_url("Auth/view_notification/$rows->book_ID/$rows->id") ?>">
                        <div class="notify">
                            <p id="title"><?php echo $rows->notification; ?> notification</p>
                            <p><?php echo $rows->message; ?></p>
                            <!-- Add a data attribute for the timestamp -->
                            <p id="time" class="time-relative" data-timestamp="<?php echo $rows->created_at; ?>">
                                <?php echo $rows->created_at; ?>
                            </p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>


            <script>
                // Function to calculate the relative time
                function getRelativeTime(timestamp) {
                    const now = new Date();
                    const past = new Date(timestamp);
                    const diffInSeconds = Math.floor((now - past) / 1000);

                    if (diffInSeconds < 60) {
                        return 'Just now';
                    } else if (diffInSeconds < 3600) {
                        const minutes = Math.floor(diffInSeconds / 60);
                        return `${minutes} minute${minutes > 1 ? 's' : ''} ago`;
                    } else if (diffInSeconds < 86400) {
                        const hours = Math.floor(diffInSeconds / 3600);
                        return `${hours} hour${hours > 1 ? 's' : ''} ago`;
                    } else {
                        const days = Math.floor(diffInSeconds / 86400);
                        return `${days} day${days > 1 ? 's' : ''} ago`;
                    }
                }

                // Update all timestamps on the page
                document.addEventListener('DOMContentLoaded', () => {
                    const timeElements = document.querySelectorAll('.time-relative');

                    timeElements.forEach(element => {
                        const timestamp = element.getAttribute('data-timestamp');
                        const relativeTime = getRelativeTime(timestamp);
                        element.textContent = relativeTime; // Update the content
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>