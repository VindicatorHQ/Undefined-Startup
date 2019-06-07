<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "gamereview"; // database naam
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
    die("We konden geen connection ondervinden met de database, probeert u het later nogmaals of check uw internet connectie: " . $conn->connect_error);
}

?>
