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
        <center>
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="jumbotron">
                    <h2>Insira as informações a seguir:</h2>
                    <div class="input-container">
                      <i class="icon">Nome do aluno:</i>
                      <input class="form-control" class="input-field" type="text" placeholder="Nome completo" name="nome_aluno" required>
                  </div>
                  <div class="input-container">
                      <i class="icon">Matricula:</i>
                      <input class="form-control" class="input-field" type="text" placeholder="Matricula" name="matricula" required>
                  </div>
                  <div class="input-container">
                      <i class="icon">Senha:</i>
                      <input class="form-control" class="input-field" type="text" placeholder="Senha" name="senha" required>
                  </div>
                  <div class="input-container">
                    <i class="icon">Turma:</i>
                    <select class="form-control" class="input-field" required name="idturma">
                        <option value="">Selecione...</option>
                        <?php 
                        $busca = 'SELECT * FROM TURMA ORDER BY serie_turma, curso';
                        $result = $conn->query($busca, PDO::FETCH_ASSOC) or die("erro");
                        foreach($result as $row){
                            echo '<option value='.$row['id_turma'].'>'.$row['serie_turma']."".$row['curso'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-container">
                  <i class="icon">Imagem:</i>
                  <input class="form-control" class="input-field" type="file" name="img" required>
              </div>
              <br>
              <button type="submit" class="btn btn-success">Cadastrar</button>
              <hr>
              <a href="pag_inicio_admin.php" class="btn btn-secondary">Voltar</a>
          </div>
      </form>
      <br>
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
if (isset($_POST['nome_aluno'])) {
	
	$nome_arquivo = $_FILES['img']['name'];
	$arquivo = $_FILES['img']['tmp_name'];
	$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

	$dir = "bancodeimagens/";

	$upload = move_uploaded_file($arquivo, $dir.$nome_arquivo);
	if($upload){
        $nome_aluno = $_POST['nome_aluno'];
        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];
        $idturma = $_POST['idturma'];
        $id = 2;
        if ($idturma == "") {
            echo "<script type='text/javascript'>alert('Selecione a turma!')</script>";
        }else{
           $sql = "INSERT INTO usuario (nome, matricula, senha, id_tipo_fk, imagem) VALUES ('$nome_aluno','$matricula','$senha','$id', '$nome_arquivo')";
           if($conn->exec($sql)){
            $sql = "INSERT INTO aluno (nome_aluno, id_turma_fk, matricula_fk) VALUES ('$nome_aluno','$idturma','$matricula')";
            if($conn->exec($sql)){
             echo "<script type='text/javascript'>alert('Aluno cadastrado com sucesso!')</script>";
         }else{
             echo "<script type='text/javascript'>alert('Erro ao cadastrar aluno! 1')</script>";
         }
     }else{
        echo "<script type='text/javascript'>alert('Erro ao cadastrar aluno!')</script>";
    }	
}
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
