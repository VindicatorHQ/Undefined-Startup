<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gamereview"; // database naam
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
    die("De database connectie is te komen vervallen of de internet connectie is gefaald: " . $conn->connect_error);
}

?>
