<?php
session_start();
include "Conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['id'] = $user['ID'];
        $_SESSION['nome'] = $user['Usuario'];
        echo json_encode(["status" => "ok"]);
    } else {
        echo json_encode(["error" => "Senha inválida"]);
    }
} else {
    echo json_encode(["error" => "Usuário não encontrado"]);
}

?>
