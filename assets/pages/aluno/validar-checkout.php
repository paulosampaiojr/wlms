<?php
    include '../../../bootstrap.php';
    include PATH_CONEXAO_ALUNO;

	//$labdataentrada = $_POST['lab_dataentrada'];
	$labdatasaida = $_POST['lab_datasaida'];
	$labdisciplinafk = $_SESSION['disciplina_id'];
	$labalunofk = $_POST['lab_aluno_fk'];

    if ($labalunofk != $_SESSION['aluno_id']) {
        header('Location: visualizar-checkin.php');
        $_SESSION['msg'] = "<div class='alert alert-danger'>OLHA A SAFADEZA!!!</div>";
        exit();
    }

	//echo $labdataentrada ."<br>";
	echo "LABORATÓRIO SAÍDA: ".$labdatasaida."<br>";
	echo "DISCIPLINA CÓDIGO: ".$labdisciplinafk."<br>";
	echo "DISCIPLINA CÓDIGO: ".$labalunofk."<br>";

    $Object = new DateTime(); 
    $Object->setTimezone(new DateTimeZone('America/Rio_Branco'));
    $DateAndTime = $Object->format("Y-m-d");
    $horario = $Object->format("H:i:s"); 
	$labclose = 0;

	echo "HORÁRIO ATUAL: ".$horario." ANTES DO IF <br>";

	if($horario < "15:00:00" OR $horario > "21:00:00"){
		$labclose = 1;
		echo "HORÁRIO ATUAL: ".$horario."<br>";
		$_SESSION['msg'] = "<div class='alert alert-danger'>LABORATÓRIO FECHADO IMPOSSÍVEL REALIZAÇÃO DE CHECKOUT </div>";
		header("Location: visualizar-checkout.php"); 
	} else {
        $checagem = "SELECT *  FROM `laboratorio` WHERE `lab_datasaida` LIKE '%$DateAndTime%' AND `lab_aluno_fk` = $labalunofk AND `lab_check_verifica` = 0";
        $resultado_checagem = mysqli_query($conn, $checagem);
        $conta_lab = mysqli_num_rows($resultado_checagem);
        echo "VERIFICADOR LAB: ".$conta_lab."<br>";
	
        while ($row_checagem = mysqli_fetch_assoc($resultado_checagem)){
            $labid = $row_checagem['lab_id'];
            echo $labid."<br>";
        }

        if($conta_lab == 1)	{
            $checklabstatus = 1;
            $cad_lab = "UPDATE `laboratorio` SET `lab_datasaida` = '$labdatasaida', `lab_check_verifica` = $checklabstatus  WHERE `lab_id` = $labid";
            $resultado_lab = mysqli_query($conn, $cad_lab);

            $_SESSION['msg'] = "<div class='alert alert-success'>CHECKOUT REALIZADO COM SUCESSO </div>";
            header("Location: visualizar-checkout.php");  	
        } else{
            echo "deumerda";	
            $_SESSION['msg'] = "<div class='alert alert-danger'>JÁ EXISTE UM CHECKOUT PARA ESSA DATA</div>";
            header("Location: visualizar-checkout.php");
        }
    }