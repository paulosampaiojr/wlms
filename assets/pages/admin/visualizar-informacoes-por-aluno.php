<?php
	include '../../../bootstrap.php';
	include PATH_CONEXAO_ADMIN;
	
	if ($_SESSION['tipologin'] != 'tec') {
        header('Location: ' . PATH . '/index.php');
    }
    
    $mes = $_POST['mesPesquisa'];
    $aluno_id = isset($_POST['alunoPesquisa']) != null ? $_POST['alunoPesquisa'] : '';
    $filtrar_aluno = isset($_POST['filtrarAluno']) != null ? $_POST['filtrarAluno'] : '';
    
    mostrar_total_de_faltas_dos_alunos($conn);
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

			<div class="row align-items-stretch no-gutters contact-wrap">
				<div class="col-md-12">
					<div class="form h-100">
						<h3>Total de Horas</h3>
					    <?php 
					    
					        if ($filtrar_aluno) {
					            mostrar_total_horas_por_mes_e_aluno($conn, $mes, $aluno_id);
					        } else {
					            mostrar_total_de_horas_por_mes($conn, $mes);
					        }
					    
					    ?>
					</div>
				</div>
			</div>
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