<?php

$pdo = new PDO('mysql:host=localhost;dbname=jpii', 'root', '');

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];

if ($_FILES['image']['name']) {
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    $upload_dir = '../galeria/uploads/';
    $upload_file = $upload_dir . basename($filename);

    if (move_uploaded_file($filetmp, $upload_file)) {
        $stmt = $pdo->prepare("UPDATE images SET title = ?, filename = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $filename, $description, $id]);
    } else {
        echo "Erro ao enviar o arquivo.";
        exit;
    }
} else {
    $stmt = $pdo->prepare("UPDATE images SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);
}

header('Location: galeria_adm.php');
?>
