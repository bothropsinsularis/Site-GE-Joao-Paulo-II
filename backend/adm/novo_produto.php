    <?php
    session_start();
    // if(!isset($_SESSION['on'])) {
    //     $_SESSION['msg'] = 'Não está logado';
    //     echo $_SESSION['msg'];
    //     header('Location: main.php');
    // }
    $logged = false;
    if (isset($_SESSION['on'])) {
    $logged = true;
    }
    if($_SESSION['tipo']!=3){
        header('Location: ../../frontend/principal/index.php');
    }
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../frontend/public/imagens/recursos/logo.png">
    <link rel="stylesheet" href="../../frontend/public/css/style.css">
    <title>Cadastrar Protudo</title>
</head>

<body>
    
<div class="header">
<div class="logo_header">
        <a href="../../frontend/principal/index.php"><img src="../../frontend/public/imagens/recursos/logo.png" alt="Logo GN" class="img_logo_header" class="pfp"></a>
        </div>
        <div class="navigation_header" id="navigation_header">
   
            <h1>Grupo João Paulo II</h1>
            <a href="../../frontend/principal/por.php">Regulamento interno</a>
            <a href="../../frontend/principal/sobre.php">Sobre nós</a>
            <a href="../../backend/Evento/index.php">Programação anual</a>
            <a href="../../backend/galeria/index.php">Galeria</a>
            <a href="../../backend/mailer/fale.php">Fale conosco</a>
            <a href="../../backend/forum/main.php">Fórum</a>
            <form>
            <a href="
            <?php if($logged) { echo '../../frontend/principal/user.php';}  else {echo '../../backend/login/login.php';}?>" class="btn btn-primary btn-rounded">
            <img class="upfp" src="../../frontend/public/<?php if($logged) {  echo('/imagens/usuarios/'.$_SESSION['foto']); }  else {echo 'imagens/usuarios/profile-user.png';}?>" alt="">
            </a> 
            </form>
        </div>
    </div><br>

    <div class="container-fluid cor_fundo">
        <br><br>
        <div class="criar">
            <br><br>
            <h1>Cadastrar Produto</h1>
            <br>
    <form action="cadastrar_produto.php" method="POST" enctype="multipart/form-data">
        
        <input type="text" name="nome" placeholder="Nome do Produto" class="inp"><br><br>
        <input type="text" name="body" id="body" placeholder="Descrição do Protudo" class="inp"><br><br>
        <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade do Produto" class="inp"><br><br>
        <input type="text" name="preco" id="preco" placeholder="Preço do Produto" class="inp"><br><br>

        <p>Foto:</p><br>
        <input type="file" name="foto" placeholder="Anexos" class="inp"><br><br>
        <input type="submit" name="Enviar" id="Enviar" value="Enviar" class="btn"><br><br><br>
        </form>

    </div>
    </div>
    <br><br>
    <div class="footer">
        <a href="https://www.instagram.com/ge_joaopaulo2?igsh=MWFiOTA2OTFxYW11"><img src="../../frontend/public/imagens/recursos/instagram.png" alt="Instagram do grupo"></a>
        <a href="https://www.facebook.com/GrupoescoteirojoaopauloII?mibextid=ZbWKwL"><img src="../../frontend/public/imagens/recursos/facebook.png" alt="Facebook do grupo"></a>
        <a href="https://www.tiktok.com/@ge._joaopauloii?_t=8nG7cVdsBGQ&_r=1"><img src="../../frontend/public/imagens/recursos/tiktok.png" alt="TikTok do grupo"></a>
        <a href="https://youtube.com/@gejoaopauloii?si=8nJBM0zWxWBofH_V"><img src="../../frontend/public/imagens/recursos/youtube.png" alt="Youtube do grupo"></a>
        <br><br>
        <p>© 2024 Grupo Escoteiro João Paulo II - Todos os direitos reservados​</p>
    </div>          
</body>
</html>