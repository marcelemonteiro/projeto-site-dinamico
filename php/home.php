<?php 
include_once("header.php"); 
include("crud.php");
?>

<section class="home container-md">
   <h1 class="titulo">Novidades</h1>

   <div class="cards">
      <?php 
         $resultado = listarFilmesRecentes();

         if (count($resultado) == 0) {
             echo '<p class="msg-erro">Nenhum filme :(</p>';
         } else if (!$_GET['error']){
            foreach(listarFilmesRecentes() as $filme) {
        ?>
      <div class="card">
         <a href="filme.php?id=<?=$filme['id_filme']?>">
            <img src="../img/<?=$filme['imagem']?>" alt="Poster do Filme">
            <p><?=$filme['nome']?></p>
         </a>
      </div>
      <?php    
         }
         }
        ?>
   </div>
</section>

<?php
$max = count(listarFilmes());
$aleatorio = rand (1, $max);
?>

<section class="sorte flex-s">
   <div class="sorte__img">
   </div>
   <div class="sorte__text container flex-c flex-ai-c flex-jc-c">
      <h1 class="titulo">Dúvida em que filme assistir?</h1>
      <p>A Cineweb contém um arcenal com diversos filmes, aqui você encontra sinopses e traileres. Está com preguiça
         para pesquisar um filme? A gente te ajuda:</p>
      <a href="filme.php?id=<?=$aleatorio?>" class="btn flex flex-ai-c flex-jc-c">Escolher filme aleatório</a>
   </div>
</section>

<?php include_once('./footer.php'); ?>