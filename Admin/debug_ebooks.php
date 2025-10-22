<?php
// Debug E-books Database
// Temporary file to check database connection and data

// Load CodeIgniter
require_once(APPPATH . '../index.php');

echo "<h1>E-books Database Debug</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f4f4f4; }
    .section { background: white; padding: 20px; margin: 20px 0; border-radius: 5px; }
    .success { color: green; }
    .error { color: red; }
    pre { background: #f0f0f0; padding: 10px; border-radius: 3px; overflow-x: auto; }
</style>";

// Database configuration
$db_config = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'ustp_db'
);

// Connect to database
$conn = @new mysqli($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);

echo "<div class='section'>";
echo "<h2>1. Database Connection</h2>";
if ($conn->connect_error) {
    echo "<p class='error'>❌ Connection failed: " . $conn->connect_error . "</p>";
    exit;
} else {
    echo "<p class='success'>✅ Connected successfully to database: " . $db_config['database'] . "</p>";
}
echo "</div>";

// Check if table exists
echo "<div class='section'>";
echo "<h2>2. Check if ebooks_tbl exists</h2>";
$result = $conn->query("SHOW TABLES LIKE 'ebooks_tbl'");
if ($result->num_rows > 0) {
    echo "<p class='success'>✅ Table 'ebooks_tbl' exists</p>";
} else {
    echo "<p class='error'>❌ Table 'ebooks_tbl' does NOT exist!</p>";
    echo "<p>Run this SQL file to create the table:</p>";
    echo "<code>USTP/ustp_db/ebooks_tbl.sql</code>";
}
echo "</div>";

// Check table structure
echo "<div class='section'>";
echo "<h2>3. Table Structure</h2>";
$result = $conn->query("DESCRIBE ebooks_tbl");
if ($result) {
    echo "<table border='1' cellpadding='5' cellspacing='0' style='width:100%; border-collapse: collapse;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . ($row['Default'] ?? 'NULL') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>Could not get table structure</p>";
}
echo "</div>";

// Count total records
echo "<div class='section'>";
echo "<h2>4. Total Records</h2>";
$result = $conn->query("SELECT COUNT(*) as total FROM ebooks_tbl");
if ($result) {
    $row = $result->fetch_assoc();
    echo "<p><strong>Total e-books:</strong> " . $row['total'] . "</p>";
} else {
    echo "<p class='error'>Error counting records: " . $conn->error . "</p>";
}
echo "</div>";

// Count active records
echo "<div class='section'>";
echo "<h2>5. Active Records</h2>";
$result = $conn->query("SELECT COUNT(*) as total FROM ebooks_tbl WHERE status='active'");
if ($result) {
    $row = $result->fetch_assoc();
    echo "<p><strong>Active e-books:</strong> " . $row['total'] . "</p>";
} else {
    echo "<p class='error'>Error counting active records: " . $conn->error . "</p>";
}
echo "</div>";

// Show all records
echo "<div class='section'>";
echo "<h2>6. All E-books Data</h2>";
$result = $conn->query("SELECT * FROM ebooks_tbl ORDER BY ID DESC");
if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0' style='width:100%; border-collapse: collapse;'>";
    echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Category</th><th>File Name</th><th>Status</th><th>Downloads</th><th>Views</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['file_name'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['downloads'] . "</td>";
        echo "<td>" . $row['views'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='error'>❌ No records found in ebooks_tbl</p>";
    echo "<p><strong>Solution:</strong></p>";
    echo "<ol>";
    echo "<li>Import the SQL file: <code>USTP/ustp_db/ebooks_tbl.sql</code></li>";
    echo "<li>Or add e-books manually at: <a href='../Auth/add_ebook'>Add E-book Page</a></li>";
    echo "</ol>";
}
echo "</div>";

// Check model function
echo "<div class='section'>";
echo "<h2>7. Model Function Test</h2>";
echo "<p>Testing getEbooks() function simulation:</p>";
$result = $conn->query("SELECT * FROM ebooks_tbl WHERE status='active' ORDER BY ID DESC");
if ($result) {
    echo "<p class='success'>✅ Query executed successfully</p>";
    echo "<p>Rows returned: " . $result->num_rows . "</p>";
    if ($result->num_rows == 0) {
        echo "<p class='error'>⚠️ No active e-books found. This is why the page is empty!</p>";
    }
} else {
    echo "<p class='error'>❌ Query failed: " . $conn->error . "</p>";
}
echo "</div>";

// Solutions
echo "<div class='section'>";
echo "<h2>8. Solutions</h2>";
echo "<h3>If table doesn't exist:</h3>";
echo "<ol>";
echo "<li>Open phpMyAdmin: <a href='http://localhost/phpmyadmin' target='_blank'>http://localhost/phpmyadmin</a></li>";
echo "<li>Select database: <strong>ustp_db</strong></li>";
echo "<li>Click <strong>Import</strong></li>";
echo "<li>Choose file: <code>C:/xampp/htdocs/library_system/USTP/ustp_db/ebooks_tbl.sql</code></li>";
echo "<li>Click <strong>Go</strong></li>";
echo "</ol>";

echo "<h3>If no data exists:</h3>";
echo "<ol>";
echo "<li>Go to: <a href='../Auth/add_ebook'>Add E-book Page</a></li>";
echo "<li>Upload your first e-book</li>";
echo "<li>Refresh the Digital Library page</li>";
echo "</ol>";

echo "<h3>Quick SQL to add sample data:</h3>";
echo "<pre>";
echo "INSERT INTO ebooks_tbl (title, author, category, file_path, file_name, file_type, file_size, status) ";
echo "VALUES ('Sample E-book', 'Test Author', 'Computer Science', 'uploads/sample.pdf', 'sample.pdf', 'PDF', '1 MB', 'active');";
echo "</pre>";
echo "</div>";

$conn->close();

echo "<div class='section'>";
echo "<p><strong>After fixing, go back to:</strong> <a href='../Auth/ebooks'>Digital Library</a></p>";
echo "</div>";
?>
