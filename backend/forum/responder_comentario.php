<?php
session_start();
include_once '../classes/conn.php';

if (!isset($_SESSION['on'])) {
    $_SESSION['msg'] = 'Não está logado';
    header('Location: ../../backend/login/login.php');
    exit;
}

$userid = $_SESSION['userid'];
$comentario_id = $_POST['comentario_id'];
$resposta = $_POST['resposta'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($resposta)) {
    $sql = "INSERT INTO respostas (comentario_id, usuario_id, resposta) VALUES ('$comentario_id', '$userid', '$resposta')";
    if ($conn->query($sql) === TRUE) {
        // Criar notificação
        $sql_notificacao = "INSERT INTO notificacoes (userid, tipo, item_id, mensagem) 
                            VALUES ((SELECT userid FROM comentarios WHERE id = $comentario_id), 'resposta', '$comentario_id', 'Você recebeu uma resposta!')";
        $conn->query($sql_notificacao);
        
        header("Location: topico.php?id=" . (int)$_POST['post_id']);
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

