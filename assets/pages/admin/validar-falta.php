<?php
    include '../../../bootstrap.php';
    include PATH_CONEXAO_ADMIN;
	
    $listaFaltas = $_SESSION['listaFaltas'][$_GET['key']];

    $sql = "SELECT chamada_id, aluno_id FROM chamadafalta WHERE `data` = '".$listaFaltas[0]."'";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT `aluno_id`, `aluno_nomecompleto` FROM `alunos`";
    $result = mysqli_query($conn, $sql);

    $alunos = [];
    while ($aluno = mysqli_fetch_array($result)) {
        array_push($alunos, $aluno);
    }

    $sql = "SELECT * FROM `disciplina` WHERE disciplina_inicio <= '".$listaFaltas[0]."' AND disciplina_fim >= '".$listaFaltas[0]."'";
    $disciplina = mysqli_fetch_array(mysqli_query($conn, $sql));

    if (mysqli_num_rows($result)) {
        foreach ($listaFaltas as $key => $falta) {
            foreach ($alunos as $aluno) {
                if ($key != 0 && $falta == $aluno['aluno_id']) {
                    $sql = "INSERT INTO chamadafalta VALUES (null, $falta, '".$aluno['aluno_nomecompleto']."', ".$disciplina['disciplina_id'].", '".$listaFaltas[0]."', ".$_GET['turma'].")";
                    mysqli_query($conn, $sql);
                }
            }
        }

        $_SESSION['msg'] = "<div class='alert alert-success'>FALTAS REGISTRADAS COM SUCESSO!</div>";
        header('Location: visualizar-lista-de-faltas.php');
        exit();
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>FALHA AO REGISTRAR A LISTA DE FALTAS!</div>";
        header('Location: visualizar-lista-de-faltas.php');
        exit();
    }

    
