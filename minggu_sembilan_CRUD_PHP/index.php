<?php
// Include database connection file
include_once("config.php");
 
// Fetch all library data from database
$result = mysqli_query($mysqli, "SELECT * FROM library ORDER BY id DESC");
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Library Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Book List</h1>
            <button type="button" class="btn btn-primary" onclick="location.href='add.php'">Add New Book</button>
        </div>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Count</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    $no++;
 
                    // Menampilkan gambar
                    echo "<td><img src='picture/" . $user_data['picture'] . "' class='img-thumbnail' width='100'></td>";
                    echo "<td>" . $user_data['name'] . "</td>";
                    echo "<td>" . $user_data['category'] . "</td>";
                    echo "<td>" . $user_data['publisher'] . "</td>";
                    echo "<td>" . $user_data['count'] . "</td>";
                    echo "<td>
                        <a href='edit.php?id=$user_data[id]' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete.php?id=$user_data[id]' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a>
                    </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>