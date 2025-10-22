<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/books.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS | ADMIN</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/home");?>"><i class="fa-solid fa-arrow-left"></i> Home</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a href="<?php echo base_url("Auth/books");?>"><i class="fa-solid fa-book"></i> Physical Books</a></li>
            <li><a href="<?php echo base_url("Auth/ebooks");?>"><i class="fa-solid fa-tablet-screen-button"></i> Digital Library</a></li>
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
            <h5>Library</h5>
            <div class="search">
                <form action="<?php echo site_url('post/searchBook'); ?>" method="get">
                    <input type="text" name="search" placeholder="Search..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="col-2">   
            <?php if (!empty($results)): ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Thumbnail</th>
                    <th>Accession No.</th>
                    <th>Date Received</th>
                    <th>Classification</th>
                    <th>Author</th>
                    <th style="width:250px;">Title</th>
                    <th>Edition</th>
                    <th>Volumes</th>
                    <th>Pages</th>
                    <th>Source of fund</th>
                    <th>Cost Price</th>
                    <th>Published</th>
                    <th>Copies</th>
                    <th>Available</th>
                    <th>Year</th>
                    <th>REMARKS</th>
                </tr>
                <?php foreach($results as $row):?>
                <tr>
                    <td><?php echo isset($row->ID) ? $row->ID : ''; ?></td>
                    <?php $thumb = isset($row->thumbnail) ? $row->thumbnail : ''; ?>
                    <?php if(!empty($thumb)):?>
                        <td><img src="<?php echo base_url('assets/image/uploads/thumbnail/'); ?><?php echo $thumb; ?>" alt="" srcset=""></td>
                    <?php else:?>
                        <td><p>image not available</p></td>
                    <?php endif; ?>
                    <td><?php echo isset($row->accession_no) ? $row->accession_no : ''; ?></td>
                    <td><?php echo isset($row->date_received) ? $row->date_received : ''; ?></td>
                    <td><?php echo isset($row->classification) ? $row->classification : ''; ?></td>
                    <td><?php echo isset($row->author) ? $row->author : ''; ?></td>
                    <td><?php echo isset($row->title) ? $row->title : ''; ?></td>
                    <td><?php echo isset($row->edition) ? $row->edition : ''; ?></td>
                    <td><?php echo isset($row->volume) ? $row->volume : ''; ?></td>
                    <td><?php echo isset($row->pages) ? $row->pages : ''; ?></td>
                    <td><?php echo isset($row->sourceoffund) ? $row->sourceoffund : ''; ?></td>
                    <td><?php echo isset($row->costprice) ? $row->costprice : ''; ?></td>
                    <td><?php echo isset($row->published) ? $row->published : ''; ?></td>
                    <td><?php echo isset($row->copies) ? $row->copies : ''; ?></td>
                    <td><?php echo isset($row->available) ? $row->available : ''; ?></td>
                    <td><?php echo isset($row->year) ? $row->year : ''; ?></td>
                    <td><?php echo isset($row->remarks) ? $row->remarks : ''; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <p style="display:flex; align-items:center; justify-content:center; color:#333;text-align:center;">No data found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>