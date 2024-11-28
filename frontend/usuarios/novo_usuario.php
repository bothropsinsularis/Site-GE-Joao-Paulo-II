<?php

    include_once '../../backend/classes/class_IRepositorioUsuarios.php';
    if($_POST['nome'] && $_POST['email'] && $_POST['senha']){
    $usuarioNovo = new usuario('',$_POST['nome'],$_POST['email'],$_POST['senha'],'',0,0,'0d6fa876e92a41943c5f0900f964d5dc.png',0);

    $respositorioUsuario->cadastrarUsuario($usuarioNovo);
    }
    header('Location:../../backend/login/login.php');
    
    exit;

?>