<?php
  require_once 'functions.php';

  $link = db_connect('inet_shop');
  $table_items = get_table($link, 'item');
  echo json_encode($table_items);
  mysqli_close($link);
