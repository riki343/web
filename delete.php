<?php

$servername = "localhost";
$username = "root";
$password = "123456";

$conn = new mysqli($servername, $username, $password, 'web');
if ($conn->connect_errno) {
    echo '<h1>Помилка підключення до MySQL</h1>';
}

mysqli_query($conn, sprintf('DELETE FROM posts WHERE id = %d', $_GET['id']));

$conn->close();

header("Location: /list.php");