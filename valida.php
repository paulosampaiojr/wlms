<?php
	include './bootstrap.php';
	include './assets/php/db/conexao.php';
	
	session_unset();

	$usuario = $_POST['email']; 
	$senha = md5($_POST['senha']);

	$tipousuario = $_POST['tipousuario'] == 'admin' ? 'tec' : 'aluno';
	$tabela = $_POST['tipousuario'] == 'admin' ? 'tecnicoslab' : 'alunos';

	$_SESSION['tipologin'] = $tipousuario;
	$result_usuario = "SELECT * FROM $tabela WHERE ".$tipousuario."_email='{$usuario}' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	
	if($resultado_usuario){
		$row_usuario = mysqli_fetch_assoc($resultado_usuario);
		if($senha == $row_usuario[$tipousuario.'_password']){
			$_SESSION[$tipousuario.'_id'] = $row_usuario[$tipousuario.'_id'];
			$_SESSION[$tipousuario.'_nomecompleto'] = $row_usuario[$tipousuario.'_nomecompleto'];
			$_SESSION[$tipousuario.'_email'] = $row_usuario[$tipousuario.'_email'];
			if ($tipousuario == 'aluno') {
				$_SESSION[$tipousuario.'_turma'] = $row_usuario['aluno_turma_fk'];
			}
			header("Location: index.php");  
		}else{
			$_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
			header("Location: login.php");
		}
	}