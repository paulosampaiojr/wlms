<?php

    include '../../../bootstrap.php';
    include PATH_CONEXAO_ADMIN;

    if ($_SESSION['tipologin'] != 'aluno') {
        // header('Location: ' . PATH . '/index.php');
        echo $_SESSION['tipologin'];
    }

    $sql = 'SELECT `aluno_id`, `aluno_nomecompleto` FROM `alunos` WHERE aluno_id = '. $_SESSION['aluno_id'];
    $alunoResult = mysqli_query($conn, $sql);
    $aluno = mysqli_fetch_array($alunoResult);
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
    <title>RELATÓRIOS - WEBACADEMY </title>
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
        
        .form-control {
            padding: 0 10px;
        }
        
        .content-relatorio {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
            width: 100%;
            resize: vertical;
            margin-top: 20px;
            height: 200px;
        }
        
        a.btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .relatorio-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            border: 1px solid currentColor;
            border-radius: 30px;
        }
        
        .criar-relatorio {
            margin-top: 30px;
        }
        
        .relatorio-item + .relatorio-item {
            margin-top: 20px;
        }
        
        .relatorio-item span {
            font-size: 15px;
            text-transform: uppercase;
        }
        
        .relatorio-item a {
            color: #54e;
            display: inline-block;
            padding: 5px;
        }
        
        .relatorio-item a + a {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <?php
        if(!empty($_SESSION['aluno_id'])){
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            
            <div class="content">
                <div class="container">
                    <?php include PATH_INCLUDES_ALUNO . '/menu-pages-aluno.php'; ?>
                    
                    <div class="row align-items-stretch no-gutters contact-wrap">
                        <div class="col-md-12">
                            <div class="form h-100">
                                <h3>RELATÓRIOS</h3>
                                
                                <?php
                                    $sql = "SELECT * FROM relatorio WHERE aluno_id = " . $aluno['aluno_id'];
                                    $relatorios_infos = mysqli_query($conn, $sql);
                                    
                                    $relatorios = [];
                                    while ($row=mysqli_fetch_array($relatorios_infos)) {
                                        array_push($relatorios, $row);
                                    }
                                    
                                    if ($relatorios) {
                                        foreach ($relatorios as $relatorio) {
                                            $mes = listar_nome_do_mes_em_pt(date('F', strtotime($relatorio['data'])));?>
                                            <div class="row relatorio-item">
                                                <span>Relatório do mês de <?=$mes?></span>
                                                <div>
                                                    <a href="<?=PATH.'/assets/'.$relatorio['relatorio_caminho']?>" download="relatorio_<?=$mes?>.docx">Baixar</a>
                                                    <a href="deletar-relatorio.php?relatorio_id=<?=$relatorio['relatorio_id']?>&aluno_id=<?=$relatorio['aluno_id']?>">Deletar</a>
                                                </div>
                                            </div>
                                        <?php }
                                    } else {
                                        echo '<p>Nenhum Relatório Criado.</p>';
                                    }
                                ?>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group criar-relatorio">
                                        <center><a href="formulario-relatorio.php" class="btn btn-primary rounded-0 py-2 px-4">Criar Relatório</a></center>
                                    </div>
                                </div>

                                <div id="form-message-success">
                                    CHECKIN REALIZADO COM SUCESSO!
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
    <?php } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>ÁREA RESTRITA REALIZE SEU LOGIN</div>";
            header("Location: ".PATH."/login.php"); 
        }
    ?>

    <script src="<?=PATH_PUBLIC?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/popper.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/bootstrap.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/jquery.validate.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/filter-by-student.js"></script>
  </body>
</html>