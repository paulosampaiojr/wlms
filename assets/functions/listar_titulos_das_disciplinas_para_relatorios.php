<?php

    function listar_titulos_das_disciplinas_para_relatorios($conn, $id, $turmaId) {
        $dataInicial = date('Y-m-01');
        $dataFinal = date('Y-m-t');

        $mes = date('m');

        $sql = "SELECT * FROM `chamadacomida` WHERE aluno_id = $id and lab_dataentrada LIKE '%2023-$mes-%' ORDER BY `lab_dataentrada`";
        $infos = mysqli_query($conn, $sql);

        $disciplinas_id = [];
        while ($row = mysqli_fetch_array($infos)) {
            array_push($disciplinas_id, $row['disciplina_id']);
        }

        $disciplinas_id = array_unique($disciplinas_id);

        $disciplinas = [];
        foreach ($disciplinas_id as $id) {
            $sql = "SELECT * FROM disciplina WHERE disciplina_id = $id";
            $infos = mysqli_query($conn, $sql);
            $info = mysqli_fetch_array($infos);

            if (substr($info['disciplina_fim'], 5, 2) <= $mes && substr($info['disciplina_inicio'], 5, 2) == $mes) {
                $tituloDisciplina = $info['nomedisciplina'] . ' (' . date('d/m/Y', strtotime($info['disciplina_inicio'])) . ' - ' . date('d/m/Y', strtotime($info['disciplina_fim'])) . ')';
            } else if (substr($info['disciplina_inicio'], 5, 2) != $mes) {
                $tituloDisciplina = $info['nomedisciplina'] . ' (' . date('d/m/Y', strtotime($dataInicial)) . ' - ' . date('d/m/Y', strtotime($info['disciplina_fim'])) . ')';
            } else {
                $tituloDisciplina = $info['nomedisciplina'] . ' (' . date('d/m/Y', strtotime($info['disciplina_inicio'])) . ' - ' . date('d/m/Y', strtotime($dataFinal)) . ')';
            }

            array_push($disciplinas, $tituloDisciplina);
        }

        return $disciplinas;
    }