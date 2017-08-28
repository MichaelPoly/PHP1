
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php


    $title = 'ДЗ по первому уроку PHP1';
    $dateNow = getdate();
    $dateNow = 'На дворе у нас '.$dateNow['year'].' год';

    ?>
    <title><?=$title ?></title>
  </head>
  <body>
    <header style="width: 100%; height: 10vh; border: 1px solid black;">
      <h1><?=$dateNow?></h1>
    </header>
  </body>
</html>
