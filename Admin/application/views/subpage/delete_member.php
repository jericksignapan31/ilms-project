<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/delete_member.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/check_input.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP | ADMIN</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/members");?>"><i class="fa-solid fa-arrow-left"></i> Patrons</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a href="<?php echo base_url("Auth/add_members");?>"><i class="fa-solid fa-plus"></i> Add Patrons</a></li>
            <li><a href="<?php echo base_url("Auth/update_members");?>"><i class="fa-solid fa-pen-to-square"></i> Update Patrons</a></li>
            <li class="active"><a href="#"><i class="fa-solid fa-trash"></i> Delete Patrons</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Delete Patrons to library system</h5>
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
                    <td><a href="<?php echo base_url("Post/delete_members/$row->Student_ID");?>"><i class="fa-solid fa-trash-can"></i></a></td>
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