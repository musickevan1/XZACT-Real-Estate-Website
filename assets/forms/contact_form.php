<?php
require '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $result = pg_query_params($conn, 'INSERT INTO form_submissions (name, email, message, type) VALUES ($1, $2, $3, $4)', array($name, $email, $message, 'contact'));

    if ($result) {
        mail('admin@example.com', 'New Contact Form Submission', "Name: $name\nEmail: $email\nMessage: $message");
        header('Location: ../thank_you.php');
        exit;
    } else {
        $error = 'Error submitting form';
    }
}
?>
