<?php
$servername="localhost:3307";
$username="root";
$password="root";
$dbname ="new";
// creating connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
mysqli_query($conn);