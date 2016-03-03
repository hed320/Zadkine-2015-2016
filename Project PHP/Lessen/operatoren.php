<?php

$var1 = 5;
$var2 = 3;
$var3 = 18;
$var4 = 8;

//Uitgeschreven.
$resultaat = $var1 + $var2;
$var1 = $var1 + $var2;

//Afgekorte methode
$var1 += $var2;
$var1 -= $var2;

//modulus is een restwaarde. hoeveel keer past $var4 in $var3
// 8 past 2x in 18. 18 - (2*8) = 2
$resultaat = $var3 % $var4;

// $var3 tot de macht $var4
//$resultaat = $var3 ** $var4;

print $resultaat."<br>";

$var1 = 5;
$var2 = 5;
$var3 = 4;
$var4 = "4";

var_dump($var1 == $var2);
var_dump($var1 == $var3);

//Zelfde waarde.
var_dump($var3 == $var4);
//Zelde waarde en zelfde soort.
var_dump($var3 === $var4);

var_dump($var3 != $var4);
var_dump($var3 !== $var4);

var_dump($var2 > $var3);

$var1 = 5;
$var2 = 4;

print ++$var1; //6
print $var1++; //erna met 1 verhoogd dus 7
print ++$var1; // is al 7 + 1 = 8

$var1 = 5;
$var2 = 5;
$var3 = 4;
$var4 = 8;

/*
 * and = beide true
 * or = één true minimaal
 * xor = één true één fout
 */
var_dump($var1 == 5 and $var2 == 6); //false
var_dump($var1 == 5 or $var2 == 6); //true
var_dump($var1 + $var2 > 9 and $var4 % $var3 == 1); //false
var_dump($var3 * 2 == $var4 xor $var1 + $var3 != 8); //false