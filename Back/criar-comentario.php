<?php
session_start();
include "Conexao.php";

if (!isset($_SESSION['id'])) {
    http_response_code(401);
    echo json_encode(["error" => "Precisa estar logado"]);
    exit;
}

$IDUsuario = $_SESSION['id'];
$IDHospital = $_POST['IDHospital'];
$Texto = $_POST['Texto'];

$sql = "INSERT INTO comentarios (IDUsuario, IDHospital, Texto) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $IDUsuario, $IDHospital, $Texto);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["status" => "Comentário salvo"]);
} else {
    echo json_encode(["error" => "Erro ao salvar"]);
}
?>
