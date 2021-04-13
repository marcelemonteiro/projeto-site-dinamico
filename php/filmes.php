<?php 
    include_once('./header.php'); 
    require('crud.php');
?>

<section class="filmes container">
    <?php   
        if (isset($_GET['error']) == 'filme-nao-encontrado') {
            echo "<p class='msg-erro'>Não temos este filme registrado ainda :/<p>";
        }
    ?>
    <div class="cards">
        <?php 
        $resultado = listarFilmes();

        if (count($resultado) == 0) {
            echo '<p class="msg-erro">Nenhum filme registrado :(</p>';
        } else{
            foreach(listarFilmes() as $filme) {
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
<?php include_once('footer.php') ?>