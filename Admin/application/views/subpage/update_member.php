<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/update_member.css">
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
            <li class="active"><a href="#"><i class="fa-solid fa-pen-to-square"></i> Update Patrons</a></li>
            <li><a href="<?php echo base_url("Auth/delete_members");?>"><i class="fa-solid fa-trash"></i> Delete Patrons</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Update Patrons of library system</h5>
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
                        <th>Profile</th>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>M.I</th>
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
                        <td><?php echo $row->Fname; ?></td>
                        <td><?php echo $row->Lname; ?></td>
                        <td><?php echo $row->MI; ?></td>
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
        <div class="col-3">
            <form name="formAddBooks" onsubmit="return checkAddMembers()" action="<?php echo base_url("Post/update_member")?>"method="POST">
                <span id="Errors" class="error"></span>
                <?php
                    if($this->session->flashdata('error-AccessionNumber')) {	?>
                    <p class="text-danger text-center" id="warning-check-book" style="font-size:10px; color:red;"><?=$this->session->flashdata('error-AccessionNumber')?></p>
                <?php } ?>
                <?php
                    if($this->session->flashdata('error-book')) {	?>
                    <p class="text-danger text-center" id="warning-check-book" style="font-size:10px; color:red;"><?=$this->session->flashdata('error-book')?></p>
                <?php } ?>
                <div class="group-1">
                    <div class="div-input" style="width:15%;">
                        <p>Student ID</p>
                        <input type="text" name="Student_ID" id="Student_ID">
                    </div>

                    <div class="div-input" style="width:30%;">
                        <p>First name</p>
                        <input type="text" name="Fname" id="Fname">
                    </div>
                    
                    <div class="div-input" style="width:30%;">
                        <p>Last name</p>
                        <input type="text" name="Lname" id="Lname">
                    </div>
                    
                    <div class="div-input" style="width:15%;">
                        <p>M.I</p>
                        <input type="text" name="MI" id="MI">
                    </div>
                </div>

                <div class="group-2">
                    <div class="div-input" style="width:20%;">
                        <p>Birthdate</p>
                        <input type="date" name="Birthdate" id="Birthdate">
                    </div>

                    <div class="div-input" style="width:35%;">
                        <p>Email</p>
                        <input type="text" name="Email" id="Email">
                    </div>
                    
                    <div class="div-input" style="width:35%;">
                        <p>Contact Number</p>
                        <input type="number" name="Contact_Number" id="Contact_Number">
                    </div>
                </div>

                <div class="group-3">
                    <div class="div-input" style="width:10%;">
                        <p>Year Level</p>
                        <Select name="Year" id="Year">
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </Select>
                    </div>

                    <div class="div-input" style="width:20%;">
                        <p>Course</p>
                        <input type="text" name="Course" id="Course" placeholder="Example: BSIT">
                    </div>
                    
                    <div class="div-input" style="width:20%;">
                        <p>Section</p>
                        <input type="text" name="Section" id="Section">
                    </div>
                    
                    <div class="div-input" style="width:40%;">
                        <p>Address</p>
                        <input type="text" name="Address" id="Address">
                    </div>
                </div>

                <div class="group-4">
                    <div class="div-input">
                        <input type="submit"value="Save">
                    </div>
                </div>
            </form>
        </div>


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
                    document.getElementById('Student_ID').value = cells[1].textContent.trim();
                    document.getElementById('Fname').value = cells[2].textContent.trim();
                    document.getElementById('Lname').value = cells[3].textContent.trim();
                    document.getElementById('MI').value = cells[4].textContent.trim();
                    document.getElementById('Address').value = cells[5].textContent.trim();
                    document.getElementById('Email').value = cells[6].textContent.trim();
                    document.getElementById('Contact_Number').value = cells[7].textContent.trim();
                    document.getElementById('Year').value = cells[8].textContent.trim();
                    document.getElementById('Course').value = cells[9].textContent.trim();
                    document.getElementById('Section').value = cells[10].textContent.trim();
                    document.getElementById('Birthdate').value = cells[11].textContent.trim();
                }
                }
            });
        </script>
    </div>
</body>
</html>