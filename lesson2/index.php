<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>ДЗ по второму уроку</title>
  </head>
  <body>
    <header>
      <h1>Курс PHP1. ДЗ по уроку 2</h1>
    </header>
    <div class="main">
      <div class="task">
        <p>Задание № 1</p>
          <h3>1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:</h3>
          <pre>если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
ноль можно считать положительным числом.</pre><br>
<?php

function task1()
{
    $a = 5;
    $b = -8;
    echo "a= $a".'<br>';
    echo "b= $b".'<br>';
    if ($a >= 0 && $b >= 0) {
      if ($a > $b) return ($a - $b);
        else return ($b - $a);
      }
     else if ($a < 0 && $b < 0) return ($a * $b);
     else if (($a < 0 && $b >= 0) || ($a >= 0 && $b < 0)) return ($a + $b);
}
$c = task1();
echo "Результат= $c";
?>
      </div>
      <div class="task">
        <p>Задание № 2</p>
        <?php
        $hourNow = date('H');
        $minutsNow = date('i');
        echo "Сейчас $hourNow : $minutsNow<br>";
        if (6 <= $hourNow && $hourNow < 9) {
          echo "умыться<br>";
          echo "позавтракать<br>";
          echo "поехать на работу<br>";
        } else if (9 <= $hourNow && $hourNow < 12) {
          echo "поработать<br>";
        } else if (12 <= $hourNow && $hourNow < 15) {
          echo "пообедать<br>";
          echo "поработать<br>";
        } else if (15 <= $hourNow && $hourNow < 18) {
          echo "позвонить домой - узнать что купить в магазине<br>";
          echo "поработать<br>";
        } else if (18 <= $hourNow && $hourNow < 21) {
          echo "заехать в магазин<br>";
        } else if (21 <= $hourNow && $hourNow < 24) {
          echo "поужинать<br>";
          echo "умыться<br>";
          echo "лечь спать<br>";
        } else if (0 <= $hourNow && $hourNow < 6) {
          echo "СПАТЬ<br>";
        }

         ?>
      </div>
      <div class="task">
        <p>Задание № 3</p>
        <?php
        $month = 10;
        switch ($month) {
          case '1':
            echo "Вы выбрали месяц Январь<br>";
            break;
          case '2':
            echo "Вы выбрали месяц Февраль<br>";
            break;
          case '3':
            echo "Вы выбрали месяц Март<br>";
            break;
          case '4':
            echo "Вы выбрали месяц Апрель<br>";
            break;
          case '5':
            echo "Вы выбрали месяц Май<br>";
            break;
          case '6':
            echo "Вы выбрали месяц Июнь<br>";
            break;
          case '7':
            echo "Вы выбрали месяц Июль<br>";
            break;
          case '8':
            echo "Вы выбрали месяц Август<br>";
            break;
          case '9':
            echo "Вы выбрали месяц Сентябрь<br>";
            break;
          case '10':
            echo "Вы выбрали месяц Октябрь<br>";
            break;
          case '11':
            echo "Вы выбрали месяц Ноябрь<br>";
            break;
          case '12':
            echo "Вы выбрали месяц Декабрь<br>";
            break;

          default:
            echo "Такого месяца не существует";
            break;
        }
         ?>
      </div>
      <div class="task">
        <p>Задание № 4</p>
        <?php
          $min = 10;
          $city = 194;
          switch ($city) {
            case '905':
              $tarif = 4.15;
              $cityName = 'Москву';
              break;
            case '194':
              $tarif = 1.98;
              $cityName = 'Ростов';
              break;
            case '491':
              $tarif = 2.69;
              $cityName = 'Краснодар';
              break;
            case '800':
              $tarif = 5.00;
              $cityName = 'Киров';
              break;

            default:
              $tarif = 'неопределенное количество';
              $cityName = 'Неизвестнай город';
              break;
          }
          $price = $tarif * $min;
          echo "Стоимость 10 минутного звонка в $cityName будет равна $price руб.<br>";
         ?>
      </div>
      <div class="task">
        <p>Задание № 5</p>
        <?php
          function sum($a, $b) {return ($a + $b);}
          function sub($a, $b) {return ($a - $b);}
          function mul($a, $b) {return ($a * $b);}
          function devide($a, $b) {return ($a / $b);}
          $s = sum(5,7);
          $su = sub(10, 4);
          $m = mul(3, 7);
          $d = devide(134, 3);
          echo "Суммирование: 5 + 7 = $s<br>";
          echo "Вычитание: 10 - 4 = $su<br>";
          echo "Умножение: 3 * 7 = $m<br>";
          echo "Деление: 134 / 3 = $d<br>";

         ?>
      </div>
      <div class="task">
        <p>Задание № 6*</p>
        <?php
            function timeShow(){
            date_default_timezone_set('Europe/Moscow');
            $hourNow = date('H');
            $minutsNow = date('i');
            if ($hourNow == 1 || $hourNow == 21) {
              $hourText = 'час';
            } else if ($hourNow >= 2 && $hourNow <= 4 || $hourNow >= 22 && $hourNow <= 24) {
              $hourText = 'часа';
            } else if ($hourNow >= 5 && $hourNow <= 20) {
              $hourText = 'часов';
            }
            if ($minutsNow == 1 || $minutsNow == 21 || $minutsNow == 31 || $minutsNow == 41 || $minutsNow == 51) {
              $minutText = 'минута';
            } else if ($minutsNow >= 2 && $minutsNow >= 4 || $minutsNow >= 22 && $minutsNow >= 24 || $minutsNow >= 32 && $minutsNow >= 34 || $minutsNow >= 42 && $minutsNow >= 44 || $minutsNow >= 52 && $minutsNow >= 54) {
              $minutText = 'минуты';
            } else if ($minutsNow == 0 || $minutsNow >= 5 && $minutsNow >= 20 || $minutsNow >= 25 && $minutsNow >= 30 || $minutsNow >= 35 && $minutsNow >= 40 || $minutsNow >= 45 && $minutsNow >= 50 || $minutsNow >= 55 && $minutsNow >= 59){
              $minutText = 'минут';
            }
            return "Сейчас $hourNow $hourText : $minutsNow $minutText";
          }
          $timeNow = timeShow();
          echo "$timeNow";
         ?>
      </div>
    </div>
  </body>
</html>
