<?php
session_start();
include "Conexao.php";

if (!isset($_SESSION['id'])) {
    http_response_code(401);
    echo json_encode(["error" => "Precisa estar logado"]);
    exit;
}

$IDUsuario = $_SESSION['id'];
$IDComentario = $_POST['IDComentario'];

$check = $conn->prepare("SELECT * FROM likes WHERE IDUsuario=? AND IDComentario=?");
$check->bind_param("ii", $IDUsuario, $IDComentario);
$check->execute();
$res = $check->get_result();

if ($res->num_rows > 0) {
    echo json_encode(["status" => "Já curtiu"]);
} else {
    $sql = "INSERT INTO likes (IDUsuario, IDComentario) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $IDUsuario, $IDComentario);
    $stmt->execute();
    echo json_encode(["status" => "Like registrado"]);
}
?>
