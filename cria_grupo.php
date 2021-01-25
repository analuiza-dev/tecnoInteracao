<?php 
$aut = $_COOKIE['aut']; 
if ($aut == "prof") {
    include('conn/conexao.php');
    $id_prof = $_COOKIE['id'];
    $matricula = $_COOKIE['matricula'];
    $result = $conn->prepare("SELECT * FROM usuario WHERE matricula = '$matricula'");
    $result->execute();
    foreach($result as $row){
      $img = $row['imagem'];
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <link rel="icon" href="img/4.jpg">
    <link rel="stylesheet" type="text/css" href="styleal2.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Página Inicial - Professor</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
        width: 450px;
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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="pag_inicio_prof.php">Professores</a>
    </ul>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="desloga.php">Sair</a>
      </li>
  </ul>
</nav>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" align="center" style="margin-top: 55px;">
        <ul class="sidebar-nav">
            <br>
            <span class='image avatar48'><img src="bancodeimagens/<?php echo $img; ?>" alt='' width='100px' height='100px' class='rounded-circle'/></span>
            <li class="sidebar-brand">
                <a href="pag_inicio_prof.php">
                    Página Inicial
                </a>
            </li>
            <li>
                <a href="cadastra_disciplina.php">Cadastrar Disciplina</a>
            </li>
            <li>
                <a href="cadastra_assunto.php">Cadastrar Assunto</a>
            </li>
            <li>
                <a href="cadastra_questao.php">Cadastrar Questões</a>
            </li>
            <li>
                <a href="banco_questoes.php">Banco de Questões</a>
            </li>
            <li>
                <a href="cria_grupo.php">Criar Grupo</a>
            </li>
            <li>
                <a href="lista_disciplina.php">Listar Disciplinas</a>
            </li>
            <li>
                <a href="lista_assunto.php">Listar Assuntos</a>
            </li>
            <li>
                <a href="lista_grupo.php">Listar Grupos</a>
            </li>
            <li>
                <a href="questoes_report.php">Questões reportadas</a>
            </li>
            <li>
                <a href="alterar_senha_prof.php">Alterar Senha</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <br>
    <br>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h1>Tecno-Interação</h1>
            <h2>Professor:
                <?php 
                $id = $_COOKIE['id'];
                $result = $conn->prepare("SELECT * FROM professor");
                $nome_aluno = "";
                $matricula = $_COOKIE['matricula'];
                $result->execute();

                for($i=0; $row = $result->fetch(); $i++){
                    if ($id == $row['id_prof']) {
                        $nome_prof = $row['nome_prof'];
                    }
                }
                echo $nome_prof;
                ?>
            </h2>

            <h2>Matricula:
                <?php 
                echo $matricula;
                ?>
            </h2>
            <center>
                <div class="jumbotron">
                    <h2>Criar Grupo</h2>
                    <br>
                    <form class="form-horizontal" method="POST" action="">
                     <div class="input-container">
                      <i class="icon">Nome do grupo:</i>
                      <input class="form-control" class="input-field" type="text" placeholder="Novo assusto" name="nome_grupo" required>
                  </div>
                  <div class="input-container">
                    <i class="icon">Assunto:</i>
                    <select class="input-field" class="form-control" name="id_assunto">
                        <option value="">Selecione....</option>
                        <?php
                        $result = $conn->prepare("SELECT * FROM assunto INNER JOIN disciplina ON assunto.id_disciplina_fk = disciplina.id_disciplina");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>

                            <option value="<?php echo $row['id_assunto'];?>">
                                <?php echo $row['nome_assunto']." - ".$row['nome_disciplina'];?>
                            </option>   

                            <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Criar Grupo</button>
                <hr>
                <a href="pag_inicio_prof.php" class="btn btn-secondary">Voltar</a>
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
if (isset($_POST['nome_grupo'])) {
    $nome_grupo = $_POST['nome_grupo'];
    $id_assunto = $_POST['id_assunto'];
    $id_prof = $_COOKIE['id'];
    if ($id_assunto == "") {
        echo "<script type='text/javascript'>alert('Escolha o assunto!')</script>";
    }
    $result = $conn->prepare("INSERT INTO grupos (nome_grupo, id_prof_fk, id_assunto_fk) VALUES('$nome_grupo','$id_prof','$id_assunto')");
    if($result->execute()){
        echo "<script type='text/javascript'>alert('Grupo criado com sucesso!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Erro ao criar grupo!')</script>";
    }
}

}else if($aut == "admin"){
    echo "<center>";
    echo "<h2>ACESSO NEGADO</h2>";
    echo "<a href='pag_inicio_admin.php'>Voltar</a>";
    echo "</center>";
}else if($aut == "aluno"){
    echo "<center>";
    echo "<h2>ACESSO NEGADO</h2>";
    echo "<a href='pag_inicio_aluno.php'>Voltar</a>";
    echo "</center>";
}
else{
    header('location:index.php');
}
?>
