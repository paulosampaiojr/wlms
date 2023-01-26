<?php

    include '../../../bootstrap.php';
    include PATH_CONEXAO_ADMIN;

    if ($_SESSION['tipologin'] != 'tec') {
        header('Location: ' . PATH . '/index.php');
    }

    $sql = 'SELECT * FROM `alunos` WHERE `aluno_situacao_fk` <> 4';
    $alunoResult = mysqli_query($conn, $sql);
    
    $alunosLista = [];
    while ($aluno = mysqli_fetch_array($alunoResult)) {
        $alunosLista[] = $aluno;
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/style-horaslab-admin.css">
    <title>CHECKOUT - WEBACADEMY </title>
    <style>
        .relogiocheck{ font-size: 12px;}
        
        select {
            font-size: 18px;
            padding: 10px 15px;
            width: 100%;
            border-radius: 5px;
            border-color: #ddd;
        }
        
        input[type=checkbox] {
            display: inline-block;
        }
        
        label {
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        if(!empty($_SESSION['tec_id'])){
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            } ?>
            <div class="content">
                <div class="container">
                        <?php include PATH_INCLUDES_ADMIN . '/menu-pages-admin.php'; ?>
                        
                        <div class="row align-items-stretch no-gutters contact-wrap">
                            <div class="col-md-12">
                                <div class="form h-100">
                                    <h3>FORMULARIO DE PESQUISA</h3>

                                    <form class="mb-5" method="post" id="" name="contactForm" action="visualizar-informacoes-por-aluno.php">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">                                
                                                <select name="mesPesquisa">
                                                    <option value="03">Março</option>
                                                    <option value="04">Abril</option>
                                                    <option value="05">Maio</option>
                                                      <option value="06">Junho</option>
                                                        <option value="07">Julho</option>
                                                          <option value="08">Agosto</option>
                                                          <option value="09">Setembro</option>
                                                          <option value="10">Outubro</option>
                                                          <option value="11">Novembro</option>
                                                          <option value="12">Dezembro</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">                                
                                                <select name="alunoPesquisa" data-filter="input" disabled>
                                                    <?php foreach ($alunosLista as $aluno) { ?>
                                                        <option value="<?=$aluno['aluno_id']?>"><?=$aluno['aluno_nomecompleto']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">                                
                                                <input type="checkbox" name="filtrarAluno" value="filtrar" data-filter="checkbox"> <label>Filtrar Por Aluno</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                            <center><input type="submit" value="BUSCAR" class="btn btn-primary rounded-0 py-2 px-4"></center>
                                            <span class="submitting"></span>
                                            </div>
                                        </div>
                                    </form>

                                    <div id="form-message-warning mt-4"></div> 
                                    <div id="form-message-success">
                                        CHECKIN REALIZADO COM SUCESSO!
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
    <?php } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>ÁREA RESTRITA REALIZE SEU LOGIN</div>";
            header("Location: ../login.php"); 
        }
    ?>

    <script src="<?=PATH_PUBLIC?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/popper.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/bootstrap.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/jquery.validate.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/filter-by-student.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/main.js"></script>
  </body>
</html>