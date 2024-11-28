<?php
    
include_once 'class_Conexao.php';
include_once 'class_Usuario.php';


interface IRepositorioUsuario {
    public function cadastrarUsuario ($usuario);
    public function atualizarUsuario ($usuario);
    public function removerUsuario ($id);
    public function verificaUsuario ($usuario);
    public function verificaEmail($id);
    public function buscarUsuario($id);
    public function alteraTipo($id);
    public function alteraStatus($id);
    public function verificaLogin($id);
    
}

class RepositorioUsuarioMYSQL implements IRepositorioUsuario {

    private $conexao;

    public function verificaEmail($id)
    {
        
    }
    public function buscarUsuario($id)
    {
        
    }
    public function alteraTipo($id)
    {
        
    }
    public function alteraStatus($id)
    {
        
    }
    public function verificaLogin($id)
    {
        
    }

    public function __construct()
    {
        $this->conexao = new Conexao("localhost","root","","jpii");
        if($this->conexao->conectar() == false) 
        {
            echo "Erro".mysqli_connect_error();
        }
    }
   
    public function cadastrarUsuario($usuario)
    {

        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $tipo = $usuario->getTipo();
        $status = $usuario->getStatus();
        $descricao = $usuario->getDescricao();
        $foto = $usuario->getFoto();
        $saldo = $usuario->getSaldo();
        
      
            $sql = "INSERT INTO tbl_usuarios (id,nome,email,senha,descricao,tipo,status,foto, saldo)
             VALUES ('$id','$nome','$email','$senha','$descricao','$tipo','$status','$foto','$saldo')";
            
            $this->conexao->executarQuery($sql);
        
    

    }

    public function verificaUsuario($usuario)
    {
        // $id = $usuario->getId();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $sql = "SELECT * FROM tbl_usuarios WHERE email = '$email' AND senha = '$senha'";
        $var = false;
        $res = $this->conexao->executarQuery($sql);
        if($res -> num_rows == 1) {
            $dados =  $res -> fetch_assoc();
            $var = true;
        }

        return [$var, $dados];
    }

    public function exibirDados($usuario){
        $sql = "SELECT * FROM tbl_usuarios WHERE id = '$usuario'";
    }

    public function alterarUsuario($usuario)
    {
        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $descricao = $usuario->getDescricao();
        $foto = $usuario->getFoto();
        
              $sql = "UPDATE tbl_usuarios SET nome='".$nome."',email='".$email."',descricao='".$descricao."',foto='".$foto."'
        WHERE id = ".$id.";";

        $this->conexao->executarQuery($sql);
        // $res = $this->conexao->executarQuery($sql);
        // print_r($res);
    }

    public function listarTodosUsuarios()
    {
        
    }

    public function atualizarUsuario($id)
    {
        
            $sql = 'SELECT * FROM tbl_usuarios WHERE id LIKE "'.$id.'"';
            $res = $this->conexao -> executarQuery($sql);
            $linha = $res -> fetch_assoc();
            // session_name('s1');           
    
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['senha'] = $linha['senha'];
            $_SESSION['descricao'] = $linha['descricao'];
            $_SESSION['foto'] = $linha['foto'];
        
    }

    public function removerUsuario($id)
    {
        
    }

}

$respositorioUsuario = new RepositorioUsuarioMYSQL(); 
