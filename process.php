<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
// 1. Get form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$education = $_POST['education'];
$heardAbout = $_POST['heardAbout'];

// 2. Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "admissions_list_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO applications (fullName, email, phone, gender, course, education, heardAbout) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $fullName, $email, $phone, $gender, $course, $education, $heardAbout);

/*if ($stmt->execute()) {
    // 4. Handle success (e.g., display a success message, send an email confirmation)
    echo "Application submitted successfully!"; 
    // You can redirect the user to a confirmation page here:
    // header("Location: success.php"); 
} else {
    // 5. Handle errors
    echo "Error: " . $stmt->error;
}*/

if ($stmt->execute()) {
    header("Location: success.html");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

$stmt->close();
$conn->close();

?>