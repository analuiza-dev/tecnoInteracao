<?php 
include ('header.php'); 
$ID=$_GET['id'];
?>
<body>


<div class="container">
<div class="hero-unit-header">
 <div class="container-con">
<!-- end banner & menunav -->

<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="row-fluid">
<div class="span3"></div>
<div class="span6">


<div class="hero-unit-3">
<center>

<?php
include('../conn/conexao.php');

$result = $conn->prepare("SELECT * FROM professor WHERE matricula_fk = '$ID'");
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
$id=$row['matricula_fk'];
?>
<form class="form-horizontal" method="post" action="editar_professorPDO.php<?php echo '?matricula_fk='.$id; ?>"  enctype="multipart/form-data" style="float: right;">
                                <legend><h4>Editar</h4></legend>
                                <h4>Informações Pessoais</h4>
                                <hr>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Nome:</label>
                                    <div class="controls">
                                        <input type="text" name="nome_prof" required value="<?php echo $row['nome_prof']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">Matricula:</label>
                                    <div class="controls">
                                        <input type="text" name="matricula" required value="<?php echo $row['matricula_fk']; ?>">
                                    </div>
                                </div>
								
								 <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Salvar</button>
										<a href="../pag_inicio_admin.php" class="btn">Voltar</a>
                                    </div>
                                </div>
                            </form>
<?php } ?>
								</center>
								</center>

								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
</body>
</html>
								