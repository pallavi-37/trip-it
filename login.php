<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "Pallavi37!";
$database = "tripit";


// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form, and use mysqli_real_escape_string for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['password']);

// Hash the password using password_hash
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

// SQL query to insert data into the table
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPwd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
