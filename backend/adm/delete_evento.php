<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir o evento
    $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: admin_eventos;');
} else {
    die("ID do evento não especificado.");
}
?>

<a href="admin_eventos.php">Voltar para a lista de eventos</a>
