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

$result = $conn->prepare("SELECT * FROM turma WHERE id_turma = '$ID'");
$result->execute();

for($i=0; $row = $result->fetch(); $i++){
$id=$row['id_turma'];
?>
<form class="form-horizontal" method="post" action="editar_turmaPDO.php<?php echo '?id_turma='.$id; ?>"  enctype="multipart/form-data" style="float: right;">
                                <legend><h4>Editar</h4></legend>
                                <h4>Informações Pessoais</h4>
                                <hr>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Ano da Turma:</label>
                                    <div class="controls">
                                        <input type="text" name="ano" required value="<?php echo $row['ano_turma']; ?>">
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Turma:</label>
                                    <div class="controls">
										<select name="turma">
											<option value="<?php echo $row['id_turma'];?>"><?php echo $row['serie_turma'].$row['curso']; }?></option>
											<?php 
												$sql = "SELECT * FROM turma WHERE id_turma != '$ID'";
												$busca = $conn->query($sql);
												foreach($busca as $linha){
													
											?>
											<option value="<?php echo $linha['id_turma'];?>"><?php echo $linha['serie_turma'].$linha['curso']; }?></option>
										</select>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Nova Turma:</label>
                                    <div class="controls">
                                        <select name="novo">
											<option value="2">Passar a turma para o 2º</option>
											<option value="3">Passar a turma para o 3º</option>
										</select>
                                    </div>
                                </div>
								 <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Salvar</button>
										<a href="../pag_inicio_admin.php" class="btn">Voltar</a>
                                    </div>
                                </div>
                            </form>

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