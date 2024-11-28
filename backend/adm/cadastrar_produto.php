<?php
    session_start();
    include_once '../classes/conn.php';
    include_once '../classes/class_IRepositorioImagens.php';
    $nome = $_POST['nome'];
    $body = $_POST['body'];
    $qtd = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $caminho = "../../frontend/public/imagens/produtos/";
    $foto = (new RepositorioImagemMYSQL)->adicionar_imagem($_FILES['foto'],$caminho);
    

    echo'<br><br>';
        $sql_add = "INSERT INTO produtos (nome, descricao, quantidade, estoque, preco, foto, userid) VALUES
                ('".$nome."',
                '".$body."',
                1,
                '".$qtd."',
                '".$preco."',
                '".$foto."',
                ".$_SESSION['userid'].");";

            $res = $conn -> query($sql_add);
            header("Location: produtos_adm.php");