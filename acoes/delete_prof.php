<?php
require_once('../conn/conexao.php');

$get_id		= $_GET['matricula_fk'];

$sql = "DELETE FROM professor WHERE matricula_fk = '$get_id'";

$conn->exec($sql);

echo "<script>alert('Professor(a) Excluido(a) com Sucesso!'); window.location='../pag_inicio_admin.php'</script>";
?>