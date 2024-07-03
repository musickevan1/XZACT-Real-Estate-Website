<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: admin_login.php');
    exit;
}

require '../db_connection.php';

$form_submissions_result = pg_query($conn, "SELECT * FROM form_submissions ORDER BY created_at DESC");
$property_listings_result = pg_query($conn, "SELECT * FROM property_listings ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Form Submissions</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Type</th>
            <th>Date</th>
        </tr>
        <?php while ($submission = pg_fetch_assoc($form_submissions_result)): ?>
        <tr>
            <td><?php echo $submission['id']; ?></td>
            <td><?php echo $submission['name']; ?></td>
            <td><?php echo $submission['email']; ?></td>
            <td><?php echo $submission['message']; ?></td>
            <td><?php echo $submission['type']; ?></td>
            <td><?php echo $submission['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Property Listings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php while ($listing = pg_fetch_assoc($property_listings_result)): ?>
        <tr>
            <td><?php echo $listing['id']; ?></td>
            <td><?php echo $listing['title']; ?></td>
            <td><?php echo $listing['description']; ?></td>
            <td><?php echo $listing['price']; ?></td>
            <td><img src="../assets/images/<?php echo $listing['image']; ?>" alt="Property Image" width="100"></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Add New Listing</h2>
    <form action="add_listing.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        <br>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
        <br>
        <button type="submit">Add Listing</button>
    </form>
</body>
</html>
