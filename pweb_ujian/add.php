<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "crud_example");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Ambil data dari form
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Insert data ke database
    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
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
    <title>Add User</title>
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit" class="btn">Add User</button>
        </form>
    </div>
</body>
</html>
