<?php
include 'crud.php';

$filme = $_POST['filme'];

$pesquisa = pesquisar($filme);

if(count($pesquisa) == 0) {
   header("location: filmes.php?error=filme-nao-encontrado");
   exit;
}

foreach ($pesquisa as $id) {
   header("location: filme.php?id={$id['id_filme']}");
   die;
}


