
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php

    $a = 5;
    $b = '05';
    echo var_dump($a == $b)." == - сравнивает только значение и не сравнивает тип переменной".'<br>';
    echo var_dump((int)'012345')." int - преобразует в целое число, по этому 0 отбрасывается".'<br>';
    echo var_dump((float)123.0 === (int)123.0)." === сравнивает не только значение, но и тип переменной".'<br>'; //
    echo var_dump((int)0 === (int)'hello, world')." -(int)'hello, world' - преобразует строку в целое число, в данном случае число будет 0, а так как тип переменных совпадает, то результат будет true".'<br><br>';
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
