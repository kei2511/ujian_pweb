<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "crud_example");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Ambil data user berdasarkan ID
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    // Tutup koneksi
    mysqli_close($conn);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "crud_example");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Ambil data dari form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Update data di database
    $query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    mysqli_query($conn, $query);

    // Tutup koneksi dan redirect ke halaman utama
    mysqli_close($conn);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</body>
</html>
