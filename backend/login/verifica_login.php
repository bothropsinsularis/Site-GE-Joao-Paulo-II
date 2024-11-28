<?php

include_once '../../backend/classes/class_IRepositorioUsuarios.php';
// if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    // echo $_POST['email'].$_POST['senha'];
    $user = new usuario('','',$_POST['email'],$_POST['senha'],'',0 ,0,'',0);
    $check = (new RepositorioUsuarioMYSQL)->verificaUsuario($user);

    print_r($check);
    if($check[0] == true){
        session_start();

        // session_name('s1');
        $_SESSION['on'] = true;

        $_SESSION['userid'] = $check[1]['id'];
        $_SESSION['nome'] = $check[1]['nome'];
        $_SESSION['email'] = $check[1]['email'];
        $_SESSION['descricao'] = $check[1]['descricao'];
        $_SESSION['senha'] = $check[1]['senha'];
        $_SESSION['foto'] = $check[1]['foto'];
        $_SESSION['tipo'] = $check[1]['tipo'];
        $_SESSION['cart'] = [];
        $_SESSION['saldo']= $check[1]['saldo'];
        // $_SESSION['pic'] = '.';
        // echo $_SESSION['nome'];
        if($_SESSION['tipo'] != 0 ){
        header('Location: ../../frontend/principal/index.php');
        }
        else{
            header('Location: ../../backend/adm/index_adm.php');
        }
    }
else{
    header('Location: login.php');
    }   

