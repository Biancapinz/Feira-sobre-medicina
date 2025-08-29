<?php

session_start();

include_once '../includes/conexao.php';

if (!isset($_SESSION['id'])) {

    header("Location: ../login.php?erro=naologado");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idUsuario = $_SESSION['id'];
    $idHospital = $_POST['id_hospital'];
    $comentarioTexto = $_POST['comment'];
    
    $sql = "INSERT INTO comentarios (IDusuario,IDhospital, Texto) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($stmt, "iis", $idUsuario, $idHospital, $comentarioTexto);

    mysqli_stmt_execute($stmt);
    header("Location: ../hospital.php?id=" . $idHospital . "&sucesso=comentarioenviado");
}
else {
    echo "Acesso inválido.";
    exit();
}
?>