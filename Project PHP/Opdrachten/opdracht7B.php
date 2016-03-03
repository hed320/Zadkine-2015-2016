<?php
echo "<title>Klassenlijst</title>";
$leerlingen = array(
    "0"=>"Ronald Nijssen",
    "1"=>"Ziya Mert",
    "2"=>"Sybrand Nagelmaker",
    "3"=>"Max Oosterveen",
    "4"=>"Richard Belle",
    "5"=>"Gracia Latumahina",
    "6"=>"Enes Eser",
    "7"=>"Joël Ignacius",
    "8"=>"Daan de Koning",
    "9"=>"Jordy Brussee",
    "10"=>"Jaimy Heath",
    "11"=>"Fábio de Carvalho Tavares",
    "12"=>"Angelo Joemai",
);

$age = array(
    "0"=>19,
    "1"=>21,
    "2"=>18,
    "3"=>20,
    "4"=>17,
    "5"=>19,
    "6"=>18,
    "7"=>20,
    "8"=>21,
    "9"=>18,
    "10"=>18,
    "11"=>19,
    "12"=>20,
);

$woonplaats = array(
    "0"=>"Vlaardingen",
    "1"=>"Rotterdam",
    "2"=>"Rotterdam",
    "3"=>"Vlaardingen",
    "4"=>"Schiedam",
    "5"=>"Rotterdam",
    "6"=>"Den Haag",
    "7"=>"Rotterdam",
    "8"=>"Schiedam",
    "9"=>"Rotterdam",
    "10"=>"Schiedam",
    "11"=>"Rotterdam",
    "12"=>"Rotterdam",
);

echo "<h1>Klassenlijst</h1>";
echo "<ul></ul>";
/*
 * echo "<h2 style='margin-bottom: 0px;'>Foreach:</h2>";
 * foreach ($leerlingen as $value) {
 * echo "<li style='list-style-type: none;'>$value</li>";
}*/

//echo "<h2 style='margin-bottom: 0px;'>For loop:</h2>";
$arrlength = count($leerlingen);
for ($x=0; $x < $arrlength; $x++) {
    echo "<li style='list-style-type: none;'>".$leerlingen[$x]." is ".$age[$x]." jaar oud en woont in ".$woonplaats[$x]."</li>";
}
?>