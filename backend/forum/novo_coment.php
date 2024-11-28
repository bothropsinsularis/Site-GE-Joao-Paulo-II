<?php
session_start();
include_once '../classes/conn.php';

if (!isset($_SESSION['on'])) {
    $_SESSION['msg'] = 'Não está logado';
    header('Location: ../../backend/login/login.php');
    exit;
}

$userid = $_SESSION['userid'];
$post_id = $_POST['post_id'];
$comentario = $_POST['comentario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($comentario)) {
    $sql = "INSERT INTO comentarios (post_id, usuario_id, comentario) VALUES ('$post_id', '$userid', '$comentario')";
    if ($conn->query($sql) === TRUE) {
        // Criar notificação
        $sql_notificacao = "INSERT INTO notificacoes (userid, tipo, item_id, mensagem) 
                            VALUES ((SELECT userid FROM topico WHERE id = $post_id), 'comentario', '$post_id', 'Novo comentário em seu tópico!')";
        $conn->query($sql_notificacao);
        
        header("Location: topico.php?id=$post_id");
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
