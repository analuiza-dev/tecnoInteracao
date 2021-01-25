<?php 
$aut = $_COOKIE['aut']; 
if ($aut == "prof") {
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
        td{
            text-align: justify;
            padding: 8px;

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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="pag_inicio_prof.php">Professores</a>
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
                <a href="pag_inicio_prof.php">
                    Página Inicial
                </a>
            </li>
            <li>
                <a href="cadastra_disciplina.php">Cadastrar Disciplina</a>
            </li>
            <li>
                <a href="cadastra_assunto.php">Cadastrar Assunto</a>
            </li>
            <li>
                <a href="cadastra_questao.php">Cadastrar Questões</a>
            </li>
            <li>
                <a href="banco_questoes.php">Banco de Questões</a>
            </li>
            <li>
                <a href="cria_grupo.php">Criar Grupo</a>
            </li>
            <li>
                <a href="lista_disciplina.php">Listar Disciplinas</a>
            </li>
            <li>
                <a href="lista_assunto.php">Listar Assuntos</a>
            </li>
            <li>
                <a href="lista_grupo.php">Listar Grupos</a>
            </li>
            <li>
                <a href="questoes_report.php">Questões reportadas</a>
            </li>
            <li>
                <a href="alterar_senha_prof.php">Alterar Senha</a>
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
               $result = $conn->prepare("SELECT * FROM professor");
               $nome_aluno = "";
               $matricula = $_COOKIE['matricula'];
               $result->execute();

               for($i=0; $row = $result->fetch(); $i++){
                if ($id == $row['id_prof']) {
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
        <h2>Questões reportadas</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive"> 
                    <table class="table table-border table-striped">
                        <?php
                        $result = $conn->prepare("SELECT * FROM questoes INNER JOIN assunto ON assunto.id_assunto = questoes.id_assunto_fk INNER JOIN disciplina ON disciplina.id_disciplina = questoes.id_disciplina_fk INNER JOIN professor ON professor.id_prof = questoes.id_prof_fk WHERE status_questao = '2'");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            if ($_COOKIE['id'] == $row['id_prof']) {
                                $id = $row['id_questao'];
                                ?>
                                <tr>
                                    <th>ID</th>
                                    <td> <?php echo $row ['id_questao']; ?></td>
                                </tr>
                                <tr>
                                    <th>Enunciado</th>
                                    <td> <?php echo $row ['enunciado']; ?></td>
                                </tr>
                                <tr>
                                    <th>Opção A</th>
                                    <td> <?php echo $row ['opcao_a']; ?></td>
                                </tr>
                                <tr>
                                    <th>Opção B</th>
                                    <td> <?php echo $row ['opcao_b']; ?></td>
                                </tr>
                                <tr>
                                    <th>Opção C</th>
                                    <td> <?php echo $row ['opcao_c']; ?></td>
                                </tr>
                                <tr>
                                    <th>Opção D</th>
                                    <td> <?php echo $row ['opcao_d'];?></td>
                                </tr>
                                <tr>
                                    <th>Opção E</th>
                                    <td> <?php echo $row ['opcao_e'];?></td>
                                </tr>
                                <tr>
                                    <th>Resposta</th>
                                    <td> <?php echo $row ['resposta'];?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td> <?php echo $row ['status_questao'];?></td>
                                </tr>
                                <tr>
                                    <th>Disciplina</th>
                                    <td> <?php echo $row ['nome_disciplina'];?></td>
                                </tr>
                                <tr>
                                    <th>Assunto</th>
                                    <td> <?php echo $row ['nome_assunto'];?></td>
                                </tr>
                                <tr>
                                    <th>Ação</th>
                                    <td>
                                       <a href="liberar_questao.php <?php echo '?id_questao='.$id; ?>" class="btn btn-success">Liberar questão acima</a>
                                   </td>
                               </tr>
                               <?php }} ?>
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
}
else{
    header('location:index.php');
}
?>
