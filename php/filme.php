<?php
include_once('./header.php');
require('./crud.php');

$idFilme = $_GET['id'];

foreach (listarQueroVer($idUsuario) as $queroVer) {
   if ($idFilme == $queroVer['fk_filme_id']) {
      $disabledQueroVer = 'disabled';
      break;
   } elseif ($idFilme != $queroVer['fk_filme_id']){
      $disabledQueroVer = null;
   }
}

foreach (listarJaAssisti($idUsuario) as $jaAssisti) {
   if ($idFilme == $jaAssisti['fk_filme_id']) {
      $disabledAssistido = 'disabled';
      break;
   } elseif ($idFilme != $jaAssisti['fk_filme_id']) {
      $disabledAssistido = null;
   }
}

?>
<div class="container-full">
   <section class="filme flex-s container-md">
      <?php foreach (listaFilmesPorId($idFilme) as $filme) : ?>
      <div class="filme__poster">
         <img src="../img/<?= $filme['imagem'] ?>" alt="Poster do Filme">
      </div>
      <div class="filme__info">
         <h1><?= $filme['nome'] ?></h1>
         <p><?= $filme['data_lancamento'] ?> | <?= $filme['categoria'] ?> | <?= $filme['tempo_de_duracao'] ?></p>
         <div class="filme__notaimdb">
            <img src="../img/imdb-logo.png" alt="Logo IMDb">
            <p><?= $filme['nota_imdb'] ?> / 10</p>
         </div>

         <p><strong>Sinopse:</strong></p>
         <div class="sinopse">
            <?= $filme['sinopse'] ?>
         </div>
         <?php endforeach; ?>

         <div class="filme__opcoes flex">
            <form action="./manterJaAssisti.php" id="jaAssistiForm" method="post">
               <button class="btn <?=$disabledAssistido?>" id="jaAssisti" type="submit" name="idFilme"
                  value="<?=$idFilme?>">Já assisti</button>
            </form>
            <form action="./manterQueroVer.php" id="queroVerForm" method="post">
               <button class="btn <?=$disabledQueroVer?>" id="queroVer" type="submit" name="idFilme"
                  value="<?=$idFilme?>">Quero ver</button>
            </form>
         </div>


      </div>

   </section>
   <!--section-filme-->

   <?php foreach (listaFilmesPorId($idFilme) as $filme) : ?>
   <div class="filme__trailer flex-s flex-ai-c flex-jc-c">
      <h1>Assista ao trailer</h1>
      <iframe width="805" height="453" src="https://www.youtube.com/embed/<?= $filme['trailer_src'] ?>"
         title="YouTube video player" frameborder="0"
         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
         allowfullscreen></iframe>
   </div>
   <?php endforeach; ?>

   <section class="comentarios flex-c container-md">
      <h1 class="titulo">Comentários (<?= count(listarComentarioPorIdFilme($idFilme))?>)</h1>
      <!-- Caixa de comentários -->
      <form action="./manterComentario.php" method="post" class="comentario-form ">
         <textarea name="comentario" placeholder="Deixe o seu comentário..." name="comentario"></textarea>
         <button type="submit" class="btn" name="filmeId" value="<?= $idFilme ?>">Enviar</button>
      </form>
      <?php foreach (listarComentarioPorIdFilme($idFilme) as $comentario) : ?>
      <div class="comentario">
         <div class="usuario">
            <img src="../img/user.jpg" alt="">
            <p><?= $comentario['fk_usuario_login'] ?></p>
         </div>
         <p><?= $comentario['comentario'] ?></p>
      </div>
      <?php endforeach; ?>
   </section>
</div>
<!--container-->


<?php include_once('./footer.php'); ?>