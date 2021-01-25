<?php
$aut = $_COOKIE['aut']; 
if ($aut == "admin") {
    include "conn/conexao.php";

    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <link rel="icon" href="img/4.jpg">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="mobile-web-app-capable" content="yes">
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Pagina Inicial - Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
    <div id="sidebar-wrapper" align="center" style="margin-top: 55px;">
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
                    <a href="listar_aluno.php">Alunos</a>
                </li>
                <li>
                    <a href="listar_prof.php">Professores</a>
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
    <br>
    <br>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h1>Tecno-Interação</h1>
            <h2>E.E.E.P. WALTER RAMOS DE ARAÚJO</h2>
            <center>
                <h2>Insira as informações a seguir:</h2>
                <form class="form-horizontal" method="POST" action="">
                    <div class="form-group">
                      <div class="col-sm-4">
                        <label class="col-sm-3 control-label">Senha Atual:</label>
                        <input class="form-control" type="password" name="senha_atual" required>
                    </div>
                    <div class="col-sm-4">
                        <label class="col-sm-3 control-label">Nova Senha:</label>
                        <input class="form-control" type="password" name="nova_senha" required>
                    </div>
                    <div class="col-sm-4">
                        <label class="col-sm-4 control-label">Confirmar Senha:</label>
                        <input class="form-control" type="password" name="confirm_senha" required>
                    </div>
                    <div class="col-sm-4">
                      <br>
                      <a href="pag_inicio_admin.php" class="btn btn-secondary">Voltar</a>
                      <button type="submit" class="btn btn-success">Alterar</button>
                  </div>
              </div>
          </form>
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
        $sql = "SELECT * FROM usuario";
        $confirm = $conn->query($sql);
        $confirm->execute();
        $cont = 0;
        foreach ($confirm as $linha) {
            if ($linha['matricula'] == $matricula && $linha['senha'] == $senha_atual) {
                $cont++;
            }
        }
        if ($cont = 1) {
            $sql2 = "UPDATE usuario SET senha = '$nova_senha' WHERE matricula = '$matricula'";
            $conn->query($sql2);
            echo "<script type='text/javascript'>alert('Senha alterada com sucesso!')</script>";
        }else{
            echo "<script type='text/javascript'>alert('Senhas incompativeis!')</script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('Senhas incompativeis!')</script>";
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
