<?php
// Include database connection file
include_once("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $count = $_POST['count'];

    // Upload gambar
    $target_dir = "picture/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);

    // Validasi upload gambar
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Buat folder jika belum ada
    }

    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $picture = basename($_FILES['picture']['name']); // Pastikan hanya nama file yang disimpan

        // Insert data ke database
        $result = mysqli_query($mysqli, "INSERT INTO library(picture, name, category, publisher, count) VALUES('$picture', '$name', '$category', '$publisher', '$count')");

        // Redirect ke index.php setelah berhasil tambah data
        header("Location: index.php");
    } else {
        echo "Error uploading the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Library Management</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="h3 mb-4">Add New Book</h1>

        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" class="form-control" id="picture" name="picture" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" required>
            </div>
            <div class="mb-3">
                <label for="count" class="form-label">Count</label>
                <input type="number" class="form-control" id="count" name="count" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add Book</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>