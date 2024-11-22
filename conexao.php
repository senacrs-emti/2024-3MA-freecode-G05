<?php
$servername = "localhost";
$database = "ratematch";
$username = "root";
$password = "";
// CONEXÃO
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}