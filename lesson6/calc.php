<?php

if (!empty($_POST)) {
    $a = $_POST["first_num"];
    $b = $_POST["second_num"];
    $operator = $_POST["operator"];
    switch ($operator) {
      case 'sum':
        $c = $a + $b;
        break;
      case 'sub':
        $c = $a - $b;
        break;
      case 'mul':
        $c = $a * $b;
        break;
      case 'dev':
        $c = $a / $b;
        break;

      default:
        $c = 'Неверный опреатор';
        break;
    }
    echo json_encode($c);
    return json_encode($c);
  }
