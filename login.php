<?php
session_start();
include_once './includes/conexao.php';
$pagina = 'index';
include_once './includes/header.php';

// Processamento do login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE Email = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($result);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['id'] = $usuario['ID'];
        $_SESSION['nome'] = $usuario['Usuario'];
        header("Location: index.php");
        exit;
    } else {
        $msg = "Email ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Acessibilidade Hospitalar</title>
  <link rel="stylesheet" href="seu-estilo.css">
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background-color: #f5f5f5; }
    .navbar { background-color: #093b77; padding: 10px; color: white; display: flex; justify-content: space-between; align-items: center; }
    .navbar-links li { display: inline; margin: 0 10px; }
    .navbar a { color: white; text-decoration: none; font-weight: bold; }
    .container { max-width: 1000px; margin: 30px auto; padding: 20px; background: white; border-radius: 8px; }
    form { margin-top: 30px; }
    input, textarea, select, button { width: 100%; padding: 10px; margin: 8px 0; }
    button { background-color: #007BFF; color: white; border: none; cursor: pointer; }
    .carrossel, .l-cards { margin-bottom: 40px; }
    .c-card { border: 1px solid #ccc; border-radius: 5px; overflow: hidden; margin-bottom: 20px; }
    .c-card__image img { width: 100%; }
    .c-card__content { padding: 15px; }
    
  </style>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
  <ul class="navbar-links">
    <li><a href="#">Dados</a></li>
  </ul>
  <div class="search-box">
    <input class="search-txt" type="text" id="pesquisa" placeholder="Faça sua pesquisa">
    <a class="search-btn" href="#"><i class="fas fa-search"></i></a>
  </div>
</header> 

<main class="container">
  <?php if (!isset($_SESSION['id'])): ?>
    <h2>Login</h2>
    <?php if (isset($msg)) echo "<p style='color:blue;'>$msg</p>"; ?>
    <form method="post">
      <label>Email:</label>
      <input type="email" name="email" required>
      <label>Senha:</label>
      <input type="password" name="senha" required>
      <button type="submit" name="login">Entrar</button>
    </form>
    <p>Não tem cadastro? <a href="cadastro.php">Cadastre-se aqui</a></p>

  <?php else: ?>
    <h2>Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
    <a href="logout.php">Sair</a>

    <?php
    // consulta aos hospitais só quando estiver logado
    $sql = "SELECT * FROM hospitais";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    ?>

    <div class="l-cards">
      <?php while ($hospital = mysqli_fetch_assoc($result)) { ?>
        <article class="c-card">
          <div class="c-card__image">
            <img src="<?php echo $hospital['Foto']; ?>" alt="Foto do hospital">
          </div>
          <div class="c-card__content">
            <h5><?php echo $hospital['Nome']; ?></h5>
            <p><?php echo $hospital['ParagrafoAbertura']; ?></p>
            <a href="hospital.php?id=<?php echo $hospital['HospitalID']; ?>">Para mais informações</a>
          </div>
        </article>
      <?php } ?>
    </div>
  <?php endif; ?>
</main>

<?php
include_once './includes/footer.php';
?>
<footer style="text-align: center; padding: 20px; background: #093b77; color: white;">
  <p>&copy; <?php echo date("Y"); ?> Acessibilidade Hospitalar</p>
</footer>
</body>
</html>
