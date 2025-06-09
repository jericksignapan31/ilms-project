<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/delete_book.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/check_input.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP | ADMIN</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/books");?>"><i class="fa-solid fa-arrow-left"></i> library</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a onclick="hide_show_sub_nav_book_inventory()" href="#"><i class="fa-solid fa-list"></i>Inventory</a></li>
                <ul id="sub-dropdown-management" class="sub-dropdown">
                    <li><a onclick="hide_show_sub_nav_book_management()" href="#"><i class="fa-solid fa-book"></i> Manage books</a></li>
                        <ul id="sub-dropdown-management-1" class="sub-dropdown-1">
                            <li><a href="<?php echo base_url("Auth/add_book");?>"><i class="fa-solid fa-plus"></i> Add Book</a></li>
                            <li><a href="<?php echo base_url("Auth/update_book");?>"><i class="fa-solid fa-pen-to-square"></i> Update Book</a></li>
                            <li><a href="<?php echo base_url("Auth/delete_book");?>"><i class="fa-solid fa-trash"></i> Archive Book</a></li>
                        </ul>
                        <li><a href="<?php echo base_url("Auth/archieve_book");?>"><i class="fa-solid fa-boxes-stacked"></i> Archives</a></li>
                </ul>
            <li><a onclick="hide_show_sub_nav_book_transaction()" href="#"><i class="fa-solid fa-arrow-right-arrow-left"></i> Transaction</a></li>
                <ul id="sub-dropdown-transaction" class="sub-dropdown">
                    <li><a href="<?php echo base_url("Auth/borrow_approval");?>"><i class="fa-solid fa-book-open-reader"></i> Borrow approval list</a></li>
                    <li><a href="<?php echo base_url("Auth/borrow");?>"><i class="fa-solid fa-book-open-reader"></i> Borrowed list</a></li>
                    <li><a href="<?php echo base_url("Auth/reserve");?>"><i class="fa-solid fa-pen-to-square"></i> Reservation list</a></li>
                </ul>
            <li><a href="<?php echo base_url("Auth/members"); ?>"><i class="fa-solid fa-user-group"></i> Members</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Archived Books</h5>
            <div class="search">
                <form action="<?php echo site_url('post/searchBooktoDelete'); ?>" method="get">
                    <input type="text" name="search" placeholder="Search..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="col-2">
            <?php if (!empty($results)): ?>
                <table>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Id</th>
                        <th>Accession No.</th>
                        <th>Classification</th>
                        <th>Author</th>
                        <th style="width:250px;">Title</th>
                        <th>Edition</th>
                        <th>Volumes</th>
                        <th>Pages</th>
                        <th>REMARKS</th>
                    </tr>
                    <?php foreach($results as $rows):?>
                        <tr>
                            <td><a id="delete" href="<?php echo base_url("Auth/getBookToDelete/$rows->ID");?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            <td><a id="restore" href="<?php echo base_url("Auth/getBookToRestore/$rows->ID");?>"><i class="fa-solid fa-arrows-rotate"></i></a></td>
                            <td><?php echo $rows->ID; ?></td>
                            <td><?php echo $rows->accession_no; ?></td>
                            <td><?php echo $rows->classification; ?></td>
                            <td><?php echo $rows->author; ?></td>
                            <td><?php echo $rows->title; ?></td>
                            <td><?php echo $rows->edition; ?></td>
                            <td><?php echo $rows->volume; ?></td>
                            <td><?php echo $rows->pages; ?></td>
                            <td><?php echo $rows->remarks; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p style="display:flex; align-items:center; justify-content:center; color:#333;text-align:center;">No data found.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php if(isset($toDelete)):?>
        <div class="confirmation_class">
            <div class="confirmation_container">
                <div class="close_btn">
                    <h6>Do you really want to weed out this Book?</h6>
                    <button onclick="close_close_btn()"><i class="fa-solid fa-x"></i></button>
                </div>
                <?php foreach($toDelete as $row):?>
                <div class="confirmation_content">
                    <div class="thumbnail3">
                        <?php if(empty($row->thumbnail)): ?>
                            <span>image not available</span>
                        <?php else: ?>
                            <img src="<?php echo base_url('assets/image/uploads/thumbnail/'); ?><?php echo $row->thumbnail; ?>" alt="" srcset="">
                        <?php endif; ?>
                    </div>
                        <div class="book-info3">
                            <p class="title-p"><?php echo $row->title; ?></p>
                            <p class="author-p">Author: <?php echo $row->author; ?></p>

                            <div class="confirm_btn">
                                <a href="<?php echo base_url("Post/delete_book/$row->ID");?>" class="button">Confirm</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif?>
    
    <?php if(isset($toRestore)):?>
        <div class="confirmation_class">
            <div class="confirmation_container">
                <div class="close_btn">
                    <h6>Book restoration confirmation</h6>
                    <button onclick="close_close_btn()"><i class="fa-solid fa-x"></i></button>
                </div>
                <?php foreach($toRestore as $row):?>
                <div class="confirmation_content">
                    <div class="thumbnail3">
                        <?php if(empty($row->thumbnail)): ?>
                            <span>image not available</span>
                        <?php else: ?>
                            <img src="<?php echo base_url('assets/image/uploads/thumbnail/'); ?><?php echo $row->thumbnail; ?>" alt="" srcset="">
                        <?php endif; ?>
                    </div>
                        <div class="book-info3">
                            <p class="title-p"><?php echo $row->title; ?></p>
                            <p class="author-p">Author: <?php echo $row->author; ?></p>

                            <div class="confirm_btn">
                                <a href="<?php echo base_url("Post/restore_book/$row->ID");?>" class="button">Confirm</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif?>
</body>
</html>