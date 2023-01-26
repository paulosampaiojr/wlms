<?php

    function listar_disciplinas_de_horas_por_disciplinas($conn, $alunoID) {
        $sql = "SELECT * FROM disciplina ORDER BY disciplina_inicio DESC";
        $resut = mysqli_query($conn, $sql);

        $disciplinas = [];
        while ($row = mysqli_fetch_array($resut)) {
            array_push($disciplinas, $row);
        }

        foreach ($disciplinas as $disciplina) {
            $result_chamada = "SELECT * FROM chamadacomida WHERE aluno_id = $alunoID and disciplina_id = ".$disciplina['disciplina_id']." ORDER BY lab_dataEntrada DESC";
            $resultado_chamada = mysqli_query($conn, $result_chamada); 
            
            if (mysqli_affected_rows($conn)) { ?>
                <h1><?=$disciplina['nomedisciplina']?></h1>

                <?php mostrar_informacoes_do_aluno($resultado_chamada, $disciplina['quantidade_aula'], $disciplina['carga']); ?>
            <?php }
        }
    }