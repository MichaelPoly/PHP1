<?php
  require_once 'functions.php';
  if (!empty($_POST)){
    $link = admin_db_connect($_POST['login'], $_POST['password'], 'shop');
    echo json_encode($link);
  }
