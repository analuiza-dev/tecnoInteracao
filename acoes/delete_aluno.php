<?php
require_once('../conn/conexao.php');

$get_id		= $_GET['matricula_fk'];

$sql = "DELETE FROM aluno WHERE matricula_fk = '$get_id'";

$conn->exec($sql);

echo "<script>alert('Aluno Excluido com Sucesso!'); window.location='../pag_inicio_admin.php'</script>";
?>