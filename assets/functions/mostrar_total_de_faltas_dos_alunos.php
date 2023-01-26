<?php
 
    function mostrar_total_de_faltas_dos_alunos($conn, $mes = null) {
        $mes = $mes != null ? $mes : Date('m');

        $sql = "SELECT `aluno_id` FROM alunos";
        $resultAlunosSql = mysqli_query($conn, $sql);
        
        $resultAlunos = [];
        while ($row = mysqli_fetch_array($resultAlunosSql)) {
            array_push($resultAlunos, $row);
        }
        
        $sql = "SELECT `chamada_id`, `aluno_id` FROM `chamadafalta` WHERE `data` LIKE '%2022-$mes-%'";
        $resultFaltasSql = mysqli_query($conn, $sql);
        
        $resultFaltas = [];
        while ($row = mysqli_fetch_array($resultFaltasSql)) {
            array_push($resultFaltas, $row);
        }
        
        $faltas = [];
        foreach ($resultAlunos as $aluno) {
            $totalFaltas = 0;
            
            foreach ($resultFaltas as $falta) {
                if ($falta['aluno_id'] == $aluno['aluno_id']) {
                    $totalFaltas++;
                }
            }
            
            array_push($faltas, ['aluno_id' => $aluno['aluno_id'], 'total_faltas' => $totalFaltas]);
        }
        
        return $faltas;
    }