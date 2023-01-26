<?php

  include '../../../bootstrap.php';
  
  include PATH_CONEXAO_ALUNO; 

  if ($_SESSION['tipologin'] != 'aluno') {
    header('Location: ' . PATH . '/index.php');
  }

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/style-horaslab-admin.css">
    <title>HORAS DE LAB - WEBACADEMY </title>
    
    <style>
      .relogiocheck{ font-size: 12px;}

      .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      .customers td, .customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      .customers tr:nth-child(even){background-color: #f2f2f2;}

      .customers tr:hover {background-color: #ddd;}

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
      if(!empty($_SESSION['aluno_id'])){
      
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }?>

        <div class="content horaslab">
          <div class="container">
              <?php include PATH_INCLUDES_ALUNO . '/menu-pages-aluno.php'; ?>
              <?php listar_disciplinas_de_horas_por_mes($conn, $_SESSION['aluno_id'], listar_meses_de_atuacao($conn)); ?>
            </div>
          </div>
        </div>
<?php 
  } else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>ÁREA RESTRITA REALIZE SEU LOGIN</div>";
    header("Location: ../login.php"); 
  }?>

    <script src="<?=PATH_PUBLIC?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/popper.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/bootstrap.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/<?=PATH_PUBLIC?>/js/jquery.validate.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/main.js"></script>

  </body>
</html>