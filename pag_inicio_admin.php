<?php
$aut = $_COOKIE['aut']; 
if ($aut == "admin") {
	include ('acoes/header.php');
  ?>
  <!DOCTYPE html>
  <html lang="pt-BR">
  <head>

    <link rel="stylesheet" type="text/css" href="styleal2.css">

    <title>Pagina Inicial - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <a href="listar_aluno.php?page=1">Alunos</a>
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
          <h2>Turmas</h2>
          <div class="row">
           <div class="form-group input-group" align="right">
            <input name="consulta" id="txt_consulta" placeholder="Filtrar turmas" type="text" class="form-control">
          </div>
          <div align="left">

          </div>

          <div class="col-md-12" >
            <table class="table table-bordred table-striped" cellpadding="0" cellspacing="0" border="0" id="a">
             <thead>
              <tr>
                <th style="text-align:center;">ID Turma</th>
                <th style="text-align:center;">Serie</th>
                <th style="text-align:center;">Ano Turma</th>
                <th style="text-align:center;">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              require_once('conn/conexao.php');
              $result = $conn->prepare("SELECT * FROM turma
                ORDER BY ano_turma, serie_turma, curso");

              $result->execute();
              for($i=0; $row = $result->fetch(); $i++){
               $id = $row['id_turma'];
               ?>
               <tr>
                 <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['id_turma']; ?></td>
                 <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['serie_turma']." ".$row['curso']; ?></td>
                 <td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['ano_turma']; ?></td>
                 <td style="text-align:center; width:350px;">
                  <a href="acoes/visualizar_alunos.php<?php echo '?id='.$id; ?>" class="btn btn-info">Exibir Alunos</a>
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
                        <a href="pag_inicio_admin.php"class="close">&times;</a>
                      </div>
                      <div class="modal-body">
                        <p><div style="font-size:larger;" class="alert alert-danger">Tem certeza de que quer Excluir ? <b style="color:red;">
                         <br>
                         <?php echo "Turma: ".$row['serie_turma']." ".$row['curso']; ?></b></p>
                       </div>
                       <div class="modal-footer">
                        <a href="pag_inicio_admin.php" class="btn btn-success">Não</a>
                        <a href="acoes/delete_turma.php<?php echo '?id_turma='.$id; ?>" class="btn btn-danger">Sim</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </center>
          </tr>
        <?php } ?>
      </tbody>
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