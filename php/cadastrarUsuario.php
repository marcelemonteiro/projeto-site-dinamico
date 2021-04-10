<?php
require './crud.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];

inserirUsuario($nome, $email, $login, $senha);

header("location: home.php");
die;