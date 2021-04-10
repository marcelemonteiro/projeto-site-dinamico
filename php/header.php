<?php
session_start();

$usuarioLogado = $_SESSION['usuarioLogado'];
$idUsuario = $usuarioLogado['id_usuario'];
$login = $usuarioLogado['login'];

if(!isset($usuarioLogado)) {
    header('location: ../index.php?status=Favor+efetuar+login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cineweb</title>

   <!-- CSS -->
   <link rel="stylesheet" href="../css/style.css">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap" rel="stylesheet">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous" />
</head>

<body>
   <header class="header">
      <div class="overlay"></div>
      <nav class="container flex flex-jc-sb flex-ai-c">
         <a href="./home.php" class="header__logo">
            <h1>Cineweb</h1>
         </a>

         <a id="btnHamburguer" href="#" class="header__toggle hide-for-desktop">
            <span></span>
            <span></span>
            <span></span>
         </a>

         <div class="header__links hide-for-mobile">
            <ul class="flex flex-jc-c flex-ai-c">
               <li><a href="./home.php">Página Inicial</a></li>
               <li><a href="./filmes.php">Filmes</a></li>
               <li><a href="./perfil.php">Perfil</a></li>
            </ul>
         </div>

         <form action="./pesquisa.php" method="POST" class="header__search hide-for-mobile">
            <input type="text" placeholder="Pesquise aqui..." class="input" name="filme">
            <button type="submit"><i class="fas fa-search"></i></button>
         </form>
      </nav>

      <div class="header__menu hide-for-desktop">
         <a href="./home.php">Página Inicial</a><a href="./filmes.php">Filmes</a><a href="./perfil.php">Perfil</a>
         <form action="" method="POST" class="header__search">
            <input type="text" placeholder="Pesquise aqui..." class="input">
            <button type="submit"><i class="fas fa-search"></i></button>
         </form>
      </div>
   </header>
