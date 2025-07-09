<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$atualizador = date('YmdHis').rand(0,99999999999999);
$arquivoCSS = $pagina.".css?t=".$atualizador;
$templateCSS = "template.css?t=".$atualizador;
$arquivoJS = "script.js?t=".$atualizador;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessibilidade Hospitalar</title>
    <link rel="stylesheet" href="./assets/css/<?php echo $templateCSS?>">
    <link rel="stylesheet" href="./assets/css/<?php echo $arquivoCSS?>">
    <script src="./assets/<?php echo $arquivoJS?>"></script>
    <link rel="shortcut icon" href="img/worldmap-sphere-png.webp" type="image/x-icon">
</head>
<body>
<header class="navbar">
  <ul class="navbar-links">
    <li><a href="index.php">Início</a></li>
    <li><a href="./index.php#section3">Sobre</a></li>
  </ul>
  <div>
    <?php if (isset($_SESSION['id'])): ?>
      <span style="color:white;margin-right:10px;">Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></span>
      <a href="logout.php" class="button" style="background:#fff;color:#093b77;padding:8px 16px;border-radius:5px;text-decoration:none;margin-left:10px;">Sair</a>
    <?php else: ?>
      <a href="login.php" class="button" style="background:#fff;color:#093b77;padding:8px 16px;border-radius:5px;text-decoration:none;">Login</a>
    <?php endif; ?>
  </div>
</header>