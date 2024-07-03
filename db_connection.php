<?php
$host = 'localhost';
$port = '5432';
$dbname = 'xzact_real_estate';
$user = 'xzact_user';
$password = 'temp';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
