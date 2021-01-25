<?php 
if (isset($_COOKIE['aut'])) {
  $aut = $_COOKIE['aut'];
  if ($aut == 'admin') {
    header('location:pag_inicio_admin.php');
  }else if ($aut == 'prof'){
    header('location:pag_inicio_prof.php');
  }else if ($aut == 'aluno') {
    header('location:pag_inicio_aluno.php');
  }
}else{   
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tecno-Interação</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Tecno-Interação</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="glyphicon glyphicon-menu-hamburger"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#sobre">Conheça o Projeto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Tecno Interação</h1>
              <p class="intro-text">Compartilhando conhecimento.</p>
              <a href="#login" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Login Section -->
    <section id="login" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <form method="post" action="aut.php">
                <div class="form-group">
                  <font color = "white"> <label for="matricula">Matricula:</label></font>
                  <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Insira a Matricula">
                  <br>
                   <font color = "white">  <label for="senha_usuario">Senha:</label></font>
                  <input type="password" name="senha_usuario" class="form-control" id="senha_usuario" placeholder="Insira a Senha">
                  <br>
                </div>
              <button type="submit" class="btn btn-success">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="sobre" class="about-section content-section text-center">
      <div class="container-fluid">
        <div class="col-lg-8 mx-auto">
          <h1>Tecno-Interação:<br><small>Um auxílio para alunos e professores</small></h1>
            <h2>INTRODUÇÃO</h2>
              <p>  Ao pensar nas dificuldades encontradas pela maioria dos alunos em determinadas matérias, geralmente na área de ciências exatas.<br> 
                Fora refletido numa aplicação que reforçasse a pratica e o entendimento do conteúdo, a ideia do projeto se desenvolveu a partir da <br>
                análise de que como solução uma plataforma em rede bem aplicada serviria como porta de treinamento e auxilio de forma inteirada <br>
                entre o estudante, o professor e o programa.</p>
            <h2>RELEVÂNCIA</h2>
              <p>   O processo de idealização e formação da aplicação está altamente ligado a atualidade e as novas tecnologias, se tornando bastante<br>
               relevante pela viabilidade do acesso, principalmente pelo objetivo maior, facilitar a concepção de grupos de alunos em matérias com <br>
                maior grau de dificuldade.</p>
            <h2>METODOLOGIA</h2>
              <p>   A Metodologia do projeto se dá por meio de grupos de estudo, o programa rodará em torno de contas de professores e alunos, onde os <br>
                professores lançam um grupo de estudo, e o mesmo aparece numa página na conta do aluno e caso o aluno esteja interessado, ele poderá <br>
                se inscrever no projeto e assim fazê-lo no dia solicitado, o resultado será mostrado para ambos.</p>
            <h2>IMPACTO DO PROJETO</h2>
              <p>Nosso projeto está focado no auxilio ao aluno que necessita de reforço, se bem sucedido poderá tornar-se até mesmo um critério de avaliação<br>
               aos recuperando, pois além de um fácil acesso as atividades cada integrante do grupo terá sua pontuação armazenada. </p>
            <h2>CONSIDERAÇÕES FINAIS</h2>
              <p>A equipe tomou conhecimento de uma nova linguagem de programação. Com a idealização de um programa de auxílio, a equipe trabalhou em conjunto<br>
               para montar o software, o que ampliou a socialização entre os integrantes. E, acima de tudo, a equipe em diversos momentos tentou se colocar no <br>
             lugar dos alunos com dificuldade, afim de obter ideias para melhorar a execução do aplicativo, quando for realmente colocada em pratica com os mesmos.</p>
            <h2>PALAVRAS CHAVES</h2>
             <p> •  Interação<br>
                • Educação<br>
                • Tecnologia<br>
                • Compartilhar
            </p>
            <h2>REFERÊNCIAS BIBLIOGRÁFICAS</h2>
            <p>•  http://porvir.org/desafio-de-aprendizagem-criativa-anuncia-selecao-de-8-projetos-brasileiros/</p>
        </div>
      </div>
    </section>

    
    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <font color = "white"> <p>São Gonçalo do Amarante-CE</p>
        <p> 2017</p></font>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>
  </body>
</html>
<?php  
}
?>