<?php

class Cart
{
  public function __construct()
  {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [
        'products' => [],
        'total' => 0
      ];
    }
  }


  public function add(Product $product)
  {
    $inCart = false;
    $this->setTotal($product);
    if (count($this->getCart()) > 0) {
      foreach ($this->getCart() as $productInCart) {
        if ($productInCart->getId() === $product->getId()) {
          $quantity = $productInCart->getQuantidade() + $product->getQuantidade();
          $productInCart->setQuantidade($quantity);
          $inCart = true;
          break;
        }
      }
    }

    if (!$inCart) {
      $this->setProductsInCart($product);
    }
  }

  private function setProductsInCart($product)
  {
    $_SESSION['cart']['products'][]  = $product;
  }

  private function setTotal(Product $product)
  {
    $_SESSION['cart']['total'] += $product->getPreco() * $product->getQuantidade();
  }

  public function remove($id)
  {
    foreach ($this->getCart() as $index => $product) {
      if ($product->getId() === $id) {
        $product->setQuantidade($product->getQuantidade() - 1);

        if ($product->getQuantidade() <= 0) {
          unset($_SESSION['cart']['products'][$index]);
        }

        $_SESSION['cart']['total'] -= $product->getPreco();
        // unset($_SESSION['cart']['products'][$index]);
        // $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity();
      }
    }
  }

  public function adicionar($id)
  {
    foreach ($this->getCart() as $index => $product) {
      if ($product->getId() === $id) {
        $product->setQuantidade($product->getQuantidade() + 1);

        if ($product->getQuantidade() <= 0) {
          unset($_SESSION['cart']['products'][$index]);
        }

        $_SESSION['cart']['total'] += $product->getPreco();
        // unset($_SESSION['cart']['products'][$index]);
        // $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity();
      }
    }
  }

  private function setTotalIfChangeQty($product, $qty)
  {
    if ((int)$qty > $product->getQuantidade()) {
      $_SESSION['cart']['total'] += $product->getPreco() * ((int)$qty - $product->getQuantidade());
    } else {
      // 2000 = 1000 * (2-1) = 2000+2000 = 4000
      $_SESSION['cart']['total'] -= $product->getPreco() * ($product->getQuantidade() - (int)$qty);
    }
  }

  public function updateQty($id, $qty)
  {
    foreach ($this->getCart() as $index => $product) {
      if ($product->getId() === (int)$id) {
        if ($product->getQuantidade() === (int)$qty) {
          return;
        }

        $this->setTotalIfChangeQty($product, $qty);

        $product->setQuantidade((int)$qty);

        if ($product->getQuantidade() <= 0) {
          unset($_SESSION['cart']['products'][$index]);
        }
      }
    }
  }

  public function getCart()
  {
    return $_SESSION['cart']['products'] ?? [];
  }

  public function getTotal()
  {
    return $_SESSION['cart']['total'] ?? 0;
  }
}
