<?php 
$aut = $_COOKIE['aut']; 
include "conn/conexao.php";
if ($aut == "aluno") { 
    $id = $_COOKIE['id'];
    $id_grupo = $_GET['id_grupo'];
    $questoes = "";
    $itens = array('a', 'b', 'c', 'd','e');
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
     <nav class="navbar navbar-light" style="background-color: #4CAF50">
      <ul class="navbar-nav px-3">
        <li class="sidebar-brand">
          <a href="#menu-toggle" class="navbar-brand col-sm-3 col-md-2 mr-0" id="menu-toggle">
            <i class="fa fa-navicon" style="font-size:25px"></i>
        </a>
    </li>
</ul class="navbar-nav px-3">
<ul class="navbar-nav px-3">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="pag_inicio_admin.php">Alunos</a>
</ul>
<ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="desloga.php">Sair</a>
  </li>
</ul>
</nav>
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
                $matricula = $_COOKIE['matricula'];
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
    <div align="justify">
        <form class="form-horizontal" action="calcula_resultado.php" method="post">
         <div class="form-group" align="justified">
           <?php 
           $result = $conn->prepare("SELECT * FROM participante WHERE id_aluno_fk = '$id' and id_grupo_fk = '$id_grupo'");
           $result->execute();
           for ($i=0; $row = $result->fetch() ; $i++) { 
               echo "<div id = 'perg'>";
               $questoes = $row['questoes'];
               echo "<input type='hidden' name='id_participante' value='".$row['id_participante']."'>";
           }
           $id_questoes = explode('-', $questoes);
           $n = 1;
           foreach($id_questoes as $id_questao){
              $result2 = $conn->prepare("SELECT * FROM questoes where id_questao = '$id_questao' and status_questao = '1'");
              $result2->execute();
              for ($i=0; $row2 = $result2->fetch() ; $i++) { 
                $id = $row2['id_questao'];
                echo "<br>";
                echo "<h5>";
                echo $n." - ".$row2['enunciado'];
                ?>
                <a href='report.php<?php echo '?id_quest='.$id; ?>' class='btn btn-success'>Reportar</a>
                <?php
                echo "</h5>";
                echo "<br>";
                for($i = 0; $i < 5;$i++){

                  echo "<label class='col-sm-10 control-label'>";
                  echo "<input type='radio' name='q".$n."' value='".$itens[$i]."' />";
                  echo $itens[$i].') ';
                  echo $row2['opcao_'.$itens[$i]];
                  echo "</label>";
                  echo '<br>';    
              }
              echo "<input type='hidden' name='gab_".$n."' value='".$row2['resposta']."'>";
              $n++;

          }
      }
      echo "<input type='hidden' name='qtd_questoes' value='".$n."'>";
      echo "<br>";
      echo "<a href='pag_inicio_aluno.php' class='btn btn-secondary'>Voltar</a>
      <input type='submit' class='btn btn-success' value='Enviar'>";
      echo "</div>";

      ?>
  </div>

</form>
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