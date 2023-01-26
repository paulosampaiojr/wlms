<?php

    function mostrar_lista_de_faltas($conn, $turma) {
        $listasDeFaltas = listar_lista_de_faltas_postadas_e_pendentes($conn, $turma)['chamada_pendente'];


        $sql = "SELECT `aluno_id`, `aluno_nomecompleto` FROM `alunos` 
        WHERE `aluno_turma_fk` = $turma  and `aluno_situacao_fk` <> 4";
        
        $result = mysqli_query($conn, $sql);

        $alunos = [];
        while ($aluno = mysqli_fetch_array($result)) {
            array_push($alunos, $aluno);
        }

        $_SESSION['listaFaltas'] = $listasDeFaltas;

        if ($listasDeFaltas) {
            foreach ($listasDeFaltas as $key => $diaFalta) {
                    echo 
                    '<div class="falta-container">
                        <a href="validar-falta.php?key='.$key.'&turma='.$turma.'" class="link">GERAR FALTAS PENDENTES - '. $diaFalta[0].'</a>
                        <table class="customers"><tbody><tr><th>ID</th><th>NOME</th></tr>';
                            foreach ($diaFalta as $key => $idFaltas) {
                                if ($key == 0) continue;

                                foreach ($alunos as $aluno) {
                                    if ($aluno['aluno_id'] == $idFaltas) {
                                        echo '<tr><td>'.$aluno['aluno_id'] . '</td><td>' .$aluno['aluno_nomecompleto'].'</td></tr>';
                                        break;
                                    }
                                }
                            }
                    echo '</tbody></table>
                    </div>';
            }
        } else {
            echo '<p>Nenhuma Falta Pendente</p>';
        }
    }