<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "trainer";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
