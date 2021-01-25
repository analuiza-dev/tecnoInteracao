<?php 
$aut = $_COOKIE['aut']; 
if ($aut == "prof_red") {
    include('conn/conexao.php');
    $id_prof = $_COOKIE['id'];
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
        <title>Página Inicial - Professor</title>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            width: 700px;
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
    <div id="sidebar-wrapper" style="margin-top: 20px;">
        <div class="nav nav-tabs">
            <ul class="sidebar-nav">
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
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <div class="input-container">
                          <i class="icon">Competência 1:</i>
                          <input class="form-control" class="input-field" type="text" placeholder="Nota" name="cmp1" required>
                      </div>
                      <div class="input-container">
                          <i class="icon">Competência 2:</i>
                          <input class="form-control" class="input-field" type="text" placeholder="Nota" name="cmp2" required>
                      </div>
                      <div class="input-container">
                          <i class="icon">Competência 3:</i>
                          <input class="form-control" class="input-field" type="text" placeholder="Nota" name="cmp3" required>
                      </div>
                      <div class="input-container">
                          <i class="icon">Competência 4:</i>
                          <input class="form-control" class="input-field" type="text" placeholder="Nota" name="cmp4" required>
                      </div>
                      <div class="input-container">
                          <i class="icon">Competência 5:</i>
                          <input class="form-control" class="input-field" type="text" placeholder="Nota" name="cmp5" required>
                      </div>
                      <div class="input-container">
                          <i class="icon">Avaliação Geral:</i>
                          <textarea type="text" class="form-control" name="comentario"></textarea> 
                      </div>
                      <div class="form-control">
                        <button type="submit" class="btn btn-success">Enviar Nota</button>
                        <hr>
                        <?php
                        $id_red = $_GET['id_redacao'];
                        $sql = "SELECT id_tema_fk FROM redacao WHERE id_redacao = ?";
                        $result = $conn->prepare($sql);
                        $result->bindParam(1, $id_red);
                        $result->execute();
                        $resultSet = $result->fetch();
                        echo '<a class="btn btn-secondary" href="ver_redacoes.php?id_tema='.$resultSet['id_tema_fk'].'"> Voltar</a>';

                        ?>
                    </div>
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
$id_red = $_GET['id_redacao'];
if (isset($_POST['cmp1'])) {
    $cmp1 = $_POST['cmp1'];
    $cmp2 = $_POST['cmp2'];
    $cmp3 = $_POST['cmp3'];
    $cmp4 = $_POST['cmp4'];
    $cmp5 = $_POST['cmp5'];
    $comentario = $_POST['comentario'];
    $total = ($cmp1 + $cmp2 + $cmp3 + $cmp4 + $cmp5);


    if (empty($cmp1)|| empty($cmp2) || empty($cmp3) || empty($cmp4)||empty($cmp5) || empty($comentario)) {
        echo "<script type='text/javascript'>alert('Preencha todos os campos!')</script>";
    }elseif ($total > 1000) {
        echo "<script type='text/javascript'>alert('Nota Incoerente!')</script>";
    }else{
        $sql = "INSERT INTO avalia_red (competencia_1, competencia_2, competencia_3, competencia_4, competencia_5, total, comentario, id_redacao_fk) VALUES ('$cmp1','$cmp2','$cmp3','$cmp4','$cmp5','$total','$comentario', '$id_red')";
        $sql2 = "UPDATE redacao SET status = 1 WHERE id_redacao = $id_red";
        if($conn->exec($sql)&&$conn->exec($sql2)){
            echo "<script type='text/javascript'>alert('Nota Enviada com sucesso!')</script>";
        }else{
            echo "<script type='text/javascript'>alert('Erro ao enviar nota tema!')</script>";
        }
    }
}
?>
<?php 
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
}else if($aut == "prof"){
    echo "<center>";
    echo "<h2>ACESSO NEGADO</h2>";
    echo "<a href='pag_inicio_aluno.php'>Voltar</a>";
    echo "</center>";
}

else{
    header('location:index.php');
}
?>

