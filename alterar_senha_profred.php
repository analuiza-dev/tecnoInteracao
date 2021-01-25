<?php 
$aut = $_COOKIE['aut']; 
if ($aut == "prof_red") {
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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="pag_inicio_profred.php">Professores</a>
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
                    <a href="pag_inicio_profred.php">
                        Página Inicial
                    </a>
                </li>
                <li>
                    <a href="cadastra_temared.php">Cadastrar Temas</a>
                </li>
                <li>
                    <a href="listar_temasred.php">Listar Temas</a>
                </li>
                <li>
                    <a href="temaconfig.php">Edita Tema</a>
                </li>
                <li>
                    <a href="alterar_senha_profred.php">Alterar Senha</a>
                </li>
                <li>
                    <a href="desloga.php">Sair</a>
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
           $result = $conn->prepare("SELECT * FROM prof_red");
           $nome_aluno = "";
           $matricula = $_COOKIE['matricula'];
           $result->execute();

           for($i=0; $row = $result->fetch(); $i++){
            if ($id == $row['id_prof_red']) {
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
            <h2>Insira as informações a seguir:</h2>
            <form class="form-horizontal" method="POST" action="">
                <div class="input-container">
                  <i class="icon">Senha atual:</i>
                  <input class="form-control" class="input-field" type="text" placeholder="Senha atual" name="senha_atual" required>
              </div>
              <div class="input-container">
                  <i class="icon">Nova senha:</i>
                  <input class="form-control" class="input-field" type="text" placeholder="Nova senha" name="nova_senha" required>
              </div>
              <div class="input-container">
                  <i class="icon">Confirmar senha:</i>
                  <input class="form-control" class="input-field" type="text" placeholder="Nova senha" name="confirm_senha" required>
              </div>
              <br>
              <button type="submit" class="btn btn-success">Alterar</button>
              <hr>
              <a href="pag_inicio_aluno.php" class="btn btn-secondary">Voltar</a>
          </form>
      </div>
  </center>
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
if (isset($_POST['senha_atual'])) {
    $matricula = $_COOKIE['matricula'];
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirm_senha = $_POST['confirm_senha'];
    if ($confirm_senha == $nova_senha) {
     $result = $conn->prepare("SELECT * FROM usuario");
     $result->execute();
     $cont = 0;
     for($i=0; $row = $result->fetch(); $i++){
        if ($row['matricula'] == $matricula && $row['senha'] == $senha_atual) {
            $cont++;
        }
    }
    if ($cont = 1) {
     $result2 = $conn->prepare("UPDATE usuario SET senha = '$nova_senha' WHERE matricula = '$matricula'");
     $result2->execute();
     echo "<script type='text/javascript'>alert('Senha alterada com sucesso!')</script>";
 }else{
    echo "<script type='text/javascript'>alert('Senhas incompativeis!')</script>";
}
}else{
    echo "<script type='text/javascript'>alert('Senhas incompativeis!')</script>";
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
