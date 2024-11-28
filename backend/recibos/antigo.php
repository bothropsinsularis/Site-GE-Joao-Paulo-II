<?php

// Carregar o Composer
require './vendor/autoload.php';

// Incluir conexao com BD
include_once '../classes/conn.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM compras WHERE id LIKE '.$id.'';
$res = $conn -> query($sql);
$linha = $res -> fetch_assoc();
$logged = false;
if (isset($_SESSION['on'])) {
    $logged = true;
}   


// QUERY para recuperar os registros do banco de dados
$query_compras = "SELECT id, userid, compra, valor, data FROM compras";

// Prepara a QUERY
$result_compras = $conn->prepare($query_compras);

// Executar a QUERY
$result_compras->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href='http://localhost/celke/css/custom.css'";
$dados .= "<title>Recibo da Compra</title>";
$dados .= "</head>";
$dados .= "<body>";
// $dados .= "<h1>Listar os Usuário</h1>";

// Ler os registros retornado do BD
while($row_compras = $result_compras->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_compras);
    $dados .= "ID: $id <br>";
    $dados .= "Nome: $nome <br>";
    $dados .= "E-mail: $email <br>";
    $dados .= "<hr>";
}

// $dados .= "O PHP proin iaculis, libero et dictum fringilla, ex metus scelerisque mauris, sit amet lobortis enim justo quis arcu. Proin eget pharetra ipsum, eget auctor purus.";
// $dados .= "</body>";


// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
