<?php

  session_start();
  session_destroy();
  unset($_SESSION['usuarioLogado']);
  header('location: ../index.php');
  exit;