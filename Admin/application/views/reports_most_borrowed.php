<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/report.css">
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead USTP | ADMIN</title>
</head>
<body style="background-image: url(<?php echo base_url('assets/image/bg-image-library.png') ?>);">
    <div class="container"></div>

    <div class="header">
        <img src="<?php echo base_url('assets/image/USTP-Logo2.png'); ?>" alt="USTP Logo">

        <ul class="nav">
            <li><a href="<?php echo base_url("Auth/home"); ?>">Home</a></li>
            <li><a class="active" href="#">Most borrowed books</a></li>
            <li><a href="<?php echo base_url("Auth/most_borrower"); ?>">Most borrowers</a></li>
        </ul>
    </div>

    <div class="body">
        <div class="content">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Book Title</th>
                        <th>Book Author</th>
                        <th>Times Borrowed</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $rank = 1;
                foreach($most_borrowed_books as $row): ?>
                     <tr>
                        <td><?php echo $rank++; ?></td>
                        <td><?php echo $row->book_title; ?></td>
                        <td><?php echo $row->author; ?></td>
                        <td><?php echo $row->borrow_count; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>