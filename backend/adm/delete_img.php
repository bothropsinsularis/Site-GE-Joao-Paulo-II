<?php

$pdo = new PDO('mysql:host=localhost;dbname=jpii', 'root', '');

$id = $_GET['id'];

// Obter o nome do arquivo
$stmt = $pdo->prepare("SELECT filename FROM images WHERE id = ?");
$stmt->execute([$id]);
$image = $stmt->fetch(PDO::FETCH_ASSOC);

if ($image) {
    $filename = $image['filename'];
    $file_path = 'uploads/' . $filename;

    // Excluir o arquivo do diretório
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Excluir o registro do banco de dados
    $stmt = $pdo->prepare("DELETE FROM images WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: galeria_adm.php');
?>

