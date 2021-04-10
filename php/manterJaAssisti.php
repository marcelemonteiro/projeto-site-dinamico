<?php
require('./crud.php');

$idFilme = $_POST['idFilme'];

session_start();
$usuarioLogado = $_SESSION['usuarioLogado'];
$idUsuario = $usuarioLogado['id_usuario'];

foreach (listarJaAssisti($idUsuario) as $jaAssisti) {
   if($idFilme == $jaAssisti['fk_filme_id']) {
      excluirJaAssisti($idFilme);
      header("location: filme.php?id={$idFilme}");
      die;
   }
}

inserirJaAssisti($idFilme, $idUsuario);
excluirQueroVer($idFilme);

header("location: filme.php?id={$idFilme}");
die;


