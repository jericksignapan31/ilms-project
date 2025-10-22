<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/borrowing.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
    
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);" onload="replacePercentageWithSpace(), generateQR()">
    <div class="header">
        <div class="header-container">
            <button onclick="mobile_nav()"><i class="fa-solid fa-bars"></i></button>
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/image/USTP-Logo2.png" alt="">
            </div>
        </div>
        <div class="header-container">
            <?php foreach($result as $row):?>
            <h6><?php echo $row->Student_ID; ?></h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="body">
        <div class="side">
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <?php foreach($result as $row):?>
            <div class="user-info">
                <div class="qrBox">
                    <img id="mobileqrImage">
                </div>
                <script>
                    let mobileqrImg = document.getElementById("mobileqrImage");

                    function generateQR(){
                        mobileqrImg.src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=" + "<?php echo $row->Student_ID; ?>";
                    }
                    generateQR();
                </script>

                <h6><?php echo $row->Fname; ?> <?php echo $row->MI; ?> <?php echo $row->Lname; ?></h6>
                <p>Full name</p>
                <h6 class="sID"><?php echo $row->Course; ?> <?php echo $row->Year; ?> <?php echo $row->Section; ?></h6>
                <p>Course, Year, and Section</p>
            </div>
            <?php endforeach; ?>

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
                    <li><a class="active" href="<?php foreach($result as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> Borrowing History</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="mobile_side">
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <?php foreach($result as $row):?>
            <div class="user-info">
                <div class="qrBox">
                    <img id="qrImage">
                </div>
                <script>
                    let qrImg = document.getElementById("qrImage");

                    function mobilegenerateQR(){
                        qrImg.src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=" + "<?php echo $row->Student_ID; ?>";
                    }
                    mobilegenerateQR();
                </script>
                
                <h6><?php echo $row->Fname; ?> <?php echo $row->MI; ?> <?php echo $row->Lname; ?></h6>
                <p>Full name</p>
                <h6 class="sID"><?php echo $row->Course; ?> <?php echo $row->Year; ?> <?php echo $row->Section; ?></h6>
                <p>Course, Year, and Section</p>
            </div>
            <?php endforeach; ?>

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
                    <li><a class="active" href="<?php foreach($result as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> Borrowing History</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="col-btn">
                <button class="borrow" id="active" onclick="hideReserveDiv()">Borrowed list</button>
                <button class="reserveBtn" onclick="hideBorrowDiv()">Reservation list</button>
            </div>
            <div class="col-1">
                <div class="toRent-container">
                    <?php if (!empty($results)): ?>
                        <?php foreach($results as $row): ?>
                            <div class="book-container">
                                <div class="thumbnail">
                                    <?php if(empty($row->thumbnail)): ?>
                                        <span>Image not available</span>
                                    <?php else: ?>
                                        <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>" alt="Book Thumbnail">
                                    <?php endif; ?>
                                </div>
                                <div class="book-info">
                                    <p class="accession-p"><?php echo $row->accession_no; ?></p>
                                    <p class="title-p"><?php echo $row->book_title; ?></p>
                                    <p class="author-p">Author: <?php echo $row->author; ?></p>
                                    <p class="author-p">Edition: <?php echo $row->edition; ?></p>
                                    <p class="author-p">Date borrowed: <?php echo $row->borrow_date; ?></p>
                                    <p class="due-date">Due on: <?php echo $row->due; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="p-container">
                            <p>No data found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="col-2">
                <div class="toRent-container">
                    <?php if (!empty($reserve)): ?>
                        <?php foreach($reserve as $row):?>
                            <div class="book-container">
                                <div class="thumbnail">
                                    <?php if(empty($row->thumbnail)): ?>
                                        <span>image not available</span>
                                    <?php else: ?>
                                        <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>" alt="" srcset="">
                                    <?php endif; ?>
                                </div>
                                <div class="book-info">
                                    <p class="accession-p"><?php echo $row->accession_no; ?></p>
                                    <p class="title-p"><?php echo $row->book_title; ?></p>
                                    <p class="author-p">Author: <?php echo $row->author; ?></p>
                                    <p class="author-p">Edition: <?php echo $row->edition; ?></p>
                                    <p class="author-p">Date borrowed: <?php echo $row->reserve_date; ?></p>
                                    <p class="due-date">Due on: <?php echo $row->due; ?></p>
                                    <p class="author-p">reserve: <?php echo $row->status; ?></p>
                                    <a href="<?php foreach($result as $rows):?><?php echo base_url("Auth/cancel_reservation/$rows->Student_ID/$row->ID");?><?php endforeach; ?>">Cancel</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="p-container">
                            <p>No data found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if(isset($toCancel)):?>
        <div class="confirmation_class">
            <div class="confirmation_container">
                <div class="close_btn">
                    <h6>Confirmation cancelation</h6>
                    <button onclick="close_close_btn()"><i class="fa-solid fa-x"></i></button>
                </div>
                <?php foreach($toCancel as $row):?>
                <div class="confirmation_content">
                    <div class="thumbnail3">
                        <?php if(empty($row->thumbnail)): ?>
                            <span>image not available</span>
                        <?php else: ?>
                            <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>" alt="" srcset="">
                        <?php endif; ?>
                    </div>
                        <div class="book-info3">
                            <p class="title-p"><?php echo $row->book_title; ?></p>
                            <p class="author-p">Author: <?php echo $row->author; ?></p>

                            <div class="confirm_btn">
                                <a href="<?php echo base_url("Post/cancel_reservation/$row->ID");?>" class="button">Confirm</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif?>
    </div>
<script>
    // Function to replace "%" with a space in the table
    function replacePercentageWithSpace() {
        const table = document.getElementById("myTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            for (let j = 0; j < cells.length; j++) {
                cells[j].innerHTML = cells[j].innerHTML.replace('%20', ' ');
            }
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Get all elements with the class "due-date"
        const dueDates = document.querySelectorAll(".due-date");

        dueDates.forEach(function(dueDateElement) {
            // Extract the text content after "Due on: "
            const dateText = dueDateElement.textContent.replace("Due on: ", "").trim();
                        
            // Parse the date
            const pDate = new Date(dateText);

            // Get today's date (only the date part)
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Compare the dates
            if (pDate < today) {
                const diffTime = Math.abs(today - pDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                dueDateElement.textContent = `Overdue by ${diffDays} days`;
                dueDateElement.style.color = "red"; // Overdue
            } else if (pDate > today) {
                const diffTime = Math.abs(today - pDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                dueDateElement.textContent = `Due in ${diffDays} days`;
                dueDateElement.style.color = "green"; // Overdue
            } else {
                dueDateElement.textContent="Due today";
                dueDateElement.style.color = "red"; // Overdue
            }
        });
    });
</script>

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