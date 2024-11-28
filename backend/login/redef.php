<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/public/css/style1.css">
    <title>Redefinir Senha</title>  
</head>

<body>
    <div class="log">
                <h1>Redefinir Senha</h1>
                <form class="mx-auto" action="redefine_senha.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <input type="password" placeholder="Insira a nova senha" name="senha" class="inp" id="exampleInputNome" aria-describedby="SenhaInicioHelp"><br><br>
                        <input type="password" placeholder="Confirme a nova senha" id="senha2" name="senha2" class="inp" aria-describedby="SenhaInicioHelp"><br><br>
                        <input type="submit" name="Enviar" value="Enviar" class="btn"><br><br>
                        <a href="../../frontend/usuarios/inserir_usuario.php">
                            Não tem uma conta? Cadastre-se!
                        </a><br>
                        <a href="../../backend/login/login.php">
                            Faça Login
                        </a>
                </form>
            <script>
                if(err==true){
                    alert('Email ou senha incorretos!')
                }
            </script>
        </div>
</body>
</html>