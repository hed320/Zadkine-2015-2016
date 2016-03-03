<?php
echo "Hello world!<br>";
$voornaam = "Ronald";
$achternaam = "Nijssen";
$leeftijd = 18;

//$eenVariabeleMetMeerdereWoorden;

echo "Ik ben $voornaam $achternaam en ik ben $leeftijd jaar oud.<br>";

// één regel commentaar
/*
 * Meedere
 * regels
 * commentaar.
 */

/*
 * Database variabelen.
 * Integer = Heel getal
 * Decimal = Komma getal
 * Varchar = Stukje tekst.
 * Text = Veel tekst
 */

/*
 * PHP Variabelen.
 * Integer = Heel getal
 * Float = Komma getal
 * String = Tekst
 * Boolean = True/False (1/0)
 */

$eenInt = 5;
$eenFloat = 5.5;
$eenString = "een stuk tekst";

$eenInt = "7";

print "Het eerste getal is :".$eenInt."<br>";
$eenInt = "10";
print $eenInt." Is het 2e getal.<br>";

print "Het tweede getal is : $eenInt<br>";
print 'Het eerste getal is : '.$eenInt.' <br>';

?>