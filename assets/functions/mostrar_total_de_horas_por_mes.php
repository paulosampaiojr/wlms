<?php

    function mostrar_total_de_horas_por_mes($conn, $mes, $turma_id = null) {
        $sqlAlunos = "SELECT * FROM alunos";
        $sql = "SELECT `aluno_id`, `QUANTIDADEDEHORAS` FROM `chamadacomida` WHERE lab_dataentrada LIKE '$mes%' ORDER BY `chamadacomida`.`aluno_turma_fk`";
        
        if ($turma_id) {
            $sqlAlunos = "SELECT * FROM alunos WHERE aluno_turma_fk = '$turma_id'";
            $sql = "SELECT `aluno_id`, `QUANTIDADEDEHORAS` FROM `chamadacomida` WHERE lab_dataentrada LIKE '$mes%' AND aluno_turma_fk = '$turma_id'";
        }
        
        $alunosResult = mysqli_query($conn, $sqlAlunos);
        $alunoResultChamada = mysqli_query($conn, $sql);
        
        $alunosChamada = [];
        while ($linha=mysqli_fetch_array($alunoResultChamada)) {
            array_push($alunosChamada, ['aluno_id' => $linha['aluno_id'], 'qnt_horas' => $linha['QUANTIDADEDEHORAS']]);
        }
        
        $infos = [];
        while ($aluno=mysqli_fetch_array($alunosResult)) {
            $alunoId = $aluno['aluno_id'];
            
            $horasTotal = 0;
            foreach ($alunosChamada as $alunoChamada) {
                if ($alunoChamada['aluno_id'] == $alunoId) {
                    $horasTotal += $alunoChamada['qnt_horas'];
                }
            }
            
            array_push($infos, [
                'id' => $aluno['aluno_id'],
                'nome' => $aluno['aluno_nomecompleto'],
                'horas_total' => $horasTotal 
            ]);
        }
        
        $totalFaltas = 0;
        
        echo '<table class="customers"><tbody>';
        echo '<tr><th>ID</th><th>NOME</th><th>HORAS DE LAB</th><th>TOTAL DE FALTAS DO MÊS</th></tr><tr>';
        foreach ($infos as $aluno) { 
        
        $faltasLista = mostrar_total_de_faltas_dos_alunos($conn, $mes);
        foreach ($faltasLista as $faltas) {
            if ($faltas['aluno_id'] == $aluno['id']) {
                $totalFaltas = $faltas['total_faltas'];
            }
        }
        
        ?>
            <tr>
                <td><?=$aluno['id']?></td>
                <td><?=$aluno['nome']?></td>
                <td><?=converter_segundos_em_horas($aluno['horas_total'])?></td>
                <td><?=$totalFaltas?></td>
            </tr>
        <?php }
        echo '</tr></tbody></table>';
        
    }