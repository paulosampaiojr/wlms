<?php

    function listar_lista_de_faltas_postadas_e_pendentes($conn, $turma) {
        $listaDeDias = listar_dias_que_tiveram_aula($conn, $turma);

        $sql = "SELECT `aluno_id` FROM `alunos` WHERE `aluno_turma_fk` = $turma and `aluno_situacao_fk` <> 4 ORDER BY `aluno_id` ASC";
        $result = mysqli_query($conn, $sql);

        $listaDeAlunos = [];
        while ($row=mysqli_fetch_array($result)) {
            array_push($listaDeAlunos, $row['aluno_id']);
        }

        $sql = "SELECT `chamadacomida`.`aluno_id`, `lab_dataentrada` FROM `chamadacomida`, `alunos` WHERE `chamadacomida`.`aluno_turma_fk` = $turma and `alunos`.`aluno_situacao_fk` <> 4";
        $result = mysqli_query($conn, $sql);

        $listaChamada = [];
        while ($row=mysqli_fetch_array($result)) {
            array_push($listaChamada, [$row['aluno_id'], explode(' ', $row['lab_dataentrada'])[0]]);
        }

        $sql = "SELECT `aluno_id`, `data` FROM `chamadafalta` WHERE `turma_fk` = $turma";
        $result = mysqli_query($conn, $sql);

        $listaRegistradaFaltantes = [];
        while ($row=mysqli_fetch_array($result)) {
            array_push($listaRegistradaFaltantes, [$row['aluno_id'],$row['data']]);
        }

        $listaChamadaPorDias = [];
        foreach ($listaDeDias as $dia) {
            $temp = [];

            foreach ($listaChamada as $diaChamada) {
                if ($dia == $diaChamada[1]) {
                    array_push($temp, $diaChamada[0]);
                }
            }

            array_push($listaChamadaPorDias, $temp);
        }

        $listaFaltasRegistradasPorDias = [];
        foreach ($listaDeDias as $dia) {
            $temp = [];

            foreach ($listaRegistradaFaltantes as $diaFalta) {
                if ($dia == $diaFalta[1]) {
                    array_push($temp, $diaFalta[0]);
                }
            }
            
            if (count($temp) != 0) {
                array_multisort($temp);
                Array_unshift($temp, $dia);

                array_push($listaFaltasRegistradasPorDias, $temp);
            }
        }

        $listaChamadaFaltasPorDia = [];
        foreach ($listaChamadaPorDias as $key => $listaChamadaDia) {
            $temp = [$listaDeDias[$key]];
            foreach (array_diff($listaDeAlunos, $listaChamadaDia) as $alunoId) {
                array_push($temp, $alunoId);
            }

            array_push($listaChamadaFaltasPorDia, $temp);
        }
        
        $listaDeDiasPendentes = [];
        foreach ($listaChamadaFaltasPorDia as $chamadaFalta) {
            if (!in_array($chamadaFalta, $listaFaltasRegistradasPorDias) && count($chamadaFalta) > 1) {
                array_push($listaDeDiasPendentes, $chamadaFalta);
            }
        }

        return ['chamada_registrada' => $listaFaltasRegistradasPorDias, 'chamada_pendente' => $listaDeDiasPendentes];
    }