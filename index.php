<?php
session_start();

// === CONEXÃO COM O BANCO ===
$conn = new mysqli('localhost', 'root', 'sua_senha', 'acessibilidadenamed'); // substitua sua_senha pela sua real
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// === LOGIN COM SENHA CRIPTOGRAFADA ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($user = $resultado->fetch_assoc()) {
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['id'] = $user['ID'];
            $_SESSION['nome'] = $user['Usuario'];
        } else {
            echo "<p style='color:red'>❌ Senha incorreta.</p>";
        }
    } else {
        echo "<p style='color:red'>❌ Usuário não encontrado.</p>";
    }
}

// === INSERIR COMENTÁRIO ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['comentar'])) {
    if (isset($_SESSION['id'])) {
        $comentario = $_POST['comentario'];
        $idhospital = $_POST['idhospital'];

        $sql = "INSERT INTO comentarios (IDUsuario, IDHospital, Texto) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $_SESSION['id'], $idhospital, $comentario);
        $stmt->execute();

        echo "<p style='color:green'>✅ Comentário enviado com sucesso!</p>";
    } else {
        echo "<p style='color:red'>⚠️ Você precisa estar logado para comentar.</p>";
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

  <!-- CARDS DE HOSPITAIS -->
  <div class="l-cards">
    <article class="c-card">
      <div class="c-card__image">
        <img src="Back/img/PHOTO-2023-07-21-13-43-46 (1).jpg.webp" alt="Imagem Hospital 1">
      </div>
      <div class="c-card__content">
        <h5>Hospital de Clínicas</h5>
        <p>Centro de ensino e simulação com ambiente tecnológico e inovador.</p>
        <a href="Extras 2/especiesnovo 1.html" class="button">Para mais informações</a>
      </div>
    </article>

    <article class="c-card">
      <div class="c-card__image">
        <img src="Back/img/images.jpg" alt="Imagem Hospital 2">
      </div>
      <div class="c-card__content">
        <h5>Hospital Moinhos de Vento</h5>
        <p>Infraestrutura de excelência, terapia intensiva e cirurgia robótica.</p>
        <a href="Extras 2/aguanovo 1.html" class="button">Para mais informações</a>
      </div>
    </article>

    <article class="c-card">
      <div class="c-card__image">
        <img src="Back/img/Hospital-Mãe-de-Deus-aprimora-fluxo-de-atendimento-e-reduz-espera-na-Emergência.jpg" alt="Imagem Hospital 3">
      </div>
      <div class="c-card__content">
        <h5>Hospital Mãe de Deus</h5>
        <p>Sala conceito para ortopedia com tecnologia de ponta e acesso biométrico.</p>
        <a href="Extras 2/queimadanovo 1.html" class="button">Para mais informações</a>
      </div>
    </article>
  </div>

  <!-- LOGIN OU COMENTÁRIO -->
  <?php if (!isset($_SESSION['id'])): ?>
    <h2>Login</h2>
    <form method="post">
      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Senha:</label>
      <input type="password" name="senha" required>

      <button type="submit" name="login">Entrar</button>
    </form>
  <?php else: ?>
    <h2>Olá, <?php echo $_SESSION['nome']; ?>!</h2>
    <form method="post">
      <label>Selecione o hospital:</label>
      <select name="idhospital" required>
        <?php
        $hospitais = $conn->query("SELECT HospitalID, Nome FROM hospitais");
        while ($h = $hospitais->fetch_assoc()) {
          echo "<option value='{$h['HospitalID']}'>{$h['Nome']}</option>";
        }
        ?>
      </select>

      <label>Comentário:</label>
      <textarea name="comentario" rows="4" required></textarea>

      <button type="submit" name="comentar">Enviar Comentário</button>
    </form>
  <?php endif; ?>

</main>

<!-- RODAPÉ -->
<footer style="text-align: center; padding: 20px; background: #093b77; color: white;">
  <p>&copy; <?php echo date("Y"); ?> Acessibilidade Hospitalar</p>
</footer>
</body>
</html>
