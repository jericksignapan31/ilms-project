<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/library.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP - E-book Details</title>
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
            <?php if (!empty($ebook)): ?>
                <?php foreach($ebook as $eb):?>
                <div class="ebook-details-container">
                    <div class="back-link">
                        <a href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-arrow-left"></i> Back to Library</a>
                    </div>
                    
                    <div class="ebook-detail-grid">
                        <div class="ebook-cover">
                            <?php if($eb->thumbnail && $eb->thumbnail != 'default_ebook.jpg'): ?>
                                <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/ebook_thumbnails/<?php echo $eb->thumbnail; ?>" alt="<?php echo $eb->title; ?>">
                            <?php else: ?>
                                <div class="default-cover">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    <span><?php echo $eb->file_type; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="ebook-info-detail">
                            <div class="ebook-badge">
                                <span class="badge-digital"><i class="fa-solid fa-laptop"></i> Digital Material</span>
                            </div>
                            <h2><?php echo $eb->title; ?></h2>
                            <p class="author-name"><i class="fa-solid fa-user"></i> <strong>Author:</strong> <?php echo $eb->author; ?></p>
                            
                            <div class="ebook-metadata">
                                <div class="meta-item">
                                    <i class="fa-solid fa-tag"></i>
                                    <span><strong>Category:</strong> <?php echo $eb->category; ?></span>
                                </div>
                                <?php if($eb->isbn): ?>
                                <div class="meta-item">
                                    <i class="fa-solid fa-barcode"></i>
                                    <span><strong>ISBN:</strong> <?php echo $eb->isbn; ?></span>
                                </div>
                                <?php endif; ?>
                                <div class="meta-item">
                                    <i class="fa-solid fa-file"></i>
                                    <span><strong>Format:</strong> <?php echo $eb->file_type; ?></span>
                                </div>
                                <div class="meta-item">
                                    <i class="fa-solid fa-hdd"></i>
                                    <span><strong>Size:</strong> <?php echo $eb->file_size; ?></span>
                                </div>
                                <?php if($eb->publisher): ?>
                                <div class="meta-item">
                                    <i class="fa-solid fa-building"></i>
                                    <span><strong>Publisher:</strong> <?php echo $eb->publisher; ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if($eb->year): ?>
                                <div class="meta-item">
                                    <i class="fa-solid fa-calendar"></i>
                                    <span><strong>Year:</strong> <?php echo $eb->year; ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if($eb->pages): ?>
                                <div class="meta-item">
                                    <i class="fa-solid fa-file-lines"></i>
                                    <span><strong>Pages:</strong> <?php echo $eb->pages; ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if($eb->language): ?>
                                <div class="meta-item">
                                    <i class="fa-solid fa-language"></i>
                                    <span><strong>Language:</strong> <?php echo $eb->language; ?></span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="ebook-stats-detail">
                                <div class="stat-item">
                                    <i class="fa-solid fa-download"></i>
                                    <span><?php echo $eb->downloads; ?> Downloads</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fa-solid fa-eye"></i>
                                    <span><?php echo $eb->views; ?> Views</span>
                                </div>
                            </div>

                            <?php if($eb->description): ?>
                            <div class="ebook-description">
                                <h3>Description</h3>
                                <p><?php echo nl2br($eb->description); ?></p>
                            </div>
                            <?php endif; ?>

                            <div class="ebook-actions-detail">
                                <a href="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/ebooks/<?php echo $eb->file_name; ?>" 
                                   class="btn-download-ebook" 
                                   download
                                   onclick="incrementDownload(<?php echo $eb->ID; ?>)">
                                    <i class="fa-solid fa-download"></i> Download E-book
                                </a>
                                <a href="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/ebooks/<?php echo $eb->file_name; ?>" 
                                   class="btn-view-online" 
                                   target="_blank">
                                    <i class="fa-solid fa-eye"></i> View Online
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-data">
                    <i class="fa-solid fa-exclamation-triangle"></i>
                    <h3>E-book not found</h3>
                    <p>The e-book you're looking for might have been removed or archived.</p>
                    <a href="<?php echo base_url("Auth/library")?>">Return to Library</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
        .ebook-details-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .back-link {
            margin-bottom: 20px;
        }
        .back-link a {
            color: #2237a2;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .back-link a:hover {
            color: #1a2c7f;
        }
        .ebook-detail-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }
        .ebook-cover {
            background: #f4f4f4;
            border-radius: 10px;
            overflow: hidden;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .ebook-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .default-cover {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #2237a2;
        }
        .default-cover i {
            font-size: 80px;
            margin-bottom: 15px;
        }
        .default-cover span {
            font-size: 18px;
            font-weight: bold;
        }
        .ebook-info-detail h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .author-name {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        .ebook-badge {
            margin-bottom: 15px;
        }
        .badge-digital {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .ebook-metadata {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .meta-item i {
            color: #2237a2;
            font-size: 18px;
        }
        .ebook-stats-detail {
            display: flex;
            gap: 30px;
            margin-bottom: 20px;
            padding: 15px;
            background: #e8f4f8;
            border-radius: 8px;
        }
        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #0066cc;
            font-weight: bold;
        }
        .ebook-description {
            margin-bottom: 25px;
        }
        .ebook-description h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .ebook-description p {
            color: #666;
            line-height: 1.6;
        }
        .ebook-actions-detail {
            display: flex;
            gap: 15px;
        }
        .btn-download-ebook,
        .btn-view-online {
            flex: 1;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .btn-download-ebook {
            background: #2237a2;
            color: white;
        }
        .btn-download-ebook:hover {
            background: #1a2c7f;
        }
        .btn-view-online {
            background: #28a745;
            color: white;
        }
        .btn-view-online:hover {
            background: #218838;
        }
        .no-data {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 15px;
        }
        .no-data i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .no-data h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .no-data p {
            color: #666;
            margin-bottom: 20px;
        }
        .no-data a {
            display: inline-block;
            background: #2237a2;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        .no-data a:hover {
            background: #1a2c7f;
        }

        @media (max-width: 768px) {
            .ebook-detail-grid {
                grid-template-columns: 1fr;
            }
            .ebook-cover {
                height: 300px;
            }
            .ebook-metadata {
                grid-template-columns: 1fr;
            }
            .ebook-actions-detail {
                flex-direction: column;
            }
        }
    </style>

    <script>
        function incrementDownload(ebookId) {
            // Send AJAX request to increment download count
            fetch('<?php echo base_url("Post/increment_ebook_download/"); ?>' + ebookId, {
                method: 'GET'
            });
        }
    </script>
</body>
</html>
