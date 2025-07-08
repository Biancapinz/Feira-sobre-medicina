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
        $msg = "Login realizado com sucesso!";
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

    .l-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .c-card {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      width: 300px;
      height: 420px;
      border: 1px solid #ccc;
      border-radius: 5px;
      overflow: hidden;
      background: #fff;
    }

    .c-card__image img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .c-card__content {
      display: flex;
      flex-direction: column;
      flex: 1;
      padding: 15px;
    }

    .c-card__content p {
      flex-grow: 1;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .c-card__content a.button {
      margin-top: auto;
      display: inline-block;
      background-color: #007BFF;
      color: white;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
    }
  </style>
</head>
<body>

<header class="navbar">
  <ul class="navbar-links">
    <li><a href="#">Dados</a></li>
    <li><a href="#section2">Tópicos</a></li>
    <li><a href="extras/aquecimento.html">Aprender</a></li>
    <li><a href="#section3">Sobre</a></li>
  </ul>
  <div class="search-box">
    <input class="search-txt" type="text" id="pesquisa" placeholder="Faça sua pesquisa">
    <a class="search-btn" href="#"><i class="fas fa-search"></i></a>
  </div>
</header>

<main class="container">

  <?php if (isset($msg)) echo "<p style='color:blue;'>$msg</p>"; ?>

  <?php if (!isset($_SESSION['id'])): ?>
    <h2>Login</h2>
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

    <!-- CARROSSEL -->
    <div class="carrossel">
      <input type="radio" name="slide" id="slide1" checked>
      <input type="radio" name="slide" id="slide2">
      <input type="radio" name="slide" id="slide3">

      <div class="slides">
        <div class="slide s1">
          <img src="Back/img/PHOTO-2023-07-21-13-43-46 (1).jpg.webp" alt="Imagem 1">
        </div>
        <div class="slide s2">
          <img src="Back/img/Hospital-Mae-de-Deus-1-850x560.jpg" alt="Imagem 2">
        </div>
        <div class="slide s3">
          <img src="Back/img/images.jpg" alt="Imagem 3">
        </div>
      </div>
      <div class="navigation">
        <label for="slide1"></label>
        <label for="slide2"></label>
        <label for="slide3"></label>
      </div>
    </div>

    <!-- SEUS 6 CARDS FIXOS -->
    <div class="l-cards">
      <!-- aqui vai aquele seu bloco dos 6 cards manual -->
      <!-- ... -->
    </div>

    <!-- CARDS DO BANCO -->
    <?php
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
            <h5><?php echo $hospital['Nome'];?></h5>
            <p><?php echo $hospital['ParagrafoAbertura'];?></p>
            <a href="./hospital.php?id=<?php echo $hospital['HospitalID'];?>" class="button">Para mais informações</a>
          </div>
        </article>
      <?php } ?>
    </div>
  <?php endif; ?>

</main>

<footer style="text-align: center; padding: 20px; background: #093b77; color: white;">
  <p>&copy; <?php echo date("Y"); ?> Acessibilidade Hospitalar</p>
</footer>
</body>
</html>
