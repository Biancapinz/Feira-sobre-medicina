<?php
$servername = "localhost";
$username = "root";
$password = ""; // se tiver senha coloca aqui
$dbname = "acessibilidadenamed";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
