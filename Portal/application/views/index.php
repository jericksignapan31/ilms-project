<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css">
    <script src="<?php echo base_url(); ?>assets/javascript/RealtimeUpdate.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS</title>
    
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/image/USTP-white-Logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo base_url("Auth/home")?>">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="btn"><a href="<?php echo base_url("Auth/login_page")?>">Login</a></li>
            </ul>
        </nav>
    </div>
    <div class="main">
        <img src="<?php echo base_url(); ?>assets/image/Logo.png" alt="Library Logo">
        <h1>IIS Library Management System</h1>
        <h2>(iRead Talakag Bukidnon)</h2>
        <div class="info-box">
            <p id="date">Date: </p>
            <p id="time">Time: </p>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2025 iRead Talakag Bukidnon. All rights reserved.</p>
    </div>
</body>
</html>
