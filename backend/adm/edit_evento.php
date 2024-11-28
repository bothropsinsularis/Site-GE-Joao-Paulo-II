<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtém o evento para editar
    $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->execute([$id]);
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$event) {
        die("Evento não encontrado.");
    }
} else {
    die("ID do evento não especificado.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];

    $stmt = $pdo->prepare("UPDATE events SET title = ?, description = ?, event_date = ? WHERE id = ?");
    $stmt->execute([$title, $description, $event_date, $id]);

    echo "Evento atualizado com sucesso!";
    echo "<a href='admin_eventos.php'>Voltar</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
</head>
<body>
    <h1>Editar Evento</h1>
    <form method="post" action="">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required>
        
        <label for="description">Descrição:</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($event['description']); ?></textarea>
        
        <label for="event_date">Data do Evento:</label>
        <input type="date" id="event_date" name="event_date" value="<?php echo htmlspecialchars($event['event_date']); ?>" required>
        
        <button type="submit">Atualizar Evento</button>
    </form>
    <a href="admin_eventos.php">Voltar</a>
</body>
</html>
