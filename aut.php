
<?php
if(isset($_POST['matricula'])) { 
	$matricula = $_POST['matricula'];
	$senha = $_POST['senha_usuario'];
	
	require_once('conn/conexao.php');
	$result = $conn->prepare("SELECT * FROM usuario");
	$result->execute();
	
	
	$cont = 0;
	
	for($i = 0; $row = $result->fetch(); $i++){
		if($row['matricula'] == $matricula){
			if($row['senha'] == $senha){
				if($row['id_tipo_fk'] == 1){
					$cont = 1;
				}else if($row['id_tipo_fk'] == 2){
					$cont = 2;
				}else if($row['id_tipo_fk'] == 3){
					$cont = 3;
				}else if($row['id_tipo_fk'] == 4){
					$cont = 4;
				}
			}
		}
	}
	if($cont == 1){
		$result = $conn->prepare("SELECT * FROM professor");
		$result->execute();
		
		for($i = 0; $row = $result->fetch(); $i++){
			if ($matricula == $row['matricula_fk']) {
				setcookie("id",$row['id_prof']);
				setcookie("matricula",$row['matricula_fk']);
				setcookie("aut","prof");
			  }
		}
		header('location:pag_inicio_prof.php');
	}else if($cont == 2){
		$result = $conn->prepare("SELECT * FROM aluno");
		$result->execute();
		
		for($i = 0; $row = $result->fetch(); $i++){
		  if ($matricula == $row['matricula_fk']) {
			setcookie("id", $row['id_aluno']);
			setcookie("matricula", $row['matricula_fk']);
			setcookie("aut","aluno");
		  }
		}
		header('location:pag_inicio_aluno.php');
		}else if($cont == 3){
		setcookie("matricula",700);
		setcookie("aut","admin");
		header('location:pag_inicio_admin.php');
	}else if($cont == 4){
		$result = $conn->prepare("SELECT * FROM prof_red");
		$result->execute();
		
		for($i = 0; $row = $result->fetch(); $i++){
		  if ($matricula == $row['matricula_fk']) {
			setcookie("id", $row['id_prof_red']);
			setcookie("matricula", $row['matricula_fk']);
			setcookie("aut","prof_red");
		  }
		}
		  header('location:pag_inicio_profred.php');
		}else{
		echo "<script type='text/javascript'>alert('Usuário ou Senha Inválidos'); window.location='index.php'</script>";
	  }
}
?>