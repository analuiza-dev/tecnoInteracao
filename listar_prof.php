<?php
$aut = $_COOKIE['aut']; 
if ($aut == "admin") {
  include "conn/conexao.php";
  ?>
  <!DOCTYPE html>
  <html lang="pt-BR">
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
    <br>
    <br>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <h1>Tecno-Interação</h1>
        <h2>E.E.E.P. WALTER RAMOS DE ARAÚJO</h2>
        <h2>Professores</h2>
        <div class="row">
          <div class="form-group input-group" align="right">
            <input name="consulta" id="txt_consulta" placeholder="Filtrar professores" type="text" class="form-control">
          </div>
          <div class="col-md-12">
            <table class="table table-bordred table-striped" id="a">
              <thead>
                <tr>
                 <th style="text-align:center;">ID Professor</th>
                 <th style="text-align:center;">Nome Professor</th>
                 <th style="text-align:center;">Matricula Professor</th>
                 <th style="text-align:center;">Ações</th>
               </tr>
             </thead>
             <?php
             $result = $conn->prepare("SELECT * FROM professor ORDER BY nome_prof");
             $result->execute();
             for($i=0; $row = $result->fetch(); $i++){
               $id = $row['matricula_fk'];
               ?>
               <tr>
                 <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['id_prof']; ?></td>
                 <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['nome_prof']; ?></td>
                 <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['matricula_fk']; ?></td>
                 <td style="text-align:center; width:350px;">
                  <a href="acoes/editar_professor.php<?php echo '?id='.$id; ?>" class="btn btn-info">Editar</a>
                  <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-danger" >Excluir </a>
                </td>
                
                <!-- Modal -->
                <center>
                  <div id="delete<?php  echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                   <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Excluir</h4>
                        <a href="listar_prof.php"class="close">&times;</a>
                      </div>
                      <div class="modal-body">
                        <p><div style="font-size:larger;" class="alert alert-danger">Tem certeza de que quer Excluir ? <b style="color:red;">
                          <br>
                          <?php echo "Professor: ".$row['nome_prof']." | "."Matricula: ".$row['matricula_fk']; ?></b></p>
                        </div>
                        <hr>
                        <div class="modal-footer">
                          <a href="listar_prof.php" class="btn btn-success">Não</a>
                          <a href="acoes/delete_prof.php<?php echo '?matricula_fk='.$id; ?>" class="btn btn-danger">Sim</a>
                        </div>
                      </div>
                    </div>
                  </center>
                </tr>
              <?php } ?>
            </table>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
<script>
	$('input#txt_consulta').quicksearch('table#a tbody tr');
</script>
