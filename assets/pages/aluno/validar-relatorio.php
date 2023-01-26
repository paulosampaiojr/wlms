<?php
    include '../../../bootstrap.php';
    include PATH_CONEXAO_ALUNO;
    
    if ($_SESSION['tipologin'] != 'aluno') {
        header('Location: ' . PATH . '/index.php');
    }
    
    $alunoId = $_POST['aluno_id'];
    
    $sql = "SELECT * FROM relatorio WHERE aluno_id = $alunoId AND data LIKE '%-".date('m')."-%'";
    
    if (!mysqli_fetch_array(mysqli_query($conn, $sql))) {
        $nome = $_POST['nomeAluno'];
        $mes = $_POST['mesAluno'];
        $titulos = $_POST['titulo'];
        $conteudos = $_POST['conteudo'];
        
        $template = new \PhpOffice\PhpWord\TemplateProcessor('relatorios/relatorio_modelo.docx');
        $template->setValue('nome', $nome);
        $template->setValue('mes', $mes);
        
        $conteudo_template = [];
        foreach ($titulos as $key => $titulo) {
            $temp = ['titulo' => $titulo, 'descricao' => $conteudos[$key]];
            array_push($conteudo_template, $temp);
        }
        
        // $caminho = md5(time()) . DIRECTORY_SEPARATOR . "relatorio_$nome"."_"."$mes.docx";
        $tmpName = 'relatorios' . DIRECTORY_SEPARATOR . md5(time() . $nome) . '.pdf';
        
        $sql = "SELECT aluno_id FROM alunos WHERE aluno_nomecompleto = '$nome'";
        $alunoId = mysqli_fetch_array(mysqli_query($conn, $sql))['aluno_id'];
        
        $sql = "INSERT INTO relatorio (`relatorio_caminho`, `data`, `aluno_nomecompleto`, `aluno_id`) VALUES ('$tmpName', '". date('Y-m-d h:i:s') ."', '$nome', $alunoId)";
        
        mysqli_query($conn, $sql);
        
        $template->cloneBlock('materias', 0, true, false, $conteudo_template);
        $template->saveAs($tmpName);
        
        $caminhoMove = pathinfo($tmpName);
        $caminhoFinalMove = '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'relatorios' . DIRECTORY_SEPARATOR . $caminhoMove['basename'];
        
        rename($tmpName, $caminhoFinalMove);
        $_SESSION['msg'] = "<div class='alert alert-success'>Relatório criado com sucesso!</div>";
        header('Location: ' . PAGE_ALUNO_VISUALIZAR_RELATORIOS);
    } else {
    	$_SESSION['msg'] = "<div class='alert alert-danger'>Relatório já existente!</div>";
        header('Location: ' . PAGE_ALUNO_VISUALIZAR_RELATORIOS);
        exit();
    }
    