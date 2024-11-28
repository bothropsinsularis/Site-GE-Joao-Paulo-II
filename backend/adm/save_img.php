<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=jpii', 'root', '');

$title = $_POST['title'];
$category = $_POST['category'];
$filename = $_FILES['image']['name'];
$filetmp = $_FILES['image']['tmp_name'];
$upload_dir = '../galeria/uploads/';
$upload_file = $upload_dir . basename($filename);

if (move_uploaded_file($filetmp, $upload_file)) {
    $stmt = $pdo->prepare("INSERT INTO images (title, filename, categoria, userid) VALUES (?, ?, ?,?)");
    $stmt->execute([$title, $filename, $category,$_SESSION['userid']]);
    header('Location: galeria_adm.php');
    exit();
} else {
    echo "Erro ao enviar o arquivo.";
}
?>
