<?php


    $servidor = "sql742.main-hosting.eu";
	$usuario = "u970734089_webacademy";
	$senha = "6/fWs:ahW=HS";
	$dbname = "u970734089_webacademy";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    $listaFinal = [];
    for ($i = 1; $i <= 12; $i++) {
        $dia = $i <= 9 ? '0' . $i : $i;
        $sql = "SELECT a.aluno_nomecompleto FROM alunos a WHERE a.aluno_turma_fk = 1 and a.aluno_situacao_fk != 4 and EXISTS (SELECT * FROM `chamadacomida` `c` where `c`.`lab_dataentrada` LIKE '%2022-08-$dia%' and `c`.`aluno_turma_fk` = 1 and `a`.`aluno_id` = `c`.`aluno_id`);";
        
        echo $sql;
        die();
        $values = mysqli_query($conn, $sql);
        
        $chamadaAluno = ["2022-08-$dia"];
        while($row = mysqli_fetch_array($values)) {
            array_push($chamadaAluno, $row);
        }

        array_push($listaFinal, $chamadaAluno);
    }
    
    $alunosD = ['ELIAS DE OLIVEIRA CACAU', 'BRUNO PATRICK NASCIMENTO DE SOUZA', 'ANDRIELLE DE LIMA BEZERRA', 'ALISSON MENDONÇA DE LIMA', 'KAUÃ GALVÃO DE MACEDO', 'CLEIR DE CASTRO E COSTA FILHO', 'EDSON CARLOS DE CAMPOS FILHO', 'FELIPE BEZERRA LIMA', 'LUCAS DE LIMA CHAVES', 'WENDEL LUCAS FIGUEIREDO DA SILVA', 'AILTON DE QUEIROZ CAVALCANTE', 'ALUÍZIO DOS SANTOS CATÃO NETO', 'CLEYCIANE FARIAS DE LIMA', 'PEDRO VICTOR MORAIS OLIVEIRA', 'RODRIGO DA SILVA BRITO'];
    
    foreach($listaFinal as $array) {
        foreach($array as $key => $aluno) {
            
            if (date('D', strtotime($array[0])) == 'Tue' or date('D', strtotime($array[0])) == 'Thu') {
                if ($key == 0) {
                    echo "<h1>$aluno</h1>";
                } else if (!in_array($aluno['aluno_nomecompleto'], $alunosD)) {
                    echo "<p>- ".$aluno['aluno_nomecompleto']."</p>";
                }
            } else {
                if ($key == 0) {
                    echo "<h1>$aluno</h1>";
                } else {
                    echo "<p>- ".$aluno['aluno_nomecompleto']."</p>";
                }
            }
            
        }
        
    }