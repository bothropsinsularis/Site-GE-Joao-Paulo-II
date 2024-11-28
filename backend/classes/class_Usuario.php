<?php

class usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $descricao;
    private $tipo;
    private $status;
    private $foto;
    private $saldo;
    
    public function __construct($id,$nome,$email,$senha, $descricao,$tipo,$status,$foto,$saldo){
        $this->id=$id;
        $this->nome=$nome;
        $this->email=$email;
        $this->senha=$senha;
        $this->descricao=$descricao;
        $this->tipo=$tipo;
        $this->status=$status;
        $this->foto=$foto;
        $this->saldo=$saldo;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome=$nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setTipo($tipo){
        $this->tipo=$tipo;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setStatus($status){
        $this->status=$status;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setFoto($foto){
        $this->foto=$foto;
    }

    public function getFoto(){
        return $this->foto;
    }
    public function setSaldo($saldo){
        $this->saldo=$saldo;
    }

    public function getSaldo(){
        return $this->saldo;
    }
}