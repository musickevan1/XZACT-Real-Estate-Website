<?php
require '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $question = $_POST['question'];

    $result = pg_query_params($conn, 'INSERT INTO form_submissions (name, email, message, type) VALUES ($1, $2, $3, $4)', array($name, $email, $question, 'question'));

    if ($result) {
        mail('admin@example.com', 'New Question Form Submission', "Name: $name\nEmail: $email\nQuestion: $question");
        header('Location: ../thank_you.php');
        exit;
    } else {
        $error = 'Error submitting form';
    }
}
?>
