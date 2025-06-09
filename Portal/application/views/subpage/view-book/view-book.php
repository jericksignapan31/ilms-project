<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/view-book.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hideAndShow.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);" onload="generateQR()">
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
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-calendar-days"></i> Home</a></li>
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
                <div class="view-container">
                    <?php if (!empty($results)): ?>
                        <?php foreach($results as $row):?>
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
                                    <p class="author-p">Pages: <?php echo $row->pages; ?></p>
                                    <p class="author-p">Edition: <?php echo $row->edition; ?></p>
                                    <p class="author-p">Volume: <?php echo $row->volume; ?></p>
                                </div>
                                <div class="function">
                                    <?php if ($total_borrowed >= 3): ?>
                                        <a href="<?php foreach($data as $rows):?><?php echo base_url("Auth/getToRead/$row->ID")?><?php endforeach; ?>" class="button">Read</a>
                                    <?php else: ?>
                                        <?php if($row->available > 0):?>
                                            <a href="<?php foreach($data as $rows):?><?php echo base_url("Auth/getToBorrow/$row->ID")?><?php endforeach; ?>" class="button">Borrow</a>
                                            <a href="<?php foreach($data as $rows):?><?php echo base_url("Auth/getToRead/$row->ID")?><?php endforeach; ?>" class="button">Read</a>
                                        <?php else:?>
                                            <p>Book not available.</p>
                                        <?php endif; ?>
                                    <?php endif; ?>
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

            <div class="col2">
                <div class="toRent-container">
                    <?php if (!empty($result)): ?>
                        <?php foreach($result as $rows):?>
                            <a href="<?php echo base_url("Auth/view_book/$rows->ID")?>">
                                <div class="book-container2">
                                    <div class="thumbnail2">
                                        <?php if(empty($rows->thumbnail)): ?>
                                            <span>image not available</span>
                                        <?php else: ?>
                                        <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $rows->thumbnail; ?>" alt="" srcset="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="book-info2">
                                        <p class="title-p"><?php echo $rows->title; ?></p>
                                        <p class="author-p">Author: <?php echo $rows->author; ?></p>
                                        <p class="author-p">Pages: <?php echo $rows->pages; ?></p>
                                        <p class="author-p">Edition: <?php echo $rows->edition; ?></p>
                                        <p class="author-p">Volume: <?php echo $rows->volume; ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="p-container">
                            <p>No data found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if(isset($toBorrow)):?>
        <div class="confirmation_class">
            <div class="confirmation_container">
                <div class="close_btn">
                    <h6>Borrowing confirmation</h6>
                    <button onclick="close_close_btn()"><i class="fa-solid fa-x"></i></button>
                </div>
                <?php foreach($results as $row):?>
                <div class="confirmation_content">
                    <div class="thumbnail3">
                        <?php if(empty($row->thumbnail)): ?>
                            <span>image not available</span>
                        <?php else: ?>
                            <img src="https://192.168.0.108/USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>" alt="" srcset="">
                        <?php endif; ?>
                    </div>
                    <div class="book-info3">
                        <p class="title-p"><?php echo $row->title; ?></p>
                        <p class="author-p">Author: <?php echo $row->author; ?></p>

                        <div class="confirm_btn">
                            <a href="<?php foreach($data as $rows):?><?php echo base_url("Post/borrow/$rows->Student_ID/$row->ID")?><?php endforeach; ?>" class="button">Confirm</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif?>

        <?php if(isset($toRead)):?>
        <div class="confirmation_class">
            <div class="confirmation_container">
                <div class="close_btn">
                    <h6>Read book confirmation</h6>
                    <button onclick="close_close_btn()"><i class="fa-solid fa-x"></i></button>
                </div>
                <?php foreach($results as $row):?>
                <div class="confirmation_content">
                    <div class="thumbnail3">
                        <?php if(empty($row->thumbnail)): ?>
                            <span>image not available</span>
                        <?php else: ?>
                            <img src="https:///USTP/Library_Management_System/Admin/assets/image/uploads/thumbnail/<?php echo $row->thumbnail; ?>" alt="" srcset="">
                        <?php endif; ?>
                    </div>
                        <div class="book-info3">
                            <p class="title-p"><?php echo $row->title; ?></p>
                            <p class="author-p">Author: <?php echo $row->author; ?></p>

                            <div class="confirm_btn">
                                <a href="<?php foreach($data as $rows):?><?php echo base_url("Post/Read/$rows->Student_ID/$row->ID")?><?php endforeach; ?>" class="button">Confirm</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php endif?>

        

        <div class="mobile_side">
            <h4><i class="fa-solid fa-book"></i> Library</h4>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url("Auth/home")?>"><i class="fa-solid fa-calendar-days"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url("Auth/library")?>"><i class="fa-solid fa-book"></i> Library</a></li>
                    <li><a href="<?php foreach($data as $row):?><?php echo base_url("Auth/borrowing/$row->Student_ID")?><?php endforeach; ?>"><i class="fa-solid fa-book-open-reader"></i> borrowing history</a></li>
                    <li><a href="<?php echo base_url("Auth/virtual_ID")?>"><i class="fa-solid fa-id-card"></i> Virtual ID</a></li>
                    <li><a href="<?php echo base_url("Auth/profile")?>"><i class="fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="<?php echo base_url("Auth/logout")?>"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </nav>
        </div>

        <?php if($this->session->flashdata('borrowError')) {	?>
            <div class="error_class">
                <div class="error_container">
                    <div class="close_btn">
                        <h6></h6>
                        <button onclick="close_error_btn()"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <div class="error_content">
                        <p class="text-danger text-center" style="margin-top: 10px; color:red; text-align:center;"> <?=$this->session->flashdata('borrowError')?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>