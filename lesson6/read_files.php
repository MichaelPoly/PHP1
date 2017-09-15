<?php
  if (!empty($_POST)) {
    $files = [];
    $dir = $_POST['directory'];
    $handle = opendir($dir);
    while (false !== ($file = readdir($handle))) {
      $files = $file;
    }
    
    echo json_encode($files);
  }
