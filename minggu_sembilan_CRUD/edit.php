<?php
// Include database connection file
include_once("config.php");
 
// Check if form is submitted for update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $publisher = $_POST['publisher'];
    $count = $_POST['count'];
 
    // Ambil gambar lama dari input hidden
    $old_picture = $_POST['old_picture'];
 
    // Periksa apakah pengguna mengunggah gambar baru
    if ($_FILES['picture']['name']) {
        $picture = $_FILES['picture']['name'];
        $target_dir = "picture/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);

        // Hapus gambar lama jika ada
        if (file_exists($target_dir . $old_picture)) {
            unlink($target_dir . $old_picture);
        }

        // Pindahkan gambar baru ke folder
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $picture = $old_picture;
    }
 
    // Update data ke database
    $result = mysqli_query($mysqli, "UPDATE library SET picture='$picture', name='$name', category='$category', publisher='$publisher', count='$count' WHERE id=$id");
 
    // Redirect ke homepage setelah update
    header("Location: index.php");
}
 
// Ambil data berdasarkan ID
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM library WHERE id=$id");
 
while ($user_data = mysqli_fetch_array($result)) {
    $picture = $user_data['picture'];
    $name = $user_data['name'];
    $category = $user_data['category'];
    $publisher = $user_data['publisher'];
    $count = $user_data['count'];
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Library Management</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="h3 mb-4">Edit Book</h1>

        <form name="update_user" method="post" action="edit.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="old_picture" value="<?php echo $picture; ?>">

            <div class="mb-3">
                <label for="currentPicture" class="form-label">Current Picture</label><br>
                <img src="picture/<?php echo $picture; ?>" class="img-thumbnail" width="150">
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Change Picture</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>" required>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $publisher; ?>" required>
            </div>

            <div class="mb-3">
                <label for="count" class="form-label">Count</label>
                <input type="number" class="form-control" id="count" name="count" value="<?php echo $count; ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update Book</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>