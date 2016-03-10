<?php

$content = new TemplatePower("html/gebruikers.html");
$content->prepare();

$verbinding = new PDO("mysql:host=localhost;dbname=project3", "root", "");

$getusers = $verbinding->query("SELECT voornaam, achternaam, email from gebruikers");

while ($gebruikers = $getusers->fetch(PDO::FETCH_ASSOC)) {
    $content->newBlock("rij");
    $content->assign(array(
        "voornaam" => $gebruikers["voornaam"],
        "achternaam" => $gebruikers["achternaam"],
        "email" => $gebruikers["email"]
    ));
}