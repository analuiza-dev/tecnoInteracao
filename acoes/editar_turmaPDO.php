<?php
include '../conn/conexao.php';

$get_id		= $_REQUEST['id_turma'];

$ano_turma	= $_POST['ano'];
$turma		= $_POST['turma'];
$nova_turma	= $_POST['novo'];

$sql = "UPDATE turma SET ano_turma = '$ano_turma', serie_turma = '$nova_turma' WHERE id_turma = '$turma'";

if($conn->exec($sql)){
	echo "<script>alert('Turma editada!'); window.location='../pag_inicio_admin.php'</script>";
}else{
	echo "<script>alert('Falha ao editar turma!'); window.location='../pag_inicio_admin.php'</script>";
}

?>

