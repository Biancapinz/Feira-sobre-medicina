<?php
include_once './includes/conexao.php';

if (isset($_POST['cadastrar'])) {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Exemplo de inserção (ajuste para o nome da sua tabela e campos)
    $sql = "INSERT INTO usuarios (Usuario, Email, senha) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $usuario, $email, $senha);

    if (mysqli_stmt_execute($stmt)) {
        $msg = "Cadastro realizado com sucesso!";
    } else {
        $msg = "Erro ao cadastrar. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Acessibilidade Hospitalar</title>
  <link rel="stylesheet" href="seu-estilo.css">
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background-color: #f5f5f5; }
    .container { max-width: 400px; margin: 40px auto; padding: 30px; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
    h2 { text-align: center; color: #093b77; }
    label { font-weight: bold; }
    input { width: 100%; padding: 10px; margin: 8px 0 16px 0; border: 1px solid #ccc; border-radius: 4px; }
    button { width: 100%; background-color: #007BFF; color: white; border: none; padding: 12px; border-radius: 4px; font-size: 16px; cursor: pointer; }
    button:hover { background-color: #093b77; }
    .msg { text-align: center; color: #007BFF; margin-bottom: 15px; }
    .login-link { text-align: center; margin-top: 15px; }
    .login-link a { color: #093b77; text-decoration: none; }
    .login-link a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <main class="container">
    <h2>Cadastro</h2>
    <?php if (isset($msg)) echo "<div class='msg'>$msg</div>"; ?>
    <form method="post">
      <label for="usuario">Nome de Usuário:</label>
      <input type="text" id="usuario" name="usuario" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>

      <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <div class="login-link">
      Já tem conta? <a href="login.php">Faça login</a>
    </div>
  </main>
</body>
</html>