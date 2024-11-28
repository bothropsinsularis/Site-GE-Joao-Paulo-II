<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir o evento
    $stmt = $pdo->prepare("DELETE FROM topico WHERE id = ?");
    $stmt->execute([$id]);

    echo "Evento excluído com sucesso!";
    header('Location: topicos_adm.php');
}