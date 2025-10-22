<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png?v=<?php echo time(); ?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/add_book.css?v=<?php echo time(); ?>">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js?v=<?php echo time(); ?>"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS | ADMIN - Add E-book</title>
</head>
<body>
    <div class="side">
        <div class="back">
            <li><a href="<?php echo base_url("Auth/ebooks");?>"><i class="fa-solid fa-arrow-left"></i> Digital Library</a></li>
        </div>
        <hr>
        <ul class="nav">
            <li><a onclick="hide_show_sub_nav_book()" href="#"><i class="fa-solid fa-book"></i> Manage E-books</a></li>
                <ul id="sub-dropdown" class="sub-dropdown">
                    <li class="active"><a href="<?php echo base_url("Auth/add_ebook");?>"><i class="fa-solid fa-plus"></i> Add E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/update_ebook");?>"><i class="fa-solid fa-pen-to-square"></i> Update E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/delete_ebook");?>"><i class="fa-solid fa-trash"></i> Delete E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/archive_ebook");?>"><i class="fa-solid fa-box-archive"></i> Archived E-books</a></li>
                </ul>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Add E-book / Digital Material</h5>
            <p>Upload PDF, EPUB, MOBI, or DOC files for students to access digitally</p>
        </div>
        <hr>
        <div class="col-2">
            <?php if($this->session->flashdata('ebook-saved')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('ebook-saved'); ?>
                </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('ebook-error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('ebook-error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url('Post/add_ebook'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="input-group full-width">
                        <label>Title <span class="required">*</span></label>
                        <input type="text" name="title" placeholder="Enter book title" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-group half-width">
                        <label>Author <span class="required">*</span></label>
                        <input type="text" name="author" placeholder="Enter author name" required>
                    </div>
                    <div class="input-group half-width">
                        <label>ISBN</label>
                        <input type="text" name="isbn" placeholder="ISBN number">
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-group half-width">
                        <label>Category <span class="required">*</span></label>
                        <select name="category" required>
                            <option value="">Select Category</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Science">Science</option>
                            <option value="Literature">Literature</option>
                            <option value="Business">Business</option>
                            <option value="Education">Education</option>
                            <option value="Medical">Medical</option>
                            <option value="Arts">Arts</option>
                            <option value="Social Science">Social Science</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="input-group half-width">
                        <label>Language</label>
                        <select name="language">
                            <option value="English">English</option>
                            <option value="Filipino">Filipino</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-group half-width">
                        <label>Publisher</label>
                        <input type="text" name="publisher" placeholder="Publisher name">
                    </div>
                    <div class="input-group quarter-width">
                        <label>Year</label>
                        <input type="text" name="year" placeholder="2025">
                    </div>
                    <div class="input-group quarter-width">
                        <label>Pages</label>
                        <input type="text" name="pages" placeholder="Number of pages">
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-group full-width">
                        <label>Description</label>
                        <textarea name="description" rows="4" placeholder="Brief description of the e-book"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-group half-width">
                        <label>E-book File <span class="required">*</span> (PDF, EPUB, MOBI, DOC - Max 50MB)</label>
                        <input type="file" name="ebook-file" accept=".pdf,.epub,.mobi,.doc,.docx" required>
                    </div>
                    <div class="input-group half-width">
                        <label>Cover Image (Optional)</label>
                        <input type="file" name="thumbnail" accept="image/png, image/jpeg">
                    </div>
                </div>

                <div class="form-row">
                    <button type="submit" name="submit" class="btn-submit">
                        <i class="fa-solid fa-upload"></i> Upload E-book
                    </button>
                </div>
            </form>
        </div>

        <div class="col-3">
            <h6>Recently Added E-books</h6>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>File Type</th>
                    <th>Size</th>
                    <th>Date</th>
                </tr>
                <?php if (!empty($results)): ?>
                    <?php foreach($results as $row): ?>
                    <tr>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->author; ?></td>
                        <td><?php echo $row->category; ?></td>
                        <td><?php echo $row->file_type; ?></td>
                        <td><?php echo $row->file_size; ?></td>
                        <td><?php echo date('M d, Y', strtotime($row->upload_date)); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">No e-books uploaded yet</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .required {
            color: red;
        }
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
        }
        .full-width {
            width: 100%;
        }
        .half-width {
            width: 48%;
        }
        .quarter-width {
            width: 23%;
        }
        .input-group label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .input-group input,
        .input-group select,
        .input-group textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-submit {
            background-color: #2237a2;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #1a2c7f;
        }
        .col-3 {
            margin-top: 30px;
        }
        .col-3 h6 {
            margin-bottom: 15px;
            color: #2237a2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
    </style>
</body>
</html>
