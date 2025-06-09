<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/library.css">
    <script src="<?php echo base_url(); ?>assets/javascript/borrow_book_confirmation.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);">
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
                    <li><a class="active" href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="mobile_side">
            <h4><i class="fa-solid fa-book"></i> Library</h4>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>

        <div class="main">
            <div class="col-1">
                <div class="toRent-container">
                    <?php if (!empty($results)): ?>
                        <?php foreach($results as $row):?>
                            <?php foreach($data as $rows):?>
                                <a href="<?php echo base_url("Auth/view_book/$row->ID/$rows->Student_ID")?>">
                            <?php endforeach; ?>
                                <div class="book-container">
                                    <div class="thumbnail">
                                        <?php if(empty($row->thumbnail)): ?>
                                            <span>image not available</span>
                                        <?php else: ?>
                                        <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>" alt="" srcset="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="book-info">
                                        <p class="title-p"><?php echo $row->title; ?></p>
                                        <p class="author-p">Author: <?php echo $row->author; ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                            <div class="book-container" style="background-color: rgb(212, 212, 212); display: flex; align-items:center; justify-content:center; padding: 10px;">
                                <a href="<?php echo base_url("Auth/show_all_borrowable_books")?>">Show all available to borrow</a>
                            </div>
                    <?php else: ?>
                        <div class="p-container">
                            <p>No data found.</p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="something">
                    <img src="<?php echo base_url(); ?>assets/image/book_style.png" alt="">
                </div>
            </div>
            <div class="col-2">
                <?php if (!empty($results)): ?>
                    <a href="<?php echo base_url("Auth/show_all_books")?>">Show all</a>
                    <table>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Edition</th>
                            <th>Volumes</th>
                            <th>Pages</th>
                            <th>Price</th>
                        </tr>
                        <?php foreach($result as $row):?>
                        <tr>
                            <?php if($row->thumbnail != ""):?>
                                <td style="width: 30px;"><img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>"></td>
                            <?php else:?>
                                <td></td>
                            <?php endif; ?>
                            <td class="allTitle" style="width: 300px;"><?php echo $row->title; ?></td>
                            <td class="allAuthor" style="width: 300px;"><?php echo $row->author; ?></td>
                            <td><?php echo $row->edition; ?></td>
                            <td><?php echo $row->volume; ?></td>
                            <td><?php echo $row->pages; ?></td>
                            <td>₱<?php echo $row->costprice; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p style="display:flex; align-items:center; justify-content:center; color:#333;text-align:center;">No data found.</p>
                 <?php endif; ?>
            </div>
        </div>
    </div>
   <script>
        // Function to shorten text if length is greater than a threshold
        function shortenText(text, maxLength) {
            if (text.length > maxLength) {
                return text.slice(0, maxLength) + '...';
            }
            return text;
        }

        // Select and process all elements with the class "title-p"
        document.querySelectorAll('.title-p').forEach(title => {
            let shortenedText = shortenText(title.textContent, 30); // Set 100 as the max length
            title.textContent = shortenedText; // Update the element's text content
        });

        // Select and process all elements with the class "title-p"
        document.querySelectorAll('.author-p').forEach(title => {
            let shortenedText = shortenText(title.textContent, 30); // Set 100 as the max length
            title.textContent = shortenedText; // Update the element's text content
        });

        document.querySelectorAll('.allTitle').forEach(title => {
            let shortenedText = shortenText(title.textContent, 30); // Set 100 as the max length
            title.textContent = shortenedText; // Update the element's text content
        });
        
        document.querySelectorAll('.allAuthor').forEach(title => {
            let shortenedText = shortenText(title.textContent, 30); // Set 100 as the max length
            title.textContent = shortenedText; // Update the element's text content
        });
    </script>

</body>
</html>