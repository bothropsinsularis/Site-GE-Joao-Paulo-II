<?php
    
include_once 'class_Conexao.php';

class ReposiorioConexaoMYSQL {

    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao("localhost","root","","jpii");
        if($this->conexao->conectar() == false) 
        {
            echo "Erro".mysqli_connect_error();
        }
    }
    
}
?>      