<?php

function mostrar_informacoes_do_aluno($informacao, $aulas, $hora) {
    $somahoralab = 0;
    $somapresenca = 0;
    $somahoralabaux = 0;
    $somahoralab = 0;

    ?> 

    <table class="customers">
        <tr>
            <th>NOME DO ALUNO</th>
            <th>HORÁRIO DE ENTRADA</th>
            <th>HORÁRIO DE SAÍDA</th>
            <th>HORAS DE LAB</th>
        </tr>

        <?php while ($informacao_aluno = $informacao->fetch_array()) { ?>

        <tr>
            <td><?=$informacao_aluno['aluno_nomecompleto']; ?></td>
            <td><?=gmdate('d/m/Y H:i:s', strtotime($informacao_aluno['lab_dataentrada']))?></td>
            <td><?=gmdate('d/m/Y H:i:s', strtotime($informacao_aluno['lab_datasaida']))?></td> 
            <td><?=gmdate('H:i:s', $informacao_aluno['QUANTIDADEDEHORAS'])?></td>    
            <?php
                $somahoralabaux = $informacao_aluno['QUANTIDADEDEHORAS'];
                $somahoralab = $somahoralab + $somahoralabaux;
            
                $somapresenca = 1 + $somapresenca;
                $disciplinaAulas = $aulas;
            ?>
        </tr>

        <?php } ?>
        
        <tr>
            <th>CARGA HORÁRIA DA DISCIPLINA</th>
            <th>TOTAL DE PRESENÇA</th>
            <th>RESTANTE DE AULAS</th>
            <th>TOTAL DE HORAS DE LAB</th>
        </tr>

        <tr>
            <td><?=$hora?></td>
            <td><?=$somapresenca?></td>
            <td><?=$aulas-$somapresenca?></td>
            <td><?=converter_segundos_em_horas($somahoralab)?></td>
        </tr>
    
    </table> 
<?php }?>