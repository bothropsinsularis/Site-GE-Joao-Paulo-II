<?php

$pdo = new PDO('mysql:host=localhost;dbname=jpii', 'root', '');

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['desc'];
$qtd = $_POST['qtd'];
$preco = $_POST['preco'];   

if ($_FILES['image']['name']) {
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    $upload_dir = '../../frontend/public/imagens/produtos/';
    $upload_file = $upload_dir . basename($filename);

    if (move_uploaded_file($filetmp, $upload_file)) {
        $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, descricao = ?, estoque = ?, preco=?, foto=? WHERE id = ?");
        $stmt->execute([$title, $description, $qtd, $preco, $filename, $id]);
    } else {
        echo "Erro ao enviar o arquivo.";
        exit;
    }
} else {
    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, descricao = ?, estoque = ?, preco=?, foto=? WHERE id = ?");
    $stmt->execute([$title, $description, $qtd, $preco ,$id]);
}

header('Location: produtos_adm.php');
?>