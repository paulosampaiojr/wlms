<?php

    define("PATH", 'https://projetowebacademy.online/labcheck/');
    define("PATH_PUBLIC", PATH . '/public');
    define("PATH_PAGES", PATH);
    define("PATH_ASSETS", PATH . '/assets');

    define("PATH_CONEXAO_ADMIN", '../../php/db/conexao.php');
    define("PATH_ASSETS_ADMIN", '../../../assets');
    define("PATH_INCLUDES_ADMIN", PATH_ASSETS_ADMIN . '/includes');
    
    define("PATH_CONEXAO_ALUNO", '../../php/db/conexao.php');
    define("PATH_ASSETS_ALUNO", '../../../assets');
    define("PATH_INCLUDES_ALUNO", PATH_ASSETS_ALUNO . '/includes');
    // caminho de paginas direto do diretorio aluno

        // #### VISUALIZAR ####
        define("PAGE_ALUNO_VISUALIZAR_CHECKIN", "visualizar-checkin.php");
        define("PAGE_ALUNO_VISUALIZAR_CHECKOUT", "visualizar-checkout.php");
        define("PAGE_ALUNO_VISUALIZAR_RELATORIOS", "visualizar-relatorios.php");
        define("PAGE_ALUNO_VISUALIZAR_HORAS_POR_DISCIPLINAS", "visualizar-horas-por-disciplinas.php");
        define("PAGE_ALUNO_VISUALIZAR_HORAS_DO_MES", "visualizar-horas-do-mes.php");
        define("PAGE_ALUNO_VISUALIZAR_HORAS_DE_LABORATORIO", "visualizar-horas-de-laboratorio.php");
        // #### VALIDAR ####
        define("PAGE_ALUNO_VALIDAR_RELATORIO", "validar-relatorio.php");
        define("PAGE_ALUNO_VALIDAR_CHECKIN", "validar-checkin.php");
        define("PAGE_ALUNO_VALIDAR_CHECKOUT", "validar-checkout.php");
        //  ### DELETAR ### 
        define("PAGE_ALUNO_DELETAR_RELATORIO", "deletar-relatorio.php");
        // ### FORMULARIO ###
        define("PAGE_ALUNO_FORMULARIO_HORAS_DO_MES", "formulario-horas-do-mes.php");
        define("PAGE_ALUNO_FORMULARIO_RELATORIO", "formulario-relatorio.php");
?>