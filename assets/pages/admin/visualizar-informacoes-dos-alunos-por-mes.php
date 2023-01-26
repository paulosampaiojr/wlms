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
	<title>ANALISAR DIAS MÊS - WEBACADEMY </title>

	<style>
		.relogiocheck {
			font-size: 12px;
		}

		.customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			margin-left: 20px;
			margin-bottom: 20px; 
		}
		
		.table-container h2 {
		    margin-top: 20px;
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
			margin-top: 0px;
			margin-bottom: 0px;
		}
		
		h1[data-toggle="button"] {
		    padding: 20px 40px 20px 20px;
		    background: #efefef;
		    cursor: pointer;
		    border-bottom: 1px solid #ddd;
		    display: flex;
		    align-items: center;
		    justify-content: space-between;
		}
		
		h1[data-toggle="button"]::after {
		    font-size: 20px;
		    content: '▼';
		}
		
		h1[data-toggle="button"].ativo::after {
		    content: '▲';
		}
		
		.table-container {
		    height: 0;
		    overflow: hidden;
		}
		
		.table-container.ativo {
		    height: auto;
		}
		
		h1.titulo-mes {
		    background: #04AA6D;
		    margin-top: 20px;
		    padding: 20px;
		    color: #fff;
		}
	</style>
</head>
<?php 
$Object = new DateTime();
$Object->setTimezone(new DateTimeZone('America/Rio_Branco'));
$DateAndTime = $Object->format("Y-m-d");
//$horario = $Object->format("d/m/Y H:i:s");   

?>
<body>
	<div class="content horaslab">
		<div class="container">
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

			<?php
			if (isset($_POST['turma'])) { ?>
				<?php if ($_POST['turma'] == 1) { ?>
					<div class="row align-items-stretch no-gutters contact-wrap">
						<div class="col-md-12">
							<div class="form h-100">
							    
							    
							    
							    	<h3>Lista de Dias</h3>
							    	
								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE OUTUBRO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-10-01', '2022-10-31', '1');?>
								<br>
								<br>
								<br>
							    
							    	<h3>Lista de Dias</h3>
								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE SETEMBRO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-09-01', '2022-09-30', '1');?>
								<br>
								<br>
								<br>
								<h3>Lista de Dias</h3>
								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE AGOSTO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-08-01', '2022-08-31', '1');?>
								<br>
								<br>
								<br>

								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE JULHO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-07-01', '2022-07-31', '1');?>
								<br>
								<br>
								<br>

								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE JUNHO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-06-01', '2022-06-30', '1');?>
								<br>
								<br>
								<br>

								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE MAIO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-05-01', '2022-05-31', '1');?>
								<br>
								<br>
								<br>
								
								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE ABRIL</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-04-01', '2022-04-30', '1');?>
								
								<br>
								<br>
								<br>
								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE MARÇO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-03-09', '2022-03-31', '1');?>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="row align-items-stretch no-gutters contact-wrap">
						<div class="col-md-12">
							<div class="form h-100">
							    
							    	
							    	  
							    		<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE DEZEMBRO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-12-01', '2022-12-31', '2');?>
								<br>
								<br>
								<br>
								
							    	
							    	
							    		<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE NOVEMBRO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-11-01', '2022-11-30', '2');?>
								<br>
								<br>
								<br>
								
								
							    		<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE OUTUBRO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-10-01', '2022-10-31', '2');?>
								<br>
								<br>
								<br>
							    
							    <h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE SETEMBRO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-09-01', '2022-09-30', '2');?>
								<br>
								<br>
								<br>
								<h3>Lista de Dias</h3>
								<h1 class="titulo-mes">LISTA DE DIAS DO MÊS DE AGOSTO</h1>
								<?php mostrar_informacoes_dos_alunos_por_mes($conn, '2022-08-01', '2022-08-31', '2');?>
								<br>
								<br>
								<br>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } else { ?>
				<span>ESCOLHA UMA TURMA</span>
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