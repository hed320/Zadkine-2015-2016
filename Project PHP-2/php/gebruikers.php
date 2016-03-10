<?php

$content = new TemplatePower("html/gebruikers.html");
$content->prepare();

try {
    $verbinding = new PDO("mysql:host=localhost;dbname=project3", "root", "");
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Regelnummer : ".$error->getLine()."<br>";
    echo "Bestand : ".$error->getFile()."<br>";
    echo "Foutmelding : ".$error->getMessage()."<br>";
}

/*
$getusers = $verbinding->query("SELECT voornaam, achternaam, email from gebruikers");

while ($gebruikers = $getusers->fetch(PDO::FETCH_ASSOC)) {
    $content->newBlock("rij");
    $content->assign(array(
        "voornaam" => $gebruikers["voornaam"],
        "achternaam" => $gebruikers["achternaam"],
        "email" => $gebruikers["email"]
    ));
}
*/

try {
    //Met externe variabel, prepare/PDO variabel gebruiken zoals :id.
    $getusers = $verbinding->prepare("SELECT voornaam, achternaam, email FROM gebruikers WHERE idgebruikers = :id");
    $getusers->bindParam(":id", $_GET["id"]);
    $getusers->execute();
} catch(PDOException $error) {
    echo "Regelnummer : ".$error->getLine()."<br>";
    echo "Bestand : ".$error->getFile()."<br>";
    echo "Foutmelding : ".$error->getMessage()."<br>";
}

while ($gebruikers = $getusers->fetch(PDO::FETCH_ASSOC)) {
    $content->newBlock("rij");
    $content->assign(array(
        "voornaam" => $gebruikers["voornaam"],
        "achternaam" => $gebruikers["achternaam"],
        "email" => $gebruikers["email"]
    ));
}