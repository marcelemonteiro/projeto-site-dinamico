<?php
require('./crud.php');

$comentario = $_POST['comentario'];
$idFilme = $_POST['filmeId'];

session_start();

$usuarioLogado = $_SESSION['usuarioLogado'];
$loginUsuario = $usuarioLogado['login'];

inserirComentarioPorId($comentario, $idFilme, $loginUsuario);
   
header("location: filme.php?id={$idFilme}");
die;
