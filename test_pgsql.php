<?php
$host = 'localhost';
$port = '5432';
$dbname = 'xzact_real_estate';
$user = 'xzact_user';
$password = 'yourpassword';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "An error occurred.\n";
    echo pg_last_error();
    exit;
}

echo "Connection to database successful!";
?>
