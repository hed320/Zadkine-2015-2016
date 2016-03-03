<?php
echo "<title>Klassenlijst</title>";
$leerlingen = array(
    "Ronald Nijssen",
    "Ziya Mert",
    "Sybrand Nagelmaker",
    "Max Oosterveen",
    "Richard Belle",
    "Gracia Latumahina",
    "Enes Eser",
    "Joël Ignacius",
    "Daan de Koning",
    "Jordy Brussee",
    "Jaimy Heath",
    "Fábio de Carvalho Tavares",
    "Angelo Joemai",
);

echo "<h1>Klassenlijst</h1>";
echo "<ul></ul>";
/*
 * echo "<h2 style='margin-bottom: 0px;'>Foreach:</h2>";
 * foreach ($leerlingen as $value) {
 * echo "<li style='list-style-type: none;'>$value</li>";
}*/

echo "<h2 style='margin-bottom: 0px;'>For loop:</h2>";
$arrlength = count($leerlingen);
for ($x=0; $x < $arrlength; $x++) {
    echo "<li style='list-style-type: none;'>$leerlingen[$x]</li>";
}
?>