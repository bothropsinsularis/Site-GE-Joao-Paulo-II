<?php

$pdo = new PDO('mysql:host=localhost;dbname=jpii', 'root', ''); 
// Buscar imagem específica
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM images WHERE id = ?");
$stmt->execute([$id]);
$image = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$image) {
    die("Imagem não encontrada.");
}
?>
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
    <link rel="stylesheet" href="../../frontend/public/css/teste.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        *{text-align:center;}
    </style>
    <link rel="icon" href="../../frontend/public/imagens/recursos/logo.png">
    <title>Editar Imagem</title>
</head>
<body>
<nav class="navbar navbar-expand-lg py-3 custom-navbar">
    <div class="container">

      <a class="navbar-brand" href="../../frontend/principal/index.php">
        <img src="../../frontend/public/imagens/recursos/logo.png " height="80rem" width="80rem" alt="Logo" height="40">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <img src="../../frontend/public/imagens/recursos/menu.png" width="20px" alt="">
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" target="blank" href="../../frontend/public/docs/POR_2013_19_V2.pdf">Regulamento Interno</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../backend/galeria/index.php">Galeria</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../backend/Evento/index.php">Programação Semestral</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../backend/mailer/fale.php">Fale Conosco</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../backend/forum/main.php">Fórum</a>
          </li>
          <?php 
          if($logged){
            if($_SESSION['tipo']>=1){
              echo '<li class="nav-item">
                <a class="nav-link" href="../../backend/loja/loja.php">Loja</a>
              </li>';
            }
            if($_SESSION['tipo']==3){
              echo '<li class="nav-item">
                <a class="nav-link" href="../../backend/adm/index_adm.php">ADM</a>
              </li>';
            }
            echo '<li class="nav-item">
            <a class="nav-link" href="../../frontend/principal/user.php?id='.$_SESSION["userid"].'">'.$_SESSION["nome"].'</a>
                <li class="nav-item">
            <a class="nav-link" href="../../backend/notificacoes/index.php"><img src="../../frontend/public/imagens/recursos/sino.png" width="20px"></a>
              </li>';
          }
          else{
            echo '<li class="nav-item">
                <a class="nav-link" href="../../backend/login/login.php"><strong>Faça Login</strong></a>
              </li>';
          }
            ?>
        </ul>
      </div>
    </div>
  </nav>
    <div class="content">
    <br><h1>Editar Imagem</h1>
    <form action="update_image.php" method="post" enctype="multipart/form-data">

    <fieldset>
              
            <div id="part-1">
            <input class="input-custom" type="hidden" name="id" value="<?= $image['id'] ?>" id="nome">
            <label for="title">Título:</label>
            <input class="input-custom" type="text" name="title" placeholder="Título" id="title" required value="<?= htmlspecialchars($image['title']) ?>">
            <br><br>

            <label for="image">Nova Imagem (opcional):</label>
            <input type="file" id="image" name="image">
          <br/><br/>
          <input type="submit" class="btn-custom" id="submitButton" name="Enviar" value="Salvar Alterações">
        </div>
        </fieldset>
    </form>
    <a href="galeria_adm.php">Voltar</a>
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