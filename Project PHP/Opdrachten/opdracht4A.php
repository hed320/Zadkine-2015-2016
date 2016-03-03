<?php
$f1 = 1;
$f2 = 0;
$fn = 1;
$length = 12;

while (strlen($fn) <= $length) {
    /*
    echo $f1." ";
    echo $f2." ";
    echo $fn."<br>";
    */
    $f1 = $f2;
    $f2 = $fn;
    $fn = $f1 + $f2;
}
echo $fn." is het eerste getal dat een lengte heeft van 12 cijfers.";
?>