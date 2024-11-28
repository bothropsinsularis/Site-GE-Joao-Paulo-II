<?php
include_once '../../backend/classes/class_IRepositorioUsuarios.php';
session_start();
if (!isset($_SESSION['on'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style1.css">

    <title>Editar Perfil</title>
</head>

<body>
    <div class="container-fluid cor_fundo">
        <div class="log">
            <h1> Editar</h1>
            
    <form action="editar_usuario.php" method="POST" enctype='multipart/form-data'>
        
        <input type="text" name="nome" placeholder="Novo nome" class="inp" value="<?php echo $_SESSION['nome'];?>"><br><br>
        <input type="text" name="email" placeholder="Novo email" class="inp" value="<?php echo $_SESSION['email'];?>"><br><br>
        <input type="text" name="descricao" placeholder="Descrição" class="inp" value="<?php echo $_SESSION['descricao'];?>"><br><br>
        <input type="file" name="foto" placeholder="Nova foto" class="inp" value="<?php echo $_SESSION['foto'];?>"><br><br>
        <input type="submit" name="Enviar" value="Enviar" class="btn"><br><br>
        <a href="user.php">Cancelar</a><br><br>
        </form>
    </div>
    </div>
</body>
</html>