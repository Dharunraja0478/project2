<?php
$servername = "localhost:3307"; // Use the correct server name and port
$username = "your_username";
$email = "your_email";
$password = "your_password";
$database = "signup"; // Use the correct database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the 'signup' table
$sql_create_table = "CREATE TABLE IF NOT EXISTS signup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'signup' created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Function to sanitize input data
function sanitize_input($data) {
    // Implement any necessary sanitization logic
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and store form data
    $username = sanitize_input($_POST["username"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);

    // SQL query to insert data into the 'signup' table
    $sql_insert_data = "INSERT INTO signup (username, email,password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql_insert_data) === TRUE) {
        echo '<script>window.location.href="prehome.html";
        alert("Sigup successfully");

        </script>';
    } else {
        echo "Error: " . $sql_insert_data . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

