<?php
$klaretekst = "morgen aanvallen";
$method = "AES-128-CBC";
$wachtwoord = "geheim";
$cijfertekst = "";
$options = 0;
$iv = "0000000000000000";

echo "Klare tekst: ".$klaretekst."<br>";
echo "Cijfer methode: ".$method."<br>";
echo "Wachtwoord: ".$wachtwoord."<br>";
echo "Cijfertekst: ".$cijfertekst."<br>";
echo "Opties: ".$options."<br>";
echo "Init vector: ".$iv."<br>";
echo "<br>";

$cijfertekst = openssl_encrypt($klaretekst, $method, $wachtwoord, $options, $iv);

echo "Cijfer tekst: ".$cijfertekst."<br><br>";

$ontcijfertekst = openssl_decrypt($cijfertekst, $method, $wachtwoord, $options, $iv);

echo "Ontcijfer tekst: ".$ontcijfertekst."<br>";