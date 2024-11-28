<?php
include_once '../classes/conn.php';
require '../classes/class_Produto.php';
require '../classes/class_Cart.php';
$products = [];

$sql = "SELECT * FROM produtos";
$res = $conn -> query($sql);
for($i = 0; $i < $res ->num_rows; $i++){
  $linha = $res -> fetch_assoc();
  array_push($products, $linha);
}

if (isset($_POST['adiciona'])) {
  $prod_id = array_search($_GET['id'], $products);
  $productInfo = $products[$prod_id];
  $product = new Product($productInfo['id'],$productInfo['nome'], $productInfo['descricao'], $productInfo['quantidade'], $productInfo['categoria'], $productInfo['preco'], $productInfo['foto']);
  
  $cart = new Cart;
  $cart->add($product);
  $productsInCart = $cart->getCart();
}
