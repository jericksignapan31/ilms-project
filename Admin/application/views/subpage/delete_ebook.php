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
    <title>iRead IIS | ADMIN - Archive E-book</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/ebooks");?>"><i class="fa-solid fa-arrow-left"></i> Digital Library</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a onclick="hide_show_sub_nav_book()" href="#"><i class="fa-solid fa-book"></i> Manage E-books</a></li>
                <ul id="sub-dropdown" class="sub-dropdown">
                    <li><a href="<?php echo base_url("Auth/add_ebook");?>"><i class="fa-solid fa-plus"></i> Add E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/update_ebook");?>"><i class="fa-solid fa-pen-to-square"></i> Update E-book</a></li>
                    <li class="active"><a href="<?php echo base_url("Auth/delete_ebook");?>"><i class="fa-solid fa-box-archive"></i> Archive E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/archive_ebook");?>"><i class="fa-solid fa-archive"></i> Archived E-books</a></li>
                </ul>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Archive E-book / Digital Material</h5>
            <p>Archive e-books instead of deleting them permanently</p>
            <div class="info-box">
                <i class="fa-solid fa-info-circle"></i>
                <p>Archived e-books can be restored later. To permanently delete, go to Archived E-books.</p>
            </div>
        </div>
        <hr>
        <div class="col-2">
            <?php if($this->session->flashdata('ebook-archived')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('ebook-archived'); ?>
                </div>
            <?php endif; ?>

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
                            <span><i class="fa-solid fa-book-open"></i> <?php echo $row->isbn; ?></span>
                        </div>
                        <div class="ebook-meta">
                            <span><i class="fa-solid fa-file"></i> <?php echo $row->file_type; ?></span>
                            <span><i class="fa-solid fa-hdd"></i> <?php echo $row->file_size; ?></span>
                        </div>
                        <div class="ebook-stats-small">
                            <span><i class="fa-solid fa-download"></i> <?php echo $row->downloads; ?> downloads</span>
                            <span><i class="fa-solid fa-eye"></i> <?php echo $row->views; ?> views</span>
                        </div>
                        <p class="upload-date">
                            <i class="fa-solid fa-calendar"></i> Uploaded: <?php echo date('M d, Y', strtotime($row->upload_date)); ?>
                        </p>
                        <div class="ebook-actions">
                            <a href="<?php echo base_url('Post/archive_ebook/' . $row->ID); ?>" class="btn-archive" onclick="return confirm('Are you sure you want to archive this e-book? You can restore it later from Archived E-books.')">
                                <i class="fa-solid fa-box-archive"></i> Archive
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <div class="no-ebooks">
                    <i class="fa-solid fa-folder-open"></i>
                    <h4>No e-books available</h4>
                    <p>All e-books have been archived or none exist yet</p>
                    <a href="<?php echo base_url('Auth/add_ebook'); ?>" class="btn-add">
                        <i class="fa-solid fa-plus"></i> Add E-book
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
        .info-box {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 5px;
            padding: 15px;
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-box i {
            color: #856404;
            font-size: 20px;
        }
        .info-box p {
            margin: 0;
            color: #856404;
            font-size: 14px;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
        .upload-date {
            font-size: 11px;
            color: #999;
            margin-bottom: 15px;
        }
        .ebook-actions {
            margin-top: 15px;
        }
        .btn-archive {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ffc107;
            color: #000;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-archive:hover {
            background-color: #e0a800;
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
