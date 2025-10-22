<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo.png?v=<?php echo time(); ?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/books.css?v=<?php echo time(); ?>">
    <script src="<?php echo base_url(); ?>assets/javascript/hide_show_button.js?v=<?php echo time(); ?>"></script>
    <script src="https://kit.fontawesome.com/75d764fe7a.js" crossorigin="anonymous"></script>
    <title>iRead IIS | ADMIN - Update E-book</title>
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
                    <li><a href="<?php echo base_url("Auth/add_ebook");?>"><i class="fa-solid fa-plus"></i> Add E-book</a></li>
                    <li class="active"><a href="<?php echo base_url("Auth/update_ebook");?>"><i class="fa-solid fa-pen-to-square"></i> Update E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/delete_ebook");?>"><i class="fa-solid fa-trash"></i> Delete E-book</a></li>
                    <li><a href="<?php echo base_url("Auth/archive_ebook");?>"><i class="fa-solid fa-box-archive"></i> Archived E-books</a></li>
                </ul>
        </ul>
    </div>
    <div class="main">
        <div class="col-1">
            <h5>Update E-book / Digital Material</h5>
            <p>Edit e-book information and files</p>
        </div>
        <hr>
        <div class="col-2">
            <?php if($this->session->flashdata('ebook-updated')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('ebook-updated'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($results)): ?>
            <div class="ebook-grid">
                <?php foreach($results as $row): ?>
                <div class="ebook-card">
                    <div class="ebook-thumbnail">
                        <?php if($row->thumbnail && $row->thumbnail != 'default_ebook.jpg'): ?>
                            <img src="<?php echo base_url('assets/image/uploads/ebook_thumbnails/' . $row->thumbnail . '?v=' . time()); ?>" alt="<?php echo $row->title; ?>">
                        <?php else: ?>
                            <div class="default-thumbnail">
                                <i class="fa-solid fa-file-pdf"></i>
                                <span><?php echo $row->file_type; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ebook-info">
                        <h6><?php echo $row->title; ?></h6>
                        <p class="author">by <?php echo $row->author; ?></p>
                        <p class="category"><i class="fa-solid fa-tag"></i> <?php echo $row->category; ?></p>
                        <div class="ebook-meta">
                            <span><i class="fa-solid fa-book-open"></i> <?php echo $row->isbn; ?></span>
                        </div>
                        <div class="ebook-meta">
                            <span><i class="fa-solid fa-file"></i> <?php echo $row->file_type; ?></span>
                            <span><i class="fa-solid fa-hdd"></i> <?php echo $row->file_size; ?></span>
                        </div>
                        <div class="ebook-stats-small">
                            <span><i class="fa-solid fa-download"></i> <?php echo $row->downloads; ?></span>
                            <span><i class="fa-solid fa-eye"></i> <?php echo $row->views; ?></span>
                        </div>
                        <div class="ebook-actions">
                            <button class="btn-edit" onclick="openEditModal(<?php echo $row->ID; ?>, '<?php echo addslashes($row->title); ?>', '<?php echo addslashes($row->author); ?>', '<?php echo addslashes($row->isbn); ?>', '<?php echo addslashes($row->category); ?>', '<?php echo addslashes($row->description); ?>')">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
                <div class="no-ebooks">
                    <i class="fa-solid fa-folder-open"></i>
                    <h4>No e-books available</h4>
                    <p>Add e-books to get started</p>
                    <a href="<?php echo base_url('Auth/add_ebook'); ?>" class="btn-add">
                        <i class="fa-solid fa-plus"></i> Add E-book
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h3><i class="fa-solid fa-pen-to-square"></i> Edit E-book</h3>
            <form id="editForm" action="<?php echo base_url('Post/update_ebook'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit_id" name="ID">
                
                <div class="form-group">
                    <label>Title <span class="required">*</span></label>
                    <input type="text" id="edit_title" name="title" required>
                </div>

                <div class="form-group">
                    <label>Author <span class="required">*</span></label>
                    <input type="text" id="edit_author" name="author" required>
                </div>

                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" id="edit_isbn" name="isbn">
                </div>

                <div class="form-group">
                    <label>Category <span class="required">*</span></label>
                    <select id="edit_category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Business">Business</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Science">Science</option>
                        <option value="Literature">Literature</option>
                        <option value="History">History</option>
                        <option value="Arts">Arts</option>
                        <option value="Research">Research</option>
                        <option value="Reference">Reference</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea id="edit_description" name="description" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>Update E-book File (Optional)</label>
                    <input type="file" name="ebook_file" accept=".pdf,.epub,.mobi,.doc,.docx">
                    <small>Leave empty to keep current file. Max 50MB (PDF, EPUB, MOBI, DOC)</small>
                </div>

                <div class="form-group">
                    <label>Update Thumbnail (Optional)</label>
                    <input type="file" name="thumbnail" accept="image/jpeg,image/jpg,image/png">
                    <small>Leave empty to keep current thumbnail</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-save"></i> Save Changes
                    </button>
                    <button type="button" class="btn-cancel" onclick="closeEditModal()">
                        <i class="fa-solid fa-times"></i> Cancel
                    </button>
                </div>
            </form>
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
        .ebook-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .ebook-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .ebook-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .ebook-thumbnail {
            height: 200px;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .ebook-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .default-thumbnail {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #2237a2;
        }
        .default-thumbnail i {
            font-size: 60px;
            margin-bottom: 10px;
        }
        .ebook-info {
            padding: 15px;
        }
        .ebook-info h6 {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            min-height: 40px;
        }
        .author {
            font-size: 13px;
            color: #666;
            margin-bottom: 10px;
        }
        .category {
            font-size: 12px;
            color: #2237a2;
            margin-bottom: 10px;
        }
        .ebook-meta {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }
        .ebook-stats-small {
            display: flex;
            gap: 15px;
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
        }
        .ebook-actions {
            margin-top: 15px;
        }
        .btn-edit {
            width: 100%;
            padding: 10px;
            background-color: #2237a2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-edit:hover {
            background-color: #1a2c7f;
        }
        .no-ebooks {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
        }
        .no-ebooks i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .no-ebooks h4 {
            color: #333;
            margin-bottom: 10px;
        }
        .no-ebooks p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn-add {
            display: inline-block;
            background-color: #2237a2;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-add:hover {
            background-color: #1a2c7f;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 3% auto;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.3);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #000;
        }
        .modal-content h3 {
            margin-top: 0;
            color: #2237a2;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-group small {
            color: #666;
            font-size: 12px;
        }
        .required {
            color: red;
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }
        .btn-save,
        .btn-cancel {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-save {
            background-color: #28a745;
            color: white;
        }
        .btn-save:hover {
            background-color: #218838;
        }
        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
        .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>

    <script>
        function openEditModal(id, title, author, isbn, category, description) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_title').value = title;
            document.getElementById('edit_author').value = author;
            document.getElementById('edit_isbn').value = isbn;
            document.getElementById('edit_category').value = category;
            document.getElementById('edit_description').value = description;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById('editModal');
            if (event.target == modal) {
                closeEditModal();
            }
        }
    </script>
</body>
</html>
