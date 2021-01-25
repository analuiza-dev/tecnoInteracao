<?php
require_once('../conn/conexao.php');

$get_id		= $_GET['id_turma'];

$sql = "DELETE FROM turma WHERE id_turma = '$get_id'";

if($conn->exec($sql)){
	echo "<script>alert('Turma Excluida com Sucesso!'); window.location='../pag_inicio_admin.php'</script>";
}else{
	echo "<script>alert('Falha ao excluir turma!'); window.location='../pag_inicio_admin.php'</script>";
}

?>