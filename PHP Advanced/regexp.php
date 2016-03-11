<?php
$text = 'Burger King Nederland krijgt een nieuwe eigenaar.
De huidige aandeelhouder Citoyen Food Group verkoopt het bedrijf aan investeringsmaatschappij Standard Investment.
Er werden geen financiële details bekendgemaakt.
Burger King Nederland bestaat uit 27 restaurants met in totaal veertienhonderd werknemers.
Het concern is een franchisenemer van de Amerikaanse fastfoodketen.
Onder andere de vestiging bij Schiphol, naar omzet de grootste vestiging van Burger King ter wereld, valt onder het bedrijf.
In totaal zijn er zestig vestigingen van Burger King in Nederland.
De rest van de resturants hebben een andere eigenaar.
Nieuwe restaurants Standard Investments zegt met Burger King meer nieuwe restaurants te willen openen.
"Het is voor ons een kans om een goedlopende onderneming naar een hoger niveau te tillen", aldus Hendrik Jan ten Have, partner bij Standard Investment.
BurgerKing maakt wereldwijd al een sterke groei door.
Waar de keten in 2009 nog 12.000 restaurants omvatte, is dat in 2014 toegenomen tot bijna 14.500.';
$text = htmlentities($text);
$text = explode("\n", $text);

foreach ($text as $value) {
    print $value;
}

echo "<br><br>";

if (preg_grep("/Burger/", $text)) {
    echo "Het woord Burger komt voor in de tekst<br>";
} else {
    echo "Het woord Burger komt niet voor in de tekst<br>";
}

echo "<br>";

$match = preg_grep("/restaurant/", $text);

if (count($match) != 0) {
    echo "Het woord restaurant komt ".count($match)." keer voor in de tekst<br>";
    foreach ($match as $value) {
        print $value."<br>";
    }
} else {
    echo "Het woord restaurant kom niet voor in de tekst<br>";
}

echo "<br>";

$match = preg_grep("/In .*/m", $text);

if (count($match) != 0) {
    echo "Zinnen die beginnen met \"In\"<br>";
    foreach ($match as $value) {
        print $value."<br>";
    }
} else {
    echo "Geen zin begint met \"In\"<br>";
}

echo "<br>";

$match = preg_grep("/.*\sinvestment\./im", $text);

if (count($match) != 0) {
    echo "Zinnen die eindigen met \"investment\"<br>";
    foreach ($match as $value) {
        print $value."<br>";
    }
} else {
    echo "Geen zin eindigt met \"investment\"<br>";
}

echo "<br>";

$match = preg_grep("/\".*\"/m", $text);

if (count($match) != 0) {
    echo "Zinnen die beginnen en eindigen met \"<br>";
    foreach ($match as $value) {
        print $value."<br>";
    }
} else {
    echo "Geen zin met \"\"<br>";
}