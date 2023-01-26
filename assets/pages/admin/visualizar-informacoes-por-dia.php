<?php
	include '../../../bootstrap.php';
	include PATH_CONEXAO_ADMIN;
	
	if ($_SESSION['tipologin'] != 'tec') {
        header('Location: ' . PATH . '/index.php');
    }
?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?=PATH_PUBLIC?>/fonts/icomoon/style.css">
	<link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/style-horaslab-admin.css">
	<title>HORAS DE LAB - WEBACADEMY </title>

	<style>
		.relogiocheck {
			font-size: 12px;
		}

		.customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		.customers td,
		.customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		.customers tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.customers tr:hover {
			background-color: #ddd;
		}

		.customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #04AA6D;
			color: white;
		}

		.horaslab h1 {
			margin-top: 30px;
		}
	</style>
</head>

<body>
	<?php
		$labdatasaida = $_POST['lab_datasaida'];
	?>

	<div class="content horaslab">
		<div class="container">
			<?php include PATH_INCLUDES_ADMIN . '/menu-pages-admin.php'; ?>

			<div class="row align-items-stretch no-gutters contact-wrap">
				<div class="col-md-12">
					<div class="form h-100">
						<h3>HORAS DE LAB</h3>
						<h1>LISTA DE PRESENTE DO DIA <?php echo $labdatasaida; ?></h1>

						<?php

						$result_chamada = "SELECT * FROM `chamadacomida` where `lab_datasaida` LIKE '%$labdatasaida%' AND `aluno_turma_fk` = ".$_POST['turma']." ORDER BY aluno_id asc";
						$resultado_chamada = mysqli_query($conn, $result_chamada);
						?>

						<?php mostrar_faltas($resultado_chamada); ?>

						<h1>LISTA DE FALTANTES <?php echo $labdatasaida; ?></h1>

						<?php
						$result_falta = "SELECT * FROM chamadafalta where `data` LIKE '%$labdatasaida%' AND `lab_turma_fk` = ".$_POST['turma']." ORDER BY aluno_nomecompleto asc";
						$resultado_falta = mysqli_query($conn, $result_falta);
						?>

						<?php mostrar_faltas($resultado_falta); ?>
					</div>
				</div>
			</div>
		</div>
	</div>


    <script src="<?=PATH_PUBLIC?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/popper.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/bootstrap.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/jquery.validate.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/main.js"></script>
</body>
</html>