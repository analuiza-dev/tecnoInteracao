<?php 
$aut = $_COOKIE['aut']; 
if ($aut == "prof_red") {
    include('conn/conexao.php');
    $id_prof = $_COOKIE['id'];
    $matricula = $_COOKIE['matricula'];
    $result = $conn->prepare("SELECT * FROM usuario WHERE matricula = '$matricula'");
    $result->execute();
    foreach($result as $row){
        $img = $row['imagem'];
    }

    if (isset($_POST['nome_tema'])) {
        $nome_real = $_FILES['proposta']['name'];
        $arquivo = $_FILES['proposta']['tmp_name'];

        $dir = 'propostas/';

        $upload = move_uploaded_file($arquivo, $dir.$nome_real);

        if ($upload) {  
            $nome_tema = $_POST['nome_tema'];
            $data = $_POST['data'];
            $id_prof = $_COOKIE["id"];
            if (empty($nome_tema)|| empty($nome_real) || empty($data)) {
                echo "<script type='text/javascript'>alert('Preencha todos os campos!')</script>";
            }else{
                $sql = "INSERT INTO tema_redacao (nome_tema, proposta, prazo, id_prof_fk) VALUES ('$nome_tema','$nome_real','$data','$id_prof')";
                if($conn->exec($sql)){
                    echo "<script type='text/javascript'>alert('Tema cadastrado com sucesso!')</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Erro ao cadastrar tema!')</script>";
                }
            }
        }else{
            echo "Não";
        }
    }

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
        <title>Página Inicial - Professor</title>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div id="sidebar-wrapper" style="margin-top: 20px;" align="center">
        <div class="nav nav-tabs">
            <ul class="sidebar-nav">
                <br>
                <span class='image avatar48'><img src="bancodeimagens/<?php echo $img; ?>" alt='' width='100px' height='100px' class='rounded-circle'/></span>
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
                    <a href="alterar_senha_admin.php">Alterar Senha</a>
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
        <center>
            <div class="jumbotron">
                <h2>Insira as informações a seguir:</h2>
                <form class="form-horizontal" action="" method="POST" enctype ="multipart/form-data">
                    <div class="form-group">
                        <div class="input-container">
                          <i class="icon">Tema:</i>
                          <input class="form-control" class="input-field" type="text" placeholder="Tema" name="nome_tema" required>
                      </div>
                  </br>
                  <div class="input-container">
                    <i class="icon">Prazo:</i>
                    <input class="form-control" class="input-field" class ="col-sm-12" type="date" name="data" placeholder="Data" required>
                </div>
            </br>
            <div class="input-container">
                <i class="icon">textos motivadores::</i>
                <input class="form-control" class="input-field" type="file" name="proposta" required="" />
            </div>
        </br>
        <button type="submit" class="btn btn-success" class="form-control">Cadastrar</button>
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

