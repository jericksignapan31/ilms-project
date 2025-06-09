<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all_borrowable.css">
    <script src="<?php echo base_url(); ?>Portal/assets/javascript/borrow_book_confirmation.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);" onload="generateQR()">
    <div class="header">
        <div class="header-container">
            <div class="image">
                <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/USTP-Logo2.png" alt="">
            </div>
        </div>
        <div class="header-container">
            <?php foreach($data as $row):?>
            <h6><?php echo $row->Student_ID; ?></h6>
            <img class="profile-picture" src="<?php echo base_url('assets/image/uploads/'); ?><?php echo $row->profile; ?>" alt="" srcset="">
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
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="search">
                <form action="<?php echo site_url('post/searchBorrowable'); ?>" method="get">
                    <input type="text" name="search" placeholder="Search..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="toRent-container">
                <?php if (!empty($results)): ?>
                    <?php foreach($results as $row):?>
                        <a href="<?php echo base_url("Auth/view_book/$row->ID")?>">
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
                                    <p class="title-p"><?php echo $row->title; ?></p>
                                    <p class="author-p">Author: <?php echo $row->author; ?></p>
                                    <p class="author-p">Pages: <?php echo $row->pages; ?></p>
                                    <?php if($row->edition):?>
                                        <p class="author-p">Edition: <?php echo $row->edition; ?></p>
                                    <?php else: ?>
                                        <p class="author-p">Edition: N/A</p>
                                    <?php endif; ?>
                                    <?php if($row->volume):?>
                                        <p class="author-p">Volume: <?php echo $row->volume; ?></p>
                                    <?php else: ?>
                                        <p class="author-p">Volume: N/A</p>
                                    <?php endif; ?>
                                    <?php if($row->costprice >= 0):?>
                                        <p class="price"><?php echo $row->costprice; ?></p>

                                        <script>
                                            function convertToPeso() {
                                                // Select all <p> tags with the class "price"
                                                const priceElements = document.querySelectorAll('.price');

                                                // Iterate over each <p> tag
                                                priceElements.forEach(priceElement => {
                                                    // Get the current value and convert it to a number
                                                    const priceValue = parseFloat(priceElement.textContent);

                                                    // Format the value as peso
                                                    const formattedPrice = new Intl.NumberFormat('en-PH', {
                                                        style: 'currency',
                                                        currency: 'PHP',
                                                    }).format(priceValue);

                                                    // Update the <p> tag with the formatted value
                                                    priceElement.textContent = formattedPrice;
                                                });
                                            }
                                        </script>
                                    <?php elseif($row->costprice == ""): ?>
                                        <p class="price">0.00</p>
                                    <?php elseif($row->costprice == 0): ?>
                                        <p class="price">0.00</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                        <div class="p-container">
                            <p style="display:flex; align-items:center; justify-content:center; color:#333;text-align:center;">No data found.</p>
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>