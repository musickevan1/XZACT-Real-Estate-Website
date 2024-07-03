<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
    exit;
}

require '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = '../assets/images/' . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $result = pg_query_params($conn, 'INSERT INTO property_listings (title, description, price, image) VALUES ($1, $2, $3, $4)', array($title, $description, $price, $image));

        if ($result) {
            header('Location: admin_panel.php');
            exit;
        } else {
            $error = 'Error adding listing';
        }
    } else {
        $error = 'Error uploading image';
    }
}
?>
