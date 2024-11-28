<?php
include '../classes/conn.php';

    session_start();
    $logged = false;
    if (isset($_SESSION['on'])) {
    $logged = true;
    }
    if($_SESSION['tipo']!=3){
        header('Location: ../../frontend/principal/index.php');
    }
    if(isset($_GET['verifica'])){
        if($_GET['verifica']==0){
        $sql_verifica="UPDATE `tbl_usuarios` SET `status` = '1' WHERE `compras`.`id` = ".$_GET['id'];
        $res = $conn -> query($sql_verifica);
        header ("Location: users_adm.php");
        }
        else{
            $sql_verifica="UPDATE `tbl_usuarios` SET `status` = '0' WHERE `compras`.`id` = ".$_GET['id'];
            $res = $conn -> query($sql_verifica);
        header ("Location: users_adm.php");
        }
    }
  //   if(isset($_GET['verifica'])){
  //     if($_GET['verifica']==0){
  //     $sql_verifica="UPDATE `users` SET `verified` = '1' WHERE `users`.`id` = ".$_GET['id'];
  //     $res = $conn -> query($sql_verifica);
  //     header ("Location: adm.php?users");
  //     }
  //     else{
  //         $sql_verifica="UPDATE `users` SET `verified` = '0' WHERE `users`.`id` = ".$_GET['id'];
  //         $res = $conn -> query($sql_verifica);
  //     header ("Location: adm.php?users");
  //     }
  // }
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../frontend/public/css/teste.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <style>
    * {
      text-align: center;
    }
    a{
        text-decoration: none;
    }
    .table-responsive {
    width: 100%;
    overflow-x: auto; 
    -webkit-overflow-scrolling: touch; 
}

.table {
    white-space: nowrap;
}

.compra{
  width: 10rem;
}
  </style>
  <link rel="icon" href="../../frontend/public/imagens/recursos/logo.png">
  <title>Painel de Controle</title>
</head>     


  <nav class="navbar navbar-expand-lg py-3 custom-navbar">
    <div class="container">

      <a class="navbar-brand" href="../../frontend/principal/index.php">
        <img src="../../frontend/public/imagens/recursos/logo.png " height="80rem" width="80rem" alt="Logo" height="40">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <img src="../../frontend/public/imagens/recursos/menu.png" width="20px" alt="">
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" target="blank"
              href="../../frontend/public/docs/POR_2013_19_V2.pdf">Regulamento Interno</a>
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
          if ($logged) {
            if ($_SESSION['tipo'] >= 1) {
              echo '<li class="nav-item">
                <a class="nav-link" href="../../backend/loja/loja.php">Loja</a>
              </li>';
            }
            if ($_SESSION['tipo'] == 3) {
              echo '<li class="nav-item">
                <a class="nav-link" href="../../backend/adm/index_adm.php">ADM</a>
              </li>';
            }
            echo '<li class="nav-item">
            <a class="nav-link" href="../../frontend/principal/user.php?id='.$_SESSION["userid"].'">'.$_SESSION["nome"].'</a>
                <li class="nav-item">
            <a class="nav-link" href="../../backend/notificacoes/index.php"><img src="../../frontend/public/imagens/recursos/sino.png" width="20px"></a>
              </li>';
          } else {
            echo '<li class="nav-item">
                <a class="nav-link" href="../../backend/login/login.php">Faça Login</a>
              </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
    <div class="content"><br>
    
    
   
        <div class="container my-5">
            <h2>Painel de Controle dos Usuários</h2><br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Saldo</th>
                            <th>Tipo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
              <?php
              $sql = "SELECT * FROM tbl_usuarios";
              $res = $conn -> query($sql);
              for($i = 0; $i < $res ->num_rows; $i++){
                $linha = $res -> fetch_assoc();
                if($linha['status']==1){
                  $verificado= "✔";
                  $verifica=1;
              } 
              else{
                  $verificado= "❌";
                  $verifica=0;
              }
                print '<tr>
                    <td class="align-middle">'.$linha['id'].'</td>
                    <td class="align-middle"><img src="../../frontend/public/imagens/usuarios/'.$linha['foto'].'" width="150px" height="150px"></td>
                    <td class="compra align-middle">'.$linha["nome"].'</td>
                    <td class="compra align-middle"><form method="post"><input type="text" name="saldo" value="R$: '.$linha["saldo"].'"><br><br>
                    <input type="submit" value="Alterar">
                    </form></td>
                    <td> <form type="post"><select id="menu1" name="type" value="3" required="true" class="inp">
                <option ".$t1."><strong>Comum</strong></option>
                <option ".$t2."><strong>Escoteiro</strong></option>
                <option ".$t3."><strong>Escotista</strong></option>
                <option ".$t4."><strong>Administrador</strong></option>
                </select><br><br><input type="submit" name="id" value="'.$linha['id'].'"></form></td>
                    <td class="align-middle">
                        <a href="users_adm.php?id='.$linha["id"].'&verifica='.$verifica.'">'.$verificado.'</a>
                    </td>
                </tr>
                ';
                if(isset($_POST['Alterar'])){
                    $sql_altera='UPDATE tbl_usuarios SET saldo='.$_POST["saldo"];
                    $res_altera = $conn -> query($sql_altera); 
                    header('Location: users_adm.php');
                }
            }
              ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br><a href="index_adm.php">Voltar</a>

    </section>
    </div>
    <footer class="footer text-center text-lg-start d-flex w-100 justify-content-between align-items-center ">
    <div class="container p-3 d-flex justify-content-between w-100">
      <span class="text-muted">© 2024 Grupo Escoteiro João Paulo II. Todos os direitos reservados.</span>
      <div class="social-icons">
        <a href="https://www.facebook.com/GrupoescoteirojoaopauloII?mibextid=ZbWKwL" target="_blank"
          class="text-muted me-3">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="https://youtube.com/@gejoaopauloii?si=8nJBM0zWxWBofH_V" target="_blank" class="text-muted me-3">
          <i class="bi bi-youtube"></i>
        </a>
        <a href="https://www.instagram.com/ge_joaopaulo2?igsh=MWFiOTA2OTFxYW11" target="_blank" class="text-muted me-3">
          <i class="bi bi-instagram"></i>
        </a>
        <a href="https://www.tiktok.com/@ge._joaopauloii?_t=8nG7cVdsBGQ&_r=1" target="_blank" class="text-muted">
          <i class="bi bi-tiktok"></i>
        </a>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>  
</body>
</html>
