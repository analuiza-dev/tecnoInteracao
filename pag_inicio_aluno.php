<?php 
$aut = $_COOKIE['aut']; 
include "conn/conexao.php";
if ($aut == "aluno") { 
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Página Inicial - Aluno</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

  </head>
  <link rel="icon" type="image/jpg" href="4.jpg">
  <link rel ="stylesheet" type="text/css" href="styleal2.css">
  <body bgcolor = "#228B22">
    <nav class="navbar navbar-light navbar-inverse fixed-top" style="background-color: #4CAF50">
      <ul class="navbar-nav px-3">
        <li class="sidebar-brand">
          <a href="#menu-toggle" class="navbar-brand col-sm-3 col-md-2 mr-0" id="menu-toggle">
            <i class="fa fa-navicon" style="font-size:25px"></i>
          </a>
        </li>
      </ul class="navbar-nav px-3">
      <ul class="navbar-nav px-3">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="pag_inicio_aluno.php">Alunos</a>
      </ul>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="desloga.php">Sair</a>
        </li>
      </ul>
    </nav>
    <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper" align="center" style="margin-top: 15px;">
        <div class="nav nav-tabs">
          <ul class="sidebar-nav">
		  <br>
		  <span class='image avatar48'><img src="bancodeimagens/<?php echo $img; ?>" alt='' width='100px' height='100px' class='rounded-circle'/></span>
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
              <a href="visualiza_tema.php">Visualizar tema</a>
            </li>
            <li>
              <a href="listarminharedacao.php">Minhas redações</a>
            </li>
          </ul>
        </div>                    
      </div>
      <!-- /#sidebar-wrapper -->
      <!-- Page Content -->
      <div id="page-content-wrapper" style="margin-top: 40px;">
        <div class="container-fluid">
          <h1>Tecno-Interação</h1>
          <h2>Aluno:
            <?php 
            $id = $_COOKIE['id'];
            $result = $conn->prepare("SELECT * FROM aluno");
            $result->execute();
            for ($i=0; $row = $result->fetch() ; $i++) { 
             if ($id == $row['id_aluno']) {
              $nome_aluno = $row['nome_aluno'];
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
                  $result = $conn->prepare("SELECT * FROM grupos INNER JOIN professor ON professor.id_prof = grupos.id_prof_fk INNER JOIN assunto ON assunto.id_assunto = grupos.id_assunto_fk ");
                  $result->execute();
                  for ($i=0; $row2 = $result->fetch() ; $i++) { 
                    echo "<tr>";
                    echo "<td>";
                    echo $row2['nome_grupo'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['nome_prof'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['nome_assunto'];
                    echo "</td>";
                    $result2 = $conn->prepare("SELECT * FROM participante");
                    $cont = 0;
                    $cont_dado = 0;
                    $nota = 0;
                    $id_grupo = $row2['id_grupo'];
                    $result2->execute();
                    for ($i=0; $row_dado = $result2->fetch() ; $i++) { 
                      if ($id == $row_dado['id_aluno_fk'] && $id_grupo == $row_dado['id_grupo_fk']) {
                        $cont++;
                        if (is_null($row_dado['nota'])) {
                          $cont_dado++;
                        }else{
                          $nota = $row_dado['nota'];
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
                        echo $row2['id_grupo'];
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
                      echo $row2['id_grupo'];
                      echo "&id_assunto=";
                      echo $row2['id_assunto_fk'];
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