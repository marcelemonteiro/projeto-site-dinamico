<?php
require('./crud.php');

$idFilme = $_POST['idFilme'];

session_start();
$usuarioLogado = $_SESSION['usuarioLogado'];
$idUsuario = $usuarioLogado['id_usuario'];

foreach (listarQueroVer($idUsuario) as $queroVer) {
   if($idFilme == $queroVer['fk_filme_id']) {
      excluirQueroVer($idFilme);
      header("location: filme.php?id={$idFilme}");
      die;
   }
}

inserirQueroVer($idFilme, $idUsuario);
excluirJaAssisti($idFilme);

header("location: filme.php?id={$idFilme}");
die;
