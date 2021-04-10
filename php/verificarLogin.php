<?php

  include_once('./crud.php');

  session_start(); 

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  if($usuarioLogado = listarUsuario($login, $senha)){
    $_SESSION['usuarioLogado'] = $usuarioLogado;
    header('Location: ./home.php');
    exit;
  } else {
    header('Location: ../index.php?status=fail');
    exit;
  }
