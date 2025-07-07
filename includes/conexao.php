<?php
// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "hospitais_banco"; // ⬅️ Altere aqui para o nome do seu banco no phpMyAdmin

// Criando conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verificando conexão
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Opcional: definir charset
mysqli_set_charset($conexao, "utf8");
?>
