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
            <h4><i class="fa-solid fa-book-open-reader"></i> History</h4>

            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a class="active" href="<?php foreach($result as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
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
                    <li><a class="active" href="<?php foreach($result as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
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

</body>
</html>