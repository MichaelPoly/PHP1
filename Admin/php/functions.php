<?php
function admin_db_connect($login, $pwd, $dbName)
{
  define('MYSQL_SERVER', 'localhost');
  define('MYSQL_USER', "$login");
  define('MYSQL_PASSWORD', "$pwd");
  define('MYSQL_DB', "$dbName");
  $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Error: ".mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")){
      printf("Error: ".mysqli_error($link));
    }
return $link;
}
function db_connect($dbName)
{
  define('MYSQL_SERVER', 'localhost');
  define('MYSQL_USER', 'root');
  define('MYSQL_PASSWORD', '');
  define('MYSQL_DB', "$dbName");
  $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
    or die("Error: ".mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")){
      printf("Error: ".mysqli_error($link));
    }
return $link;
}
function login($link, $login, $password){
  $login = trim($login);
  $password = trim($password);
  if ($login == '' || $password == ''){
    return false;
  } else {
    $query = sprintf("SELECT * FROM clients WHERE login='%s'", $login);
    $result = mysqli_query($link, $query);
    if (!$result) die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
    if ($user['login'] == $login && $user['password'] == $password) {
      return $user;
    } else return false;
  }
}
function get_table($link, $table)
{
  $query = "SELECT * FROM $table";
  $result = mysqli_query($link, $query);
  if (!$result) die(mysqli_error($link));
  $table_items = array();
  if (mysqli_num_rows($result) == 0) return false;
  $n = mysqli_num_rows($result);
  for ($i=0; $i < $n; $i++) {
    $row = mysqli_fetch_assoc($result);
    $table_items[] = $row;
  }
  return $table_items;
}
