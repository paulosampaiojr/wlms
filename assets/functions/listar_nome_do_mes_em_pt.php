<?php
    function listar_nome_do_mes_em_pt($mes) {
        $mesesPT = ['January' => 'Janeiro', 'February' => 'Fevereiro', 'March' => 'Março', 'April' => 'Abril', 'May' => 'Maio', 'June' => 'Junho', 'July' => 'Julho', 'August' => 'Agosto', 'September' => 'Setembro', 'October' => 'Outubro', 'November' => 'Novembro', 'December' => 'Dezembro'
                    , 'Jan' => 'Janeiro', 'Feb' => 'Fevereiro', 'Mar' => 'Março', 'Apr' => 'Abril', 'May' => 'Maio', 'Jun' => 'Junho', 'Jul' => 'Julho', 'Aug' => 'Agosto', 'Sep' => 'Setembro', 'Oct' => 'Outubro', 'Nov' => 'Novembro', 'Dec' => 'Dezembro'];
        return $mesesPT[$mes];
    }