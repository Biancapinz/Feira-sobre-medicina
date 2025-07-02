<?php
include_once './includes/conexao.php';
$pagina = 'index';
include_once './includes/header.php';
?>
      
 <!-- Barra de pesquisa fixa -->
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

  <!-- Conteúdo principal -->
  <main>

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

    <div class="container mt-5 pt-5">
      <div class="l-cards">
        <article class="c-card">
          <div class="c-card__image">
            <img src="Back/img/PHOTO-2023-07-21-13-43-46 (1).jpg.webp" width="100%" alt="image placeholder">
          </div>
      
          <div class="c-card__content">
            <div class="card-body">
                <h5 class="card-title">Hospital de Clinicas</h5>
                <p class="card-text">Além dos diferentes ambientes assistenciais onde ocorrem as atividades práticas de ensino, o hospital conta com um Centro de Ensino e Simulação, em uma nova área com 500m2, para o desenvolvimento de processos inovadores de ensino, contando com os seguintes espaços, equipamentos e mobiliários.  </p>
                <a href="Extras 2/especiesnovo 1.html" class="button">Para mais informações</a>
              </div>
          </div>
        </article>
      
        <article class="c-card">
          <div class="c-card__image">
            <img src="Back/img/images.jpg" width="100%" alt="image placeholder">
          </div>
      
          <div class="c-card__content">
            <div class="card-body">
                <h5 class="card-title"> Hospital Moinhos de Vento</h5>
                <p class="card-text">A infraestrutura do Hospital Moinhos de Vento é extensa e completa, abrangendo diversos setores e especialidades, com foco em excelência médica, atendimento humanizado e tecnologia de ponta. O hospital possui muitos leitos de internação, terapia intensiva e unidades específicas como a emergência pediátrica, cirurgia robótica e unidades de internação diferenciadas. 

                  .</p>
                <a href="Extras 2/aguanovo 1.html" class="button">Para mais informações</a>
              </div>
          </div>
        </article>
      
        <article class="c-card">
          <div class="c-card__image">
            <img src="Back/img/Hospital-Mãe-de-Deus-aprimora-fluxo-de-atendimento-e-reduz-espera-na-Emergência.jpg" width="100%" alt="image placeholder">
          </div>
      
          <div class="c-card__content">
            <div class="card-body">
                <h5 class="card-title">Hospital Mãe de Deus</h5>
                <p class="card-text">Uma das quatro novas salas, denominada sala conceito, foi desenvolvida com alto padrão tecnológico e acessórios cirúrgicos exclusivos para a especialidade de Traumatologia e Ortopedia, com um armário inteligente. “Os materiais para a cirurgia estarão disponíveis em um armário automatizado que os cirurgiões poderão acessar por meio de sua digital.   </p>
                <a href="Extras 2/queimadanovo 1.html" class="button">Para mais informações</a>
              </div>
          </div>
        </article>
      </div>

</main>
<?php
include_once './includes/footer.php';
?>