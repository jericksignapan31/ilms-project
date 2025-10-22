<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/members.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS | ADMIN</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/books");?>"><i class="fa-solid fa-arrow-left"></i> Library</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a onclick="hide_show_sub_nav_book_members()" href="#"><i class="fa-solid fa-list"></i> Manage Patrons</a></li>
                <ul id="sub-dropdown-members" class="sub-dropdown">
                    <li><a href="<?php echo base_url("Auth/add_members");?>"><i class="fa-solid fa-plus"></i> Add Patrons</a></li>
                    <li><a href="<?php echo base_url("Auth/update_members");?>"><i class="fa-solid fa-pen-to-square"></i> Update Patrons</a></li>
                    <li><a href="<?php echo base_url("Auth/delete_members");?>"><i class="fa-solid fa-trash"></i> Delete Patrons</a></li>
                </ul>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Patrons</h5>
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
                    <th>Profile</th>
                    <th>ID</th>
                    <th>Name of Patrons</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact_Number</th>
                    <th>Year level</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Birthdate</th>
                </tr>
                <?php foreach($results as $row):?>
                <tr>
                    <td><img src="http://192.168.0.104/USTP/Library_Management_System/Portal/assets/image/uploads/<?php echo $row->profile; ?>" alt="" srcset=""></td>
                    <td><?php echo $row->Student_ID; ?></td>
                    <td><?php echo $row->Fname; ?> <?php echo $row->Lname; ?> <?php echo $row->MI; ?></td>
                    <td><?php echo $row->Address; ?></td>
                    <td><?php echo $row->Email; ?></td>
                    <td><?php echo $row->Contact_Number; ?></td>
                    <td><?php echo $row->Year; ?></td>
                    <td><?php echo $row->Course; ?></td>
                    <td><?php echo $row->Section; ?></td>
                    <td><?php echo $row->Birthdate; ?></td>
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