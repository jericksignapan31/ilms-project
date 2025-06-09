<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/update_book.css">
    <script src="<?php echo base_url(); ?>assets/javascript/check_input.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js"></script>
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
            <h5>Update books from library system</h5>
            <div class="search">
                <form action="<?php echo site_url('post/searchBooktoUpdate'); ?>" method="get">
                    <input type="text" name="search" placeholder="Search..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="col-2">
            <?php if (!empty($results)): ?>
            <table id="dataTable">
                <tr>
                    <th>Id</th>
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
                    <td><?php echo $row->ID; ?></td>
                    <td><?php echo $row->accession_no; ?></td>
                    <td><?php echo $row->date_received; ?></td>
                    <td><?php echo $row->classification; ?></td>
                    <td><?php echo $row->author; ?></td>
                    <td><?php echo $row->title; ?></td>
                    <td><?php echo $row->edition; ?></td>
                    <td><?php echo $row->volume; ?></td>
                    <td><?php echo $row->pages; ?></td>
                    <td><?php echo $row->sourceoffund; ?></td>
                    <td><?php echo $row->costprice; ?></td>
                    <td><?php echo $row->published; ?></td>
                    <td><?php echo $row->copies; ?></td>
                    <td><?php echo $row->available; ?></td>
                    <td><?php echo $row->year; ?></td>
                    <td><?php echo $row->remarks; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <p style="display:flex; align-items:center; justify-content:center; color:#333;text-align:center;">No data found.</p>
            <?php endif; ?>
        </div>
        <div class="col-3">
            <form name="formAddBooks" onsubmit="return checkAddBooks()" action="<?php echo base_url("Post/update_book")?>"method="POST">
                <span id="Errors" class="error"></span>
                <?php
                    if($this->session->flashdata('error-AccessionNumber')) {	?>
                    <p class="text-danger text-center" id="warning-check-book" style="font-size:10px; color:red;"><?=$this->session->flashdata('error-AccessionNumber')?></p>
                <?php } ?>
                <?php
                    if($this->session->flashdata('error-book')) {	?>
                    <p class="text-danger text-center" id="warning-check-book" style="font-size:10px; color:red;"><?=$this->session->flashdata('error-book')?></p>
                <?php } ?>
                <div class="group-0">
                    <div class="div-input">
                        <p>Book thumbnail </p>
                        <input type="file" name="file-upload" id="file-upload" class="file-input" accept="image/png, image/jpeg">
                    </div>
                </div>
                <div class="group-1">
                    <div class="div-input">
                        <p>ID</p>
                        <input type="text" name="ID" id="ID">
                    </div>
                    <div class="div-input">
                        <p>Accession Number</p>
                        <input type="text" name="AccessionNumber" id="AccessionNumber">
                    </div>

                    <div class="div-input">
                        <p>Date Received</p>
                        <input type="text" name="DateReceived" id="DateReceived">
                    </div>
                    
                    <div class="div-input">
                        <p>Pages</p>
                        <input type="number" name="Pages" id="Pages" placeholder="0">
                    </div>

                    <div class="div-input">
                        <p>Copies</p>
                        <input type="Number" name="Copies" id="Copies" placeholder="0">
                    </div>
                    
                    <div class="div-input">
                        <p>Available</p>
                        <input type="Number" name="Available" id="Available" placeholder="0">
                    </div>
                </div>

                <div class="group-2">
                    <div class="div-input">
                        <p>Classification</p>
                        <input type="text" name="Classification" id="Classification">
                    </div>

                    <div class="div-input">
                        <p>Author</p>
                        <textarea type="text" name="Author" id="Author" rows="1" cols="70"></textarea>
                    </div>

                    <div class="div-input">
                        <p>Title</p>
                        <input type="text" name="Title" id="Title">
                    </div>
                </div>
                
                <div class="group-3">
                    <div class="div-input">
                        <p>Edition</p>
                        <input type="number" name="Edition" id="Edition">
                    </div>
                    
                    <div class="div-input">
                        <p>Volumes</p>
                        <input type="number" name="Volumes" id="Volumes">
                    </div>

                    <div class="div-input" style="width:50%;">
                        <p>Published</p>
                        <input type="text" name="Published" id="Published">
                    </div>
                </div>

                <div class="group-4">
                    <div class="div-input">
                        <p>Source of found</p>
                        <input type="text" name="Sourceoffound" id="Sourceoffound">
                    </div>
                    
                    <div class="div-input">
                        <p>Cost price</p>
                        <input type="number" name="Costprice" id="Costprice" step="0.01">
                    </div>

                    <div class="div-input">
                        <p>Year</p>
                        <input type="number" min="1900" max="2100" name="Year" id="Year">
                    </div>

                    <div class="div-input">
                        <p>Remarks</p>
                        <input type="text" name="remarks" id="remarks">
                    </div>
                </div>

                <div class="group-5">
                    <div class="div-input">
                        <input type="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
        if($this->session->flashdata('data-update')) {	?>
        <div class="data_update_class" id="data_update_class">
            <div class="container">
                <p class="text-danger text-center" id="warning-check-book" style="font-size:12px; color:Green;"><?=$this->session->flashdata('data-update')?></p>
            </div>
        </div>
    <?php } ?>

    <script>
        // Select table and add click event listener
        const table = document.getElementById('dataTable');
        
        table.addEventListener('click', function (event) {
            const row = event.target.closest('tr'); // Find the clicked row
                
            if (row && row.rowIndex > 0) { // Exclude header row
            const cells = row.getElementsByTagName('td'); // Get all cells in the row
                
                if (cells.length > 0) {
                    // Debugging: Log the clicked row values
                    console.log("Row data:", Array.from(cells).map(cell => cell.textContent.trim()));
                    
                    // Populate input fields with row values
                    document.getElementById('ID').value = cells[0].textContent.trim();
                    document.getElementById('AccessionNumber').value = cells[1].textContent.trim();
                    document.getElementById('DateReceived').value = cells[2].textContent.trim();
                    document.getElementById('Classification').value = cells[3].textContent.trim();
                    document.getElementById('Pages').value = cells[8].textContent.trim();
                    document.getElementById('Copies').value = cells[12].textContent.trim();
                    document.getElementById('Available').value = cells[13].textContent.trim();
                    document.getElementById('Author').value = cells[4].textContent.trim();
                    document.getElementById('Title').value = cells[5].textContent.trim();
                    document.getElementById('Edition').value = cells[6].textContent.trim();
                    document.getElementById('Volumes').value = cells[7].textContent.trim();
                    document.getElementById('Published').value = cells[11].textContent.trim();
                    document.getElementById('Sourceoffound').value = cells[9].textContent.trim();
                    document.getElementById('Costprice').value = cells[10].textContent.trim();
                    document.getElementById('Year').value = cells[14].textContent.trim();
                    document.getElementById('remarks').value = cells[15].textContent.trim();
                }
            }
        });

        //auto adjust textarea
        const textarea = document.getElementById('Author');

        const autoAdjustHeight = (e) => {
            e.target.style.height = 'auto'; 
            e.target.style.height = e.target.scrollHeight + 'px'; 
        };
        textarea.addEventListener('input', autoAdjustHeight);

        // Function to hide the div after 5 seconds
        setTimeout(function() {
                const div = document.getElementById('data_update_class');
                if (div) {
                    div.style.display = 'none';
                }
            }, 3000); // 5000 milliseconds = 5 seconds
    </script>
</body>
</html>