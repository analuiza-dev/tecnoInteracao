<?php 
$aut = $_COOKIE['aut']; 
include "conn/conexao.php";
if ($aut == "aluno") { 
    $qtd_questoes = $_POST['qtd_questoes'];
    $id_participante = $_POST['id_participante'];
    $gabarito = "";
    $gab_aluno = "";
    $acertos = 0;
    for ($i=1; $i < $qtd_questoes ; $i++) { 
        $resposta = $_POST['q'.$i];
        $gabarito = $_POST['gab_'.$i];
        if($resposta == $gabarito){
            $acertos++;
        }
    }
    $result = $conn->prepare("UPDATE participante set nota = '$acertos' WHERE id_participante = '$id_participante'");
    $result->execute();
    
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Página Inicial - Aluno</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/simple-sidebar.css" rel="stylesheet">

    </head>
    <link rel="icon" type="image/jpg" href="4.jpg">
    <link rel ="stylesheet" type="text/css" href="styleal2.css">
    <body bgcolor = "#228B22">
        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="nav nav-tabs">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <a href="pag_inicio_aluno.php">
                                Página Inicial
                            </a>
                        </li>                        
                        <li>
                            <a href="tb_grupo_inscrito.php">Grupos Inscritos</a>
                        </li>
                        <li>
                            <a href="alterar_senha_aluno.php">Alterar Senha</a>
                        </li>
                        <li>
                            <a href="desloga.php">Sair</a>
                        </li>
                    </ul>
                </div>                    
            </div>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <h1>Tecno-Interação</h1>
                    <h2>Aluno:
                    <?php 
                    $id = $_COOKIE['id'];
                    $nome_aluno = "";
                    $result = $conn->prepare("SELECT * FROM aluno");
                    $result->execute();
                    $matricula = $_COOKIE['matricula'];
                    for ($i = 0; $linha = $result->fetch(); $i++) {
                      if ($id == $linha['id_aluno']) {
                          $nome_aluno = $linha['nome_aluno'];
                      }
                    }
                    echo $nome_aluno;
                    ?>
                    </h2>
                    <h2>Matricula:
                        <?php 
                        echo $matricula;
                        ?>
                    </h2>
                    <center>
                        <h2>Parabéns você acertou<?php echo " ".$acertos?> questões</h2>
                        <a href="pag_inicio_aluno.php" class="btn btn-secondary">Voltar</a>
                    </center>
                    <div align="left">
                        <a href="#menu-toggle" class="btn btn-success" id="menu-toggle">Menu</a>
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
}else if($aut == "prof"){
    echo "<center>";
    echo "<h2>ACESSO NEGADO</h2>";
    echo "<a href='pag_inicio_prof.php'>Voltar</a>";
    echo "</center>";
}
else{
    header('location:index.php');
}
?>