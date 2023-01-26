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

		.falta-container {

		}

		.link {
			font-size: 18px;
			margin: 30px 0 0 0;
			display: block;
			padding: 10px;
			background: transparent;
			color: #252525;
			border: 1px solid #EFEFEF;
		}

		.link:hover {
			background: #EFEFEF;
		}

		.falta-container li {
			list-style: none;
		}
	</style>
</head>
<body>
	<?php
	
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	} ?>

	<div class="content horaslab">
		<div class="container wp-2">
			<?php include PATH_INCLUDES_ADMIN . '/menu-pages-admin.php'; ?>

			<form class="mb-5" method="post" id="" name="contactForm">
				<div class="row">
					<div class="col-md-12 form-group mb-3">                                
						<select name="turma" class="form-control">
							<option value="1">WEB 01</option>
							<option value="2">WEB 02</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 form-group">
					<center><input type="submit" value="SELECIONAR" class="btn btn-primary rounded-0 py-2 px-4"></center>
					<span class="submitting"></span>
					</div>
				</div>
			</form>

			<?php if (isset($_POST['turma'])) { ?>
				<?php mostrar_lista_de_faltas($conn, $_POST['turma']);?>
			<?php } else { ?>
				<span>SELECIONE UMA TURMA</span>
			<?php }?>
		</div>
	</div>

	<script src="<?=PATH_PUBLIC?>/js/toggle-table.js"></script> 

    <script src="<?=PATH_PUBLIC?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/popper.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/bootstrap.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/jquery.validate.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/main.js"></script>
</body>
</html>