<?php
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

function get_table($link, $table)
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
