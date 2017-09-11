<?php
  // $dc = curl_init("https://geekbrains.ru");
  $html = file_get_contents('https://geekbrains.ru');
  $fp = fopen('Geek.txt', "w+");
  $regExp = "/<a.*<\/a>/";
  preg_match_all($regExp, $html, $matches);
  foreach ($matches as $value) {
    file_put_contents('Geek.txt', $value);
  }
  fclose($fp);
  mkdir('text');
  for ($i=0; $i < 5; $i++) {
    $path = 'text/geek'.$i.'.txt';
    $file = fopen($path, "x");
    fclose($file);
  }

  $file1 = fopen('text/geek0.txt', "r+");
  $str = "Полыгалов Михаил Евгеньевич\n Индивидуальный Предприниматель\n Казань";
  file_put_contents('text/geek0.txt', $str);
  fclose($file1);

  rename('text/geek1.txt', 'text/content.txt');
  $fsize = filesize('text/geek0.txt');
  $file2 = fopen('text/content.txt', "r+");
  file_put_contents('text/content.txt', $fsize);
  fclose($file2);
  $str1 = 'Строка номер один';
  $str2 = 'Строка номер два';
  $str3 = 'Строка номер три';
  $file3 = fopen('text/geek2.txt', "r+");
  file_put_contents('text/geek2.txt', $str1);
  $file4 = fopen('text/geek3.txt', "r+");
  file_put_contents('text/geek3.txt', $str2);
  $file5 = fopen('text/geek4.txt', "r+");
  file_put_contents('text/geek4.txt', $str3);
  fclose($file3);
  fclose($file4);
  fclose($file5);
  $file6 = fopen('text/geek3.txt', "r");
  $file7 = fopen('text/geek4.txt', "r");
  $content1 = file_get_contents('text/geek3.txt');
  $content2 = file_get_contents('text/geek4.txt');
  $content3 = $content1.'\n'.$content2;
  $file8 = fopen('text/geek2.txt', "a");
  file_put_contents('text/geek2.txt', $content3);
  fclose($file6);
  fclose($file7);
  fclose($file8);
  unlink('text/geek3.txt');
  unlink('text/geek4.txt');
 ?>
