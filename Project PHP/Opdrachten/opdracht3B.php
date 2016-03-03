<?php
$i = 0;
$mod1 = 4;
$mod2 = 7;
$onder = 1000;
$totaal = 0;
for ($getal=1; $getal < $onder; $getal++) {
    if ($getal % $mod1 ===0 or $getal % $mod2 ===0) {
        $totaal = $totaal + $getal;
        $i++;
    }
}
echo "De som van alle vermenigvuldigingen van ".$mod1." en ".$mod2." onder de ".$onder." = ".$totaal;
?>