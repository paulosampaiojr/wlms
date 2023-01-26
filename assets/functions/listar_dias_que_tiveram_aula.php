<?php

    function listar_dias_que_tiveram_aula($conn, $turma) {
        $sql = "SELECT `aluno_id`, `lab_dataentrada` FROM `chamadacomida` WHERE `aluno_turma_fk` = " . $turma;
        $resultChamada = mysqli_query($conn, $sql);

        $chamadaFinal = [];
        while($row = mysqli_fetch_array($resultChamada)) {
            array_push($chamadaFinal, $row);
        }

        $sql = "SELECT `aluno_id` FROM `alunos` WHERE `aluno_turma_fk` = " . $turma;
        $resultAluno = mysqli_query($conn, $sql);

        $chamadaAluno = [];
        while($row = mysqli_fetch_array($resultAluno)) {
            array_push($chamadaAluno, $row);
        }

        $datas = [];
        foreach ($chamadaFinal as $chamada) {
            array_push($datas, explode(' ', $chamada['lab_dataentrada'])[0]);
        }

        $datas = array_unique($datas);
        array_multisort($datas);

        return $datas;
    }

?>