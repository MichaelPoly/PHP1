<?php

$b = array ('User' => 'Вася', 'TyoeOfUser' => 'Admin');
$c = array('id' => 1, 'User' => 'Вася', 'TyoeOfUser' => 'Admin');
$result = print_r($b, true);
echo "$result".'<br><br>';

$result1 = var_dump($c);
echo "$result1".'<br><br>';

$result2 = var_export($b);
echo "$result2".'<br>';
