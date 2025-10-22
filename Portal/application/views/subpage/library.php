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
            <h4><i class="fa-solid fa-table-columns"></i> Dashboard</h4>
            <?php foreach($data as $row):?>
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
                        <a href="#" onclick="toggleLibraryMenu(event)" class="active-dropdown"><i class="fa-solid fa-book"></i> Library <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="submenu active" id="librarySubmenu">
                            <li><a class="active" href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
                            <li><a href="<?php echo base_url("Auth/ebooks")?>"><i class="fa-solid fa-tablet-screen-button"></i> E-books</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> Borrowing History</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
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
                        <a href="#" onclick="toggleLibraryMenuMobile(event)" class="active-dropdown"><i class="fa-solid fa-book"></i> Library <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="submenu active" id="librarySubmenuMobile">
                            <li><a class="active" href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
                            <li><a href="<?php echo base_url("Auth/ebooks")?>"><i class="fa-solid fa-tablet-screen-button"></i> E-books</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> Borrowing History</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
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