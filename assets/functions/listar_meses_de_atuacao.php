<?php

    function listar_meses_de_atuacao($conn, $turma_id = null) {
        $sql_datainicial = "SELECT MIN(`d`.`disciplina_inicio`) AS `data_inicial` FROM disciplina d";
        $sql_datafinal = "SELECT MAX(`d`.`disciplina_fim`) AS `data_fim` FROM disciplina d";
        
        if ($turma_id) {       
            $sql_datainicial = "SELECT MIN(`d`.`disciplina_inicio`) AS `data_inicial` FROM disciplina d WHERE `d`.`disciplina_turma_fk` = $turma_id";
            $sql_datafinal = "SELECT MAX(`d`.`disciplina_fim`) AS `data_fim` FROM disciplina d WHERE `d`.`disciplina_turma_fk` = $turma_id";
        }

        $data_inicial = date_create(mysqli_fetch_array(mysqli_query($conn, $sql_datainicial))[0]);
        $data_datafinal = date_create(mysqli_fetch_array(mysqli_query($conn, $sql_datafinal))[0]);

        $interval = DateInterval::createFromDateString('1 month');
        $periodo = new DatePeriod($data_inicial, $interval ,$data_datafinal);

        $intervaloDeMeses = [];

        foreach ($periodo as $mes) {
            array_push($intervaloDeMeses, ['mes_nome' =>  listar_nome_do_mes_em_pt($mes->format('M')) . ' de ' . $mes->format('Y'), 'mes_numeral' => $mes->format('Y-m')]);
        }

        return $intervaloDeMeses;
    }