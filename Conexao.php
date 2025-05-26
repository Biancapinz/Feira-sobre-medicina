<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "Medicina";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conectado com sucesso ao banco de dados! 🥳";
}
?>
