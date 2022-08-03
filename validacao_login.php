<?php
    session_start();
    if (isset($_SESSION) && empty($_SESSION)==false){
        
        $usuario_logado = $_SESSION['USER'];
        $id_usuario_logado = $_SESSION['ID'];
        $usuario_logado_SETOR = $_SESSION['SETOR'];
        $usuario_logado_REGIONAL = $_SESSION['REGIONAL'];
        $usuario_logado_ATUACAO = $_SESSION['ATUACAO'];
    }else{
        header("Location: login.php");
    }
?>