<?php

include_once 'class_Conexao.php';
include_once 'class_Produto.php';

interface IRepositorioProduto {
    public function cadastrarProduto($produto);
    public function alterarProduto($Produto);
    public function listarTodosProdutos();
    public function buscarProduto($id);
    public function removerProduto($id);
}

class ReposiorioProdutoMYSQL implements IRepositorioProduto {
    
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao("localhost","root","","jpii");
        if($this->conexao->conectar() == false) 
        {
            echo "Erro".mysqli_connect_error();
        }
    }
    public function cadastrarProduto($produto)
    {
        $id = $produto->getId();
        $nome = $produto->getNome();
        $descricao = $produto->getDescricao();
        $quantidade = $produto->getQuantidade();
        $tipo = $produto->getTipo();
        $foto = $produto->getFoto();
        
      
            $sql = "INSERT INTO produtos (id,nome,descricao,quantidade,tipo,foto)
             VALUES ('$id','$nome','$descricao','$quantidade','$tipo','$foto')";
            
            $this->conexao->executarQuery($sql);
    }

    public function alterarProduto($Produto)
    {
        
    }

    public function listarTodosProdutos()
    {
        
    }

    public function buscarProduto($id)
    {
        
    }

    public function removerProduto($id)
    {
        
    }
}