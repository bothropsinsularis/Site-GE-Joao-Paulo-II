<?php
session_start();
include_once '../classes/conn.php';

if (!isset($_SESSION['userid'])) {
    header('Location: ../../backend/login/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notificacao_id = (int)$_POST['notificacao_id'];
    $sql = "DELETE FROM notificacoes WHERE id = $notificacao_id AND userid = ".$_SESSION['userid'];

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir notificação: " . $conn->error;
    }
}
?>
