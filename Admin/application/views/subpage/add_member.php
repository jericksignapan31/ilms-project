<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/add_members.css">
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
            <li class="active"><a href="#"><i class="fa-solid fa-plus"></i> Add Patrons</a></li>
            <li><a href="<?php echo base_url("Auth/update_members");?>"><i class="fa-solid fa-pen-to-square"></i> Update Patrons</a></li>
            <li><a href="<?php echo base_url("Auth/delete_members");?>"><i class="fa-solid fa-trash"></i> Delete Patrons</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Add Patrons to library system</h5>
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
                        <td><?php echo $row->Fname; ?>, <?php echo $row->Lname; ?> <?php echo $row->MI; ?>.</td>
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
            <form name="formAddMembers" onsubmit="return checkAddMembers()" action="<?php echo base_url("Post/add_member")?>" method="POST">
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
                    <div class="div-input" style="width:30%;">
                        <p>Course</p>
                        <Select name="Course" id="Course">
                            <option selected disabled>Select Course</option>
                            <option value="EMT">BSEMT</option>
                            <option value="IT">BSIT</option>
                            <option value="TCM">BSTCM</option>
                        </Select>
                    </div>

                    <div class="div-input" style="width:30%;">
                        <p>Year Level</p>
                        <Select name="Year" id="Year">
                            <option selected disabled>Select Year</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                        </Select>
                    </div>
                    
                    <div class="div-input" style="width:30%;">
                        <p>Section</p>
                        <Select name="Section" id="Section">
                            <option selected disabled>Select Section</option>
                        </Select>
                    </div>
                </div>

                <div class="group-4">
                    <div class="div-input" style="width:23%;">
                        <p>Region</p>
                        <Select name="Region" id="Region">
                            <option selected disabled>Select Region</option>
                            <option value="NCR">NCR</option>
                            <option value="CAR">CAR</option>
                            <option value="Ilocos Region">Ilocos Region</option>
                            <option value="Cagayan Valley">Cagayan Valley</option>
                            <option value="Central Luzon">Central Luzon</option>
                            <option value="Calabarzon">Calabarzon</option>
                            <option value="Mimaropa">Mimaropa</option>
                            <option value="Bicol Region">Bicol Region</option>
                            <option value="Western Visayas">Western Visayas</option>
                            <option value="Negros Island Region">Negros Island Region</option>
                            <option value="Central Visayas">Central Visayas</option>
                            <option value="Eastern Visayas">Eastern Visayas</option>
                            <option value="Zamboanga Peninsula">Zamboanga Peninsula</option>
                            <option value="Northern Mindanao">Northern Mindanao</option>
                            <option value="Davao Region">Davao Region</option>
                            <option value="Soccsksargen">Soccsksargen</option>
                            <option value="Caraga">Caraga</option>
                            <option value="BARMM">BARMM</option>
                        </Select>
                    </div>

                    <div class="div-input" style="width:23%;">
                        <p>Provice</p>
                        <Select name="Province" id="Province">
                            <option selected disabled>Select Province</option>
                        </Select>
                    </div>

                    <div class="div-input" style="width:23%;">
                        <p>City</p>
                        <Select name="City" id="City">
                            <option selected disabled>Select City</option>
                        </Select>
                    </div>
                    
                    <div class="div-input" style="width:23%;">
                        <p>Barangay</p>
                        <Select name="Barangay" id="Barangay">
                            <option selected disabled>Select Barangay</option>
                        </Select>
                    </div>
                </div>

                <div class="group-5">
                    <div class="div-input" style="width:35%;">
                        <p>Street/Village/Subdivision</p>
                        <input type="text" name="purok" id="purok">
                    </div>
                </div>

                <div class="group-6">
                    <div class="div-input">
                        <input type="submit" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Reference to the Year and Section dropdowns
        const yearDropdown = document.getElementById("Year");
        const sectionDropdown = document.getElementById("Section");

        const RegionDropdown = document.getElementById("Region");
        const ProvinceDropdown = document.getElementById("Province");
        const CityDropdown = document.getElementById("City");
        const BarangayDropdown = document.getElementById("Barangay");

        // Event listener for Year dropdown
        yearDropdown.addEventListener("change", function () {
            const year = parseInt(this.value);

            // Clear existing options in Section dropdown
            sectionDropdown.innerHTML = '<option selected disabled>Select section</option>';

            // Set options for the Section dropdown based on Year selection
            if (year === 1) {
                addSectionOptions([
                    { text: "1A", value: "1A" },
                    { text: "1B", value: "1B" },
                    { text: "1C", value: "1C" },
                    { text: "1D", value: "1D" },
                    { text: "1E", value: "1E" },
                    { text: "1F", value: "1F" }
                ]);
            } else if (year === 2) {
                addSectionOptions([
                    { text: "2A", value: "2A" },
                    { text: "2B", value: "2B" },
                    { text: "2C", value: "2C" },
                    { text: "2D", value: "2D" },
                    { text: "2E", value: "2E" },
                    { text: "2F", value: "2F" }
                ]);
            } else if (year === 3) {
                addSectionOptions([
                    { text: "3A", value: "3A" },
                    { text: "3B", value: "3B" },
                    { text: "3C", value: "3C" },
                    { text: "3D", value: "3D" },
                    { text: "3E", value: "3E" },
                    { text: "3F", value: "3F" }
                ]);
            } else if (year === 4) {
                addSectionOptions([
                    { text: "4A", value: "4A" },
                    { text: "4B", value: "4B" },
                    { text: "4C", value: "4C" },
                    { text: "4D", value: "4D" },
                    { text: "4E", value: "4E" },
                    { text: "4F", value: "4F" }
                ]);
            }
        });

        // Function to add options to the Section dropdown
        function addSectionOptions(sections) {
            sections.forEach(section => {
                const option = document.createElement("option");
                option.value = section.value; // Set the option's value
                option.textContent = section.text; // Set the display text
                sectionDropdown.appendChild(option);
            });
        }

        // Event listener for Region dropdown
        RegionDropdown.addEventListener("change", function () {
            const Region = this.value;

            // Clear existing options in Province dropdown
            ProvinceDropdown.innerHTML = '<option selected disabled>Select Province</option>';

            // Set options for the Province dropdown based on Region selection
            if (Region === "NCR") {
                addProvinceOptions([
                    { text: "National Capital Region", value: "National Capital Region" },
                ]);
            }else if(Region === "CAR"){
                addProvinceOptions([
                    { text: "Abra", value: "Abra" },
                    { text: "Apayao", value: "Apayao" },
                    { text: "Benguet", value: "Benguet" },
                    { text: "Ifugao", value: "Ifugao" },
                    { text: "Kalinga", value: "Kalinga" },
                    { text: "Mountain Province", value: "Mountain Province" }
                ]);
            }else if(Region === "Ilocos Region"){
                addProvinceOptions([
                    { text: "Ilocos Norte", value: "Ilocos Norte" },
                    { text: "Ilocos Sur", value: "Ilocos Sur" },
                    { text: "La Union", value: "La Union" },
                    { text: "Pangasinan", value: "Pangasinan" }
                ]);
            }else if(Region === "Cagayan Valley"){
                addProvinceOptions([
                    { text: "Batanes", value: "Batanes" },
                    { text: "Cagayan", value: "Cagayan" },
                    { text: "Isabela", value: "Isabela" },
                    { text: "Nueva Vizcaya", value: "Nueva Vizcaya" },
                    { text: "Quirino", value: "Quirino" }
                ]);
            }else if(Region === "Central Luzon"){
                addProvinceOptions([
                    { text: "Angeles", value: "Angeles" },
                    { text: "Aurora", value: "Aurora" },
                    { text: "Bataan", value: "Bataan" },
                    { text: "Bulacan", value: "Bulacan" },
                    { text: "Nueva Ecija", value: "Nueva Ecija" },
                    { text: "Pampanga", value: "Pampanga" },
                    { text: "Tarlac", value: "Tarlac" },
                    { text: "Zambales", value: "Zambales" },
                    { text: "Olongapo", value: "Olongapo" }
                ]);
            }else if(Region === "Calabarzon"){
                addProvinceOptions([
                    { text: "Batangas", value: "Batangas" },
                    { text: "Cavite", value: "Cavite" },
                    { text: "Laguna", value: "Laguna" },
                    { text: "Quezon", value: "Quezon" },
                    { text: "Rizal", value: "Rizal" },
                    { text: "Lucena", value: "Lucena" }
                ]);
            }else if(Region === "Mimaropa"){
                addProvinceOptions([
                    { text: "Marinduque", value: "Marinduque" },
                    { text: "Occidental Mindoro", value: "Occidental Mindoro" },
                    { text: "Oriental Mindoro", value: "Oriental Mindoro" },
                    { text: "Palawan", value: "Palawan" },
                    { text: "Romblon", value: "Romblon" },
                    { text: "Puerto Princesa", value: "Puerto Princesa" }
                ]);
            }else if(Region === "Bicol Region"){
                addProvinceOptions([
                    { text: "Albay", value: "Albay" },
                    { text: "Camarines Norte", value: "Camarines Norte" },
                    { text: "Camarines Sur", value: "Camarines Sur" },
                    { text: "Catanduanes", value: "Catanduanes" },
                    { text: "Masbate", value: "Masbate" },
                    { text: "Sorsogon", value: "Sorsogon" }
                ]);
            }else if(Region === "Western Visayas"){
                addProvinceOptions([
                    { text: "Aklan", value: "Aklan" },
                    { text: "Antique", value: "Antique" },
                    { text: "Capiz", value: "Capiz" },
                    { text: "Guimaras", value: "Guimaras" },
                    { text: "Iloilo", value: "Iloilo" }
                ]);
            }else if(Region === "Negros Island Region"){
                addProvinceOptions([
                    { text: "Negros Occidental", value: "Negros Occidental" },
                    { text: "Negros Oriental", value: "Negros Oriental" },
                    { text: "Siquijor", value: "Siquijor" },
                    { text: "Bacolod", value: "Bacolod" }
                ]);
            }else if(Region === "Central Visayas"){
                addProvinceOptions([
                    { text: "Bohol", value: "Bohol" },
                    { text: "Cebu", value: "Cebu" }
                ]);
            }else if(Region === "Eastern Visayas"){
                addProvinceOptions([
                    { text: "Biliran", value: "Biliran" },
                    { text: "Eastern Samar", value: "Eastern Samar" },
                    { text: "Northern Samar", value: "Northern Samar" },
                    { text: "Samar", value: "Samar" },
                    { text: "Leyte", value: "Leyte" },
                    { text: "Southern Leyte", value: "Southern Leyte" }
                ]);
            }else if(Region === "Zamboanga Peninsula"){
                addProvinceOptions([
                    { text: "Zamboanga del Norte", value: "Zamboanga del Norte" },
                    { text: "Zamboanga del Sur", value: "Zamboanga del Sur" },
                    { text: "Zamboanga Sibugay", value: "Zamboanga Sibugay" }
                ]);
            }else if(Region === "Northern Mindanao"){
                addProvinceOptions([
                    { text: "Bukidnon", value: "Bukidnon" },
                    { text: "Camiguin", value: "Camiguin" },
                    { text: "Lanao del Norte", value: "Lanao del Norte" },
                    { text: "Misamis Occidental", value: "Misamis Occidental" },
                    { text: "Misamis Oriental", value: "Misamis Oriental" }
                ]);
            }else if(Region === "Davao Region"){
                addProvinceOptions([
                    { text: "Davao de Oro", value: "Davao de Oro" },
                    { text: "Davao del Norte", value: "Davao del Norte" },
                    { text: "Davao del Sur", value: "Davao del Sur" },
                    { text: "Davao Occidental", value: "Davao Occidental" },
                    { text: "Davao Oriental", value: "Davao Oriental" }
                ]);
            }else if(Region === "Soccsksargen"){
                addProvinceOptions([
                    { text: "Cotabato", value: "Cotabato" },
                    { text: "Sarangani", value: "Sarangani" },
                    { text: "South Cotabato", value: "South Cotabato" },
                    { text: "Sultan Kudarat", value: "Sultan Kudarat" }
                ]);
            }else if(Region === "Caraga"){
                addProvinceOptions([
                    { text: "Agusan del Norte", value: "Agusan del Norte" },
                    { text: "Agusan del Sur", value: "Agusan del Sur" },
                    { text: "Dinagat Islands", value: "Dinagat Islands" },
                    { text: "Surigao del Norte", value: "Surigao del Norte" },
                    { text: "Surigao del Sur", value: "Surigao del Sur" }
                ]);
            }else if(Region === "BARMM"){
                addProvinceOptions([
                    { text: "Basilan", value: "Basilan" },
                    { text: "Lanao del Sur", value: "Lanao del Sur" },
                    { text: "Maguindanao del Norte", value: "Maguindanao del Norte" },
                    { text: "Maguindanao del Sur", value: "Maguindanao del Sur" },
                    { text: "Tawi-Tawi", value: "Tawi-Tawi" }
                ]);
            }
        });

        // Function to add options to the Province dropdown
        function addProvinceOptions(provinces) {
            provinces.forEach(province => {
                const option = document.createElement("option");
                option.value = province.value; // Set the option's value
                option.textContent = province.text; // Set the display text
                ProvinceDropdown.appendChild(option);
            });
        }

        ProvinceDropdown.addEventListener("change", function () {
            const Province = this.value;

            // Clear existing options in City dropdown
            CityDropdown.innerHTML = '<option selected disabled>Select City</option>';

            // Set options for the City dropdown based on Province selection
            if (Province === "National Capital Region") {
                addCityOptions([
                    { text: "Caloocan", value: "Caloocan" },
                    { text: "Las Piñas", value: "Las Piñas" },
                    { text: "Makati", value: "Makati" },
                    { text: "Malabon", value: "Malabon" },
                    { text: "Mandaluyong", value: "Mandaluyong" },
                    { text: "Manila", value: "Manila" },
                    { text: "Marikina", value: "Marikina" },
                    { text: "Muntinlupa", value: "Muntinlupa" },
                    { text: "Taguig", value: "Taguig" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "Pasay", value: "Pasay" },
                    { text: "Parañaque", value: "Parañaque" },
                    { text: "Pateros", value: "Pateros" }
                ]);
            }else if (Province === "Abra") {
                addCityOptions([
                        { text: "Bangued", value: "Bangued" },
                        { text: "Boliney", value: "Boliney" },
                        { text: "Bucay", value: "Bucay" },
                        { text: "Bucloc", value: "Bucloc" },
                        { text: "Daguioman", value: "Daguioman" },
                        { text: "Danglas", value: "Danglas" },
                        { text: "Dolores", value: "Dolores" },
                        { text: "La Paz", value: "La Paz" },
                        { text: "Lacub", value: "Lacub" },
                        { text: "Lagangilang", value: "Lagangilang" },
                        { text: "Lagayan", value: "Lagayan" },
                        { text: "Langiden", value: "Langiden" },
                        { text: "Licuan-Baay", value: "Licuan-Baay" },
                        { text: "Luba", value: "Luba" },
                        { text: "Malibcong", value: "Malibcong" },
                        { text: "Manabo", value: "Manabo" },
                        { text: "Peñarrubia", value: "Peñarrubia" },
                        { text: "Pidigan", value: "Pidigan" },
                        { text: "Pilar", value: "Pilar" },
                        { text: "Sallapadan", value: "Sallapadan" },
                        { text: "San Isidro", value: "San Isidro" },
                        { text: "San Juan", value: "San Juan" },
                        { text: "San Quintin", value: "San Quintin" },
                        { text: "Tayum", value: "Tayum" },
                        { text: "Tineg", value: "Tineg" },
                        { text: "Tubo", value: "Tubo" },
                        { text: "Villaviciosa", value: "Villaviciosa" }
                    ]);
            }else if (Province === "Apayao") {
                addCityOptions([
                    { text: "Calanasan", value: "Calanasan" },
                    { text: "Conner", value: "Conner" },
                    { text: "Flora", value: "Flora" },
                    { text: "Kabugao", value: "Kabugao" },
                    { text: "Luna", value: "Luna" },
                    { text: "Pudtol", value: "Pudtol" },
                    { text: "Santa Marcela", value: "Santa Marcela" }
                ]);
            }else if (Province === "Benguet") {
                addCityOptions([
                    { text: "Baguio City", value: "Baguio City" },
                    { text: "Atok", value: "Atok" },
                    { text: "Bakun", value: "Bakun" },
                    { text: "Bokod", value: "Bokod" },
                    { text: "Buguias", value: "Buguias" },
                    { text: "Itogon", value: "Itogon" },
                    { text: "Kabayan", value: "Kabayan" },
                    { text: "Kapangan", value: "Kapangan" },
                    { text: "Kibungan", value: "Kibungan" },
                    { text: "La Trinidad", value: "La Trinidad" },
                    { text: "Mankayan", value: "Mankayan" },
                    { text: "Sablan", value: "Sablan" },
                    { text: "Tuba", value: "Tuba" },
                    { text: "Tublay", value: "Tublay" }
                ]);
            }else if (Province === "Ifugao") {
                addCityOptions([
                    { text: "Alfonso Lista", value: "Alfonso Lista" },
                    { text: "Aguinaldo", value: "Aguinaldo" },
                    { text: "Asipulo", value: "Asipulo" },
                    { text: "Banaue", value: "Banaue" },
                    { text: "Hingyon", value: "Hingyon" },
                    { text: "Hungduan", value: "Hungduan" },
                    { text: "Kiangan", value: "Kiangan" },
                    { text: "Lagawe", value: "Lagawe" },
                    { text: "Lamut", value: "Lamut" },
                    { text: "Mayoyao", value: "Mayoyao" },
                    { text: "Tinoc", value: "Tinoc" }
                ]);
            }else if (Province === "Kalinga") {
                addCityOptions([
                    { text: "Tabuk City", value: "Tabuk City" },
                    { text: "Balbalan", value: "Balbalan" },
                    { text: "Lubuagan", value: "Lubuagan" },
                    { text: "Pasil", value: "Pasil" },
                    { text: "Pinukpuk", value: "Pinukpuk" },
                    { text: "Rizal (Liwan)", value: "Rizal (Liwan)" },
                    { text: "Tanudan", value: "Tanudan" },
                    { text: "Tinglayan", value: "Tinglayan" }
                ]);
            }else if (Province === "Mountain Province") {
                addCityOptions([
                    { text: "Barlig", value: "Barlig" },
                    { text: "Bauko", value: "Bauko" },
                    { text: "Besao", value: "Besao" },
                    { text: "Bontoc", value: "Bontoc" },
                    { text: "Natonin", value: "Natonin" },
                    { text: "Paracelis", value: "Paracelis" },
                    { text: "Sabangan", value: "Sabangan" },
                    { text: "Sadanga", value: "Sadanga" },
                    { text: "Sagada", value: "Sagada" },
                    { text: "Tadian", value: "Tadian" }
                ]);
            }else if (Province === "Ilocos Norte") {
                addCityOptions([
                    { text: "Laoag City", value: "Laoag City" },
                    { text: "Batac City", value: "Batac City" },
                    { text: "Adams", value: "Adams" },
                    { text: "Bacarra", value: "Bacarra" },
                    { text: "Badoc", value: "Badoc" },
                    { text: "Bangui", value: "Bangui" },
                    { text: "Banna (Espiritu)", value: "Banna" },
                    { text: "Burgos", value: "Burgos" },
                    { text: "Carasi", value: "Carasi" },
                    { text: "Currimao", value: "Currimao" },
                    { text: "Dingras", value: "Dingras" },
                    { text: "Dumalneg", value: "Dumalneg" },
                    { text: "Marcos", value: "Marcos" },
                    { text: "Nueva Era", value: "Nueva Era" },
                    { text: "Pagudpud", value: "Pagudpud" },
                    { text: "Paoay", value: "Paoay" },
                    { text: "Pasuquin", value: "Pasuquin" },
                    { text: "Piddig", value: "Piddig" },
                    { text: "Pinili", value: "Pinili" },
                    { text: "San Nicolas", value: "San Nicolas" },
                    { text: "Sarrat", value: "Sarrat" },
                    { text: "Solsona", value: "Solsona" },
                    { text: "Vintar", value: "Vintar" }
                ]);
            }else if (Province === "Ilocos Sur") {
                addCityOptions([
                    { text: "Candon", value: "Candon" },
                    { text: "Vigan", value: "Vigan" },
                    { text: "Alilem", value: "Alilem" },
                    { text: "Banayoyo", value: "Banayoyo" },
                    { text: "Bantay", value: "Bantay" },
                    { text: "Burgos", value: "Burgos" },
                    { text: "Cabugao", value: "Cabugao" },
                    { text: "Caoayan", value: "Caoayan" },
                    { text: "Cervantes", value: "Cervantes" },
                    { text: "Galimuyod", value: "Galimuyod" },
                    { text: "Gregorio del Pilar", value: "Gregorio del Pilar" },
                    { text: "Lidlidda", value: "Lidlidda" },
                    { text: "Magsingal", value: "Magsingal" },
                    { text: "Nagbukel", value: "Nagbukel" },
                    { text: "Narvacan", value: "Narvacan" },
                    { text: "Quirino", value: "Quirino" },
                    { text: "Salcedo", value: "Salcedo" },
                    { text: "San Emilio", value: "San Emilio" },
                    { text: "San Esteban", value: "San Esteban" },
                    { text: "San Ildefonso", value: "San Ildefonso" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Vicente", value: "San Vicente" },
                    { text: "Santa", value: "Santa" },
                    { text: "Santa Catalina", value: "Santa Catalina" },
                    { text: "Santa Cruz", value: "Santa Cruz" },
                    { text: "Santa Lucia", value: "Santa Lucia" },
                    { text: "Santiago", value: "Santiago" },
                    { text: "Santo Domingo", value: "Santo Domingo" },
                    { text: "Sigay", value: "Sigay" },
                    { text: "Sinait", value: "Sinait" },
                    { text: "Sugpon", value: "Sugpon" },
                    { text: "Suyo", value: "Suyo" },
                    { text: "Tagudin", value: "Tagudin" }
                ]);
            }else if (Province === "La Union") {
                addCityOptions([
                    { text: "San Fernando", value: "San Fernando" }, // Component city
                    { text: "Agoo", value: "Agoo" },
                    { text: "Aringay", value: "Aringay" },
                    { text: "Bacnotan", value: "Bacnotan" },
                    { text: "Bagulin", value: "Bagulin" },
                    { text: "Balaoan", value: "Balaoan" },
                    { text: "Bangar", value: "Bangar" },
                    { text: "Bauang", value: "Bauang" },
                    { text: "Burgos", value: "Burgos" },
                    { text: "Caba", value: "Caba" },
                    { text: "Luna", value: "Luna" },
                    { text: "Naguilian", value: "Naguilian" },
                    { text: "Pugo", value: "Pugo" },
                    { text: "Rosario", value: "Rosario" },
                    { text: "San Gabriel", value: "San Gabriel" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Santol", value: "Santol" },
                    { text: "Sudipen", value: "Sudipen" },
                    { text: "Tubao", value: "Tubao" }
                ]);
            }else if (Province === "Pangasinan") {
                addCityOptions([
                    { text: "Alaminos", value: "Alaminos" },
                    { text: "Dagupan", value: "Dagupan" },
                    { text: "San Carlos", value: "San Carlos" },
                    { text: "Urdaneta", value: "Urdaneta" },
                    { text: "Agno", value: "Agno" },
                    { text: "Aguilar", value: "Aguilar" },
                    { text: "Alcala", value: "Alcala" },
                    { text: "Anda", value: "Anda" },
                    { text: "Asingan", value: "Asingan" },
                    { text: "Balungao", value: "Balungao" },
                    { text: "Bani", value: "Bani" },
                    { text: "Basista", value: "Basista" },
                    { text: "Bautista", value: "Bautista" },
                    { text: "Bayambang", value: "Bayambang" },
                    { text: "Binalonan", value: "Binalonan" },
                    { text: "Binmaley", value: "Binmaley" },
                    { text: "Bolinao", value: "Bolinao" },
                    { text: "Bugallon", value: "Bugallon" },
                    { text: "Burgos", value: "Burgos" },
                    { text: "Calasiao", value: "Calasiao" },
                    { text: "Dasol", value: "Dasol" },
                    { text: "Infanta", value: "Infanta" },
                    { text: "Labrador", value: "Labrador" },
                    { text: "Laoac", value: "Laoac" },
                    { text: "Lingayen", value: "Lingayen" },
                    { text: "Mabini", value: "Mabini" },
                    { text: "Malasiqui", value: "Malasiqui" },
                    { text: "Manaoag", value: "Manaoag" },
                    { text: "Mangaldan", value: "Mangaldan" },
                    { text: "Mangatarem", value: "Mangatarem" },
                    { text: "Mapandan", value: "Mapandan" },
                    { text: "Natividad", value: "Natividad" },
                    { text: "Pozorrubio", value: "Pozorrubio" },
                    { text: "Rosales", value: "Rosales" },
                    { text: "San Fabian", value: "San Fabian" },
                    { text: "San Jacinto", value: "San Jacinto" },
                    { text: "San Manuel", value: "San Manuel" },
                    { text: "San Nicolas", value: "San Nicolas" },
                    { text: "Santa Barbara", value: "Santa Barbara" },
                    { text: "Santa Maria", value: "Santa Maria" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Sison", value: "Sison" },
                    { text: "Sual", value: "Sual" },
                    { text: "Tayug", value: "Tayug" },
                    { text: "Umingan", value: "Umingan" },
                    { text: "Urbiztondo", value: "Urbiztondo" },
                    { text: "Villasis", value: "Villasis" }
                ]);
            }else if (Province === "Batanes") {
                addCityOptions([
                    { text: "Basco", value: "Basco" },
                    { text: "Itbayat", value: "Itbayat" },
                    { text: "Ivana", value: "Ivana" },
                    { text: "Mahatao", value: "Mahatao" },
                    { text: "Sabtang", value: "Sabtang" }
                ]);
            }else if (Province === "Cagayan") {
                addCityOptions([
                    { text: "Tuguegarao", value: "Tuguegarao" },
                    { text: "Abulug", value: "Abulug" },
                    { text: "Alcala", value: "Alcala" },
                    { text: "Amulung", value: "Amulung" },
                    { text: "Aparri", value: "Aparri" },
                    { text: "Baggao", value: "Baggao" },
                    { text: "Ballesteros", value: "Ballesteros" },
                    { text: "Buguey", value: "Buguey" },
                    { text: "Calayan", value: "Calayan" },
                    { text: "Camalaniugan", value: "Camalaniugan" },
                    { text: "Claveria", value: "Claveria" },
                    { text: "Enrile", value: "Enrile" },
                    { text: "Gonzaga", value: "Gonzaga" },
                    { text: "Lasam", value: "Lasam" },
                    { text: "Lallo", value: "Lallo" },
                    { text: "Pamplona", value: "Pamplona" },
                    { text: "Peñablanca", value: "Peñablanca" },
                    { text: "Piat", value: "Piat" },
                    { text: "Rial", value: "Rial" },
                    { text: "Sanchez Mira", value: "Sanchez Mira" },
                    { text: "Santa Ana", value: "Santa Ana" },
                    { text: "Santa Teresita", value: "Santa Teresita" },
                    { text: "Santo Niño", value: "Santo Niño" },
                    { text: "Solana", value: "Solana" },
                    { text: "Tuao", value: "Tuao" }
                ]);
            }else if (Province === "Isabela") {
                addCityOptions([
                    { text: "Ilagan", value: "Ilagan" },
                    { text: "Santiago", value: "Santiago" },
                    { text: "Aurora", value: "Aurora" },
                    { text: "Benito Soliven", value: "Benito Soliven" },
                    { text: "Burgos", value: "Burgos" },
                    { text: "Cabagan", value: "Cabagan" },
                    { text: "Cauayan", value: "Cauayan" },
                    { text: "Echague", value: "Echague" },
                    { text: "Gamu", value: "Gamu" },
                    { text: "Jones", value: "Jones" },
                    { text: "Lagangilang", value: "Lagangilang" },
                    { text: "Llorente", value: "Llorente" },
                    { text: "Maconacon", value: "Maconacon" },
                    { text: "Mallig", value: "Mallig" },
                    { text: "Naguilian", value: "Naguilian" },
                    { text: "Palanan", value: "Palanan" },
                    { text: "Quezon", value: "Quezon" },
                    { text: "Quirino", value: "Quirino" },
                    { text: "Roxas", value: "Roxas" },
                    { text: "San Agustin", value: "San Agustin" },
                    { text: "San Guillermo", value: "San Guillermo" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Mariano", value: "San Mariano" },
                    { text: "San Manuel", value: "San Manuel" },
                    { text: "San Pablo", value: "San Pablo" },
                    { text: "San Vicente", value: "San Vicente" },
                    { text: "Santa Maria", value: "Santa Maria" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Tumauini", value: "Tumauini" }
                ]);
            }else if (Province === "Nueva Vizcaya") {
                addCityOptions([
                    { text: "Bayombong", value: "Bayombong" },
                    { text: "Solano", value: "Solano" },
                    { text: "Aritao", value: "Aritao" },
                    { text: "Bagabag", value: "Bagabag" },
                    { text: "Bambang", value: "Bambang" },
                    { text: "Cauayan", value: "Cauayan" },
                    { text: "Diadi", value: "Diadi" },
                    { text: "Dupax del Norte", value: "Dupax del Norte" },
                    { text: "Dupax del Sur", value: "Dupax del Sur" },
                    { text: "Kasibu", value: "Kasibu" },
                    { text: "Quezon", value: "Quezon" },
                    { text: "Santa Fe", value: "Santa Fe" },
                    { text: "Villaverde", value: "Villaverde" }
                ]);
            }else if (Province === "Quirino") {
                addCityOptions([
                    { text: "Cabarroguis", value: "Cabarroguis" },
                    { text: "Aglipay", value: "Aglipay" },
                    { text: "Canuayan", value: "Canuayan" },
                    { text: "Diffun", value: "Diffun" },
                    { text: "Maddela", value: "Maddela" },
                    { text: "Nagtipunan", value: "Nagtipunan" },
                    { text: "Saguday", value: "Saguday" }
                ]);
            }else if (Province === "Aurora") {
                addCityOptions([
                    { text: "Baler", value: "Baler" },
                    { text: "Casiguran", value: "Casiguran" },
                    { text: "Dinalungan", value: "Dinalungan" },
                    { text: "Dipaculao", value: "Dipaculao" },
                    { text: "Maria Aurora", value: "Maria Aurora" },
                    { text: "San Luis", value: "San Luis" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Antonio", value: "San Antonio" },
                    { text: "Dilasag", value: "Dilasag" },
                    { text: "Dinalungan", value: "Dinalungan" }
                ]);
            }else if (Province === "Bataan") {
                addCityOptions([
                    { text: "Balanga", value: "Balanga" },
                    { text: "Abucay", value: "Abucay" },
                    { text: "Bagac", value: "Bagac" },
                    { text: "Dinalupihan", value: "Dinalupihan" },
                    { text: "Hermosa", value: "Hermosa" },
                    { text: "Orani", value: "Orani" },
                    { text: "Orion", value: "Orion" },
                    { text: "Pilar", value: "Pilar" },
                    { text: "Mariveles", value: "Mariveles" },
                    { text: "Samal", value: "Samal" }
                ]);
            }else if (Province === "Bulacan") {
                addCityOptions([
                    { text: "Malolos", value: "Malolos" },
                    { text: "Meycauayan", value: "Meycauayan" },
                    { text: "San Jose del Monte", value: "San Jose del Monte" },
                    { text: "Angat", value: "Angat" },
                    { text: "Balagtas", value: "Balagtas" },
                    { text: "Bocaue", value: "Bocaue" },
                    { text: "Bulakan", value: "Bulakan" },
                    { text: "Dona Remedios Trinidad", value: "Dona Remedios Trinidad" },
                    { text: "Guiguinto", value: "Guiguinto" },
                    { text: "Hagonoy", value: "Hagonoy" },
                    { text: "Marilao", value: "Marilao" },
                    { text: "Norzagaray", value: "Norzagaray" },
                    { text: "Pandi", value: "Pandi" },
                    { text: "Paombong", value: "Paombong" },
                    { text: "Plaridel", value: "Plaridel" },
                    { text: "San Ildefonso", value: "San Ildefonso" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "San Rafael", value: "San Rafael" },
                    { text: "Santa Maria", value: "Santa Maria" }
                ]);
            }else if (Province === "Nueva Ecija") {
                addCityOptions([
                    { text: "Cabanatuan", value: "Cabanatuan" },
                    { text: "Gapan", value: "Gapan" },
                    { text: "San Jose City", value: "San Jose City" },
                    { text: "Aliaga", value: "Aliaga" },
                    { text: "Cuyapo", value: "Cuyapo" },
                    { text: "Guimba", value: "Guimba" },
                    { text: "Jaen", value: "Jaen" },
                    { text: "Licab", value: "Licab" },
                    { text: "Llanera", value: "Llanera" },
                    { text: "General Tinio", value: "General Tinio" },
                    { text: "Nampicuan", value: "Nampicuan" },
                    { text: "Pantabangan", value: "Pantabangan" },
                    { text: "Peñaranda", value: "Peñaranda" },
                    { text: "San Antonio", value: "San Antonio" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Leonardo", value: "San Leonardo" },
                    { text: "Santa Rosa", value: "Santa Rosa" },
                    { text: "Santo Domingo", value: "Santo Domingo" },
                    { text: "Talavera", value: "Talavera" },
                    { text: "Zaragoza", value: "Zaragoza" }
                ]);
            }else if (Province === "Pampanga") {
                addCityOptions([
                    { text: "San Fernando", value: "San Fernando" },
                    { text: "Angeles", value: "Angeles" },
                    { text: "Mabalacat", value: "Mabalacat" },
                    { text: "Apalit", value: "Apalit" },
                    { text: "Arayat", value: "Arayat" },
                    { text: "Bacolor", value: "Bacolor" },
                    { text: "Candaba", value: "Candaba" },
                    { text: "Floridablanca", value: "Floridablanca" },
                    { text: "Guagua", value: "Guagua" },
                    { text: "Lubao", value: "Lubao" },
                    { text: "Masantol", value: "Masantol" },
                    { text: "Mexico", value: "Mexico" },
                    { text: "Porac", value: "Porac" },
                    { text: "San Luis", value: "San Luis" },
                    { text: "San Simon", value: "San Simon" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Sulipan", value: "Sulipan" },
                    { text: "San Rafael", value: "San Rafael" }
                ]);
            }else if (Province === "Tarlac") {
                addCityOptions([
                    { text: "Tarlac City", value: "Tarlac City" },
                    { text: "Capas", value: "Capas" },
                    { text: "Concepcion", value: "Concepcion" },
                    { text: "Gerona", value: "Gerona" },
                    { text: "La Paz", value: "La Paz" },
                    { text: "Mayantoc", value: "Mayantoc" },
                    { text: "Moncada", value: "Moncada" },
                    { text: "Paniqui", value: "Paniqui" },
                    { text: "Pura", value: "Pura" },
                    { text: "San Clemente", value: "San Clemente" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Manuel", value: "San Manuel" },
                    { text: "Victoria", value: "Victoria" }
                ]);
            }else if (Province === "Zambales") {
                addCityOptions([
                    { text: "Olongapo", value: "Olongapo" },
                    { text: "Iba", value: "Iba" },
                    { text: "Subic", value: "Subic" },
                    { text: "Castillejos", value: "Castillejos" },
                    { text: "San Antonio", value: "San Antonio" },
                    { text: "San Felipe", value: "San Felipe" },
                    { text: "San Marcelino", value: "San Marcelino" },
                    { text: "San Narciso", value: "San Narciso" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Botolan", value: "Botolan" },
                    { text: "Palauig", value: "Palauig" },
                    { text: "Masinloc", value: "Masinloc" },
                    { text: "Candelaria", value: "Candelaria" },
                    { text: "Cabangan", value: "Cabangan" },
                    { text: "Zambales", value: "Zambales" }
                ]);
            }else if (Province === "Angeles") {
                addCityOptions([
                    { text: "Angeles City", value: "Angeles City" },
                    { text: "Apalit", value: "Apalit" },
                    { text: "Arayat", value: "Arayat" },
                    { text: "Bacolor", value: "Bacolor" },
                    { text: "Candaba", value: "Candaba" },
                    { text: "Floridablanca", value: "Floridablanca" },
                    { text: "Guagua", value: "Guagua" },
                    { text: "Lubao", value: "Lubao" },
                    { text: "Mabalacat City", value: "Mabalacat City" },
                    { text: "Macabebe", value: "Macabebe" },
                    { text: "Magalang", value: "Magalang" },
                    { text: "Masantol", value: "Masantol" },
                    { text: "Mexico", value: "Mexico" },
                    { text: "Minalin", value: "Minalin" },
                    { text: "Porac", value: "Porac" },
                    { text: "San Fernando", value: "San Fernando" },
                    { text: "San Luis", value: "San Luis" },
                    { text: "San Simon", value: "San Simon" },
                    { text: "Santa Ana", value: "Santa Ana" },
                    { text: "Santa Rita", value: "Santa Rita" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Sasmuan", value: "Sasmuan" }
                ]);
            }else if (Province === "Olongapo") {
                addCityOptions([
                    { text: "Olongapo City", value: "Olongapo City" },
                    { text: "Subic", value: "Subic" },
                    { text: "Castillejos", value: "Castillejos" },
                    { text: "San Antonio", value: "San Antonio" },
                    { text: "San Marcelino", value: "San Marcelino" },
                    { text: "San Narciso", value: "San Narciso" },
                    { text: "Zambales", value: "Zambales" }
                ]);
            }else if (Province === "Batangas") {
                addCityOptions([
                    { text: "Batangas City", value: "Batangas City" },
                    { text: "Alitagtag", value: "Alitagtag" },
                    { text: "Balayan", value: "Balayan" },
                    { text: "Batangas", value: "Batangas" },
                    { text: "Bauan", value: "Bauan" },
                    { text: "Calaca", value: "Calaca" },
                    { text: "Calatagan", value: "Calatagan" },
                    { text: "Cuenca", value: "Cuenca" },
                    { text: "Ibaan", value: "Ibaan" },
                    { text: "Laurel", value: "Laurel" },
                    { text: "Lian", value: "Lian" },
                    { text: "Lipa City", value: "Lipa City" },
                    { text: "Lobo", value: "Lobo" },
                    { text: "Mabini", value: "Mabini" },
                    { text: "Malvar", value: "Malvar" },
                    { text: "Mataasnakahoy", value: "Mataasnakahoy" },
                    { text: "Nasugbu", value: "Nasugbu" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Luis", value: "San Luis" },
                    { text: "San Nicolas", value: "San Nicolas" },
                    { text: "San Pascual", value: "San Pascual" },
                    { text: "Santa Teresita", value: "Santa Teresita" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Taal", value: "Taal" },
                    { text: "Talisay", value: "Talisay" },
                    { text: "Tanauan City", value: "Tanauan City" },
                    { text: "Tingloy", value: "Tingloy" },
                    { text: "Tuy", value: "Tuy" }
                ]);
            }else if (Province === "Cavite") {
                addCityOptions([
                    { text: "Cavite City", value: "Cavite City" },
                    { text: "Dasmariñas", value: "Dasmariñas" },
                    { text: "Imus", value: "Imus" },
                    { text: "Bacoor", value: "Bacoor" },
                    { text: "Tagaytay", value: "Tagaytay" },
                    { text: "General Trias", value: "General Trias" },
                    { text: "Trece Martires", value: "Trece Martires" },
                    { text: "Kawit", value: "Kawit" },
                    { text: "Amadeo", value: "Amadeo" },
                    { text: "Gen. Emilio Aguinaldo", value: "Gen. Emilio Aguinaldo" },
                    { text: "Silang", value: "Silang" },
                    { text: "Alfonso", value: "Alfonso" },
                    { text: "Mendez", value: "Mendez" },
                    { text: "Magallanes", value: "Magallanes" },
                    { text: "Naic", value: "Naic" },
                    { text: "Maragondon", value: "Maragondon" },
                    { text: "Mortal", value: "Mortal" },
                    { text: "Carmona", value: "Carmona" },
                    { text: "Indang", value: "Indang" },
                    { text: "Noveleta", value: "Noveleta" },
                    { text: "Rosario", value: "Rosario" },
                    { text: "San Francisco", value: "San Francisco" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Nicolas", value: "San Nicolas" },
                    { text: "San Pedro", value: "San Pedro" },
                    { text: "Bacoor", value: "Bacoor" },
                    { text: "San Mateo", value: "San Mateo" }
                ]);
            }else if (Province === "Laguna") {
                addCityOptions([
                    { text: "San Pablo City", value: "San Pablo City" },
                    { text: "Santa Rosa", value: "Santa Rosa" },
                    { text: "Calamba", value: "Calamba" },
                    { text: "Biñan", value: "Biñan" },
                    { text: "Los Baños", value: "Los Baños" },
                    { text: "Bay", value: "Bay" },
                    { text: "Bunuan", value: "Bunuan" },
                    { text: "Cabuyao", value: "Cabuyao" },
                    { text: "Candelaria", value: "Candelaria" },
                    { text: "Famy", value: "Famy" },
                    { text: "Kalayaan", value: "Kalayaan" },
                    { text: "Liliw", value: "Liliw" },
                    { text: "Lumban", value: "Lumban" },
                    { text: "Mabitac", value: "Mabitac" },
                    { text: "Magdalena", value: "Magdalena" },
                    { text: "Majayjay", value: "Majayjay" },
                    { text: "Nagcarlan", value: "Nagcarlan" },
                    { text: "Pagsanjan", value: "Pagsanjan" },
                    { text: "Pila", value: "Pila" },
                    { text: "Rizal", value: "Rizal" },
                    { text: "San Pedro", value: "San Pedro" },
                    { text: "Santa Cruz", value: "Santa Cruz" },
                    { text: "Santa Maria", value: "Santa Maria" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Tiaong", value: "Tiaong" },
                    { text: "Victoria", value: "Victoria" }
                ]);
            }else if (Province === "Quezon") {
                addCityOptions([
                    { text: "Lucena City", value: "Lucena City" },
                    { text: "Antipolo", value: "Antipolo" },
                    { text: "Atimonan", value: "Atimonan" },
                    { text: "Buenavista", value: "Buenavista" },
                    { text: "Burdeos", value: "Burdeos" },
                    { text: "Candelaria", value: "Candelaria" },
                    { text: "Dalaguete", value: "Dalaguete" },
                    { text: "General Luna", value: "General Luna" },
                    { text: "General Nakar", value: "General Nakar" },
                    { text: "Gumaca", value: "Gumaca" },
                    { text: "Infanta", value: "Infanta" },
                    { text: "Jomalig", value: "Jomalig" },
                    { text: "Laguna", value: "Laguna" },
                    { text: "Lopez", value: "Lopez" },
                    { text: "Mauban", value: "Mauban" },
                    { text: "Mulanay", value: "Mulanay" },
                    { text: "Pagbilao", value: "Pagbilao" },
                    { text: "Pitogo", value: "Pitogo" },
                    { text: "Polillo", value: "Polillo" },
                    { text: "Quezon", value: "Quezon" },
                    { text: "Sampaloc", value: "Sampaloc" },
                    { text: "San Antonio", value: "San Antonio" },
                    { text: "San Francisco", value: "San Francisco" },
                    { text: "San Narciso", value: "San Narciso" },
                    { text: "Sariaya", value: "Sariaya" },
                    { text: "Tagkawayan", value: "Tagkawayan" },
                    { text: "Tayabas", value: "Tayabas" },
                    { text: "Unisan", value: "Unisan" }
                ]);
            }else if (Province === "Rizal") {
                addCityOptions([
                    { text: "Antipolo", value: "Antipolo" },
                    { text: "Angono", value: "Angono" },
                    { text: "Baras", value: "Baras" },
                    { text: "Binangonan", value: "Binangonan" },
                    { text: "Cainta", value: "Cainta" },
                    { text: "Cardona", value: "Cardona" },
                    { text: "Jala-Jala", value: "Jala-Jala" },
                    { text: "Montalban (Rodriguez)", value: "Montalban (Rodriguez)" },
                    { text: "Morong", value: "Morong" },
                    { text: "Pililla", value: "Pililla" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Mateo", value: "San Mateo" },
                    { text: "Tanay", value: "Tanay" },
                    { text: "Taytay", value: "Taytay" },
                    { text: "Teresa", value: "Teresa" }
                ]);
            }else if (Province === "Lucena") {
                addCityOptions([
                    { text: "Lucena City", value: "Lucena City" }
                ]);
            }else if (Province === "Marinduque") {
                addCityOptions([
                    { text: "Boac", value: "Boac" },
                    { text: "Buenavista", value: "Buenavista" },
                    { text: "Gasan", value: "Gasan" },
                    { text: "Mogpog", value: "Mogpog" },
                    { text: "Santa Cruz", value: "Santa Cruz" },
                    { text: "Torrijos", value: "Torrijos" }
                ]);
            }else if (Province === "Occidental Mindoro") {
                addCityOptions([
                    { text: "Mamburao", value: "Mamburao" },
                    { text: "Roxas", value: "Roxas" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "Sablayan", value: "Sablayan" },
                    { text: "Abra de Ilog", value: "Abra de Ilog" },
                    { text: "Calintaan", value: "Calintaan" },
                    { text: "Looc", value: "Looc" },
                    { text: "Magsaysay", value: "Magsaysay" },
                    { text: "Montaño", value: "Montaño" },
                    { text: "Paluan", value: "Paluan" }
                ]);
            }else if (Province === "Oriental Mindoro") {
                addCityOptions([
                    { text: "Calapan City", value: "Calapan City" },
                    { text: "Baco", value: "Baco" },
                    { text: "Bansud", value: "Bansud" },
                    { text: "Bongabong", value: "Bongabong" },
                    { text: "Gloria", value: "Gloria" },
                    { text: "Mansalay", value: "Mansalay" },
                    { text: "Naujan", value: "Naujan" },
                    { text: "Pola", value: "Pola" },
                    { text: "Puey", value: "Puey" },
                    { text: "Roxas", value: "Roxas" },
                    { text: "San Teodoro", value: "San Teodoro" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "Victoria", value: "Victoria" }
                ]);
            }else if (Province === "Palawan") {
                addCityOptions([
                    { text: "Puerto Princesa City", value: "Puerto Princesa City" },
                    { text: "Aborlan", value: "Aborlan" },
                    { text: "Agutaya", value: "Agutaya" },
                    { text: "Araceli", value: "Araceli" },
                    { text: "Balabac", value: "Balabac" },
                    { text: "Bataraza", value: "Bataraza" },
                    { text: "Brookes Point", value: "Brookes Point" },
                    { text: "Cagayancillo", value: "Cagayancillo" },
                    { text: "Coron", value: "Coron" },
                    { text: "Culion", value: "Culion" },
                    { text: "Dumaran", value: "Dumaran" },
                    { text: "El Nido", value: "El Nido" },
                    { text: "Linapacan", value: "Linapacan" },
                    { text: "Magsaysay", value: "Magsaysay" },
                    { text: "Narra", value: "Narra" },
                    { text: "Puerto Princesa", value: "Puerto Princesa" },
                    { text: "Roxas", value: "Roxas" },
                    { text: "San Vicente", value: "San Vicente" },
                    { text: "Sofronio Española", value: "Sofronio Española" },
                    { text: "Taytay", value: "Taytay" },
                    { text: "Rizal", value: "Rizal" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "San Juan", value: "San Juan" },
                ]);
            }else if (Province === "Romblon") {
                addCityOptions([
                    { text: "Romblon", value: "Romblon" },
                    { text: "Alcantara", value: "Alcantara" },
                    { text: "Banton", value: "Banton" },
                    { text: "Corcuera", value: "Corcuera" },
                    { text: "Ferrol", value: "Ferrol" },
                    { text: "Looc", value: "Looc" },
                    { text: "Magdiwang", value: "Magdiwang" },
                    { text: "Odiongan", value: "Odiongan" },
                    { text: "San Agustin", value: "San Agustin" },
                    { text: "San Andres", value: "San Andres" },
                    { text: "San Fernando", value: "San Fernando" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Pedro", value: "San Pedro" },
                    { text: "Santa Fe", value: "Santa Fe" },
                    { text: "Santa Maria", value: "Santa Maria" }
                ]);
            }else if (Province === "Puerto Princesa") {
                addCityOptions([
                    { text: "Puerto Princesa", value: "Puerto Princesa" }
                ]);
            }else if (Province === "Albay") {
                addCityOptions([
                    { text: "Legazpi City", value: "Legazpi City" },
                    { text: "Ligao City", value: "Ligao City" },
                    { text: "Tabaco City", value: "Tabaco City" },
                    { text: "Bacacay", value: "Bacacay" },
                    { text: "Camarines", value: "Camarines" },
                    { text: "Daraga", value: "Daraga" },
                    { text: "Guinobatan", value: "Guinobatan" },
                    { text: "Jovellar", value: "Jovellar" },
                    { text: "Libon", value: "Libon" },
                    { text: "Malilipot", value: "Malilipot" },
                    { text: "Manito", value: "Manito" },
                    { text: "Oas", value: "Oas" },
                    { text: "Pio Duran", value: "Pio Duran" },
                    { text: "Polangui", value: "Polangui" },
                    { text: "Rapu-Rapu", value: "Rapu-Rapu" },
                    { text: "Santo Domingo", value: "Santo Domingo" },
                    { text: "Tigaon", value: "Tigaon" },
                    { text: "Tungkung Langit", value: "Tungkung Langit" }
                ]);
            }else if (Province === "Camarines Norte") {
                addCityOptions([
                    { text: "Daet", value: "Daet" },
                    { text: "Basud", value: "Basud" },
                    { text: "Capalonga", value: "Capalonga" },
                    { text: "Labo", value: "Labo" },
                    { text: "Mercedes", value: "Mercedes" },
                    { text: "Paracale", value: "Paracale" },
                    { text: "San Lorenzo Ruiz", value: "San Lorenzo Ruiz" },
                    { text: "San Vicente", value: "San Vicente" },
                    { text: "Talisay", value: "Talisay" },
                    { text: "Vinzons", value: "Vinzons" }
                ]);
            }else if (Province === "Camarines Sur") {
                addCityOptions([
                    { text: "Naga City", value: "Naga City" },
                    { text: "Iriga City", value: "Iriga City" },
                    { text: "Baao", value: "Baao" },
                    { text: "Bula", value: "Bula" },
                    { text: "Buhi", value: "Buhi" },
                    { text: "Bulangon", value: "Bulangon" },
                    { text: "Cabusao", value: "Cabusao" },
                    { text: "Camarines", value: "Camarines" },
                    { text: "Canaman", value: "Canaman" },
                    { text: "Caramoan", value: "Caramoan" },
                    { text: "Cataingan", value: "Cataingan" },
                    { text: "Concepcion", value: "Concepcion" },
                    { text: "Del Gallego", value: "Del Gallego" },
                    { text: "Gainza", value: "Gainza" },
                    { text: "Lagonoy", value: "Lagonoy" },
                    { text: "Libmanan", value: "Libmanan" },
                    { text: "Milaor", value: "Milaor" },
                    { text: "Minalabac", value: "Minalabac" },
                    { text: "Nabua", value: "Nabua" },
                    { text: "Pamplona", value: "Pamplona" },
                    { text: "Pasacao", value: "Pasacao" },
                    { text: "Pili", value: "Pili" },
                    { text: "Ragay", value: "Ragay" },
                    { text: "San Fernando", value: "San Fernando" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "Tigaon", value: "Tigaon" },
                    { text: "Tigaon", value: "Tigaon" }
                ]);
            }else if (Province === "Catanduanes") {
                addCityOptions([
                    { text: "Virac", value: "Virac" },
                    { text: "Bagamanoc", value: "Bagamanoc" },
                    { text: "Baras", value: "Baras" },
                    { text: "Bato", value: "Bato" },
                    { text: "Caramoran", value: "Caramoran" },
                    { text: "Gigmoto", value: "Gigmoto" },
                    { text: "Pandan", value: "Pandan" },
                    { text: "San Andres", value: "San Andres" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "Viga", value: "Viga" }
                ]);
            }else if (Province === "Masbate") {
                addCityOptions([
                    { text: "Masbate City", value: "Masbate City" },
                    { text: "Aroroy", value: "Aroroy" },
                    { text: "Baleno", value: "Baleno" },
                    { text: "Batuan", value: "Batuan" },
                    { text: "Cataingan", value: "Cataingan" },
                    { text: "Mandaon", value: "Mandaon" },
                    { text: "Milagros", value: "Milagros" },
                    { text: "Mobo", value: "Mobo" },
                    { text: "Monreal", value: "Monreal" },
                    { text: "Palanas", value: "Palanas" },
                    { text: "Pio V. Corpuz", value: "Pio V. Corpuz" },
                    { text: "Placer", value: "Placer" },
                    { text: "Dimasalang", value: "Dimasalang" },
                    { text: "San Fernando", value: "San Fernando" },
                    { text: "San Jacinto", value: "San Jacinto" },
                    { text: "San Pascual", value: "San Pascual" },
                    { text: "Uson", value: "Uson" }
                ]);
            }else if (Province === "Sorsogon") {
                addCityOptions([
                    { text: "Sorsogon City", value: "Sorsogon City" },
                    { text: "Irosin", value: "Irosin" },
                    { text: "Juban", value: "Juban" },
                    { text: "Magallanes", value: "Magallanes" },
                    { text: "Matnog", value: "Matnog" },
                    { text: "Pili", value: "Pili" },
                    { text: "Santa Magdalena", value: "Santa Magdalena" },
                    { text: "Bulusan", value: "Bulusan" },
                    { text: "Casiguran", value: "Casiguran" },
                    { text: "Donsol", value: "Donsol" },
                    { text: "Gubat", value: "Gubat" },
                    { text: "Irosin", value: "Irosin" },
                    { text: "Pio Duran", value: "Pio Duran" }
                ]);
            }else if (Province === "Aklan") {
                addCityOptions([
                    { text: "Kalibo", value: "Kalibo" },
                    { text: "Lezo", value: "Lezo" },
                    { text: "Libacao", value: "Libacao" },
                    { text: "Madalag", value: "Madalag" },
                    { text: "Makato", value: "Makato" },
                    { text: "Malinao", value: "Malinao" },
                    { text: "Nabas", value: "Nabas" },
                    { text: "New Washington", value: "New Washington" },
                    { text: "Numancia", value: "Numancia" },
                    { text: "Tangalan", value: "Tangalan" }
                ]);
            }else if (Province === "Antique") {
                addCityOptions([
                    { text: "San Jose de Buenavista", value: "San Jose de Buenavista" },
                    { text: "Anini-y", value: "Anini-y" },
                    { text: "Barbaza", value: "Barbaza" },
                    { text: "Belison", value: "Belison" },
                    { text: "Hamtic", value: "Hamtic" },
                    { text: "Laua-an", value: "Laua-an" },
                    { text: "Libertad", value: "Libertad" },
                    { text: "Pandan", value: "Pandan" },
                    { text: "Patnongon", value: "Patnongon" },
                    { text: "Sibalom", value: "Sibalom" },
                    { text: "Tibiao", value: "Tibiao" },
                    { text: "Valderrama", value: "Valderrama" }
                ]);
            }else if (Province === "Capiz") {
                addCityOptions([
                    { text: "Roxas City", value: "Roxas City" },
                    { text: "Pilar", value: "Pilar" },
                    { text: "Mambusao", value: "Mambusao" },
                    { text: "Panay", value: "Panay" },
                    { text: "Jamindan", value: "Jamindan" },
                    { text: "Ma-ayon", value: "Ma-ayon" },
                    { text: "President Roxas", value: "President Roxas" },
                    { text: "Dumarao", value: "Dumarao" },
                    { text: "Ivisan", value: "Ivisan" },
                    { text: "Mina", value: "Mina" },
                    { text: "Sapian", value: "Sapian" },
                    { text: "Sigma", value: "Sigma" },
                    { text: "Tigbauan", value: "Tigbauan" }
                ]);
            }else if (Province === "Guimaras") {
                addCityOptions([
                    { text: "Jordan", value: "Jordan" },
                    { text: "Bajo", value: "Bajo" },
                    { text: "Buenavista", value: "Buenavista" },
                    { text: "Nueva Valencia", value: "Nueva Valencia" },
                    { text: "San Lorenzo", value: "San Lorenzo" },
                    { text: "Sibunag", value: "Sibunag" }
                ]);
            }else if (Province === "Iloilo") {
                addCityOptions([
                    { text: "Iloilo City", value: "Iloilo City" },
                    { text: "Passi City", value: "Passi City" },
                    { text: "Badiangan", value: "Badiangan" },
                    { text: "Balasan", value: "Balasan" },
                    { text: "Barotac Nuevo", value: "Barotac Nuevo" },
                    { text: "Barotac Viejo", value: "Barotac Viejo" },
                    { text: "Batad", value: "Batad" },
                    { text: "Concepcion", value: "Concepcion" },
                    { text: "Dingle", value: "Dingle" },
                    { text: "Duenas", value: "Duenas" },
                    { text: "Guimbal", value: "Guimbal" },
                    { text: "Ivisan", value: "Ivisan" },
                    { text: "Janiuay", value: "Janiuay" },
                    { text: "Lambunao", value: "Lambunao" },
                    { text: "Leganes", value: "Leganes" },
                    { text: "Leon", value: "Leon" },
                    { text: "New Lucena", value: "New Lucena" },
                    { text: "Oton", value: "Oton" },
                    { text: "Pavia", value: "Pavia" },
                    { text: "San Dionisio", value: "San Dionisio" },
                    { text: "San Enrique", value: "San Enrique" },
                    { text: "San Joaquin", value: "San Joaquin" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "San Rafael", value: "San Rafael" },
                    { text: "Santa Barbara", value: "Santa Barbara" },
                    { text: "Sergio Osmeña Sr.", value: "Sergio Osmeña Sr." },
                    { text: "Sum-ag", value: "Sum-ag" },
                    { text: "Tigbauan", value: "Tigbauan" },
                    { text: "Tubungan", value: "Tubungan" },
                    { text: "Zarraga", value: "Zarraga" }
                ]);
            }if (Province === "Negros Occidental") {
                addCityOptions([
                    { text: "Bacolod City", value: "Bacolod City" },
                    { text: "Bago City", value: "Bago City" },
                    { text: "Binalbagan", value: "Binalbagan" },
                    { text: "Cadiz City", value: "Cadiz City" },
                    { text: "Cauayan", value: "Cauayan" },
                    { text: "Enrique B. Magalona", value: "Enrique B. Magalona" },
                    { text: "Himamaylan City", value: "Himamaylan City" },
                    { text: "Hinobaan", value: "Hinobaan" },
                    { text: "Kabankalan City", value: "Kabankalan City" },
                    { text: "La Carlota City", value: "La Carlota City" },
                    { text: "La Castellana", value: "La Castellana" },
                    { text: "Manapla", value: "Manapla" },
                    { text: "Murcia", value: "Murcia" },
                    { text: "Pontevedra", value: "Pontevedra" },
                    { text: "Pulupandan", value: "Pulupandan" },
                    { text: "San Carlos City", value: "San Carlos City" },
                    { text: "San Enrique", value: "San Enrique" },
                    { text: "Silay City", value: "Silay City" },
                    { text: "Talisay City", value: "Talisay City" },
                    { text: "Valladolid", value: "Valladolid" },
                    { text: "Victorias City", value: "Victorias City" }
                ]);
            }else if (Province === "Negros Oriental") {
                addCityOptions([
                    { text: "Dumaguete City", value: "Dumaguete City" },
                    { text: "Bayawan City", value: "Bayawan City" },
                    { text: "Canlaon City", value: "Canlaon City" },
                    { text: "Tanjay City", value: "Tanjay City" },
                    { text: "Amlan", value: "Amlan" },
                    { text: "Ayungon", value: "Ayungon" },
                    { text: "Bacong", value: "Bacong" },
                    { text: "Basay", value: "Basay" },
                    { text: "Bindoy", value: "Bindoy" },
                    { text: "Dauin", value: "Dauin" },
                    { text: "Dumaguete", value: "Dumaguete" },
                    { text: "Jimalalud", value: "Jimalalud" },
                    { text: "La Libertad", value: "La Libertad" },
                    { text: "Mabinay", value: "Mabinay" },
                    { text: "Manjuyod", value: "Manjuyod" },
                    { text: "Pamplona", value: "Pamplona" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "Santa Catalina", value: "Santa Catalina" },
                    { text: "Siaton", value: "Siaton" },
                    { text: "Sibulan", value: "Sibulan" },
                    { text: "Tanjay", value: "Tanjay" },
                    { text: "Valencia", value: "Valencia" },
                    { text: "Zamboanguita", value: "Zamboanguita" }
                ]);
            }else if (Province === "Siquijor") {
                addCityOptions([
                    { text: "Siquijor", value: "Siquijor" },
                    { text: "Larena", value: "Larena" },
                    { text: "Lazi", value: "Lazi" },
                    { text: "Maria", value: "Maria" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "Santo Niño", value: "Santo Niño" },
                    { text: "Tanuan", value: "Tanuan" }
                ]);
            }else if (Province === "Bacolod") {
                addCityOptions([
                    { text: "Bacolod", value: "Bacolod" }
                ]);
            }else if (Province === "Bohol") {
                addCityOptions([
                    { text: "Tagbilaran City", value: "Tagbilaran City" },
                    { text: "Anglica", value: "Anglica" },
                    { text: "Antequera", value: "Antequera" },
                    { text: "Balilihan", value: "Balilihan" },
                    { text: "Bilar", value: "Bilar" },
                    { text: "Bohol", value: "Bohol" },
                    { text: "Baclayon", value: "Baclayon" },
                    { text: "Candijay", value: "Candijay" },
                    { text: "Carmen", value: "Carmen" },
                    { text: "Catigbian", value: "Catigbian" },
                    { text: "Clarin", value: "Clarin" },
                    { text: "Dauis", value: "Dauis" },
                    { text: "Dimiao", value: "Dimiao" },
                    { text: "Duero", value: "Duero" },
                    { text: "Garcia Hernandez", value: "Garcia Hernandez" },
                    { text: "Gindulman", value: "Gindulman" },
                    { text: "Inabanga", value: "Inabanga" },
                    { text: "Jagna", value: "Jagna" },
                    { text: "Loay", value: "Loay" },
                    { text: "Loon", value: "Loon" },
                    { text: "Loboc", value: "Loboc" },
                    { text: "Mabini", value: "Mabini" },
                    { text: "Panglao", value: "Panglao" },
                    { text: "Pilar", value: "Pilar" },
                    { text: "Pres. Carlos P. Garcia", value: "Pres. Carlos P. Garcia" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "Sierra Bullones", value: "Sierra Bullones" },
                    { text: "Talibon", value: "Talibon" },
                    { text: "Trinidad", value: "Trinidad" },
                    { text: "Tubigon", value: "Tubigon" }
                ]);
            }else if (Province === "Cebu") {
                addCityOptions([
                    { text: "Cebu City", value: "Cebu City" },
                    { text: "Carcar City", value: "Carcar City" },
                    { text: "Danao City", value: "Danao City" },
                    { text: "Mandaue City", value: "Mandaue City" },
                    { text: "Lapu-Lapu City", value: "Lapu-Lapu City" },
                    { text: "Toledo City", value: "Toledo City" },
                    { text: "Naga City", value: "Naga City" },
                    { text: "Talisay City", value: "Talisay City" },
                    { text: "Alcantara", value: "Alcantara" },
                    { text: "Aloguinsan", value: "Aloguinsan" },
                    { text: "Argao", value: "Argao" },
                    { text: "Asturias", value: "Asturias" },
                    { text: "Balamban", value: "Balamban" },
                    { text: "Bantayan", value: "Bantayan" },
                    { text: "Barili", value: "Barili" },
                    { text: "Bogo", value: "Bogo" },
                    { text: "Boljoon", value: "Boljoon" },
                    { text: "Borbon", value: "Borbon" },
                    { text: "Carmen", value: "Carmen" },
                    { text: "Catmon", value: "Catmon" },
                    { text: "Compostela", value: "Compostela" },
                    { text: "Consolacion", value: "Consolacion" },
                    { text: "Cordova", value: "Cordova" },
                    { text: "Dumanjug", value: "Dumanjug" },
                    { text: "Ginatilan", value: "Ginatilan" },
                    { text: "Liloan", value: "Liloan" },
                    { text: "Lupigue", value: "Lupigue" },
                    { text: "Madridejos", value: "Madridejos" },
                    { text: "Malabuyoc", value: "Malabuyoc" },
                    { text: "Minglanilla", value: "Minglanilla" },
                    { text: "Moalboal", value: "Moalboal" },
                    { text: "Naga", value: "Naga" },
                    { text: "Oslob", value: "Oslob" },
                    { text: "Pilar", value: "Pilar" },
                    { text: "Pinamungahan", value: "Pinamungahan" },
                    { text: "Poro", value: "Poro" },
                    { text: "Ronda", value: "Ronda" },
                    { text: "San Fernando", value: "San Fernando" },
                    { text: "San Francisco", value: "San Francisco" },
                    { text: "San Remigio", value: "San Remigio" },
                    { text: "Sogod", value: "Sogod" },
                    { text: "Tabogon", value: "Tabogon" },
                    { text: "Tabuelan", value: "Tabuelan" },
                    { text: "Tudela", value: "Tudela" }
                ]);
            }else if (Province === "Biliran") {
                addCityOptions([
                    { text: "Naval", value: "Naval" },
                    { text: "Almeria", value: "Almeria" },
                    { text: "Biliran", value: "Biliran" },
                    { text: "Cabucgayan", value: "Cabucgayan" },
                    { text: "Caibiran", value: "Caibiran" },
                    { text: "Culaba", value: "Culaba" },
                    { text: "Kawayan", value: "Kawayan" },
                    { text: "Maripipi", value: "Maripipi" },
                    { text: "Sumilao", value: "Sumilao" }
                ]);
            }else if (Province === "Eastern Samar") {
                addCityOptions([
                    { text: "Borongan City", value: "Borongan City" },
                    { text: "Balangkayan", value: "Balangkayan" },
                    { text: "Can-avid", value: "Can-avid" },
                    { text: "Dolores", value: "Dolores" },
                    { text: "Guiuan", value: "Guiuan" },
                    { text: "Hernani", value: "Hernani" },
                    { text: "Llorente", value: "Llorente" },
                    { text: "Maslog", value: "Maslog" },
                    { text: "Mercedes", value: "Mercedes" },
                    { text: "Oras", value: "Oras" },
                    { text: "Quinapondan", value: "Quinapondan" },
                    { text: "Salcedo", value: "Salcedo" },
                    { text: "San Julian", value: "San Julian" },
                    { text: "San Policarpo", value: "San Policarpo" },
                    { text: "Sulat", value: "Sulat" },
                    { text: "Taft", value: "Taft" }
                ]);
            }else if (Province === "Northern Samar") {
                addCityOptions([
                    { text: "Catarman", value: "Catarman" },
                    { text: "Allen", value: "Allen" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "Bobon", value: "Bobon" },
                    { text: "Capul", value: "Capul" },
                    { text: "Las Navas", value: "Las Navas" },
                    { text: "Laoang", value: "Laoang" },
                    { text: "Lapinig", value: "Lapinig" },
                    { text: "Mapanas", value: "Mapanas" },
                    { text: "Palapag", value: "Palapag" },
                    { text: "Pambujan", value: "Pambujan" },
                    { text: "San Antonio", value: "San Antonio" },
                    { text: "San Vicente", value: "San Vicente" },
                    { text: "Silvino Lobos", value: "Silvino Lobos" },
                    { text: "Victoria", value: "Victoria" }
                ]);
            }else if (Province === "Samar") {
                addCityOptions([
                    { text: "Catbalogan City", value: "Catbalogan City" },
                    { text: "Calbiga", value: "Calbiga" },
                    { text: "Gandara", value: "Gandara" },
                    { text: "Jiabong", value: "Jiabong" },
                    { text: "Matuguinao", value: "Matuguinao" },
                    { text: "Motiong", value: "Motiong" },
                    { text: "Pinabacdao", value: "Pinabacdao" },
                    { text: "San Jorge", value: "San Jorge" },
                    { text: "San Jose de Buan", value: "San Jose de Buan" },
                    { text: "San Sebastian", value: "San Sebastian" },
                    { text: "Santa Margarita", value: "Santa Margarita" },
                    { text: "Santa Rita", value: "Santa Rita" },
                    { text: "Santo Niño", value: "Santo Niño" },
                    { text: "Tarangnan", value: "Tarangnan" },
                    { text: "Villareal", value: "Villareal" }
                ]);
            }else if (Province === "Leyte") {
                addCityOptions([
                    { text: "Tacloban City", value: "Tacloban City" },
                    { text: "Ormoc City", value: "Ormoc City" },
                    { text: "Baybay City", value: "Baybay City" },
                    { text: "Maasin City", value: "Maasin City" },
                    { text: "Abuyog", value: "Abuyog" },
                    { text: "Alangalang", value: "Alangalang" },
                    { text: "Babatngon", value: "Babatngon" },
                    { text: "Balangiga", value: "Balangiga" },
                    { text: "Balocawe", value: "Balocawe" },
                    { text: "Barugo", value: "Barugo" },
                    { text: "Bato", value: "Bato" },
                    { text: "Burauen", value: "Burauen" },
                    { text: "Calubian", value: "Calubian" },
                    { text: "Capoocan", value: "Capoocan" },
                    { text: "Dagami", value: "Dagami" },
                    { text: "Dulag", value: "Dulag" },
                    { text: "Hilongos", value: "Hilongos" },
                    { text: "Hindang", value: "Hindang" },
                    { text: "Jaro", value: "Jaro" },
                    { text: "Julita", value: "Julita" },
                    { text: "Kananga", value: "Kananga" },
                    { text: "La Paz", value: "La Paz" },
                    { text: "Leyte", value: "Leyte" },
                    { text: "Libagon", value: "Libagon" },
                    { text: "Macrohon", value: "Macrohon" },
                    { text: "Mahaplag", value: "Mahaplag" },
                    { text: "Matag-ob", value: "Matag-ob" },
                    { text: "Merida", value: "Merida" },
                    { text: "Naga", value: "Naga" },
                    { text: "Palo", value: "Palo" },
                    { text: "Palompon", value: "Palompon" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "San Ricardo", value: "San Ricardo" },
                    { text: "Santa Fe", value: "Santa Fe" },
                    { text: "Sogod", value: "Sogod" },
                    { text: "Tanauan", value: "Tanauan" },
                    { text: "Tolosa", value: "Tolosa" }
                ]);
            }else if (Province === "Southern Leyte") {
                addCityOptions([
                    { text: "Maasin City", value: "Maasin City" },
                    { text: "Baybay City", value: "Baybay City" },
                    { text: "Bontoc", value: "Bontoc" },
                    { text: "Libagon", value: "Libagon" },
                    { text: "Liloan", value: "Liloan" },
                    { text: "Sogod", value: "Sogod" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "San Ricardo", value: "San Ricardo" },
                    { text: "Silago", value: "Silago" },
                    { text: "Hinunangan", value: "Hinunangan" },
                    { text: "Hinundayan", value: "Hinundayan" },
                    { text: "Anahawan", value: "Anahawan" },
                    { text: "St. Bernard", value: "St. Bernard" },
                    { text: "San Francisco", value: "San Francisco" },
                    { text: "Limasawa", value: "Limasawa" },
                    { text: "Tomas Oppus", value: "Tomas Oppus" }
                ]);
            }else if (Province === "Zamboanga del Norte") {
                addCityOptions([
                    { text: "Dipolog City", value: "Dipolog City" },
                    { text: "Dapitan City", value: "Dapitan City" },
                    { text: "Polanco", value: "Polanco" },
                    { text: "Sindangan", value: "Sindangan" },
                    { text: "Manukan", value: "Manukan" },
                    { text: "Siayan", value: "Siayan" },
                    { text: "Liloy", value: "Liloy" },
                    { text: "Sirawai", value: "Sirawai" },
                    { text: "Mutia", value: "Mutia" },
                    { text: "Roxas", value: "Roxas" },
                    { text: "Gutalac", value: "Gutalac" },
                    { text: "Tampilisan", value: "Tampilisan" },
                    { text: "Bacungan", value: "Bacungan" },
                    { text: "Bugasong", value: "Bugasong" },
                    { text: "Labason", value: "Labason" },
                    { text: "Sibuco", value: "Sibuco" },
                    { text: "Baliguian", value: "Baliguian" },
                    { text: "Baliangao", value: "Baliangao" },
                    { text: "Polanco", value: "Polanco" }
                ]);
            }else if (Province === "Zamboanga del Sur") {
                addCityOptions([
                    { text: "Pagadian City", value: "Pagadian City" },
                    { text: "Dipolog City", value: "Dipolog City" },
                    { text: "Dumingag", value: "Dumingag" },
                    { text: "Lakewood", value: "Lakewood" },
                    { text: "Lapuyan", value: "Lapuyan" },
                    { text: "Midsalip", value: "Midsalip" },
                    { text: "Molave", value: "Molave" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "San Pablo", value: "San Pablo" },
                    { text: "San Francisco", value: "San Francisco" },
                    { text: "Tigbao", value: "Tigbao" },
                    { text: "Tampilisan", value: "Tampilisan" },
                    { text: "Vincenzo Sagun", value: "Vincenzo Sagun" },
                    { text: "Tambulig", value: "Tambulig" },
                    { text: "Josefina", value: "Josefina" },
                    { text: "Bayog", value: "Bayog" },
                    { text: "Buug", value: "Buug" },
                    { text: "Guipos", value: "Guipos" },
                    { text: "Sominot", value: "Sominot" },
                    { text: "Tambulig", value: "Tambulig" }
                ]);
            }else if (Province === "Zamboanga Sibugay") {
                addCityOptions([
                    { text: "Ipil", value: "Ipil" },
                    { text: "Naga", value: "Naga" },
                    { text: "Kabasalan", value: "Kabasalan" },
                    { text: "Mabuhay", value: "Mabuhay" },
                    { text: "Malangas", value: "Malangas" },
                    { text: "Imelda", value: "Imelda" },
                    { text: "Talusan", value: "Talusan" },
                    { text: "Tiis", value: "Tiis" },
                    { text: "Buug", value: "Buug" },
                    { text: "Kabasalan", value: "Kabasalan" },
                    { text: "Siay", value: "Siay" },
                    { text: "Sibuco", value: "Sibuco" },
                    { text: "Lakewood", value: "Lakewood" },
                    { text: "Sominot", value: "Sominot" }
                ]);
            }else if (Province === "Bukidnon") {
                addCityOptions([
                    { text: "Malaybalay City", value: "Malaybalay City" },
                    { text: "Valencia City", value: "Valencia City" },
                    { text: "Baungon", value: "Baungon" },
                    { text: "Cabanglasan", value: "Cabanglasan" },
                    { text: "Damulog", value: "Damulog" },
                    { text: "Don Carlos", value: "Don Carlos" },
                    { text: "Impasugong", value: "Impasugong" },
                    { text: "Kadingilan", value: "Kadingilan" },
                    { text: "Libona", value: "Libona" },
                    { text: "Lugait", value: "Lugait" },
                    { text: "Malitbog", value: "Malitbog" },
                    { text: "Manolo Fortich", value: "Manolo Fortich" },
                    { text: "Maramag", value: "Maramag" },
                    { text: "Pangantucan", value: "Pangantucan" },
                    { text: "Quezon", value: "Quezon" },
                    { text: "Sumilao", value: "Sumilao" },
                    { text: "Talakag", value: "Talakag" }
                ]);
            }else if (Province === "Camiguin") {
                addCityOptions([
                    { text: "Mambajao", value: "Mambajao" },
                    { text: "Catarman", value: "Catarman" },
                    { text: "Guinsiliban", value: "Guinsiliban" },
                    { text: "Mahinog", value: "Mahinog" },
                    { text: "Sagay", value: "Sagay" },
                    { text: "Talisayan", value: "Talisayan" }
                ]);
            }else if (Province === "Lanao del Norte") {
                addCityOptions([
                    { text: "Tubod", value: "Tubod" },
                    { text: "Iligan City", value: "Iligan City" },
                    { text: "Baloi", value: "Baloi" },
                    { text: "Baroy", value: "Baroy" },
                    { text: "Kapatagan", value: "Kapatagan" },
                    { text: "Kauswagan", value: "Kauswagan" },
                    { text: "Kolambugan", value: "Kolambugan" },
                    { text: "Linamon", value: "Linamon" },
                    { text: "Magsaysay", value: "Magsaysay" },
                    { text: "Maigo", value: "Maigo" },
                    { text: "Pantar", value: "Pantar" },
                    { text: "Sultan Naga Dimaporo", value: "Sultan Naga Dimaporo" },
                    { text: "Tangcal", value: "Tangcal" },
                    { text: "Tugaya", value: "Tugaya" }
                ]);
            }else if (Province === "Misamis Occidental") {
                addCityOptions([
                    { text: "Ozamiz City", value: "Ozamiz City" },
                    { text: "Tangub City", value: "Tangub City" },
                    { text: "Jimenez", value: "Jimenez" },
                    { text: "Plaridel", value: "Plaridel" },
                    { text: "Concepcion", value: "Concepcion" },
                    { text: "Sinacaban", value: "Sinacaban" },
                    { text: "Clarin", value: "Clarin" },
                    { text: "Tudela", value: "Tudela" },
                    { text: "Baliangao", value: "Baliangao" },
                    { text: "Panaon", value: "Panaon" }
                ]);
            }else if (Province === "Misamis Oriental") {
                addCityOptions([
                    { text: "Cagayan de Oro City", value: "Cagayan de Oro City" },
                    { text: "Gingoog City", value: "Gingoog City" },
                    { text: "El Salvador", value: "El Salvador" },
                    { text: "Opol", value: "Opol" },
                    { text: "Manticao", value: "Manticao" },
                    { text: "Villanueva", value: "Villanueva" },
                    { text: "Claveria", value: "Claveria" },
                    { text: "Balingasag", value: "Balingasag" },
                    { text: "Balingoan", value: "Balingoan" },
                    { text: "Kinoguitan", value: "Kinoguitan" },
                    { text: "Magsaysay", value: "Magsaysay" },
                    { text: "Salay", value: "Salay" },
                    { text: "Sugbongcogon", value: "Sugbongcogon" },
                    { text: "Tagoloan", value: "Tagoloan" },
                    { text: "Villanueva", value: "Villanueva" }
                ]);
            }else if (Province === "Davao de Oro") {
                addCityOptions([
                    { text: "Mabini", value: "Mabini" },
                    { text: "Nabunturan", value: "Nabunturan" },
                    { text: "Tagum City", value: "Tagum City" },
                    { text: "Panabo City", value: "Panabo City" },
                    { text: "Samal", value: "Samal" },
                    { text: "Compostela", value: "Compostela" },
                    { text: "Laak", value: "Laak" },
                    { text: "Maragusan", value: "Maragusan" },
                    { text: "New Bataan", value: "New Bataan" },
                    { text: "Mati", value: "Mati" },
                    { text: "Monkayo", value: "Monkayo" },
                    { text: "Talaingod", value: "Talaingod" }
                ]);
            }else if (Province === "Davao del Norte") {
                addCityOptions([
                    { text: "Tagum City", value: "Tagum City" },
                    { text: "Davao City", value: "Davao City" },
                    { text: "Panabo City", value: "Panabo City" },
                    { text: "Island Garden City of Samal", value: "Island Garden City of Samal" },
                    { text: "Braulio E. Dujali", value: "Braulio E. Dujali" },
                    { text: "Carmen", value: "Carmen" },
                    { text: "Kapalong", value: "Kapalong" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "Santo Tomas", value: "Santo Tomas" },
                    { text: "Talaingod", value: "Talaingod" }
                ]);
            }else if (Province === "Davao del Sur") {
                addCityOptions([
                    { text: "Digos City", value: "Digos City" },
                    { text: "Sta. Cruz", value: "Sta. Cruz" },
                    { text: "Bansalan", value: "Bansalan" },
                    { text: "Hagonoy", value: "Hagonoy" },
                    { text: "Magsaysay", value: "Magsaysay" },
                    { text: "Kiblawan", value: "Kiblawan" },
                    { text: "Malalag", value: "Malalag" },
                    { text: "Matanao", value: "Matanao" },
                    { text: "Davao City", value: "Davao City" },
                    { text: "Don Marcelino", value: "Don Marcelino" },
                    { text: "Jose Abad Santos", value: "Jose Abad Santos" },
                    { text: "Santo Niño", value: "Santo Niño" },
                    { text: "Sulop", value: "Sulop" }
                ]);
            }else if (Province === "Davao Occidental") {
                addCityOptions([
                    { text: "Mati City", value: "Mati City" },
                    { text: "Malita", value: "Malita" },
                    { text: "Santiago", value: "Santiago" },
                    { text: "Jose Abad Santos", value: "Jose Abad Santos" },
                    { text: "Don Marcelino", value: "Don Marcelino" },
                    { text: "Sarangani", value: "Sarangani" }
                ]);
            }else if (Province === "Cotabato") {
                addCityOptions([
                    { text: "Kidapawan City", value: "Kidapawan City" },
                    { text: "Midsayap", value: "Midsayap" },
                    { text: "M'lang", value: "M'lang" },
                    { text: "Alamada", value: "Alamada" },
                    { text: "Arakan", value: "Arakan" },
                    { text: "Makilala", value: "Makilala" },
                    { text: "Pigcawayan", value: "Pigcawayan" },
                    { text: "Pikit", value: "Pikit" },
                    { text: "Antipas", value: "Antipas" },
                    { text: "Tulunan", value: "Tulunan" }
                ]);
            }else if (Province === "Sarangani") {
                addCityOptions([
                    { text: "Alabel", value: "Alabel" },
                    { text: "Glan", value: "Glan" },
                    { text: "Maasim", value: "Maasim" },
                    { text: "Maitum", value: "Maitum" },
                    { text: "Malapatan", value: "Malapatan" },
                    { text: "Malungon", value: "Malungon" }
                ]);
            }else if (Province === "South Cotabato") {
                addCityOptions([
                    { text: "Koronadal City", value: "Koronadal City" },
                    { text: "General Santos City", value: "General Santos City" },
                    { text: "Polomolok", value: "Polomolok" },
                    { text: "Tampakan", value: "Tampakan" },
                    { text: "Surallah", value: "Surallah" },
                    { text: "Banga", value: "Banga" },
                    { text: "Lake Sebu", value: "Lake Sebu" },
                    { text: "T'boli", value: "T'boli" },
                    { text: "Sen. Ninoy Aquino", value: "Sen. Ninoy Aquino" }
                ]);
            }else if (Province === "Sultan Kudarat") {
                addCityOptions([
                    { text: "Isulan", value: "Isulan" },
                    { text: "Tacurong City", value: "Tacurong City" },
                    { text: "Bagumbayan", value: "Bagumbayan" },
                    { text: "Columbio", value: "Columbio" },
                    { text: "Esperanza", value: "Esperanza" },
                    { text: "Kalamansig", value: "Kalamansig" },
                    { text: "Lebak", value: "Lebak" },
                    { text: "Sen. Ninoy Aquino", value: "Sen. Ninoy Aquino" },
                    { text: "Palimbang", value: "Palimbang" }
                ]);
            }else if (Province === "Agusan del Norte") {
                addCityOptions([
                    { text: "Butuan City", value: "Butuan City" },
                    { text: "Buenavista", value: "Buenavista" },
                    { text: "Carmen", value: "Carmen" },
                    { text: "Jabonga", value: "Jabonga" },
                    { text: "Kitcharao", value: "Kitcharao" },
                    { text: "Las Nieves", value: "Las Nieves" },
                    { text: "Magallanes", value: "Magallanes" },
                    { text: "Nasipit", value: "Nasipit" },
                    { text: "Remedios T. Romualdez", value: "Remedios T. Romualdez" },
                    { text: "Trento", value: "Trento" }
                ]);
            }else if (Province === "Agusan del Sur") {
                addCityOptions([
                    { text: "Bayugan City", value: "Bayugan City" },
                    { text: "Esperanza", value: "Esperanza" },
                    { text: "La Paz", value: "La Paz" },
                    { text: "Loreto", value: "Loreto" },
                    { text: "Rosario", value: "Rosario" },
                    { text: "San Francisco", value: "San Francisco" },
                    { text: "San Luis", value: "San Luis" },
                    { text: "San Mateo", value: "San Mateo" },
                    { text: "Santa Josefa", value: "Santa Josefa" },
                    { text: "Santo Niño", value: "Santo Niño" },
                    { text: "Talacogon", value: "Talacogon" },
                    { text: "Trento", value: "Trento" },
                    { text: "Veruela", value: "Veruela" }
                ]);
            }else if (Province === "Dinagat Islands") {
                addCityOptions([
                    { text: "Cagdianao", value: "Cagdianao" },
                    { text: "Dinagat", value: "Dinagat" },
                    { text: "Libjo", value: "Libjo" },
                    { text: "Loreto", value: "Loreto" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "San Juan", value: "San Juan" },
                    { text: "Tubajon", value: "Tubajon" }
                ]);
            }else if (Province === "Surigao del Norte") {
                addCityOptions([
                    { text: "Surigao City", value: "Surigao City" },
                    { text: "Bacuag", value: "Bacuag" },
                    { text: "Bad-as", value: "Bad-as" },
                    { text: "Burgos", value: "Burgos" },
                    { text: "Claver", value: "Claver" },
                    { text: "Dapa", value: "Dapa" },
                    { text: "Del Carmen", value: "Del Carmen" },
                    { text: "Gigaquit", value: "Gigaquit" },
                    { text: "Lanuza", value: "Lanuza" },
                    { text: "Mainit", value: "Mainit" },
                    { text: "Malimono", value: "Malimono" },
                    { text: "Sison", value: "Sison" },
                    { text: "Tagana-an", value: "Tagana-an" },
                    { text: "Tubod", value: "Tubod" }
                ]);
            }else if (Province === "Surigao del Sur") {
                addCityOptions([
                    { text: "Tandag City", value: "Tandag City" },
                    { text: "Barobo", value: "Barobo" },
                    { text: "Bislig City", value: "Bislig City" },
                    { text: "Cagwait", value: "Cagwait" },
                    { text: "Cantilan", value: "Cantilan" },
                    { text: "Carascal", value: "Carascal" },
                    { text: "Cortes", value: "Cortes" },
                    { text: "Lanuza", value: "Lanuza" },
                    { text: "Lingig", value: "Lingig" },
                    { text: "Madrid", value: "Madrid" },
                    { text: "Marihatag", value: "Marihatag" },
                    { text: "San Agustin", value: "San Agustin" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "Tagbina", value: "Tagbina" },
                    { text: "Taytay", value: "Taytay" }
                ]);
            }else if (Province === "Basilan") {
                addCityOptions([
                    { text: "Isabela City", value: "Isabela City" },
                    { text: "Lamitan City", value: "Lamitan City" },
                    { text: "Akbar", value: "Akbar" },
                    { text: "Al-Barka", value: "Al-Barka" },
                    { text: "Hadji Mohammad Ajul", value: "Hadji Mohammad Ajul" },
                    { text: "Hadji Panglima Tahil", value: "Hadji Panglima Tahil" },
                    { text: "Lantawan", value: "Lantawan" },
                    { text: "Maluso", value: "Maluso" },
                    { text: "Sumisip", value: "Sumisip" },
                    { text: "Tipo-Tipo", value: "Tipo-Tipo" }
                ]);
            }else if (Province === "Lanao del Sur") {
                addCityOptions([
                    { text: "Marawi City", value: "Marawi City" },
                    { text: "Amai Manabilang", value: "Amai Manabilang" },
                    { text: "Bacolod-Kalawi", value: "Bacolod-Kalawi" },
                    { text: "Balabagan", value: "Balabagan" },
                    { text: "Balindong", value: "Balindong" },
                    { text: "Bayang", value: "Bayang" },
                    { text: "Binidayan", value: "Binidayan" },
                    { text: "Buadiposo-Buntong", value: "Buadiposo-Buntong" },
                    { text: "Ditsaan-Ramain", value: "Ditsaan-Ramain" },
                    { text: "Ganassi", value: "Ganassi" },
                    { text: "Kapai", value: "Kapai" },
                    { text: "Lumbatan", value: "Lumbatan" },
                    { text: "Lumbayanague", value: "Lumbayanague" },
                    { text: "Madalum", value: "Madalum" },
                    { text: "Madamba", value: "Madamba" },
                    { text: "Maguing", value: "Maguing" },
                    { text: "Malabang", value: "Malabang" },
                    { text: "Marantao", value: "Marantao" },
                    { text: "Masiu", value: "Masiu" },
                    { text: "Mulondo", value: "Mulondo" },
                    { text: "Pualas", value: "Pualas" },
                    { text: "Saguiaran", value: "Saguiaran" },
                    { text: "Sultan Dumalondong", value: "Sultan Dumalondong" },
                    { text: "Tagoloan II", value: "Tagoloan II" },
                    { text: "Tamparan", value: "Tamparan" },
                    { text: "Tubaran", value: "Tubaran" },
                    { text: "Tugaya", value: "Tugaya" },
                    { text: "Watu", value: "Watu" }
                ]);
            }else if (Province === "Maguindanao del Norte") {
                addCityOptions([
                    { text: "Shariff Aguak", value: "Shariff Aguak" },
                    { text: "Datu Anggal Midtimbang", value: "Datu Anggal Midtimbang" },
                    { text: "Datu Blah T. Sinsuat", value: "Datu Blah T. Sinsuat" },
                    { text: "Datu Hoffer Ampatuan", value: "Datu Hoffer Ampatuan" },
                    { text: "Datu Odin Sinsuat", value: "Datu Odin Sinsuat" },
                    { text: "Datu Salibo", value: "Datu Salibo" },
                    { text: "General Salipada K. Pendatun", value: "General Salipada K. Pendatun" },
                    { text: "Kabuntalan", value: "Kabuntalan" },
                    { text: "Mamasapano", value: "Mamasapano" },
                    { text: "Matanog", value: "Matanog" },
                    { text: "North Upi", value: "North Upi" },
                    { text: "Pagalungan", value: "Pagalungan" },
                    { text: "Pikit", value: "Pikit" },
                    { text: "Sultan Kudarat", value: "Sultan Kudarat" },
                    { text: "Sultan Mastura", value: "Sultan Mastura" },
                    { text: "Talitay", value: "Talitay" },
                    { text: "Ampatuan", value: "Ampatuan" }
                ]);
            }else if (Province === "Maguindanao del Sur") {
                addCityOptions([
                    { text: "Buluan", value: "Buluan" },
                    { text: "Datu Abdullah Sangki", value: "Datu Abdullah Sangki" },
                    { text: "Datu Saudi-Ampatuan", value: "Datu Saudi-Ampatuan" },
                    { text: "Datu Unsay", value: "Datu Unsay" },
                    { text: "Guindulungan", value: "Guindulungan" },
                    { text: "Lake Sebu", value: "Lake Sebu" },
                    { text: "Maguindanao", value: "Maguindanao" },
                    { text: "Matanog", value: "Matanog" },
                    { text: "Sultan Kudarat", value: "Sultan Kudarat" },
                    { text: "Sultan Mastura", value: "Sultan Mastura" },
                    { text: "Talitay", value: "Talitay" }
                ]);
            }else if (Province === "Tawi-Tawi") {
                addCityOptions([
                    { text: "Bongao", value: "Bongao" },
                    { text: "Lamitan", value: "Lamitan" },
                    { text: "Mapun", value: "Mapun" },
                    { text: "Sapa-Sapa", value: "Sapa-Sapa" },
                    { text: "Simunul", value: "Simunul" },
                    { text: "Sitangkai", value: "Sitangkai" },
                    { text: "Tandubas", value: "Tandubas" },
                    { text: "Turtle Islands", value: "Turtle Islands" }
                ]);
            }
        });

        // Function to add options to the City dropdown
        function addCityOptions(cities) {
            cities.forEach(city => {
                const option = document.createElement("option");
                option.value = city.value; // Set the option's value
                option.textContent = city.text; // Set the display text
                CityDropdown.appendChild(option); // Append the option to CityDropdown
            });
        }

        CityDropdown.addEventListener("change", function () {
            const City = this.value;

            // Clear existing options in Barangay dropdown
            BarangayDropdown.innerHTML = '<option selected disabled>Select Barangay</option>';

            // Set options for the Barangay dropdown based on City selection
            if (City === "Caloocan") {
                addBarangayOptions([
                    { text: "Barangay 1", value: "Barangay 1" },
                    { text: "Barangay 2", value: "Barangay 2" },
                    { text: "Barangay 3", value: "Barangay 3" },
                    { text: "Barangay 4", value: "Barangay 4" },
                    { text: "Barangay 5", value: "Barangay 5" },
                    { text: "Barangay 6", value: "Barangay 6" },
                    { text: "Barangay 7", value: "Barangay 7" },
                    { text: "Barangay 8", value: "Barangay 8" },
                    { text: "Barangay 9", value: "Barangay 9" },
                    { text: "Barangay 10", value: "Barangay 10" },
                    { text: "Barangay 11", value: "Barangay 11" },
                    { text: "Barangay 12", value: "Barangay 12" },
                    { text: "Barangay 13", value: "Barangay 13" },
                    { text: "Barangay 14", value: "Barangay 14" },
                    { text: "Barangay 15", value: "Barangay 15" },
                    { text: "Barangay 16", value: "Barangay 16" },
                    { text: "Barangay 17", value: "Barangay 17" },
                    { text: "Barangay 18", value: "Barangay 18" },
                    { text: "Barangay 19", value: "Barangay 19" },
                    { text: "Barangay 20", value: "Barangay 20" },
                    { text: "Barangay 21", value: "Barangay 21" },
                    { text: "Barangay 22", value: "Barangay 22" },
                    { text: "Barangay 23", value: "Barangay 23" },
                    { text: "Barangay 24", value: "Barangay 24" },
                    { text: "Barangay 25", value: "Barangay 25" },
                    { text: "Barangay 26", value: "Barangay 26" },
                    { text: "Barangay 27", value: "Barangay 27" },
                    { text: "Barangay 28", value: "Barangay 28" },
                    { text: "Barangay 29", value: "Barangay 29" },
                    { text: "Barangay 30", value: "Barangay 30" },
                    { text: "Barangay 31", value: "Barangay 31" },
                    { text: "Barangay 32", value: "Barangay 32" },
                    { text: "Barangay 33", value: "Barangay 33" },
                    { text: "Barangay 34", value: "Barangay 34" },
                    { text: "Barangay 35", value: "Barangay 35" },
                    { text: "Barangay 36", value: "Barangay 36" },
                    { text: "Barangay 37", value: "Barangay 37" },
                    { text: "Barangay 38", value: "Barangay 38" },
                    { text: "Barangay 39", value: "Barangay 39" },
                    { text: "Barangay 40", value: "Barangay 40" },
                    { text: "Barangay 41", value: "Barangay 41" },
                    { text: "Barangay 42", value: "Barangay 42" },
                    { text: "Barangay 43", value: "Barangay 43" },
                    { text: "Barangay 44", value: "Barangay 44" },
                    { text: "Barangay 45", value: "Barangay 45" },
                    { text: "Barangay 46", value: "Barangay 46" },
                    { text: "Barangay 47", value: "Barangay 47" },
                    { text: "Barangay 48", value: "Barangay 48" },
                    { text: "Barangay 49", value: "Barangay 49" },
                    { text: "Barangay 50", value: "Barangay 50" },
                    { text: "Barangay 51", value: "Barangay 51" },
                    { text: "Barangay 52", value: "Barangay 52" },
                    { text: "Barangay 53", value: "Barangay 53" },
                    { text: "Barangay 54", value: "Barangay 54" },
                    { text: "Barangay 55", value: "Barangay 55" },
                    { text: "Barangay 56", value: "Barangay 56" },
                    { text: "Barangay 57", value: "Barangay 57" },
                    { text: "Barangay 58", value: "Barangay 58" },
                    { text: "Barangay 59", value: "Barangay 59" },
                    { text: "Barangay 60", value: "Barangay 60" },
                    { text: "Barangay 61", value: "Barangay 61" },
                    { text: "Barangay 62", value: "Barangay 62" },
                    { text: "Barangay 63", value: "Barangay 63" },
                    { text: "Barangay 64", value: "Barangay 64" },
                    { text: "Barangay 65", value: "Barangay 65" },
                    { text: "Barangay 66", value: "Barangay 66" },
                    { text: "Barangay 67", value: "Barangay 67" },
                    { text: "Barangay 68", value: "Barangay 68" },
                    { text: "Barangay 69", value: "Barangay 69" },
                    { text: "Barangay 70", value: "Barangay 70" },
                    { text: "Barangay 71", value: "Barangay 71" },
                    { text: "Barangay 72", value: "Barangay 72" },
                    { text: "Barangay 73", value: "Barangay 73" },
                    { text: "Barangay 74", value: "Barangay 74" },
                    { text: "Barangay 75", value: "Barangay 75" },
                    { text: "Barangay 76", value: "Barangay 76" },
                    { text: "Barangay 77", value: "Barangay 77" },
                    { text: "Barangay 78", value: "Barangay 78" },
                    { text: "Barangay 79", value: "Barangay 79" },
                    { text: "Barangay 80", value: "Barangay 80" },
                    { text: "Barangay 81", value: "Barangay 81" },
                    { text: "Barangay 82", value: "Barangay 82" },
                    { text: "Barangay 83", value: "Barangay 83" },
                    { text: "Barangay 84", value: "Barangay 84" },
                    { text: "Barangay 85", value: "Barangay 85" },
                    { text: "Barangay 86", value: "Barangay 86" },
                    { text: "Barangay 87", value: "Barangay 87" },
                    { text: "Barangay 88", value: "Barangay 88" },
                    { text: "Barangay 89", value: "Barangay 89" },
                    { text: "Barangay 90", value: "Barangay 90" },
                    { text: "Barangay 91", value: "Barangay 91" },
                    { text: "Barangay 92", value: "Barangay 92" },
                    { text: "Barangay 93", value: "Barangay 93" },
                    { text: "Barangay 94", value: "Barangay 94" },
                    { text: "Barangay 95", value: "Barangay 95" },
                    { text: "Barangay 96", value: "Barangay 96" },
                    { text: "Barangay 97", value: "Barangay 97" },
                    { text: "Barangay 98", value: "Barangay 98" },
                    { text: "Barangay 99", value: "Barangay 99" },
                    { text: "Barangay 100", value: "Barangay 100" },
                    { text: "Barangay 101", value: "Barangay 101" },
                    { text: "Barangay 102", value: "Barangay 102" },
                    { text: "Barangay 103", value: "Barangay 103" },
                    { text: "Barangay 104", value: "Barangay 104" },
                    { text: "Barangay 105", value: "Barangay 105" },
                    { text: "Barangay 106", value: "Barangay 106" },
                    { text: "Barangay 107", value: "Barangay 107" },
                    { text: "Barangay 108", value: "Barangay 108" },
                    { text: "Barangay 109", value: "Barangay 109" },
                    { text: "Barangay 110", value: "Barangay 110" },
                    { text: "Barangay 111", value: "Barangay 111" },
                    { text: "Barangay 112", value: "Barangay 112" },
                    { text: "Barangay 113", value: "Barangay 113" },
                    { text: "Barangay 114", value: "Barangay 114" },
                    { text: "Barangay 115", value: "Barangay 115" },
                    { text: "Barangay 116", value: "Barangay 116" },
                    { text: "Barangay 117", value: "Barangay 117" },
                    { text: "Barangay 118", value: "Barangay 118" },
                    { text: "Barangay 119", value: "Barangay 119" },
                    { text: "Barangay 120", value: "Barangay 120" },
                    { text: "Barangay 121", value: "Barangay 121" },
                    { text: "Barangay 122", value: "Barangay 122" },
                    { text: "Barangay 123", value: "Barangay 123" },
                    { text: "Barangay 124", value: "Barangay 124" },
                    { text: "Barangay 125", value: "Barangay 125" },
                    { text: "Barangay 126", value: "Barangay 126" },
                    { text: "Barangay 127", value: "Barangay 127" },
                    { text: "Barangay 128", value: "Barangay 128" },
                    { text: "Barangay 129", value: "Barangay 129" },
                    { text: "Barangay 130", value: "Barangay 130" },
                    { text: "Barangay 131", value: "Barangay 131" },
                    { text: "Barangay 132", value: "Barangay 132" },
                    { text: "Barangay 133", value: "Barangay 133" },
                    { text: "Barangay 134", value: "Barangay 134" },
                    { text: "Barangay 135", value: "Barangay 135" },
                    { text: "Barangay 136", value: "Barangay 136" },
                    { text: "Barangay 137", value: "Barangay 137" },
                    { text: "Barangay 138", value: "Barangay 138" },
                    { text: "Barangay 139", value: "Barangay 139" },
                    { text: "Barangay 140", value: "Barangay 140" },
                    { text: "Barangay 141", value: "Barangay 141" },
                    { text: "Barangay 142", value: "Barangay 142" },
                    { text: "Barangay 143", value: "Barangay 143" },
                    { text: "Barangay 144", value: "Barangay 144" },
                    { text: "Barangay 145", value: "Barangay 145" },
                    { text: "Barangay 146", value: "Barangay 146" },
                    { text: "Barangay 147", value: "Barangay 147" },
                    { text: "Barangay 148", value: "Barangay 148" },
                    { text: "Barangay 149", value: "Barangay 149" },
                    { text: "Barangay 150", value: "Barangay 150" },
                    { text: "Barangay 151", value: "Barangay 151" },
                    { text: "Barangay 152", value: "Barangay 152" },
                    { text: "Barangay 153", value: "Barangay 153" },
                    { text: "Barangay 154", value: "Barangay 154" },
                    { text: "Barangay 155", value: "Barangay 155" },
                    { text: "Barangay 156", value: "Barangay 156" },
                    { text: "Barangay 157", value: "Barangay 157" },
                    { text: "Barangay 158", value: "Barangay 158" },
                    { text: "Barangay 159", value: "Barangay 159" },
                    { text: "Barangay 160", value: "Barangay 160" },
                    { text: "Barangay 161", value: "Barangay 161" },
                    { text: "Barangay 162", value: "Barangay 162" },
                    { text: "Barangay 163", value: "Barangay 163" },
                    { text: "Barangay 164", value: "Barangay 164" },
                    { text: "Barangay 165", value: "Barangay 165" },
                    { text: "Barangay 166", value: "Barangay 166" },
                    { text: "Barangay 167", value: "Barangay 167" },
                    { text: "Barangay 168", value: "Barangay 168" },
                    { text: "Barangay 169", value: "Barangay 169" },
                    { text: "Barangay 170", value: "Barangay 170" },
                    { text: "Barangay 171", value: "Barangay 171" },
                    { text: "Barangay 172", value: "Barangay 172" },
                    { text: "Barangay 173", value: "Barangay 173" },
                    { text: "Barangay 174", value: "Barangay 174" },
                    { text: "Barangay 175", value: "Barangay 175" },
                    { text: "Barangay 176", value: "Barangay 176" },
                    { text: "Barangay 177", value: "Barangay 177" },
                    { text: "Barangay 178", value: "Barangay 178" },
                    { text: "Barangay 179", value: "Barangay 179" },
                    { text: "Barangay 180", value: "Barangay 180" },
                    { text: "Barangay 181", value: "Barangay 181" },
                    { text: "Barangay 182", value: "Barangay 182" },
                    { text: "Barangay 183", value: "Barangay 183" },
                    { text: "Barangay 184", value: "Barangay 184" },
                    { text: "Barangay 185", value: "Barangay 185" },
                    { text: "Barangay 186", value: "Barangay 186" },
                    { text: "Barangay 187", value: "Barangay 187" },
                    { text: "Barangay 188", value: "Barangay 188" },
                    { text: "Barangay 189", value: "Barangay 189" },
                    { text: "Barangay 190", value: "Barangay 190" },
                    { text: "Barangay 191", value: "Barangay 191" },
                    { text: "Barangay 192", value: "Barangay 192" },
                    { text: "Barangay 193", value: "Barangay 193" },
                    { text: "Barangay 194", value: "Barangay 194" },
                    { text: "Barangay 195", value: "Barangay 195" },
                    { text: "Barangay 196", value: "Barangay 196" },
                    { text: "Barangay 197", value: "Barangay 197" },
                    { text: "Barangay 198", value: "Barangay 198" },
                    { text: "Barangay 199", value: "Barangay 199" },
                    { text: "Barangay 200", value: "Barangay 200" },
                    { text: "Barangay 201", value: "Barangay 201" },
                    { text: "Barangay 202", value: "Barangay 202" },
                    { text: "Barangay 203", value: "Barangay 203" }
                ]);
            }else if (City === "Las Piñas") {
                addBarangayOptions([
                    { text: "Almanza I", value: "Almanza I" },
                    { text: "Almanza II", value: "Almanza II" },
                    { text: "Bacoor", value: "Bacoor" },
                    { text: "Cawayan", value: "Cawayan" },
                    { text: "Daniel Fajardo", value: "Daniel Fajardo" },
                    { text: "Daniel Fajardo", value: "Daniel Fajardo" },
                    { text: "King's Heights", value: "King's Heights" },
                    { text: "Las Piñas", value: "Las Piñas" },
                    { text: "Longos", value: "Longos" },
                    { text: "Paltok", value: "Paltok" },
                    { text: "Pamplona I", value: "Pamplona I" },
                    { text: "Pamplona II", value: "Pamplona II" },
                    { text: "Pulong Bunga", value: "Pulong Bunga" },
                    { text: "Talibayog", value: "Talibayog" }
                ]);
            }else if (City === "Makati") {
                addBarangayOptions([
                    { text: "Barangay 1", value: "Barangay 1" },
                    { text: "Barangay 2", value: "Barangay 2" },
                    { text: "Barangay 3", value: "Barangay 3" },
                    { text: "Barangay 4", value: "Barangay 4" },
                    { text: "Barangay 5", value: "Barangay 5" },
                    { text: "Barangay 6", value: "Barangay 6" },
                    { text: "Barangay 7", value: "Barangay 7" },
                    { text: "Barangay 8", value: "Barangay 8" },
                    { text: "Barangay 9", value: "Barangay 9" },
                    { text: "Barangay 10", value: "Barangay 10" },
                    { text: "Barangay 11", value: "Barangay 11" },
                    { text: "Barangay 12", value: "Barangay 12" },
                    { text: "Barangay 13", value: "Barangay 13" },
                    { text: "Barangay 14", value: "Barangay 14" },
                    { text: "Barangay 15", value: "Barangay 15" },
                    { text: "Barangay 16", value: "Barangay 16" },
                    { text: "Barangay 17", value: "Barangay 17" },
                    { text: "Barangay 18", value: "Barangay 18" },
                    { text: "Barangay 19", value: "Barangay 19" },
                    { text: "Barangay 20", value: "Barangay 20" },
                    { text: "Barangay 21", value: "Barangay 21" },
                    { text: "Barangay 22", value: "Barangay 22" },
                    { text: "Barangay 23", value: "Barangay 23" },
                    { text: "Barangay 24", value: "Barangay 24" },
                    { text: "Barangay 25", value: "Barangay 25" },
                    { text: "Barangay 26", value: "Barangay 26" },
                    { text: "Barangay 27", value: "Barangay 27" },
                    { text: "Barangay 28", value: "Barangay 28" },
                    { text: "Barangay 29", value: "Barangay 29" },
                    { text: "Barangay 30", value: "Barangay 30" },
                    { text: "Barangay 31", value: "Barangay 31" },
                    { text: "Barangay 32", value: "Barangay 32" },
                    { text: "Barangay 33", value: "Barangay 33" },
                    { text: "Barangay 34", value: "Barangay 34" },
                    { text: "Barangay 35", value: "Barangay 35" },
                    { text: "Barangay 36", value: "Barangay 36" },
                    { text: "Barangay 37", value: "Barangay 37" },
                    { text: "Barangay 38", value: "Barangay 38" },
                    { text: "Barangay 39", value: "Barangay 39" },
                    { text: "Barangay 40", value: "Barangay 40" },
                    { text: "Barangay 41", value: "Barangay 41" },
                    { text: "Barangay 42", value: "Barangay 42" },
                    { text: "Barangay 43", value: "Barangay 43" },
                    { text: "Barangay 44", value: "Barangay 44" },
                    { text: "Barangay 45", value: "Barangay 45" }
                ]);
            }else if (City === "Malabon") {
                addBarangayOptions([
                    { text: "Barangay Acacia", value: "Barangay Acacia" },
                    { text: "Barangay Baño", value: "Barangay Baño" },
                    { text: "Barangay Baritan", value: "Barangay Baritan" },
                    { text: "Barangay Longos", value: "Barangay Longos" },
                    { text: "Barangay Mabalot", value: "Barangay Mabalot" },
                    { text: "Barangay Muzon", value: "Barangay Muzon" },
                    { text: "Barangay Concepcion", value: "Barangay Concepcion" },
                    { text: "Barangay Dampol", value: "Barangay Dampol" },
                    { text: "Barangay Hulong Duhat", value: "Barangay Hulong Duhat" },
                    { text: "Barangay Potrero", value: "Barangay Potrero" },
                    { text: "Barangay Tugatog", value: "Barangay Tugatog" },
                    { text: "Barangay Malabon", value: "Barangay Malabon" },
                    { text: "Barangay Tinajeros", value: "Barangay Tinajeros" },
                    { text: "Barangay Longos", value: "Barangay Longos" },
                    { text: "Barangay Catmon", value: "Barangay Catmon" },
                    { text: "Barangay Tañong", value: "Barangay Tañong" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay Dalandanan", value: "Barangay Dalandanan" },
                    { text: "Barangay San Agustin", value: "Barangay San Agustin" },
                    { text: "Barangay Malaya", value: "Barangay Malaya" }
                ]);
            }else if (City === "Mandaluyong") {
                addBarangayOptions([
                    { text: "Barangay Addition Hills", value: "Barangay Addition Hills" },
                    { text: "Barangay Hulo", value: "Barangay Hulo" },
                    { text: "Barangay Barangka", value: "Barangay Barangka" },
                    { text: "Barangay Burol", value: "Barangay Burol" },
                    { text: "Barangay Guadalupe Nuevo", value: "Barangay Guadalupe Nuevo" },
                    { text: "Barangay Guadalupe Viejo", value: "Barangay Guadalupe Viejo" },
                    { text: "Barangay Vergara", value: "Barangay Vergara" },
                    { text: "Barangay Wack-Wack Greenhills", value: "Barangay Wack-Wack Greenhills" },
                    { text: "Barangay Plainview", value: "Barangay Plainview" },
                    { text: "Barangay San Jose", value: "Barangay San Jose" },
                    { text: "Barangay San Juan", value: "Barangay San Juan" },
                    { text: "Barangay San Antonio", value: "Barangay San Antonio" },
                    { text: "Barangay Bgy. Addition Hills", value: "Barangay Bgy. Addition Hills" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay Industrial Valley", value: "Barangay Industrial Valley" },
                    { text: "Barangay Hulo San Antonio", value: "Barangay Hulo San Antonio" }
                ]);
            }else if (City === "Manila") {
                addBarangayOptions([
                    { text: "Barangay 1", value: "Barangay 1" },
                    { text: "Barangay 2", value: "Barangay 2" },
                    { text: "Barangay 3", value: "Barangay 3" },
                    { text: "Barangay 4", value: "Barangay 4" },
                    { text: "Barangay 5", value: "Barangay 5" },
                    { text: "Barangay 6", value: "Barangay 6" },
                    { text: "Barangay 7", value: "Barangay 7" },
                    { text: "Barangay 8", value: "Barangay 8" },
                    { text: "Barangay 9", value: "Barangay 9" },
                    { text: "Barangay 10", value: "Barangay 10" },
                    { text: "Barangay 11", value: "Barangay 11" },
                    { text: "Barangay 12", value: "Barangay 12" },
                    { text: "Barangay 13", value: "Barangay 13" },
                    { text: "Barangay 14", value: "Barangay 14" },
                    { text: "Barangay 15", value: "Barangay 15" }
                ]);
            }else if (City === "Marikina") {
                addBarangayOptions([
                    { text: "Barangay Barangka", value: "Barangay Barangka" },
                    { text: "Barangay Concepcion I", value: "Barangay Concepcion I" },
                    { text: "Barangay Concepcion II", value: "Barangay Concepcion II" },
                    { text: "Barangay Industrial Valley", value: "Barangay Industrial Valley" },
                    { text: "Barangay Jesus Dela Peña", value: "Barangay Jesus Dela Peña" },
                    { text: "Barangay Karangalan", value: "Barangay Karangalan" },
                    { text: "Barangay Longos", value: "Barangay Longos" },
                    { text: "Barangay Malanday", value: "Barangay Malanday" },
                    { text: "Barangay Maliksi", value: "Barangay Maliksi" },
                    { text: "Barangay Nangka", value: "Barangay Nangka" },
                    { text: "Barangay San Juan", value: "Barangay San Juan" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay San Mateo", value: "Barangay San Mateo" },
                    { text: "Barangay Santo Niño", value: "Barangay Santo Niño" },
                    { text: "Barangay Tumana", value: "Barangay Tumana" },
                    { text: "Barangay Sto. Niño", value: "Barangay Sto. Niño" }
                ]);
            }else if (City === "Muntinlupa") {
                addBarangayOptions([
                    { text: "Barangay Alabang", value: "Barangay Alabang" },
                    { text: "Barangay Bayanan", value: "Barangay Bayanan" },
                    { text: "Barangay Buli", value: "Barangay Buli" },
                    { text: "Barangay Cupang", value: "Barangay Cupang" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay Sucat", value: "Barangay Sucat" },
                    { text: "Barangay Tunasan", value: "Barangay Tunasan" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay Alabang", value: "Barangay Alabang" }
                ]);
            }else if (City === "Taguig") {
                addBarangayOptions([
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Bambang", value: "Barangay Bambang" },
                    { text: "Barangay Central Signal", value: "Barangay Central Signal" },
                    { text: "Barangay Fort Bonifacio", value: "Barangay Fort Bonifacio" },
                    { text: "Barangay Lower Bicutan", value: "Barangay Lower Bicutan" },
                    { text: "Barangay North Signal", value: "Barangay North Signal" },
                    { text: "Barangay Palingon", value: "Barangay Palingon" },
                    { text: "Barangay Tuktukan", value: "Barangay Tuktukan" },
                    { text: "Barangay Ususan", value: "Barangay Ususan" },
                    { text: "Barangay South Signal", value: "Barangay South Signal" },
                    { text: "Barangay Pinagsama", value: "Barangay Pinagsama" },
                    { text: "Barangay Western Bicutan", value: "Barangay Western Bicutan" },
                    { text: "Barangay Taguig City", value: "Barangay Taguig City" },
                    { text: "Barangay Bay Area", value: "Barangay Bay Area" },
                    { text: "Barangay Fort Point", value: "Barangay Fort Point" },
                    { text: "Barangay Central", value: "Barangay Central" },
                    { text: "Barangay Waking Tuktukan", value: "Barangay Waking Tuktukan" },
                    { text: "Barangay Tuktukang Taguig", value: "Barangay Tuktukang Taguig" },
                    { text: "Barangay Upper Taguig", value: "Barangay Upper Taguig" },
                    { text: "Barangay Ususar", value: "Barangay Ususar" },
                    { text: "Barangay Taguig Selatan", value: "Barangay Taguig Selatan" },
                    { text: "Barangay Depok Taguig", value: "Barangay Depok Taguig" },
                    { text: "Barangay PowerPica", value: "Barangay PowerPica" },
                    { text: "Barangay Ususan", value: "Barangay Ususan" },
                    { text: "Barangay East Taguig", value: "Barangay East Taguig" }
                ]);
            }else if (City === "San Juan") {
                addBarangayOptions([
                    { text: "Barangay Addition Hills", value: "Barangay Addition Hills" },
                    { text: "Barangay Balong Bato", value: "Barangay Balong Bato" },
                    { text: "Barangay Corazon de Jesus", value: "Barangay Corazon de Jesus" },
                    { text: "Barangay Greenhills", value: "Barangay Greenhills" },
                    { text: "Barangay Little Baguio", value: "Barangay Little Baguio" },
                    { text: "Barangay Mahal na Po", value: "Barangay Mahal na Po" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Juan", value: "Barangay San Juan" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay San Felipe", value: "Barangay San Felipe" },
                    { text: "Barangay San Jose", value: "Barangay San Jose" },
                    { text: "Barangay San Juan", value: "Barangay San Juan" },
                    { text: "Barangay Santolan", value: "Barangay Santolan" },
                    { text: "Barangay San Antonio", value: "Barangay San Antonio" },
                    { text: "Barangay Salapan", value: "Barangay Salapan" },
                    { text: "Barangay Pasig", value: "Barangay Pasig" }
                ]);
            }else if (City === "Malaybalay City") {
                addBarangayOptions([
                    { text: "Barangay Bangcud", value: "Barangay Bangcud" },
                    { text: "Barangay Casisang", value: "Barangay Casisang" },
                    { text: "Barangay Cathedral", value: "Barangay Cathedral" },
                    { text: "Barangay Dalwangan", value: "Barangay Dalwangan" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Laguitas", value: "Barangay Laguitas" },
                    { text: "Barangay Manalog", value: "Barangay Manalog" },
                    { text: "Barangay Mapulo", value: "Barangay Mapulo" },
                    { text: "Barangay 1", value: "Barangay 1" },
                    { text: "Barangay 2", value: "Barangay 2" },
                    { text: "Barangay 3", value: "Barangay 3" },
                    { text: "Barangay 4", value: "Barangay 4" },
                    { text: "Barangay 5", value: "Barangay 5" },
                    { text: "Barangay 6", value: "Barangay 6" },
                    { text: "Barangay 7", value: "Barangay 7" },
                    { text: "Barangay 8", value: "Barangay 8" },
                    { text: "Barangay 9", value: "Barangay 9" },
                    { text: "Barangay 10", value: "Barangay 10" },
                    { text: "Barangay 11", value: "Barangay 11" }
                ]);
            }else if (City === "Valencia City") {
                addBarangayOptions([
                    { text: "Bagontaas", value: "Bagontaas" },
                    { text: "Batangan", value: "Batangan" },
                    { text: "Colonia", value: "Colonia" },
                    { text: "Concepcion", value: "Concepcion" },
                    { text: "Dagat-Kidavao", value: "Dagat-Kidavao" },
                    { text: "Kahaponan", value: "Kahaponan" },
                    { text: "Kinaiyahan", value: "Kinaiyahan" },
                    { text: "La Vista", value: "La Vista" },
                    { text: "Lilingayon", value: "Lilingayon" },
                    { text: "Lumbo", value: "Lumbo" },
                    { text: "Maapag", value: "Maapag" },
                    { text: "Mailag", value: "Mailag" },
                    { text: "Malayanan", value: "Malayanan" },
                    { text: "Poblacion", value: "Poblacion" },
                    { text: "San Carlos", value: "San Carlos" },
                    { text: "Sinabuagan", value: "Sinabuagan" },
                    { text: "Sugod", value: "Sugod" },
                    { text: "Tongantongan", value: "Tongantongan" },
                    { text: "Vintar", value: "Vintar" }
                ]);
            }
            else if (City === "Baungon") {
                addBarangayOptions([
                    { text: "Barangay Banlag", value: "Barangay Banlag" },
                    { text: "Barangay Batangan", value: "Barangay Batangan" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dampias", value: "Barangay Dampias" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Kalasungay", value: "Barangay Kalasungay" },
                    { text: "Barangay Kibawe", value: "Barangay Kibawe" },
                    { text: "Barangay Lanao", value: "Barangay Lanao" },
                    { text: "Barangay Mabuhay", value: "Barangay Mabuhay" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay Tampilisan", value: "Barangay Tampilisan" }
                ]);
            }else if (City === "Cabanglasan") {
                addBarangayOptions([
                    { text: "Barangay Bagontaas", value: "Barangay Bagontaas" },
                    { text: "Barangay Balitbiton", value: "Barangay Balitbiton" },
                    { text: "Barangay Bualang", value: "Barangay Bualang" },
                    { text: "Barangay Kalabugao", value: "Barangay Kalabugao" },
                    { text: "Barangay Lumbayao", value: "Barangay Lumbayao" },
                    { text: "Barangay Malinao", value: "Barangay Malinao" },
                    { text: "Barangay Mapulo", value: "Barangay Mapulo" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay Sugbongcogon", value: "Barangay Sugbongcogon" }
                ]);
            }else if (City === "Damulog") {
                addBarangayOptions([
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Buntog", value: "Barangay Buntog" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dapiwan", value: "Barangay Dapiwan" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Lagonglong", value: "Barangay Lagonglong" },
                    { text: "Barangay Linabo", value: "Barangay Linabo" },
                    { text: "Barangay Mahagsay", value: "Barangay Mahagsay" },
                    { text: "Barangay Mapulang Lupa", value: "Barangay Mapulang Lupa" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay Tangkulan", value: "Barangay Tangkulan" }
                ]);
            }else if (City === "Don Carlos") {
                addBarangayOptions([
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dologon", value: "Barangay Dologon" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Kauswagan", value: "Barangay Kauswagan" },
                    { text: "Barangay Lower", value: "Barangay Lower" },
                    { text: "Barangay Maluko", value: "Barangay Maluko" },
                    { text: "Barangay Managok", value: "Barangay Managok" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay San Jose", value: "Barangay San Jose" },
                    { text: "Barangay San Roque", value: "Barangay San Roque" },
                    { text: "Barangay San Vicente", value: "Barangay San Vicente" },
                    { text: "Barangay Silooy", value: "Barangay Silooy" },
                    { text: "Barangay Upper", value: "Barangay Upper" }
                ]);
            }else if (City === "Impasugong") {
                addBarangayOptions([
                    { text: "Barangay Aglayan", value: "Barangay Aglayan" },
                    { text: "Barangay Baño", value: "Barangay Baño" },
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Daliran", value: "Barangay Daliran" },
                    { text: "Barangay Dologon", value: "Barangay Dologon" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Kalbongan", value: "Barangay Kalbongan" },
                    { text: "Barangay Kalasungay", value: "Barangay Kalasungay" },
                    { text: "Barangay Kibangay", value: "Barangay Kibangay" },
                    { text: "Barangay La Fortuna", value: "Barangay La Fortuna" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay San Jose", value: "Barangay San Jose" },
                    { text: "Barangay Silooy", value: "Barangay Silooy" }
                ]);
            }else if (City === "Kadingilan") {
                addBarangayOptions([
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Baño", value: "Barangay Baño" },
                    { text: "Barangay Banlag", value: "Barangay Banlag" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dologon", value: "Barangay Dologon" },
                    { text: "Barangay Kalasungay", value: "Barangay Kalasungay" },
                    { text: "Barangay Kalbongan", value: "Barangay Kalbongan" },
                    { text: "Barangay Labangon", value: "Barangay Labangon" },
                    { text: "Barangay Maluko", value: "Barangay Maluko" },
                    { text: "Barangay Mapulo", value: "Barangay Mapulo" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Vicente", value: "Barangay San Vicente" }
                ]);
            }else if (City === "Libona") {
                addBarangayOptions([
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Bagumbayan Proper", value: "Barangay Bagumbayan Proper" },
                    { text: "Barangay Balite", value: "Barangay Balite" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dalwangan", value: "Barangay Dalwangan" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Kauswagan", value: "Barangay Kauswagan" },
                    { text: "Barangay Kinunang", value: "Barangay Kinunang" },
                    { text: "Barangay Kalasungay", value: "Barangay Kalasungay" },
                    { text: "Barangay Linabo", value: "Barangay Linabo" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay Tangkulan", value: "Barangay Tangkulan" },
                    { text: "Barangay Sto. Niño", value: "Barangay Sto. Niño" }
                ]);
            }else if (City === "Lugait") {
                addBarangayOptions([
                    { text: "Barangay Buntod", value: "Barangay Buntod" },
                    { text: "Barangay Cogon", value: "Barangay Cogon" },
                    { text: "Barangay Imelda", value: "Barangay Imelda" },
                    { text: "Barangay Lag-ong", value: "Barangay Lag-ong" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay San Jose", value: "Barangay San Jose" },
                    { text: "Barangay San Roque", value: "Barangay San Roque" },
                    { text: "Barangay Tablon", value: "Barangay Tablon" },
                    { text: "Barangay Tangub", value: "Barangay Tangub" }
                ]);
            }else if (City === "Malitbog") {
                addBarangayOptions([
                    { text: "Barangay Bagumbayan", value: "Barangay Bagumbayan" },
                    { text: "Barangay Balabag", value: "Barangay Balabag" },
                    { text: "Barangay Banlag", value: "Barangay Banlag" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dologon", value: "Barangay Dologon" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Kalasungay", value: "Barangay Kalasungay" },
                    { text: "Barangay Mapulo", value: "Barangay Mapulo" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" }
                ]);
            }else if (City === "Manolo Fortich") {
                addBarangayOptions([
                    { text: "Barangay Alalum", value: "Barangay Alalum" },
                    { text: "Barangay Anahaw", value: "Barangay Anahaw" },
                    { text: "Barangay Baño", value: "Barangay Baño" },
                    { text: "Barangay Barangay 1", value: "Barangay Barangay 1" },
                    { text: "Barangay Barangay 2", value: "Barangay Barangay 2" },
                    { text: "Barangay Bayugan", value: "Barangay Bayugan" },
                    { text: "Barangay Bukal", value: "Barangay Bukal" },
                    { text: "Barangay Dalirig", value: "Barangay Dalirig" },
                    { text: "Barangay Dologon", value: "Barangay Dologon" },
                    { text: "Barangay Imbayao", value: "Barangay Imbayao" },
                    { text: "Barangay Kalasungay", value: "Barangay Kalasungay" },
                    { text: "Barangay Lapasan", value: "Barangay Lapasan" },
                    { text: "Barangay Maibago", value: "Barangay Maibago" },
                    { text: "Barangay Malayan", value: "Barangay Malayan" },
                    { text: "Barangay Mapulo", value: "Barangay Mapulo" },
                    { text: "Barangay Mimbu", value: "Barangay Mimbu" },
                    { text: "Barangay Poblacion", value: "Barangay Poblacion" },
                    { text: "Barangay San Isidro", value: "Barangay San Isidro" },
                    { text: "Barangay Tagnanan", value: "Barangay Tagnanan" }
                ]);
            }else if (City === "Maramag") {
                addBarangayOptions([
                    { text: "Anahawon", value: "Anahawon" },
                    { text: "Base Camp", value: "Base Camp" },
                    { text: "Bayabason", value: "Bayabason" },
                    { text: "Camp I", value: "Camp I" },
                    { text: "Colambugan", value: "Colambugan" },
                    { text: "Dagumba-an", value: "Dagumba-an" },
                    { text: "Danggawan", value: "Danggawan" },
                    { text: "Dologon", value: "Dologon" },
                    { text: "Kisanday", value: "Kisanday" },
                    { text: "Kuya", value: "Kuya" },
                    { text: "La Roxas", value: "La Roxas" },
                    { text: "Panadtalan", value: "Panadtalan" },
                    { text: "Panalsalan", value: "Panalsalan" },
                    { text: "North Poblacion", value: "North Poblacion" },
                    { text: "South Poblacion", value: "South Poblacion" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "San Roque", value: "San Roque" },
                    { text: "Tubigon", value: "Tubigon" },
                    { text: "Bagongsilang", value: "Bagongsilang" },
                    { text: "Kiharong", value: "Kiharong" },
                    { text: "Musuan", value: "Musuan" }
                ]);
            }else if (City === "Pangantucan") {
                addBarangayOptions([
                    { text: "Adtuyon", value: "Adtuyon" },
                    { text: "Bagong Silang", value: "Bagong Silang" },
                    { text: "Bangahan", value: "Bangahan" },
                    { text: "Barandias", value: "Barandias" },
                    { text: "Kimarayag", value: "Kimarayag" },
                    { text: "Langcataon", value: "Langcataon" },
                    { text: "Lantay", value: "Lantay" },
                    { text: "Magaud", value: "Magaud" },
                    { text: "Mendis", value: "Mendis" },
                    { text: "New Eden", value: "New Eden" },
                    { text: "Pigtauranan", value: "Pigtauranan" },
                    { text: "Poblacion", value: "Poblacion" },
                    { text: "Portulin", value: "Portulin" },
                    { text: "Salucot", value: "Salucot" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "Tigua", value: "Tigua" },
                    { text: "Adtuyon", value: "Adtuyon" },
                    { text: "Bangahan", value: "Bangahan" },
                    { text: "Pigtauranan", value: "Pigtauranan" }
                ]);
            }else if (City === "Quezon") {
                addBarangayOptions([
                    { text: "Butong", value: "Butong" },
                    { text: "Cebole", value: "Cebole" },
                    { text: "Culaman", value: "Culaman" },
                    { text: "Dologon", value: "Dologon" },
                    { text: "Kiokong", value: "Kiokong" },
                    { text: "Kulaman", value: "Kulaman" },
                    { text: "Lumintao", value: "Lumintao" },
                    { text: "Manuto", value: "Manuto" },
                    { text: "Mibantang", value: "Mibantang" },
                    { text: "Mibuganon", value: "Mibuganon" },
                    { text: "Pinilayan", value: "Pinilayan" },
                    { text: "Poblacion", value: "Poblacion" },
                    { text: "San Jose", value: "San Jose" },
                    { text: "Santa Felomina", value: "Santa Felomina" },
                    { text: "Sinuda", value: "Sinuda" }
                ]);
            }else if (City === "Sumilao") {
                addBarangayOptions([
                    { text: "Casisang", value: "Casisang" },
                    { text: "Curnao", value: "Curnao" },
                    { text: "Dulag", value: "Dulag" },
                    { text: "Kisolon", value: "Kisolon" },
                    { text: "Kulasi", value: "Kulasi" },
                    { text: "Licoan", value: "Licoan" },
                    { text: "Ocasion", value: "Ocasion" },
                    { text: "Poblacion", value: "Poblacion" },
                    { text: "San Roque", value: "San Roque" },
                    { text: "Vista Villa", value: "Vista Villa" }
                ]);
            }else if (City === "Talakag") {
                addBarangayOptions([
                    { text: "Bagong Silang", value: "Bagong Silang" },
                    { text: "Binasan", value: "Binasan" },
                    { text: "Cagawasan", value: "Cagawasan" },
                    { text: "Dagumbaan", value: "Dagumbaan" },
                    { text: "Dominorog", value: "Dominorog" },
                    { text: "Indulang", value: "Indulang" },
                    { text: "Kibonbon", value: "Kibonbon" },
                    { text: "Kimolong", value: "Kimolong" },
                    { text: "Lantud", value: "Lantud" },
                    { text: "La Fortuna", value: "La Fortuna" },
                    { text: "Lirongan", value: "Lirongan" },
                    { text: "Lurugan", value: "Lurugan" },
                    { text: "Miarayon", value: "Miarayon" },
                    { text: "Pagalungan", value: "Pagalungan" },
                    { text: "Panglibatuhan", value: "Panglibatuhan" },
                    { text: "Poblacion", value: "Poblacion" },
                    { text: "Salucot", value: "Salucot" },
                    { text: "San Isidro", value: "San Isidro" },
                    { text: "San Miguel", value: "San Miguel" },
                    { text: "Tagbak", value: "Tagbak" },
                    { text: "Tikalaan", value: "Tikalaan" },
                    { text: "San Rafael", value: "San Rafael" }
                ]);
            }

        });

        // Function to add options to the Barangay dropdown
        function addBarangayOptions(barangays) {
            barangays.forEach(barangays => {
                const option = document.createElement("option");
                option.value = barangays.value; // Set the option's value
                option.textContent = barangays.text; // Set the display text
                BarangayDropdown.appendChild(option); // Append the option to BarangayDropdown
            });
        }


    </script>
</body>
</html>