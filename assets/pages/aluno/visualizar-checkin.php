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

    <title>CHECKIN - WEBACADEMY </title>
    <style>
        .relogiocheck{ font-size: 12px;}
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
                                    <h3>CHECKIN</h3>

                                    <form class="mb-5" method="post" id="" name="contactForm" action="validar-checkin.php">
                                        <div class="row">
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="" class="col-form-label">SEU ID</label>
                                                <input type="text" class="form-control" name="lab_aluno_fk" id="lab_aluno_fk" placeholder="" readonly="true" value='<?php echo $_SESSION['aluno_id']?>'>
                                            </div>
                                            <div class="col-md-6 form-group mb-3">
                                                <label for="" class="col-form-label">NOME COMPLETO</label>
                                                <input type="text" class="form-control" name="aluno_nomecompleto" id="aluno_nomecompleto" readonly="true"  placeholder="" value='<?php echo $_SESSION['aluno_nomecompleto']?>'>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="budget" class="col-form-label">HORÁRIO DE ENTRADA</label>
                                                <?php
                                                    $Object = new DateTime(); 
                                                    $Object->setTimezone(new DateTimeZone('America/Rio_Branco'));
                                                    $DateAndTime = $Object->format("Y-m-d H:i:s");
                                                    $horario = $Object->format("d/m/Y H:i:s");   
                                                    echo "<p class='relogiocheck'> NESTE MOMENTO: $horario.</p>";
                                                ?>
                                                <input type="text" class="form-control" name="lab_dataentrada" id="lab_dataentrada" readonly="true"  placeholder="" value='<?php echo $DateAndTime ?>'>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <label for="" class="col-form-label">DISCIPLINA</label>
                                                <?php
                                                    $result_usuario = "SELECT * FROM `disciplina` WHERE disciplina_inicio <= '" . $Object->format('Y-m-d') . "' AND disciplina_fim >= '" . $Object->format('Y-m-d') . "' AND disciplina_turma_fk = ". $_SESSION['aluno_turma'];
                                                    $resultado_usuario = mysqli_query($conn, $result_usuario);
                                                    
                                                    if($resultado_usuario){
                                                        $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                                                        $disciplinanome = $row_usuario['nomedisciplina'];
                                                        $_SESSION['disciplina_id'] = $row_usuario['disciplina_id'];
                                                    }
                                                ?>
                                                <input type="text" class="form-control" name="lab_disciplina_fk" id="lab_disciplina_fk" readonly="true"  value="<?php echo $disciplinanome ?>" >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <center> <input type="submit" value="FAZER CHECK-IN" class="btn btn-primary rounded-0 py-2 px-4"> </center>
                                                <span class="submitting"></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="form-message-warning mt-4"></div> 
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
        header("Location: ".PATH_PAGES."/login.php"); 
    } ?>

    <script src="<?=PATH_PUBLIC?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/popper.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/bootstrap.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/jquery.validate.min.js"></script>
    <script src="<?=PATH_PUBLIC?>/js/main.js"></script>

  </body>
</html>