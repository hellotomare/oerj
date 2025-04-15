<?php
$host = 'localhost';
$db = 'wdpa';
$user = 'root';
$pass = ''; // modifica se necessario

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>