<?php
$a = 5;
$b = 9;
$c = 3;
$d = 18;

var_dump($a++ + $c < $b);

$a = 5;
$b = 9;
$c = 3;
$d = 18;

var_dump(--$a - $c or $d++ / $b == 2);

$a = 5;
$b = 9;
$c = 3;
$d = 18;

var_dump($c * $d == 50 xor $b * $c == 27);

$a = 5;
$b = 9;
$c = 3;
$d = 18;

var_dump($b / $c == 3 and 9 % 5 == 0);
?>