<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png?v=<?php echo time(); ?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/books.css?v=<?php echo time(); ?>">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js?v=<?php echo time(); ?>"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS | ADMIN - Digital Library</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/home");?>"><i class="fa-solid fa-arrow-left"></i> Home</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a href="<?php echo base_url("Auth/books");?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
            <li class="active"><a href="<?php echo base_url("Auth/ebooks");?>"><i class="fa-solid fa-tablet-screen-button"></i> Digital Library</a></li>
            <li><a onclick="hide_show_sub_nav_book()" href="#"><i class="fa-solid fa-list"></i> Manage E-books</a></li>
                <ul id="sub-dropdown" class="sub-dropdown">
                    <li><a href="<?php echo base_url("Auth/add_ebook");?>"><i class="fa-solid fa-plus"></i> Add E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/update_ebook");?>"><i class="fa-solid fa-pen-to-square"></i> Update E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/delete_ebook");?>"><i class="fa-solid fa-trash"></i> Delete E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/archive_ebook");?>"><i class="fa-solid fa-box-archive"></i> Archived E-books</a></li>
                </ul>
            <li><a href="<?php echo base_url("Auth/members");?>"><i class="fa-solid fa-users"></i> Patrons</a></li>
            <li><a onclick="hide_show_sub_nav_trans()" href="#"><i class="fa-solid fa-list-check"></i> Transactions</a></li>
                <ul id="sub-dropdown-trans" class="sub-dropdown">
                    <li><a href="<?php echo base_url("Auth/borrow_approval");?>"><i class="fa-solid fa-clock"></i> Borrow Approval</a></li>
                    <li><a href="<?php echo base_url("Auth/borrow");?>"><i class="fa-solid fa-hand-holding-heart"></i> Borrowed</a></li>
                    <li><a href="<?php echo base_url("Auth/reserve");?>"><i class="fa-solid fa-bookmark"></i> Reserved</a></li>
                </ul>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Digital Library - E-books & Materials</h5>
            <div class="search">
                <form action="<?php echo site_url('post/searchEbook'); ?>" method="get">
                    <input type="text" name="search" placeholder="Search e-books..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="col-2">
            <div class="ebook-stats">
                <div class="stat-box">
                    <h3><?php echo count($results); ?></h3>
                    <p>Total E-books</p>
                </div>
                <div class="stat-box">
                    <h3><?php 
                        $total_downloads = 0;
                        foreach($results as $row) {
                            $total_downloads += $row->downloads;
                        }
                        echo $total_downloads;
                    ?></h3>
                    <p>Total Downloads</p>
                </div>
                <div class="stat-box">
                    <h3><?php 
                        $total_views = 0;
                        foreach($results as $row) {
                            $total_views += $row->views;
                        }
                        echo $total_views;
                    ?></h3>
                    <p>Total Views</p>
                </div>
            </div>

            <?php if (!empty($results)): ?>
            <div class="ebook-grid">
                <?php foreach($results as $row): ?>
                <div class="ebook-card">
                    <div class="ebook-thumbnail">
                        <?php if($row->thumbnail && $row->thumbnail != 'default_ebook.jpg'): ?>
                            <img src="<?php echo base_url('assets/image/uploads/ebook_thumbnails/' . $row->thumbnail . '?v=' . time()); ?>" alt="<?php echo $row->title; ?>">
                        <?php else: ?>
                            <div class="default-thumbnail">
                                <i class="fa-solid fa-file-pdf"></i>
                                <span><?php echo $row->file_type; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ebook-info">
                        <h6><?php echo $row->title; ?></h6>
                        <p class="author">by <?php echo $row->author; ?></p>
                        <p class="category"><i class="fa-solid fa-tag"></i> <?php echo $row->category; ?></p>
                        <div class="ebook-meta">
                            <span><i class="fa-solid fa-file"></i> <?php echo $row->file_type; ?></span>
                            <span><i class="fa-solid fa-hdd"></i> <?php echo $row->file_size; ?></span>
                        </div>
                        <div class="ebook-stats-small">
                            <span><i class="fa-solid fa-download"></i> <?php echo $row->downloads; ?></span>
                            <span><i class="fa-solid fa-eye"></i> <?php echo $row->views; ?></span>
                        </div>
                        <?php if($row->isbn): ?>
                            <p class="isbn">ISBN: <?php echo $row->isbn; ?></p>
                        <?php endif; ?>
                        <div class="ebook-actions">
                            <a href="<?php echo base_url('assets/ebooks/' . $row->file_name); ?>" class="btn-download" download>
                                <i class="fa-solid fa-download"></i> Download
                            </a>
                            <a href="<?php echo base_url('assets/ebooks/' . $row->file_name); ?>" class="btn-view" target="_blank">
                                <i class="fa-solid fa-eye"></i> View
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <div class="no-ebooks">
                    <i class="fa-solid fa-book-open"></i>
                    <h4>No e-books available yet</h4>
                    <p>Start building your digital library by adding e-books</p>
                    <a href="<?php echo base_url('Auth/add_ebook'); ?>" class="btn-add">
                        <i class="fa-solid fa-plus"></i> Add First E-book
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
        .ebook-stats {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-box {
            flex: 1;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-box h3 {
            font-size: 36px;
            color: #2237a2;
            margin-bottom: 5px;
        }
        .stat-box p {
            color: #666;
            font-size: 14px;
        }
        .ebook-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .ebook-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .ebook-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .ebook-thumbnail {
            height: 200px;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .ebook-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .default-thumbnail {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #2237a2;
        }
        .default-thumbnail i {
            font-size: 60px;
            margin-bottom: 10px;
        }
        .ebook-info {
            padding: 15px;
        }
        .ebook-info h6 {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            min-height: 40px;
        }
        .author {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }
        .category {
            font-size: 12px;
            color: #2237a2;
            margin-bottom: 10px;
        }
        .ebook-meta {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .ebook-stats-small {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
        }
        .isbn {
            font-size: 11px;
            color: #999;
            margin-bottom: 15px;
        }
        .ebook-actions {
            display: flex;
            gap: 10px;
        }
        .btn-download,
        .btn-view {
            flex: 1;
            padding: 8px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-download {
            background-color: #2237a2;
            color: white;
        }
        .btn-download:hover {
            background-color: #1a2c7f;
        }
        .btn-view {
            background-color: #f4f4f4;
            color: #333;
        }
        .btn-view:hover {
            background-color: #e0e0e0;
        }
        .no-ebooks {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
        }
        .no-ebooks i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .no-ebooks h4 {
            color: #333;
            margin-bottom: 10px;
        }
        .no-ebooks p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn-add {
            display: inline-block;
            background-color: #2237a2;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-add:hover {
            background-color: #1a2c7f;
        }
    </style>
</body>
</html>
