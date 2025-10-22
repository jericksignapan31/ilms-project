<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/library.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP - E-books</title>
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
                            <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
                            <li><a href="<?php echo base_url("Auth/ebooks")?>" class="active"><i class="fa-solid fa-tablet-screen-button"></i> E-books</a></li>
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
                            <li><a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
                            <li><a href="<?php echo base_url("Auth/ebooks")?>" class="active"><i class="fa-solid fa-tablet-screen-button"></i> E-books</a></li>
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
            <div class="ebooks-header">
                <h2><i class="fa-solid fa-tablet-screen-button"></i> Digital Library - E-books</h2>
                <p>Browse and download digital materials</p>
            </div>

            <div class="ebook-search-container">
                <input type="text" id="ebookSearch" placeholder="Search by title, author, or category..." onkeyup="filterEbooks()">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <div class="ebook-filter-tags">
                <button class="filter-tag active" onclick="filterByCategory('all')">All</button>
                <button class="filter-tag" onclick="filterByCategory('computer science')">Computer Science</button>
                <button class="filter-tag" onclick="filterByCategory('engineering')">Engineering</button>
                <button class="filter-tag" onclick="filterByCategory('business')">Business</button>
                <button class="filter-tag" onclick="filterByCategory('mathematics')">Mathematics</button>
                <button class="filter-tag" onclick="filterByCategory('science')">Science</button>
            </div>
            
            <div class="ebook-grid-portal">
                <?php if (!empty($ebooks)): ?>
                    <?php foreach($ebooks as $ebook):?>
                        <div class="ebook-card-portal" data-title="<?php echo strtolower($ebook->title); ?>" data-author="<?php echo strtolower($ebook->author); ?>" data-category="<?php echo strtolower($ebook->category); ?>">
                            <div class="ebook-thumbnail-portal">
                                <?php if($ebook->thumbnail && $ebook->thumbnail != 'default_ebook.jpg'): ?>
                                    <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/ebook_thumbnails/<?php echo $ebook->thumbnail; ?>" alt="<?php echo $ebook->title; ?>">
                                <?php else: ?>
                                    <div class="default-ebook-thumb-portal">
                                        <i class="fa-solid fa-file-pdf"></i>
                                        <span><?php echo $ebook->file_type; ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="ebook-overlay">
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                            </div>
                            <div class="ebook-info-portal">
                                <h6><?php echo $ebook->title; ?></h6>
                                <p class="ebook-author-portal">by <?php echo $ebook->author; ?></p>
                                <p class="ebook-category-portal"><i class="fa-solid fa-tag"></i> <?php echo $ebook->category; ?></p>
                                <div class="ebook-meta-portal">
                                    <span><i class="fa-solid fa-file"></i> <?php echo $ebook->file_type; ?></span>
                                    <span><i class="fa-solid fa-hdd"></i> <?php echo $ebook->file_size; ?></span>
                                </div>
                                <div class="ebook-stats-portal">
                                    <span><i class="fa-solid fa-download"></i> <?php echo $ebook->downloads; ?></span>
                                    <span><i class="fa-solid fa-eye"></i> <?php echo $ebook->views; ?></span>
                                </div>
                                <div class="ebook-actions-portal">
                                    <?php foreach($data as $student):?>
                                        <a href="<?php echo base_url("Auth/view_ebook/$ebook->ID/$student->Student_ID"); ?>" class="btn-view-ebook-portal">
                                            <i class="fa-solid fa-eye"></i> View Details
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-ebooks-portal">
                        <i class="fa-solid fa-book-open"></i>
                        <h4>No e-books available yet</h4>
                        <p>Check back later for digital materials</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <style>
        /* Submenu styling */
        .submenu {
            display: none;
            list-style: none;
            padding-left: 20px;
            margin-top: 5px;
        }
        .submenu.active {
            display: block;
        }
        .submenu li {
            margin: 5px 0;
        }
        .submenu li a {
            font-size: 14px;
            padding: 8px 15px;
            display: block;
            color: #666;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .submenu li a:hover,
        .submenu li a.active {
            background: #f0f0f0;
            color: #2237a2;
            padding-left: 20px;
        }
        nav ul li > a i.fa-chevron-down {
            float: right;
            transition: transform 0.3s ease;
        }
        nav ul li > a.active-dropdown i.fa-chevron-down {
            transform: rotate(180deg);
        }

        /* E-books page styling */
        .ebooks-header {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .ebooks-header h2 {
            color: #2237a2;
            margin: 0 0 5px 0;
        }
        .ebooks-header p {
            color: #666;
            margin: 0;
        }
        .ebook-search-container {
            position: relative;
            margin-bottom: 20px;
        }
        .ebook-search-container input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 15px;
            background: white;
        }
        .ebook-search-container i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 18px;
        }
        .ebook-filter-tags {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        .filter-tag {
            padding: 8px 20px;
            border: 2px solid #ddd;
            background: white;
            border-radius: 20px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            color: #666;
            transition: all 0.3s ease;
        }
        .filter-tag:hover,
        .filter-tag.active {
            background: #2237a2;
            color: white;
            border-color: #2237a2;
        }
        .ebook-grid-portal {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 25px;
        }
        .ebook-card-portal {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .ebook-card-portal:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .ebook-thumbnail-portal {
            height: 220px;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .ebook-thumbnail-portal img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .ebook-card-portal:hover .ebook-thumbnail-portal img {
            transform: scale(1.1);
        }
        .ebook-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(34, 55, 162, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .ebook-card-portal:hover .ebook-overlay {
            opacity: 1;
        }
        .ebook-overlay i {
            font-size: 50px;
            color: white;
        }
        .default-ebook-thumb-portal {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #2237a2;
        }
        .default-ebook-thumb-portal i {
            font-size: 70px;
            margin-bottom: 10px;
        }
        .default-ebook-thumb-portal span {
            font-size: 14px;
            font-weight: bold;
        }
        .ebook-info-portal {
            padding: 18px;
        }
        .ebook-info-portal h6 {
            font-size: 16px;
            color: #333;
            margin: 0 0 8px 0;
            min-height: 45px;
            line-height: 1.4;
            font-weight: bold;
        }
        .ebook-author-portal {
            font-size: 13px;
            color: #666;
            margin: 0 0 8px 0;
        }
        .ebook-category-portal {
            font-size: 12px;
            color: #2237a2;
            margin: 0 0 12px 0;
            font-weight: bold;
        }
        .ebook-meta-portal {
            display: flex;
            gap: 12px;
            font-size: 11px;
            color: #666;
            margin-bottom: 10px;
        }
        .ebook-stats-portal {
            display: flex;
            gap: 15px;
            font-size: 11px;
            color: #999;
            margin-bottom: 15px;
        }
        .ebook-actions-portal {
            margin-top: 15px;
        }
        .btn-view-ebook-portal {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #2237a2;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-view-ebook-portal:hover {
            background-color: #1a2c7f;
        }
        .no-ebooks-portal {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 15px;
            grid-column: 1 / -1;
        }
        .no-ebooks-portal i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .no-ebooks-portal h4 {
            color: #333;
            margin-bottom: 10px;
        }
        .no-ebooks-portal p {
            color: #666;
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

        // E-book search filter
        function filterEbooks() {
            const searchValue = document.getElementById('ebookSearch').value.toLowerCase();
            const ebookCards = document.querySelectorAll('.ebook-card-portal');
            
            ebookCards.forEach(card => {
                const title = card.getAttribute('data-title');
                const author = card.getAttribute('data-author');
                const category = card.getAttribute('data-category');
                
                if (title.includes(searchValue) || author.includes(searchValue) || category.includes(searchValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Filter by category
        function filterByCategory(category) {
            const ebookCards = document.querySelectorAll('.ebook-card-portal');
            const filterButtons = document.querySelectorAll('.filter-tag');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            // Filter cards
            ebookCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                
                if (category === 'all' || cardCategory.includes(category)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
