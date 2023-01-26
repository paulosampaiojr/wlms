<?php

    function mostrar_total_horas_por_mes_e_aluno($conn, $mes, $aluno_id) {
        $sql = "SELECT * FROM `chamadacomida` WHERE aluno_id = $aluno_id AND lab_dataentrada LIKE '$mes%' ORDER BY `chamadacomida`.`aluno_turma_fk` ASC";
        $alunoListaResult = mysqli_query($conn, $sql);
        
        $quantidadeHoraTotal = 0;
        $nomeAluno = mysqli_fetch_array($alunoListaResult)['aluno_nomecompleto'];
        while($alunoLinha=mysqli_fetch_array($alunoListaResult)) {
            $quantidadeHoraTotal += $alunoLinha['QUANTIDADEDEHORAS'];
        }
        
        $quantidadeHoraTotal = converter_segundos_em_horas($quantidadeHoraTotal);
        
        echo '<table class="customers"><tbody>';
        echo '<tr><th>ID</th><th>NOME ALUNO</th><th>HORAS DE LAB</th></tr><tr>';
        echo '<td>'.$aluno_id.'</td>';
        echo '<td>'.$nomeAluno.'</td>';
        echo '<td>'.$quantidadeHoraTotal.'</td>';
        echo '</tr></tbody></table>';
    }