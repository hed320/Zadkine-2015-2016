<?php
$a = 5;
$b = 9;
$c = 3;
$d = 18;

print "Resultaat 1 = ".$resultaat1 = $a + $b."<br>";
print "Resultaat 2 = ".$resultaat2 = $d / $b."<br>";
print "Resultaat 3 = ".$resultaat3 = $a * $c."<br>";
print "Resultaat 4 = ".$resultaat4 = $b - $c."<br>";

var_dump($resultaat1 > $resultaat3);
var_dump($resultaat2 == $resultaat4);
var_dump($resultaat1 + $resultaat2 <= $resultaat3);
?>