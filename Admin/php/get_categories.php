<?php
require_once 'functions.php';
if (!empty($_POST)){
  $link = admin_db_connect($_POST['login'], $_POST['password'], 'shop');
  $table_items = get_table($link, $_POST['table_name']);
  echo json_encode($table_items);
}
