<?php
    include '../../../bootstrap.php';
    include PATH_CONEXAO_ALUNO;

    $labdataentrada = $_POST['lab_dataentrada'];
	$labdatasaida = $_POST['lab_dataentrada'];
	$labdisciplinafk = $_SESSION['disciplina_id'];
	$labalunofk = $_POST['lab_aluno_fk'];

    if ($labalunofk != $_SESSION['aluno_id']) {
        header('Location: visualizar-checkin.php');
        $_SESSION['msg'] = "<div class='alert alert-danger'>OLHA A SAFADEZA!!!</div>";
        exit();
    }

	// echo $labdataentrada ."<br>";
	// echo $labdatasaida."<br>";
	// echo $labdisciplinafk."<br>";
	// echo $labalunofk."<br>";

    $Object = new DateTime(); 
    $Object->setTimezone(new DateTimeZone('America/Rio_Branco'));
    $DateAndTime = $Object->format("Y-m-d");
    $horario = $Object->format("H:i:s"); 

	if($horario < "13:00:00" OR $horario > "21:00:00"){
		$_SESSION['msg'] = "<div class='alert alert-danger'>LABORATÓRIO FECHADO IMPOSSÍVEL REALIZAÇÃO DE CHECKIN  </div>";
		header("Location: visualizar-checkin.php"); 
	} else{
        $checagem = "SELECT *  FROM `laboratorio` WHERE `lab_datasaida` LIKE '%$DateAndTime%' AND `lab_aluno_fk` = $labalunofk";
        $resultado_checagem = mysqli_query($conn, $checagem);
        $conta_lab = mysqli_num_rows($resultado_checagem);
        
        if($conta_lab == 0){
            $cad_lab = "INSERT INTO `laboratorio` (`lab_dataentrada`, `lab_datasaida`, `lab_disciplina_fk`, `lab_aluno_fk`, `lab_turma_fk`)
            VALUES ('$labdataentrada','$labdatasaida','$labdisciplinafk','$labalunofk', '".$_SESSION['aluno_turma']."')";
            
            $resultado_lab = mysqli_query($conn, $cad_lab);

            $_SESSION['msg'] = "<div class='alert alert-success'>CHECKIN REALIZADO COM SUCESSO </div>";
            header("Location: visualizar-checkin.php");   
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>JÁ EXISTE UM CHECKIN PARA ESSA DATA</div>";
            header("Location: visualizar-checkin.php");
        }
	}

		
