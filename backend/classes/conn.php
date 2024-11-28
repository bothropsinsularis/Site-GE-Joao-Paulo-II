<?php

$servername = "localhost";
$user = "root";
$pass = "";
$db = "jpii";

$conn = new mysqli($servername, $user, $pass, $db);


// Criar conn;
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

// function updateSession() {
//     $_SESSION['nome'] = $check[1]['nome'];
//     $_SESSION['userid'] = $check[1]['id'];
//     $_SESSION['email'] = $check[1]['email'];
//     $_SESSION['senha'] = $check[1]['senha'];
//     $_SESSION['foto'] = $check[1]['foto'];
// }
// $linha = $res -> fetch_assoc();



?>