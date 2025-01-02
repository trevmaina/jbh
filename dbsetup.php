<?php

// 1. Database Connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Create Database (if it doesn't exist)
$sql = "CREATE DATABASE IF NOT EXISTS admissions_list_db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// 3. Select the created database
$conn->select_db("admissions_list_db"); 

// 4. Create the applications table (if it doesn't exist)
$sql = "CREATE TABLE IF NOT EXISTS applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE, 
    phone VARCHAR(20), 
    gender ENUM('Male', 'Female'),
    course ENUM('Culinary Arts', 'Food & Beverage Sales & Service Management', 
                'Housekeeping & Accommodation', 'Food & Beverage Production', 
                'Baking & Patisserie', 'Cake Decorations', 
                'Bar Operations & Mixology', 'Guest Experience', 'Events & Banquetting'),
    education ENUM('Masters', 'Degree', 'Diploma', 'Certificate', 'High School', 'Early School Leaver'),
    heardAbout ENUM('Social Media', 'Referral', 'Website'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table applications created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>