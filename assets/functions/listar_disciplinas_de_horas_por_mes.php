<?php 

    function listar_disciplinas_de_horas_por_mes($conn, $alunoID, $meses) {
        $sql = "SELECT * FROM disciplina ORDER BY disciplina_inicio DESC";
        $resut = mysqli_query($conn, $sql);

        $disciplinas = [];
        while ($row = mysqli_fetch_array($resut)) {
            array_push($disciplinas, $row);
        }

        $meses = array_reverse($meses);

        foreach ($meses as $mes) {
            $result_chamada = "SELECT * FROM chamadacomida WHERE aluno_id = $alunoID and lab_dataEntrada LIKE '%".$mes['mes_numeral']."-%' ORDER BY lab_dataEntrada DESC";
            $resultado_chamada = mysqli_query($conn, $result_chamada);
            
            if (mysqli_affected_rows($conn)) { ?>
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-12">
                        <div class="form h-100">
                            <h1>Mês de <?=$mes['mes_nome']?></h1>

                            <?php mostrar_informacoes_do_aluno($resultado_chamada, '17', '45'); ?>
                        </div> 
                    </div>
                </div>
            <?php }
        }
    }