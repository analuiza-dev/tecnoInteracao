<?php
$aut = $_COOKIE['aut']; 
if ($aut == "aluno") {
	include "conn/conexao.php";
	$id_grupo = $_GET['id_grupo'];
	$id_assunto = $_GET['id_assunto'];
	$id_aluno = $_COOKIE['id'];
	$result = $conn->prepare("SELECT * FROM questoes WHERE id_assunto_fk = '$id_assunto' and status_questao = '1'");
	$questoes = array();
	$result->execute();
	for ($i=0; $row = $result->fetch() ; $i++) { 
		$questoes[] = $row['id_questao'];
	}
	$questionario = "";
	for($cont = 0; $cont < 10 ;$cont++){
		$n = rand(0,count($questoes)-1);
		$questionario.= $questoes[$n]."-";
		unset($questoes[$n]);
		sort($questoes);
	}
	$result2 = $conn->prepare("INSERT INTO participante (questoes,id_aluno_fk,id_grupo_fk) VALUES ('$questionario','$id_aluno','$id_grupo')");
	$result2->execute();
	header('location:pag_inicio_aluno.php');
}else if($aut == "admin"){
	echo "<center>";
	echo "<h2>ACESSO NEGADO</h2>";
	echo "<a href='pag_inicio_admin.php'>Voltar</a>";
	echo "</center>";
}else if($aut == "prof"){
	echo "<center>";
	echo "<h2>ACESSO NEGADO</h2>";
	echo "<a href='pag_inicio_prof.php'>Voltar</a>";
	echo "</center>";
}	
?>

