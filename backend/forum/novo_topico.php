<?php
    session_start();
    include_once '../classes/class_IRepositorioTopico.php';
    include_once '../classes/conn.php';

    $nome = $_POST['nome'];
    $body = $_POST['body'];
    $img = $_FILES['anexo'];
     

        $sql_add = "INSERT INTO topico (nome, body, data, anexos, userid) VALUES
                ('".$nome."',
                '".$body."',
                '".date('Y/m/d')."',
                '',
                ".$_SESSION['userid'].");";

            $res = $conn -> query($sql_add);
         header('Location:../../backend/forum/main.php');

   
    
    exit;