<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "crud_example");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Hapus data user berdasarkan ID
    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");

    // Tutup koneksi dan redirect ke halaman utama
    mysqli_close($conn);
    header("Location: index.php");
}
?>
