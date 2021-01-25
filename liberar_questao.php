<?php
	include ('conn/conexao.php');
	$id = $_REQUEST['id_questao'];
	$sql = "UPDATE questoes SET status_questao = '1' WHERE id_questao = '$id'";
	if ($conn->exec($sql)) {
		echo "<script type='text/javascript'>alert('A questão foi liberada!'); window.location='questoes_report.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('ERRO: Não foi possivel liberar a questão!'); window.location='questoes_report.php'</script>";
	}
?>