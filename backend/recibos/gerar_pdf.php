<?php

    
require './vendor/autoload.php';


include_once '../classes/conn.php';


session_start(); 

// Validar e obter o ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;  // Validação do ID para evitar falhas de segurança

if ($id == 0) {
    die("ID inválido.");
}

// Usar prepared statements para evitar SQL Injection
$sql = 'SELECT * FROM compras WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);  // 'i' indica que o parâmetro é inteiro
$stmt->execute();
$res = $stmt->get_result();
$linha = $res->fetch_assoc();

$logged = false;
if (isset($_SESSION['on'])) {
    $logged = true;
}

// Recuperar dados da compra
$query_compras = "SELECT userid, compra, valor, data FROM compras WHERE id = ?";
$stmt_compras = $conn->prepare($query_compras);
$stmt_compras->bind_param('i', $id);
$stmt_compras->execute();
$result_compras = $stmt_compras->get_result();

// Dados para o PDF
$dados = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/celke/css/custom.css">
    <title>Recibo da Compra</title>
</head>
<body>';

// Gerar uma lista de itens de compra a partir da string
while ($row_compras = $result_compras->fetch_assoc()) {
    extract($row_compras);
    
    // Separar a string de itens usando explode()
    $itens = explode('||', $compra);  // Separando os itens com '||'

    // Adicionar os dados ao PDF
    $dados .= "<h2>Recibo da Compra</h2>";
    $dados .= "<p>ID da Compra: $id</p>";
    $dados .= "<p>Data: $data</p>";
    $dados .= "<p>Valor: R$ $valor</p>";
    
    // Criar a lista de itens
    $dados .= "<h3>Itens da Compra:</h3>";
    $dados .= "<ul>";
    
    foreach ($itens as $item) {
        $dados .= "<li>" . htmlspecialchars($item) . "</li>";  // Escapar o item para evitar problemas com HTML
    }

    $dados .= "</ul>";
    $dados .= "<hr>";
}

$dados .= "</body></html>";

// Seção de geração do PDF
use Dompdf\Dompdf;

// Instanciar e usar a classe Dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Carregar o HTML para o PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream("recibo_compra_$id.pdf");

?>
