<?php
  $dc = curl_init("https://geekbrains.ru");
  $html = file_get_contents('https://geekbrains.ru');
    // print_r($html);
  $fp = fopen('C:\xampp\htdocs\PHP1\lesson4\Geek.txt', "w+");
  $regExp = "/<a.*<\/a>/";
  preg_match_all($regExp, $html, $matches);
  foreach ($matches as $value) {
    file_put_contents('C:\xampp\htdocs\PHP1\lesson4\Geek.txt', $value);
  }
  fclose($fp);
  curl_close($dc);
  mkdir('C:\xampp\htdocs\PHP1\lesson4\text');
  for ($i=0; $i < 5; $i++) {
    $path = 'C:\xampp\htdocs\PHP1\lesson4\text\geek'.$i.'.txt';
    $file = fopen($path, "x");
    fclose($file);
  }

  $file1 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek0.txt', "r+");
  $str = "Полыгалов Михаил Евгеньевич\n Индивидуальный Предприниматель\n Казань";
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek0.txt', $str);
  fclose($file1);

  rename('C:\xampp\htdocs\PHP1\lesson4\text\geek1.txt', 'C:\xampp\htdocs\PHP1\lesson4\text\content.txt');
  $fsize = filesize('C:\xampp\htdocs\PHP1\lesson4\text\geek0.txt');
  $file2 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\content.txt', "r+");
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\content.txt', $fsize);
  fclose($file2);
  $str1 = 'Строка номер один';
  $str2 = 'Строка номер два';
  $str3 = 'Строка номер три';
  $file3 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek2.txt', "r+");
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek2.txt', $str1);
  $file4 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek3.txt', "r+");
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek3.txt', $str2);
  $file5 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek4.txt', "r+");
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek4.txt', $str3);
  fclose($file3);
  fclose($file4);
  fclose($file5);
  $file6 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek3.txt', "r");
  $file7 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek4.txt', "r");
  $content1 = file_get_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek3.txt');
  $content2 = file_get_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek4.txt');
  $file8 = fopen('C:\xampp\htdocs\PHP1\lesson4\text\geek2.txt', "a");
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek2.txt', $content1);
  file_put_contents('C:\xampp\htdocs\PHP1\lesson4\text\geek2.txt', $content2);
  fclose($file6);
  fclose($file7);
  fclose($file8);
  unlink('C:\xampp\htdocs\PHP1\lesson4\text\geek3.txt');
  unlink('C:\xampp\htdocs\PHP1\lesson4\text\geek4.txt');
 ?>
