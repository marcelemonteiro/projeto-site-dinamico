<?php 
include_once('header.php');
include('crud.php');
?>
<div class="queroVer container-md">
   <h1 class="titulo">Quero ver</h1>

   <div class="cards">
      <?php 
            foreach (listarQueroVer($idUsuario) as $queroVer) {
               $idFilme = $queroVer['fk_filme_id'];
               $resultado = listaFilmesPorId($idFilme);
         
               if (count($resultado) == 0) {
                   echo '<p class="msg-erro">Nenhum filme :(</p>';
               } else if (!$_GET['error']){
                   foreach(listaFilmesPorId($idFilme) as $filme) {
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
   </div>
</div>
<?php include_once('footer.php'); ?>