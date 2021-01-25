<?php
$aut = $_COOKIE['aut']; 
if ($aut == "admin") {
  include ('acoes/header.php');
  include("conn/conexao.php");
  ?>
  <!DOCTYPE html>
  <html lang="pt-BR">
  <head>

    <link rel="stylesheet" type="text/css" href="styleal2.css">

    <title>Pagina Inicial - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}

    .input-container {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      width: 100%;
      margin-bottom: 15px;
    }

    .icon {
      padding: 10px;
      background: #4CAF50;
      color: white;
      min-width: 150px;
      text-align: center;
    }

    .input-field {
      width: 500%;
      padding: 10 px;
      outline: none;
    }

    .input-field:focus {
      border: 2px solid dodgerblue;
    }

    /* Set a style for the submit button */
    .btn {
      background-color: dodgergreen;
      color: white;
      padding: 15px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 1;
    }
    .jumbotron{
      width: 500px;
      text-align: center;
      margin-top: 20px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light navbar-inverse fixed-top" style="background-color: #4CAF50">
    <ul class="navbar-nav px-3">
      <li class="sidebar-brand">
        <a href="#menu-toggle" class="navbar-brand col-sm-3 col-md-2 mr-0" id="menu-toggle">
          <i class="fa fa-navicon" style="font-size:25px"></i>
        </a>
      </li>
    </ul class="navbar-nav px-3">
    <ul class="navbar-nav px-3">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="pag_inicio_admin.php">Administração</a>
    </ul>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="desloga.php">Sair</a>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" align="center" style="margin-top: 30px;">
      <div class="nav nav-tabs">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a href="pag_inicio_admin.php">
              Página Inicial
            </a>
          </li>
          <li>
            <a href="cadastro_aluno.php">Cadastrar Aluno</a>
          </li>
          <li>
            <a href="cadastro_professor.php">Cadastrar Professor</a>
          </li>
          <li>
            <a href="cadastro_turma.php">Cadastrar Turma</a>
          </li>
          <li>
            <a href="listar_aluno.php?page=1">Alunos</a>
          </li>
          <li>
            <a href="listar_prof.php">Professores</a>
          </li>
          <li>
            <a href="cadastro_professor_red.php">Cadastrar Prof(a) Redação</a>
          </li>
          <li>
            <a href="listar_turma.php">Turmas</a>
          </li>
          <li>
            <a href="alterar_senha_admin.php">Alterar Senha</a>
          </li>
        </ul>
      </div>

    </div>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="margin-top: 30px;">
      <div class="container-fluid">
        <h1>Tecno-Interação</h1>
        <h2>E.E.E.P. WALTER RAMOS DE ARAÚJO</h2>
        <center>
          <div class="jumbotron">
            <h2>Insira as informações a seguir:</h2>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="input-container">
                  <i class="icon">Nome:</i>
                  <input class="form-control" class="input-field" type="text" placeholder="Nome completo" name="nome_prof" required>
                </div>
                <div class="input-container">
                  <i class="icon">Matricula:</i>
                  <input class="form-control" class="input-field" type="text" placeholder="Matricula" name="matricula" required>
                </div>
                <div class="input-container">
                  <i class="icon">Senha:</i>
                  <input class="form-control" class="input-field" type="text" placeholder="Senha" name="senha" required>
                </div>
                <div class="input-container">
                  <i class="icon">Imagem:</i>
                  <input class="form-control" class="input-field" type="file" name="img" required>
                </div>
                <button type="submit" class="btn btn-success" class="form-control">Cadastrar</button>
              </div>  
            </form>
          </div>
        </center>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
<?php 
if (isset($_POST['nome_prof'])) {
    $nome_arquivo = $_FILES['img']['name'];
    $arquivo = $_FILES['img']['tmp_name'];
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    $dir = "bancodeimagens/";

    $upload = move_uploaded_file($arquivo, $dir.$nome_arquivo);
    if ($upload) {
        $nome_prof = $_POST['nome_prof'];
        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];
        $id = 4;
        $sql = "INSERT INTO usuario (nome, matricula, senha, imagem, id_tipo_fk) VALUES ('$nome_prof','$matricula','$senha','$nome_arquivo','$id')";
        if($conn->exec($sql)){
            $sql = "INSERT INTO prof_red (nome_prof, matricula_fk) VALUES ('$nome_prof','$matricula');";
            if($conn->exec($sql)){
                echo "<script type='text/javascript'>alert('Professor cadastrado com sucesso!')</script>";
            }else{
                echo "<script type='text/javascript'>alert('Erro ao cadastrar professor!')</script>";
            }
        }else{
            echo "<script type='text/javascript'>alert('Erro ao cadastrar professor!')</script>";
        }
    }
    


}
}else if($aut == "prof"){
  echo "<center>";
  echo "<h2>ACESSO NEGADO</h2>";
  echo "<a href='pag_inicial_prof.php'>Voltar</a>";
  echo "</center>";
}else if($aut == "aluno"){
  echo "<center>";
  echo "<h2>ACESSO NEGADO</h2>";
  echo "<a href='pag_inicial_aluno.php'>Voltar</a>";
  echo "</center>";
}else{
  header('location:desloga.php');
}
?>
