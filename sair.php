<?php
    session_start();
    
    $tipousuario = $_SESSION['tipologin'];

    unset($_SESSION[$tipousuario.'_id'], $_SESSION[$tipousuario.'_nome'], $_SESSION[$tipousuario.'_email'], $_SESSION['tipologin']);

    $_SESSION['msg'] = "<div class='alert alert-success'>Deslogado com sucesso!</div>";
    header("Location: login.php");