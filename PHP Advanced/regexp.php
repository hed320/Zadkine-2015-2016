<?php
$text = "Burger King Nederland krijgt een nieuwe eigenaar.
De huidige aandeelhouder Citoyen Food Group verkoopt het bedrijf aan investeringsmaatschappij Standard Investment.
Er werden geen financiële details bekendgemaakt.
Burger King Nederland bestaat uit 27 restaurants met in totaal veertienhonderd werknemers.
Het concern is een franchisenemer van de Amerikaanse fastfoodketen.
Onder andere de vestiging bij Schiphol, naar omzet de grootste vestiging van Burger King ter wereld, valt onder het bedrijf.
In totaal zijn er zestig vestigingen van Burger King in Nederland.
De rest van de resturants hebben een andere eigenaar.
Nieuwe restaurants Standard Investments zegt met Burger King meer nieuwe restaurants te willen openen.
\"Het is voor ons een kans om een goedlopende onderneming naar een hoger niveau te tillen\", aldus Hendrik Jan ten Have, partner bij Standard Investment.
BurgerKing maakt wereldwijd al een sterke groei door.
Waar de keten in 2009 nog 12.000 restaurants omvatte, is dat in 2014 toegenomen tot bijna 14.500.";
$text = htmlentities($text);

print $text."<br><br>";

if (preg_match("/Burger/", $text)) {
    echo "Het woord Burger komt voor in de tekst<br>";
} else {
    echo "Het woord Burger komt niet voor in de tekst<br>";
}

echo "<br>";

if (preg_match_all("/restaurant/", $text, $match)) {
    $occ = count($match[0]);
    if ($occ != 0) {
        echo "Het woord restaurant komt ".$occ." Keer voor in de tekst<br>";
    }
} else {
    echo "Het woord restaurant kom niet voor in de tekst<br>";
}

echo "<br>";

if (preg_match_all("/^In .*/m", $text, $match)) {
    echo "Zinnen die beginnen met \"In\"<br>";
    foreach ($match[0] as $value) {
        print $value."<br>";
    }
} else {
    echo "Geen zin begint met \"In\"<br>";
}

echo "<br>";

if (preg_match_all("/.*\sinvestment\./im", $text, $match)) {
    echo "Zinnen die eindigen met \"investment\"<br>";
    foreach ($match[0] as $value) {
        print $value."<br>";
    }
} else {
    echo "Geen zin eindigt met \"investment\"<br>";
}

echo "<br>";

if (preg_match_all("/^\" .*\"\s*/m", $text, $match)) {
    echo "Zinnen die beginnen en eindigen met \"<br>";
    foreach ($match[0] as $value) {
        print $value."<br>";
    }
} else {
    echo "Geen zin begint en eindigt met \"<br>";
}

//Komt er een zin voor begint met “ en eindigt met “