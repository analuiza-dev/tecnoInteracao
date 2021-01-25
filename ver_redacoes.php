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
            <h2>Prof(a) de Redação:
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
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <h2>Redação</h2>
                    <table class="table table-border table-striped">
                        <thead>
                            <th><center> Nome Aluno</center></th>
                            <th><center>Redação</center></th>
                            <th><center>Ação</center></th>
                        </thead>
                        <tbody>
                            <?php 
                            $id_tema = $_GET['id_tema'];
                            $result = $conn->prepare("SELECT * FROM redacao r JOIN aluno a ON r.id_aluno_fk = a.id_aluno WHERE id_tema_fk = '$id_tema' AND status = 0");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                echo "<tr>";
                                echo "<td>";
                                echo $row['nome_aluno'];
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-success' href='redações/";
                                echo $row['redacao'];
                                echo "'>Ler Redação</td>";
                                echo "</td>";
                                echo "</td>";
                                echo "<td>";

                                echo "<a class='btn btn-primary' href='avalia_redacao.php?id_redacao=";
                                echo $row['id_redacao'];
                                echo "'>Avaliar</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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

