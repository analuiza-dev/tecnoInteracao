<?php
include '../conn/conexao.php';

$get_id		= $_REQUEST['id_tema'];

$nome		= $_POST['nome_tema'];


$sql = "UPDATE tema_redacao SET nome_tema = '$nome' WHERE id_tema = '$get_id'";

if($conn->exec($sql)){
			echo "<script>alert('Nome tema editado com sucesso!'); window.location='../temaconfig.php'</script>";

	}else{
		echo "<script>alert('Falha!'); window.location='temaconfig.php'</script>";
	}

?>

