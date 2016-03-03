<?php
$a3 = array(
    7 => "Piet Paulus",
    4 => "Robbert Long",
    2 => "Donald Duck",
    1 => "Jan Pet",
    3 => "Mohammad Mali",
    0 => "Ray Charles"
);

foreach ($a3 as $id => $value) {
    echo $id."=".$value."<br>";
}

echo "<br>";
sort($a3);
echo $a3[3];
echo "<br>";
$a3[count($a3)] = "Ronald Nijssen";
echo "<br>";

foreach ($a3 as $id => $value) {
    echo $id."=".$value."<br>";
}