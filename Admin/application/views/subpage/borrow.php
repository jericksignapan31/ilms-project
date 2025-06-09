<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/borrow.css">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js"></script>

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
                            <li><a href="<?php echo base_url("Auth/delete_book");?>"><i class="fa-solid fa-trash"></i> Delete Book</a></li>
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
            <h5>Borrowed list</h5>
            <div class="search">
                <form action="<?php echo site_url('post/searchBookBorrowed'); ?>" method="get">
                    <input type="text" name="search" placeholder="Search student ID" required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="col-2">   
            <?php if (!empty($results)): ?>
            <table id="myTable">
                <tr>
                    <th>Id</th>
                    <th>Thumbnail</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th style="width:300px;">Title</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>Borrow date</th>
                    <th>Due</th>
                </tr>
                <?php foreach($results as $row):?>
                <tr>
                    <td><?php echo $row->ID; ?></td>
                    <td style="display:none;"><?php echo $row->book_ID; ?></td>
                    <td style="display:none;"><?php echo $row->thumbnail; ?></td>
                    <?php if($row->thumbnail != ""):?>
                        <td><img src="<?php echo base_url('assets/image/uploads/thumbnail/'); ?><?php echo $row->thumbnail; ?>" alt="" srcset=""></td>
                    <?php else:?>
                        <td><p>image not available</p></td>
                    <?php endif; ?>
                    <td><?php echo $row->student_ID; ?></td>
                    <td><?php echo $row->Fname; ?> <?php echo $row->MI; ?> <?php echo $row->Lname; ?> <?php echo $row->Suffix; ?></td>
                    <td><?php echo $row->book_title; ?></td>
                    <td><?php echo $row->author; ?></td>
                    <td><?php echo $row->edition; ?></td>
                    <td><?php echo $row->borrow_date; ?></td>
                    <td class = "due-date"><?php echo $row->due; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <p style="display:flex; align-items:center; justify-content:center; color:#333;text-align:center;">No data found.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="confirmation_class" id="confirmation_class">
        <div class="confirmation_container">
            <div class="close_btn">
                <h6>Book returning</h6>
                <button onclick="close_close_btn()"><i class="fa-solid fa-x"></i></button>
            </div>
            <div class="confirmation_content">
                <div class="thumbnail3">
                    <img id="myImage" src="" alt="" srcset="">
                </div>
                <div class="book-info3">
                    <p id="transaction_ID-p"></p>
                    <p id="title-p"></p>
                    <p id="author-p"></p>
                    <p id="edition-p"></p>
                    <p id="student_ID-p"></p>
                    <p id="student_name-p"></p>

                    <div class="confirm_btn">
                        <a href="#" onclick="open_qr_btn()" class="button">Return</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="qr_class" id="qr_class">
        <div class="qr_container">
            <div class="close_btn">
                <h6>Book returning</h6>
                <button onclick="close_qr_btn()"><i class="fa-solid fa-x"></i></button>
            </div>
            <div class="qr_content">
                <div class="result">
                    <h1>QR Code Scanner</h1>
                    <p id="scanned">Scanned student QR for ID verification: </p>
                </div>
                <div id="reader" style="width: 300px;"></div>
            </div>
        </div>
    </div>

    <?php
        if($this->session->flashdata('book-returned')) {	?>
        <div class="book_return_class" id="book_return_class">
            <div class="container">
                <p class="text-danger text-center" id="warning-check-book" style="font-size:12px; color:Green;"><?=$this->session->flashdata('book-returned')?></p>
            </div>
        </div>
    <?php } ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Get all elements with the class "due-date"
            const dueDates = document.querySelectorAll(".due-date");

            dueDates.forEach(function(dueDateElement) {
                // Extract the text content after "Due on: "
                const dateText = dueDateElement.textContent.replace("Due on: ", "").trim();
                            
                // Parse the date
                const pDate = new Date(dateText);

                // Get today's date (only the date part)
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                // Compare the dates
                if (pDate < today) {
                    const diffTime = Math.abs(today - pDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    dueDateElement.textContent = `${diffDays} day/s overdue`;
                    dueDateElement.style.color = "red"; // Overdue
                } else if (pDate > today) {
                    const diffTime = Math.abs(today - pDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    dueDateElement.textContent = `${diffDays} day/s to due`;
                    dueDateElement.style.color = "green"; // Overdue
                } else {
                    dueDateElement.textContent="Due today";
                    dueDateElement.style.color = "red"; // Overdue
                }
            });
        });
        // Function to hide the div after 3 seconds
        setTimeout(function() {
            const div = document.getElementById('book_return_class');
            if (div) {
                div.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds

        // JavaScript to show the div when the table is clicked
        const table = document.getElementById('myTable');
        const infoDiv = document.getElementById('confirmation_class');
        let transaction_ID = '';
        let s_ID = '';
        let b_ID = '';
        let scannedQr = '';

        table.addEventListener('click', function (event) {
            infoDiv.style.display = 'flex';
            const row = event.target.closest('tr'); // Find the clicked row
                
            if (row && row.rowIndex > 0) { // Exclude header row
                const cells = row.getElementsByTagName('td'); // Get all cells in the row
                
                if (cells.length > 0) {
                    // Debugging: Log the clicked row values
                    console.log("Row data:", Array.from(cells).map(cell => cell.textContent.trim()));
                    
                    const imageElement = document.getElementById('myImage');
                    const baseUrl = "<?php echo base_url('assets/image/uploads/thumbnail/');?>";
                    const imagePath = cells[1].textContent.trim();
                    const fullImagePath = baseUrl + imagePath;

                    // Set the image source
                    imageElement.src = fullImagePath;

                    // Populate input fields with row values
                    document.getElementById('transaction_ID-p').textContent = "Transaction ID: " + cells[0].textContent.trim();
                    document.getElementById('title-p').textContent = cells[5].textContent.trim();
                    document.getElementById('author-p').textContent = "Author: " + cells[6].textContent.trim();
                    document.getElementById('edition-p').textContent = "Edition: " + cells[7].textContent.trim();
                    document.getElementById('student_ID-p').textContent = "Student ID: " + cells[4].textContent.trim();
                    document.getElementById('student_name-p').textContent = "Student Name: " + cells[5].textContent.trim();
                    transaction_ID = cells[0].textContent.trim();
                    s_ID = cells[4].textContent.trim();
                    b_ID = cells[1].textContent.trim();
                }
            }
        });

        window.addEventListener('DOMContentLoaded', (event) => {

            function onScanSuccess(decodedText, decodedResult) {
                console.log(`Code scanned = ${decodedText}`, decodedResult);
                scannedQr = decodedText;
                document.getElementById('scanned').textContent = "Scanned student QR for ID verification: " + scannedQr;

                returnBook(transaction_ID, s_ID, b_ID, scannedQr);
            }

            function onScanFailure(error) {
                console.warn(`Code scan error = ${error}`);
            }

            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        });

        function returnBook(transaction_ID, s_ID, b_ID, scannedQr) {
            if(s_ID === scannedQr){
                const url = "<?php echo base_url('Post/returnBook'); ?>";
                window.location.href = `${url}?transaction_ID=${encodeURIComponent(transaction_ID)}&b_ID=${encodeURIComponent(b_ID)}`;
            }
            else{
                alert("Qr code error!");
            }
        }

        
    </script>
</body>
</html>