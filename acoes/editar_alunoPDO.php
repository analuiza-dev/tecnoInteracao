<?php
include '../conn/conexao.php';

$get_id		= $_REQUEST['matricula_fk'];

$nome		= $_POST['nome_aluno'];
$turma		= $_POST['turma'];
$matricula	= $_POST['matricula'];

//Excluir Usuario e Inserir novamente
$usu = "SELECT * FROM usuario WHERE matricula = '$get_id'";
$busca = $conn->query($usu);
$busca->execute();
foreach($busca as $row){
	$senha = $row['senha'];
	$tipo = $row['id_tipo_fk'];
}

$sql = "DELETE FROM aluno WHERE matricula_fk = '$get_id'";

if($conn->exec($sql)){
	$sql = "DELETE FROM usuario WHERE matricula = '$get_id'";
	if($conn->exec($sql)){
		$sql = "INSERT INTO usuario (matricula, senha, nome, id_tipo_fk) VALUES ('$matricula', '$senha', '$nome', '$tipo')";
		if($conn->exec($sql)){
			$sql = "INSERT INTO aluno (nome_aluno, id_turma_fk, matricula_fk) VALUES ('$nome', '$turma', '$matricula')";
			if($conn->exec($sql)){
				echo "<script>alert('Aluno editado!'); window.location='../pag_inicio_admin.php'</script>";
			}else{
				echo "<script>alert('Falha ao inserir aluno!'); window.location='../pag_inicio_admin.php'</script>";
			}
		}else{
			echo "<script>alert('Falha ao inserir usuario!'); window.location='../pag_inicio_admin.php'</script>";
		}
	}else{
		echo "<script>alert('Falha ao deletar usuario!'); window.location='../pag_inicio_admin.php'</script>";
	}
}else{
	echo "<script>alert('Falha ao deletar aluno!'); window.location='../pag_inicio_admin.php'</script>";
}

?>

