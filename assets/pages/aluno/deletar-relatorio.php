<?php
    include '../../../bootstrap.php';
    include PATH_CONEXAO_ALUNO;
    
    if ($_SESSION['tipologin'] != 'aluno') {
        header('Location: ' . PATH . '/index.php');
    }
    
    $relatorio_id = $_GET['relatorio_id'];
    $aluno_id = $_GET['aluno_id'];
    
    $sql = "SELECT relatorio_caminho FROM relatorio WHERE relatorio_id = $relatorio_id";
    $caminho = '../../' . mysqli_fetch_array(mysqli_query($conn, $sql))['relatorio_caminho'];
    
    $sql = "DELETE FROM relatorio WHERE relatorio_id = $relatorio_id AND aluno_id = $aluno_id" ;
    mysqli_query($conn, $sql);
    
    unlink($caminho);
    
    $_SESSION['msg'] = "<div class='alert alert-success'>Relatório deletado com sucesso!</div>";
    header('Location: ' . PAGE_ALUNO_VISUALIZAR_RELATORIOS);