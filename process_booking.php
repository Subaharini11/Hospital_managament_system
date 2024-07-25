<?php
// Database configuration
$servername = "localhost"; // Change if needed
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "booking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$appointment_date = $_POST['appointment_date'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO appointments (name, phone_number, email, appointment_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone_number, $email, $appointment_date);

// Execute the statement
if ($stmt->execute()) {
    echo "New appointment booked successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
