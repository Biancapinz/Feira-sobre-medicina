<?php
$atualizador = date('YmdHis').rand(0,99999999999999);
$arquivoCSS = $pagina.".css?t=".$atualizador;
$templateCSS = "template.css?t=".$atualizador;
$arquivoJS = "script.js?t=".$atualizador;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessibilidade</title>
    <link rel="sho$arquivoCSSrtcut icon" href="img/worldmap-sphere-png.webp" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/<?php echo $templateCSS?>">
    <link rel="stylesheet" href="./assets/css/<?php echo $arquivoCSS?>">
    <script src="./assets/<?php echo $arquivoJS?>"></script>
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
  

</header>