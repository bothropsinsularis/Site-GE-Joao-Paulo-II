<?php
    
include_once 'class_Conexao.php';
include_once 'class_Topico.php';

interface IRepositorioTopico {
    public function cadastrarTopico($Topico);
    public function alterarTopico($Topico);
    public function listarTodosTopicos();
    public function buscarTopico($id);
    public function removerTopico($id);
}

class ReposiorioTopicoMYSQL implements IRepositorioTopico {

    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao("localhost","root","","jpii");
        if($this->conexao->conectar() == false) 
        {
            echo "Erro".mysqli_connect_error();
        }   
    }
    
   
    public function cadastrarTopico($Topico)
    {

        $id = $Topico->getId();
        $nome = $Topico->getNome();
        $body = $Topico->getBody();
        
      
            $sql = "INSERT INTO Topico (id,nome,body,data,id_autor,anexos)
             VALUES ('$id','$nome','$body','','','')";
            
            $this->conexao->executarQuery($sql);
        
    

    }

    public function alterarTopico($Topico)
    {
        
    }

    public function listarTodosTopicos()
    {
    
        $sql = "SELECT * FROM topico";
        $res = $this->conexao->executarQuery($sql);
        for($i = 0; $i < $res ->num_rows; $i++){
            $linha = $res -> fetch_assoc();
            print "<tr><td>".$linha['id']."</td>";
            print "<td>".$linha['nome']."</td>";
        }

    }

    public function buscarTopico($id)
    {
        
    }

    public function removerTopico($id)
    {
        
    }
}

$respositorioTopico = new ReposiorioTopicoMYSQL(); 

?>      