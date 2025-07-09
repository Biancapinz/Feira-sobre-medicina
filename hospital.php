<?php
include_once './includes/conexao.php';
$pagina = 'template';
include_once './includes/header.php';
?>
<main class="container" >
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovação e acessibilidade </title>
    <link rel="shortcut icon" href="img/worldmap-sphere-png.webp" type="image/x-icon">
    <link rel="stylesheet" href="mae-de-deus.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="img/worldmap-sphere-png.webp" type="image/x-icon">
</head>
<body>
    
  <header id="section1"> 
      
    <nav>
      <div class="logo">
          <a href="../index.html"><img src="../img/Design_sem_nome-removebg-preview.png" alt=""></a>
      </div>
    
      <div class="logotxt">
        <h1><a href="../index.html">Inovação e acessibilidade na medicina</a></h1>
      </div>

    <ul  class="navbar-links">
      <li><a href="#">Dados</a></li>
      <li><a href="#section2">Tópicos</a></li>
      <li><a href="extras/aquecimento.html">Aprender</a></li>
      <li><a href="#section3">Sobre</a></li>
    </ul>

    <div class="menu-hamb-button hide-on-desktop">
      <div class="btn-line"></div>
      <div class="btn-line"></div> 
      <div class="btn-line"></div>
    </div>

    

  </nav>

  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget({
        rootPah: '/app',
        personalization: 'https://vlibras.gov.br/config/default_logo.json',
        opacity: 0.5,
        position: 'R',
        avatar: 'random',
    });
  </script>
  

  <header>
     
    <main class="container" >
      <div class="boxmain">
      <div class="p1">
        
        <h1 id="h11">Infraestrutura e serviços</h1>  
      
</main>
<?php
include_once './includes/footer.php';
?>