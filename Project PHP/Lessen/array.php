<?php
$a1 = array(1,3,5,7,9,13,15);

foreach ($a1 as $value) {
    var_dump($value);
}

$a2 = array('1','3','5','7','9','13','15');

foreach ($a2 as $value) {
    var_dump($value);
}

array_push($a1, -2, 2 ,4 ,14);
array_push($a2, '-2', '2', '4', '14');

foreach ($a1 as $value) {
    print $value.",";
}

echo "<br>";

foreach ($a2 as $value) {
    print $value.",";
}

echo "<br>";

sort($a1);
sort($a2);

foreach ($a1 as $value) {
    print $value.",";
}

echo "<br>";

foreach ($a2 as $value) {
    print $value.",";
}

echo "<br>";

echo $a1[5];
echo "<br>";
echo $a2[5];
