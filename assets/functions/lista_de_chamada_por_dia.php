<?php

    function lista_de_chamada_por_dia($conn, $data, $turmaId) {
        $sql_faltantes = "SELECT * FROM chamadafalta, alunos WHERE `data` LIKE '%$data%' AND `turma_fk` = $turmaId and `alunos`.`aluno_situacao_fk` <> 4 and `chamadafalta`.`aluno_id` = `alunos`.`aluno_id` order by `chamadafalta`.`aluno_id` ASC";
        $sql_presentes = "SELECT * FROM chamadacomida, alunos WHERE lab_dataentrada LIKE '%$data%' AND `chamadacomida`.`aluno_turma_fk` = $turmaId and `alunos`.`aluno_situacao_fk` <> 4 and `chamadacomida`.`aluno_id` = `alunos`.`aluno_id` order by `chamadacomida`.`aluno_id` ASC";
        
        

        $faltantes = mysqli_query($conn, $sql_faltantes);
        $presentes = mysqli_query($conn, $sql_presentes);
 
        
        $faltantes_final = [];
        while ($faltante = $faltantes->fetch_array()) {
            array_push($faltantes_final, [$faltante['aluno_id'], $faltante['aluno_nomecompleto']]);
        }
        
        $presentes_final = [];
        while ($presente = $presentes->fetch_array()) {
            array_push($presentes_final, [$presente['aluno_id'], $presente['aluno_nomecompleto'], $presente['lab_dataentrada'], $presente['lab_datasaida'], $presente['QUANTIDADEDEHORAS']]);
        }
        
        return [
            'lista_faltantes' => $faltantes_final,
            'lista_presentes' => $presentes_final
        ];
    }