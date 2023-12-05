<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CRUD Example</title>
</head>
<body>
    <div class="container">
        <h2>User List</h2>
        <a href="add.php" class="btn">Add User</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
                // Koneksi ke database
                $conn = mysqli_connect("localhost", "root", "", "crud_example");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Ambil data dari database
                $result = mysqli_query($conn, "SELECT * FROM users");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td>";
                    echo "</tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
            ?>
        </table>
    </div>
</body>
</html>
