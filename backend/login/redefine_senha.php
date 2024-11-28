<?php

    include_once("../classes/conn.php");

    if($_POST['senha']==$_POST['senha2']){
        $sql= 'UPDATE tbl_usuarios SET senha="'.$_POST["senha"].'" WHERE id='.$_GET['id'];
        $res=$conn->query($sql);
        header('Location: login.php');
    }
    else{
        echo'as senhas não coincidem';
         header('Location: redef.php?id='.$_GET['id']);
    }