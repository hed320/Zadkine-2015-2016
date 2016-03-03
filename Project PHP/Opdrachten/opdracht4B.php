<?php
$resultaat = 0;
$i = 0;
$nieuw = 0;
$deel = 1;
$tel = 0;
while (strlen($tel != 10)) {
    $i++;
    $resultaat = $resultaat + $i;
    //var_dump($resultaat);
    if ($resultaat % $deel == 0) {
        $tel++;
        //if ($deel > $resultaat) {
        //    break;
        //}
    }
    $nieuw++;
}
echo $resultaat." is deelbaar door ".$tel." getallen."
?>