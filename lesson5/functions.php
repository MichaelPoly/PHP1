<?php

function createDb($dbName){
  define('MYSQL_SERVER', 'localhost');
  define('MYSQL_USER', 'root');
  define('MYSQL_PASSWORD', '');
  $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD)
          or die("Error: ".mysqli_error($link));
          if (!mysqli_set_charset($link, "utf8")){
            printf("Error: ".mysqli_error($link));
          }
  $query = "CREATE DATABASE $dbName CHARACTER SET utf8 COLLATE utf8_general_ci";
  $result = mysqli_query($link, $query);
  if ($result) echo "База данных создана";
  mysqli_close($link);
}
function db_connect($dbName)
{
  define('MYSQL_DB', "$dbName");
  $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Error: ".mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")){
      printf("Error: ".mysqli_error($link));
    }
return $link;
}
function tableCreate($link, $tableName)
{
  $query = "CREATE TABLE $tableName";
  $result = mysqli_query($link, $query);
  if ($result) echo "Таблица успешно создана";
  echo "<br>";
}
function add_client($link, $first_name, $second_name, $last_name, $birth_date, $email, $login, $password)
{
    $client = "INSERT INTO clients(first_name, second_name, last_name, birth_date, email, login, password) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
    $query = sprintf($client, mysqli_real_escape_string($link, $first_name), mysqli_real_escape_string($link, $second_name), mysqli_real_escape_string($link, $last_name),
    mysqli_real_escape_string($link, $birth_date), mysqli_real_escape_string($link, $email), mysqli_real_escape_string($link, $login), mysqli_real_escape_string($link, $password));
    $result = mysqli_query($link, $query);
    if (!$result) die(mysqli_error($link));
    return true;
}
function add_item($link, $articul, $item_name, $quantity_stock, $price)
{
  $item = "INSERT INTO item(articul, item_name, quantity_stock, price) VALUES('%s', '%s', '%d', '%d')";
  $query = sprintf($item, mysqli_real_escape_string($link, $articul), mysqli_real_escape_string($link, $item_name),
  mysqli_real_escape_string($link, $quantity_stock), mysqli_real_escape_string($link, $price));
  $result = mysqli_query($link, $query);
  if (!$result) die(mysqli_error($link));
  return true;
}
function show_table($link, $table)
{
  $query = "SELECT * FROM $table";
  $result = mysqli_query($link, $query);
  if (!$result) die(mysqli_error($link));
  $table_items = array();
  $n = mysqli_num_rows($result);
  for ($i=0; $i < $n; $i++) {
    $row = mysqli_fetch_assoc($result);
    $table_items[] = $row;
  }
    return $table_items;
}
function show_table_where($link, $table, $quantity_stock)
{
  $quantity_stock = (int)$quantity_stock;
  $query = "SELECT * FROM $table WHERE quantity_stock < $quantity_stock";
  $result = mysqli_query($link, $query);
  if (!$result) die(mysqli_error($link));
  $table_items = array();
  $n = mysqli_num_rows($result);
  for ($i=0; $i < $n; $i++) {
    $row = mysqli_fetch_assoc($result);
    $table_items[] = $row;
  }
    return $table_items;
}
 ?>
