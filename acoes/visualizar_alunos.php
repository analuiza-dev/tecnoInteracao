<?php 
include ('header.php'); 
$ID=$_GET['id'];
?>
<body>
	<div class="container">
		<center>
			<?php
			include('../conn/conexao.php');

			$select = $conn->query("SELECT * FROM aluno WHERE id_turma_fk = '$ID'")->fetchAll();
			$count = count($select);
			if($count >= 1){

				$result = $conn->prepare("SELECT * FROM aluno INNER JOIN turma
					ON id_turma_fk = id_turma WHERE id_turma_fk = '$ID'");
				$result->execute();

				for($i=0; $row = $result->fetch(); $i++){
					$id=$row['matricula_fk'];
					?>
					<div class="col-md-12" >
						<table class="table table-bordred table-striped" cellpadding="0" cellspacing="0" border="0" id="a">
							<thead>
								<tr>
									<th style="text-align:center;">ID Aluno</th>
									<th style="text-align:center;">Nome Aluno</th>
									<th style="text-align:center;">Serie</th>
									<th style="text-align:center;">Matricula Aluno</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								$result = $conn->prepare("SELECT * FROM aluno INNER JOIN turma ON turma.id_turma = aluno.id_turma_fk 
									WHERE id_turma_fk = '$ID' ORDER BY serie_turma, nome_aluno");							
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
									$id = $row['matricula_fk'];
									?>
									<tr>
										<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['id_aluno']; ?></td>
										<td style="text-align:center; word-break:break-all; width:500px;"> <?php echo $row ['nome_aluno']; ?></td>
										<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['serie_turma']." ".$row['curso']; ?></td>
										<td style="text-align:center; word-break:break-all; width:350px;"> <?php echo $row ['matricula_fk']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				<?php } ?>
				<?php
			}else{
				echo "Não possui aluno no momento !";
				echo "<br>";
			}
			?>
			<a href="../pag_inicio_admin.php" class="btn btn-success">Voltar</a>
		</center>
	</center>
</div>
</body>
</html>
