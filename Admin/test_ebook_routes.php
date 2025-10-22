<!DOCTYPE html>
<html>
<head>
    <title>E-book Routes Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            color: #2237a2;
        }
        .route-list {
            list-style: none;
            padding: 0;
        }
        .route-list li {
            margin: 10px 0;
            padding: 15px;
            background: #f4f4f4;
            border-left: 4px solid #2237a2;
        }
        .route-list a {
            color: #2237a2;
            text-decoration: none;
            font-weight: bold;
            display: block;
        }
        .route-list a:hover {
            color: #1a2c7f;
        }
        .description {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        .section {
            margin: 30px 0;
        }
        .success {
            background: #d4edda;
            border-left-color: #28a745;
        }
    </style>
</head>
<body>
    <h1>🔗 E-book Management Routes Test</h1>
    <p>Click on the links below to test if all routes are working:</p>

    <div class="section">
        <h2>📚 View Routes (Auth Controller)</h2>
        <ul class="route-list">
            <li>
                <a href="<?php echo base_url('Auth/ebooks'); ?>" target="_blank">Digital Library Main Page</a>
                <div class="description">Auth/ebooks - Main e-book listing page</div>
            </li>
            <li>
                <a href="<?php echo base_url('Auth/add_ebook'); ?>" target="_blank">Add E-book</a>
                <div class="description">Auth/add_ebook - Upload new e-books</div>
            </li>
            <li>
                <a href="<?php echo base_url('Auth/update_ebook'); ?>" target="_blank">Update E-book</a>
                <div class="description">Auth/update_ebook - Edit existing e-books</div>
            </li>
            <li>
                <a href="<?php echo base_url('Auth/delete_ebook'); ?>" target="_blank">Archive E-book</a>
                <div class="description">Auth/delete_ebook - Archive e-books (soft delete)</div>
            </li>
            <li>
                <a href="<?php echo base_url('Auth/archive_ebook'); ?>" target="_blank">Archived E-books</a>
                <div class="description">Auth/archive_ebook - View and restore archived e-books</div>
            </li>
        </ul>
    </div>

    <div class="section">
        <h2>⚙️ Action Routes (Post Controller)</h2>
        <ul class="route-list success">
            <li>
                <strong>Post/add_ebook</strong>
                <div class="description">POST - Upload new e-book (form submission)</div>
            </li>
            <li>
                <strong>Post/update_ebook</strong>
                <div class="description">POST - Update e-book information (form submission)</div>
            </li>
            <li>
                <strong>Post/archive_ebook/{ID}</strong>
                <div class="description">GET - Archive an e-book by ID</div>
            </li>
            <li>
                <strong>Post/restore_ebook/{ID}</strong>
                <div class="description">GET - Restore archived e-book by ID</div>
            </li>
            <li>
                <strong>Post/permanent_delete_ebook/{ID}</strong>
                <div class="description">GET - Permanently delete e-book by ID</div>
            </li>
            <li>
                <strong>Post/delete_ebook/{ID}</strong>
                <div class="description">GET - Delete e-book (old method)</div>
            </li>
        </ul>
    </div>

    <div class="section">
        <h2>✅ Troubleshooting</h2>
        <ul>
            <li><strong>404 Error?</strong> Make sure Apache is running and the URL is correct</li>
            <li><strong>Blank Page?</strong> Check PHP error logs and enable error display</li>
            <li><strong>Login Required?</strong> Login first at the admin panel</li>
            <li><strong>Permission Denied?</strong> Check session is active</li>
        </ul>
    </div>

    <div class="section">
        <h2>📝 Expected Behavior</h2>
        <ul>
            <li>✅ All Auth routes should display pages (may require login)</li>
            <li>✅ Post routes should only work with proper form data or ID parameters</li>
            <li>✅ Archive/Restore/Delete actions redirect back with flash messages</li>
            <li>✅ All pages have navigation sidebar with links to other e-book management pages</li>
        </ul>
    </div>

    <div class="section" style="background: #fff3cd; padding: 15px; border-radius: 5px;">
        <strong>⚠️ Note:</strong> If you're not logged in to the admin panel, you'll be redirected to the login page.
        Login first at: <a href="<?php echo base_url('Welcome/index'); ?>"><?php echo base_url('Welcome/index'); ?></a>
    </div>
</body>
</html>
