<?php
	include './bootstrap.php';
	$tipousuario = $_SESSION['tipologin'];
?>

<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<title>WEBACADEMY</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<link rel="stylesheet" href="public/css/style-home-page.css"/>
	<noscript><link rel="stylesheet" href="public/css/noscript.css"/></noscript>
</head>
<body class="is-preload">
	<div id="wrapper">
		<header id="header">
			<div class="inner">
				<a href="index.html" class="logo">
					<span class="symbol"><img src="public/images/logo.svg" alt="" /></span><span class="title">Phantom</span>
				</a>
			</div>
		</header>

		<div id="main">
			<div class="inner">
				<header>
					<?php
						if (!empty($_SESSION[$tipousuario.'_id'])){
							echo "Olá ".$_SESSION[$tipousuario.'_nomecompleto'].", Bem vindo <br>";
							echo "<a href='sair.php'>Sair</a>";
						} else {
							header("Location: login.php"); 
						}

						if (isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>
				</header>
				
				<section class="tiles">
					<article class="style1">
						<span class="image">
							<img src="public/images/pic01.jpg" alt="" />
						</span>
						<a href="<?=$tipousuario == 'tec' ? 'assets/pages/admin/visualizar-lista-de-faltas.php' : 'assets/pages/aluno/visualizar-checkin.php'?>">
							<h2><?=$tipousuario == 'tec' ? 'VISUALIZAR LISTA DE FALTAS' : 'CHECK-IN'?></h2>
							<div class="content">
								<p>FAÇA SEU CHECKIN CLICANDO AQUI</p>
							</div>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="public/images/pic02.jpg" alt="" />
						</span>
						<a href="<?=$tipousuario == 'tec' ? 'assets/pages/admin/visualizar-informacoes-dos-alunos-por-mes.php' : 'assets/pages/aluno/visualizar-checkout.php'?>">
							<h2><?=$tipousuario == 'tec' ? 'Analisar faltas do Mês' : 'CHECK-OUT'?></h2>
							<div class="content">
								<p>Analisar</p>
							</div>
						</a>
					</article>
					<article class="style3">
						<span class="image">
							<img src="public/images/pic03.jpg" alt="" />
						</span>
						<a href="<?=$tipousuario == 'tec' ? 'assets/pages/admin/formulario-informacoes-por-dia.php' : 'assets/pages/aluno/visualizar-horas-de-laboratorio.php'?>">
							<h2>HORAS DE LAB</h2>
							<div class="content">
								<p>HORAS DE LABORATÓRIO - SEPARADO POR MÊS</p>
							</div>
						</a>
					</article>
					<article class="style5">
						<span class="image">
							<img src="public/images/pic05.jpg" alt="" />
						</span>
						<a href="<?=$tipousuario == 'tec' ? 'assets/pages/admin/formulario-horas-do-mes.php' : 'assets/pages/aluno/visualizar-horas-por-disciplina.php'?>">
							<h2><?=$tipousuario == 'tec' ? 'Analisar total de horas por mês' : 'HORAS POR DISCIPLINA'?></h2>
							<div class="content">
								<p>HORAS POR DISCIPLINA</p>
							</div>
						</a>
					</article>
					<article class="style6">
						<span class="image">
							<img src="public/images/pic06.jpg" alt="" />
						</span>
						<a href="<?=$tipousuario == 'tec' ? '#' : 'assets/pages/aluno/visualizar-relatorios.php'?>">
							<h2><?=$tipousuario == 'tec' ? 'Vazio' : 'Relatório'?></h2>
							<div class="content">
								<p>VER LISTA DE RELATÓRIOS</p>
							</div>
						</a>
					</article>
					<article class="style2">
						<span class="image">
							<img src="public/images/pic07.jpg" alt="" />
						</span>
						<a href="<?=$tipousuario == 'tec' ? '#' : 'assets/pages/aluno/formulario-horas-do-mes.php'?>">
							<h2><?=$tipousuario == 'tec' ? 'Vazio' : 'Analisar total de horas por mês'?></h2>
							<div class="content">
								<p>FALE CONOSCO</p>
							</div>
						</a>
					</article>
				</section>
			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<section>
					<h2>ENTRE EM CONTATO</h2>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="field half">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<textarea name="message" id="message" placeholder="Message"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send" class="primary" /></li>
						</ul>
					</form>
				</section>
				<section>
					<h2>SIGA NOSSAS REDES SOCIAIS</h2>
					<ul class="icons">
						<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Telefone</span></a></li>
						<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
					</ul>
				</section>
				<ul class="copyright">
					<li>&copy; WEBACADEMY UFAC - TODOS OS DIREITOS RESERVADOS. </li><li>Design: <a href="http://webacademy.ufac.br/">WEBACADEMY UFAC</a></li>
				</ul>
			</div>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="public/js/jquery.min.js"></script>
	<script src="public/js/browser.min.js"></script>
	<script src="public/js/breakpoints.min.js"></script>
	<script src="public/js/util.js"></script>
	<script src="public/js/script-home.js"></script>
</body>
</html>