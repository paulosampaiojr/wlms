<?php  
    function mostrar_faltas($informacao) {
        $somafalta = 0; ?>
        <table class="customers">
            <tr>
                <th>NOME DO ALUNO</th>
            </tr>
            <?php while ($informacao_aluno = $informacao->fetch_array()) { ?>
                <tr>
                    <td><?=$informacao_aluno['aluno_nomecompleto']; ?></td>            
                    <?php
                        $somafalta = 1 + $somafalta;
                    ?>
                </tr>
            <?php } ?>
            <tr>
                <th>TOTAL DE FALTANTES</th>
            </tr>
            <tr>
                <td><?=$somafalta?></td>
            </tr>
        </table>
<?php }  ?>