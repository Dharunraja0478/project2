<?php
$servername = "localhost:3307"; // Use the correct server name and port
$username = "your_username";
$password = "your_password";
$database = "signup"; // Use the correct database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST["username"];
    $entered_password = $_POST["password"];

    $sql = "SELECT * FROM signup WHERE username='$entered_username' AND password='$entered_password' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<script>window.location.href="index.html";
        alert("login successfully");

        </script>';
        

        // Redirect or perform additional actions after successful login
    } else {
      echo '<script>window.location.href="index.html";
      alert("Invalid Username or Password");

      </script>';
    }
}

$conn->close();

