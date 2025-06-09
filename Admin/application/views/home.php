<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home.css">
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP | ADMIN</title>

</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);">
    <div class="container"></div>

    <div class="header">
        <img src="<?php echo base_url('assets/image/USTP-Logo2.png'); ?>" alt="USTP Logo">

        <ul class="nav">
            <li><a href="<?php echo base_url("Auth/home"); ?>">Home</a></li>
            <li><a href="<?php echo base_url("Auth/books"); ?>">Library</a></li>
            <li><a href="<?php echo base_url("Auth/most_borrowed_books"); ?>">Reports</a></li>
            <li><a href="<?php echo base_url("Auth/settings");?>"><i class="fa-solid fa-gear"></i> Settings</a></li>
        </ul>

        <ul class="logout">
            <li><a href="<?php echo base_url("Auth/logout"); ?>" style="color: rgb(219, 24, 24);"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
    </div>

    <div class="body">
        <div class="content">
            <!-- Content for the body section -->
            <?php foreach($data as $row):?>
                <h1>Welcome <?php echo $row->Fname; ?> <?php echo $row->MI; ?>. <?php echo $row->Lname; ?></h1>
            <?php endforeach; ?>
            <p>The admin dashboard manage your library, rental system, and users easily from here.</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Make an AJAX request to trigger the backend logic
            fetch('<?= base_url("duedate/check_due_dates") ?>', {
                method: 'GET',
                headers: { 'Content-Type': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.status); // Logs 'success'
            })
            .catch(error => console.error('Error:', error));
        };

        window.addEventListener('load', function() {
            fetch('<?= base_url("SmsController/get_Due_Borrow") ?>', {
                method: 'GET',
                headers: { 'Content-Type': 'application/json' },
                mode: 'cors'
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.status); // Logs 'success'
            })
            .catch(error => console.error('Error:', error));
        });
        
        window.addEventListener('load', function() {
            fetch('<?= base_url("duedate/check_due_approval_dates") ?>', {
                method: 'GET',
                headers: { 'Content-Type': 'application/json' },
                mode: 'cors'
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.status); // Logs 'success'
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
