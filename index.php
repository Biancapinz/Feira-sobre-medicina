<?php
include_once './includes/conexao.php';
$pagina = 'index';
include_once './includes/header.php';
?>

<!-- Barra de pesquisa fixa -->
<header>
  <div class="nav">
    <div class="search-box">
      <input class="search-txt" type="text" id="pesquisa" placeholder="Faça sua pesquisa">
      <a class="search-btn" href="#"><i class="fas fa-search"></i></a>
    </div>
  </div>
</header>

<!-- Conteúdo principal -->
<main>
  <div class="container mt-5 pt-5">
    <div class="l-cards">
      <article class="c-card">
        <div class="c-card__image">
          <img src="contents/images.jpg" width="100%" alt="image placeholder">
        </div>
        <div class="c-card__content">
          <div class="card-body">
            <h5 class="card-title">Hospital de Clinicas</h5>
            <p class="card-text">
              Além dos diferentes ambientes assistenciais onde ocorrem as atividades práticas de ensino, o hospital conta com um Centro de Ensino e Simulação, em uma nova área com 500m2, para o desenvolvimento de processos inovadores de ensino, contando com os seguintes espaços, equipamentos e mobiliários.
            </p>
            <a href="Extras 2/especiesnovo 1.html" class="button">Para mais informações</a>
          </div>
        </div>
      </article>

      <article class="c-card">
        <div class="c-card__image">
          <img src="img/images.jpg" width="100%" alt="image placeholder">
        </div>
        <div class="c-card__content">
          <div class="card-body">
            <h5 class="card-title">Hospital Moinhos de Vento</h5>
            <p class="card-text">
              A infraestrutura do Hospital Moinhos de Vento é extensa e completa, abrangendo diversos setores e especialidades, com foco em excelência médica, atendimento humanizado e tecnologia de ponta. O hospital possui muitos leitos de internação, terapia intensiva e unidades específicas como a emergência pediátrica, cirurgia robótica e unidades de internação diferenciadas.
            </p>
            <a href="Extras 2/aguanovo 1.html" class="button">Para mais informações</a>
          </div>
        </div>
      </article>

      <article class="c-card">
        <div class="c-card__image">
          <img src="inovacao/back/img/Hospital-Mae-de-Deus-1-850x560.jpg" width="100%" alt="image placeholder">
        </div>
        <div class="c-card__content">
          <div class="card-body">
            <h5 class="card-title">Hospital Mãe de Deus</h5>
            <p class="card-text">
              Uma das quatro novas salas, denominada sala conceito, foi desenvolvida com alto padrão tecnológico e acessórios cirúrgicos exclusivos para a especialidade de Traumatologia e Ortopedia, com um armário inteligente. “Os materiais para a cirurgia estarão disponíveis em um armário automatizado que os cirurgiões poderão acessar por meio de sua digital.
            </p>
            <a href="Extras 2/queimadanovo 1.html" class="button">Para mais informações</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</main>

<?php
include_once './includes/footer.php';
?>
