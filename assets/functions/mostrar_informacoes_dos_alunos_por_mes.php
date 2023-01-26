<?php

    function mostrar_informacoes_dos_alunos_por_mes($conn, $dataInicio, $dataFim, $turmaId) {
        $diaInicio = explode('-', $dataInicio)[2];
        $diaFim = explode('-', $dataFim)[2];
        
        $presentesListaDiaFinal = [];
        for ($i = $diaFim; $i >= $diaInicio; $i--) {
            $dataAtual = substr($dataInicio, 0, 7) . '-' . (strlen($i) == 1 ? '0' . $i : $i);
            $presentesListaDia = lista_de_chamada_por_dia($conn, $dataAtual, $turmaId);

            $databr = date('d/m/Y', strtotime($dataAtual));

            if ($presentesListaDia['lista_presentes']) {
                echo '<h1 data-toggle="button" data-toggle-idbutton="'.$dataAtual.'">Lista da data - '.$databr.'</h1>';
                
                echo '<div class="table-container" data-toggle="table-container" data-toggle-id="'.$dataAtual.'">';
                    echo '<table class="customers"><h2>PRESENTES: </h2><tbody>';
                    echo '<tr><th>ID</th><th>NOME</th><th>HÓRARIO DE ENTRADA</th><th>HÓRARIO DE SAÍDA</th><th>HORAS DE LAB</th></tr>';
                    foreach ($presentesListaDia['lista_presentes'] as $key => $presentes) { ?>
        
                        <tr>
                            <td><?=$presentes[0]?></td>
                            <td><?=$presentes[1]?></td>
                            <td><?=$presentes[2]?></td>
                            <td><?=$presentes[3]?></td>
                            <td><?=converter_segundos_em_horas($presentes[4])?></td>
                        </tr>
                        
                    <?php }
                    echo '</tbody></table>';
                    
                    if ($presentesListaDia['lista_faltantes']) {
                        
                    
                    
                        echo '<table class="customers"><h2>FALTANTES: </h2><tbody>';
                        echo '<tr><th>ID</th><th>NOME</th></tr>';
                        foreach ($presentesListaDia['lista_faltantes'] as $faltantes) { ?>
                                <tr>
                                    <td><?=$faltantes[0]?></td>
                                    <td><?=$faltantes[1]?></td>
                                </tr>
                        <?php }
                        echo '</tbody></table>';
                    } else {
                        echo '<h3>Nenhum aluno faltou nesse dia.</h3>';
                    }
                    
                    echo '</div>';
            }
        }
    }