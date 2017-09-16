<?php

  $path = 'img/galery/FullSize/';
  $tmp_path = 'img/galery/tmp/';
  $path_min = 'img/galery/';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadfile = $path . basename($_FILES['picture']['name']);
    $file = $_FILES['picture'];
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
              if ($file['type'] == 'image/jpeg')
                $source = imagecreatefromjpeg($file['tmp_name']);
              elseif ($file['type'] == 'image/png')
                $source = imagecreatefrompng($file['tmp_name']);
              elseif ($file['type'] == 'image/gif')
                $source = imagecreatefromgif($file['tmp_name']);
              else
                return false;
                    if ($quality == null) $quality = 75;
                    $w = 200;
                    $w_src = imagesx($source);
                    $h_src = imagesy($source);
                    $ratio = $w_src / $w;
                    $w_dest = round($w_src / $ratio);
                    $h_dest = round($h_src / $ratio);
                    $dest = imagecreatetruecolor($w_dest, $h_dest);
                    imagecopyresampled($dest, $source, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
                    imagejpeg($dest, $tmp_path . $file['name'], $quality);
                    imagedestroy($dest);
                    imagedestroy($source);
                    $name = $file['name'];
                    if (!@copy($tmp_path . $name, $path_min . $name))
                      echo '<p>Что-то пошло не так.</p>';
                    else
                      unlink($tmp_path . $name);
    } else {
     echo "Возможная атака с помощью файловой загрузки!\n";
    }
    print_r($_FILES);
  }
  // $types = array('image/gif', 'image/png', 'image/jpeg');
  // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  //   if (!in_array($_FILES['picture']['type'], $types))
  //   die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
  //   if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
  //     echo 'Что-то пошло не так';
  //   else {
  //         $file = $_FILES['picture'];
  //         if ($file['type'] == 'image/jpeg')
  //           $source = imagecreatefromjpeg($file['tmp_name']);
  //         elseif ($file['type'] == 'image/png')
  //           $source = imagecreatefrompng($file['tmp_name']);
  //         elseif ($file['type'] == 'image/gif')
  //           $source = imagecreatefromgif($file['tmp_name']);
  //         else
  //           return false;
  //     if ($quality == null) $quality = 75;
  //     $w = 200;
  //     $w_src = imagesx($source);
  //     $h_src = imagesy($source);
  //     $ratio = $w_src / $w;
  //     $w_dest = round($w_src / $ratio);
  //     $h_dest = round($h_src / $ratio);
  //     $dest = imagecreatetruecolor($w_dest, $h_dest);
  //     imagecopyresampled($dest, $source, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
  //     imagejpeg($dest, $tmp_path . $file['name'], $quality);
  //     imagedestroy($dest);
  //     imagedestroy($source);
  //     $name = $file['name'];
  //     if (!@copy($tmp_path . $name, $path_min . $name))
  //       echo '<p>Что-то пошло не так.</p>';
  //     else
  //       unlink($tmp_path . $name);
  //   }
  //
  // }
