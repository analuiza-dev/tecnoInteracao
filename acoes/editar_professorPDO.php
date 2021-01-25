<?php
include '../conn/conexao.php';

$get_id		= $_REQUEST['matricula_fk'];

$nome		= $_POST['nome_prof'];
$matricula	= $_POST['matricula'];

//Excluir Usuario e Inserir novamente
$usu = "SELECT * FROM usuario WHERE matricula = '$get_id'";
$busca = $conn->query($usu);
$busca->execute();
foreach($busca as $row){
	$senha = $row['senha'];
	$tipo = $row['id_tipo_fk'];
}

$sql = "DELETE FROM professor WHERE matricula_fk = '$get_id'";

if($conn->exec($sql)){
	$sql = "DELETE FROM usuario WHERE matricula = '$get_id'";
	if($conn->exec($sql)){
		$sql = "INSERT INTO usuario (matricula, senha, nome, id_tipo_fk) VALUES ('$matricula', '$senha', '$nome', '$tipo')";
		if($conn->exec($sql)){
			$sql = "INSERT INTO professor (nome_prof, matricula_fk) VALUES ('$nome', '$matricula')";
			if($conn->exec($sql)){
				echo "<script>alert('Professor editado!'); window.location='../pag_inicio_admin.php'</script>";
			}else{
				echo "<script>alert('Falha ao inserir Professor!'); window.location='../pag_inicio_admin.php'</script>";
			}
		}else{
			echo "<script>alert('Falha ao inserir usuario!'); window.location='../pag_inicio_admin.php'</script>";
		}
	}else{
		echo "<script>alert('Falha ao deletar usuario!'); window.location='../pag_inicio_admin.php'</script>";
	}
}else{
	echo "<script>alert('Falha ao deletar professor!'); window.location='../pag_inicio_admin.php'</script>";
}

?>

