<?php
include_once './header.php';
include './crud.php';
?>

<section class="perfil">
   <div class="perfil__usuario container-full flex flex-ai-c flex-jc-c">
      <img src="../img/user.jpg" alt="Imagem do usuário">
      <h1 class="flex flex-ai-c flex-jc-c"><?= $usuarioLogado['nome'] ?></h1>
      <a href="./logout.php" class="btn flex flex-ai-c flex-jc-c">Logout</a>
   </div>

   <div class="assistidos container-md">
      <h1 class="titulo">Assistidos</h1>

      <div class="cards">
         <?php 
            foreach (listarJaAssisti($idUsuario) as $assistido) {
            $idFilme = $assistido['fk_filme_id'];
            $resultado = listaFilmesPorId($idFilme);

            if (count($resultado) == 0) {
                echo '<p class="msg-erro">Nenhum filme :(</p>';
            } else {
               $i = 0;
               foreach(listaFilmesPorId($idFilme) as $filme) {
                  if($i == 4) {
                     break;
                  }else {
                     $i++;
                  }
               
        ?>
         <div class="card">
            <a href="filme.php?id=<?=$filme['id_filme']?>">
               <img src="../img/<?=$filme['imagem']?>" alt="Poster do Filme">
               <p><?=$filme['nome']?></p>
            </a>
         </div>
         
        <?php if (count($resultado) > 0) : ?>
         <div class="card flex flex-ai-c flex-jc-c">
            <a href="./assistidos.php">
               <p>Ver mais</p>
            </a>
         </div>
      <?php endif; ?>
      <?php    
            }
            }
         } 
        ?>
      </div>
   </div>

   <div class="queroVer container-md">
      <h1 class="titulo">Quero ver</h1>

      <div class="cards">
         <?php 
            foreach (listarQueroVer($idUsuario) as $querover) {
            $idFilme = $querover['fk_filme_id'];
            $resultado = listaFilmesPorId($idFilme);

            if (count($resultado) == 0) {
                echo '<p class="msg-erro">Nenhum filme :(</p>';
            } else{
               $j = 0;
               foreach(listaFilmesPorId($idFilme) as $filme) {
                  if($j == 4) {
                     break;
                  }else {
                     $j++;
                  }
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
         } 
        ?>
         <div class="card flex flex-ai-c flex-jc-c">
            <a href="./queroVer.php">
               <p>Ver mais</p>
            </a>
         </div>
      </div>
   </div>
</section>



<?php include_once('./footer.php'); ?>