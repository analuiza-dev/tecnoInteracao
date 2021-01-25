<?php 
$aut = $_COOKIE['aut']; 
include "util/dbfuncoes.php";
setConexao();
if ($aut == "aluno") { 
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
                            <a href="tb_grupos.php">Grupos Disponíveis</a>
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
                    $sql = "SELECT * FROM aluno";
                    $nome_aluno = "";
                    $matricula = $_COOKIE['matricula'];
                    foreach (consultarSQL($sql) as $linha) {
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
                    <div class="row">
                        <div class="col-md-12">
                          <h4>Grupos Disponíveis</h4>
                          <div class="table-responsive">
                            <table class="table table-bordred table-striped">
                              <thead>
                                <th>Grupo</th>
                                <th>Prof</th>
                                <th>Assunto</th>
                                <th>Inscrição</th>
                                <th>Ação</th>
                                <th>Nota</th>
                              </thead>
                              <tbody>                                    
                    <?php 
                    $sql = "SELECT * FROM grupos INNER JOIN professor ON professor.id_prof = grupos.id_prof_fk INNER JOIN assunto ON assunto.id_assunto = grupos.id_assunto_fk ";
                    foreach (consultarSQL($sql) as $linha) {
                      echo "<tr>";
                      echo "<td>";
                      echo $linha['nome_grupo'];
                      echo "</td>";
                      echo "<td>";
                      echo $linha['nome_prof'];
                      echo "</td>";
                      echo "<td>";
                      echo $linha['nome_assunto'];
                      echo "</td>";
                      $sql_dado = "SELECT * FROM participante;";
                      $cont = 0;
                      $cont_dado = 0;
                      $nota = 0;
                      $id_grupo = $linha['id_grupo'];
                      foreach (consultarSQL($sql_dado) as $dado) {
                        if ($id == $dado['id_aluno_fk'] && $id_grupo == $dado['id_grupo_fk']) {
                          $cont++;
                          if (is_null($dado['nota'])) {
                            $cont_dado++;
                          }else{
                            $nota = $dado['nota'];
                          }
                        } 
                      }
                      if ($cont > 0) {
                        echo "<td>";
                        echo "Já Inscrito";
                        echo "</td>";
                        echo "<td>";
                        if ($cont_dado > 0) {
                          echo "<a href='realiza_questionario.php?id_grupo=";
                          echo $linha['id_grupo'];
                          echo "'>Realizar Questionário</td>";
                          echo "<td>";
                          echo "Pendente";
                          echo "</td>";
                        }else{
                          echo "Realizado</td>";
                          echo "<td>";
                          echo $nota;
                          echo "</td>";
                        }
                      }else{
                        echo "<td><a href='gera_questionario.php?id_grupo=";
                        echo $linha['id_grupo'];
                        echo "&id_assunto=";
                        echo $linha['id_assunto_fk'];
                        echo "'>Inscreva-se</a></td>";
                        echo "<td>";
                        echo "Inscreva-se para realizar o questionário";
                        echo "</td>";
                        echo "<td>";
                        echo "Pendente";
                        echo "</td>";
                      }
                      echo "</tr>";
                    }
                    ?>
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
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