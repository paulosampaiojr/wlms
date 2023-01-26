<?php
    include '../../../bootstrap.php';

    if ($_SESSION['tipologin'] != 'tec') {
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?=PATH_PUBLIC?>/css/style-horaslab-admin.css">
    <title>CHECKOUT - WEBACADEMY </title>
    <style>
        .relogiocheck{ font-size: 12px;}
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
                                    <h3>CHECKOUT</h3>

                                    <form class="mb-5" method="post" id="" name="contactForm" action="visualizar-informacoes-por-dia.php">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">                                
                                                <input type="date" class="form-control" name="lab_datasaida" id="lab_datasaida" placeholder="" value='' required>

                                                <select name="turma" class="form-control">
                                                    <option value="1">WEB 01</option>
                                                    <option value="2">WEB 02</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                            <center><input type="submit" value="GERAR RELATÓRIO" class="btn btn-primary rounded-0 py-2 px-4"></center>
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
    <script src="<?=PATH_PUBLIC?>/js/main.js"></script>
  </body>
</html>