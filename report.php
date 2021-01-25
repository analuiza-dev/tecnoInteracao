<?php
	include ('conn/conexao.php');
	$id = $_REQUEST['id_quest'];
	$sql = "UPDATE questoes SET status_questao = '2' WHERE id_questao = '$id'";
	if ($conn->exec($sql)) {
		echo "<script type='text/javascript'>alert('A questão foi reportada, agora o formuulário será resetado!'); window.location='pag_inicio_aluno.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('ERRO: Não foi possivel reportar a questão!'); window.location='pag_inicio_aluno.php'</script>";
	}
?>