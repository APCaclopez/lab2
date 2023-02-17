<?php
$servername = "192.168.150.213";
$username = "webprogss211";
$password = "fancyR!ce36";
$dbname = "webprogss211";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$table = "CREATE TABLE IF NOT EXISTS aclopez_myguests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50),
website VARCHAR(150),
comment TEXT,
gender VARCHAR(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table = "INSERT INTO aclopez_myguests (name, email, website, comment, gender)
VALUES ('$name', '$email', '$website', '$comment', '$gender')";

if ($conn->query($table) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $table . "<br>" . $conn->error;
}

$conn->close();