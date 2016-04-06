<?php
/**
 * Admin Gebruikers
 *
 * toevoegen
 * wijzigen
 * verwijderen
 * zoeken
 *
 */

$content = new TemplatePower("html/gebruikers.html");
$content->prepare();

$content->assign("TITLE", "Gebruikers");


try{
	$select = $verbinding->query("SELECT voornaam, tussenvoegsel, achternaam FROM gebruikers");
	$select->execute();

	while($gebruiker = $select->fetch()) {
		$content->newBlock("GEBRUIKERS");
		$content->assign("VOORNAAM", $gebruiker['voornaam']);
		$content->assign("TUSSENV", $gebruiker['tussenvoegsel']);
		$content->assign("ACHTERNAAM", $gebruiker['achternaam']);
	}
}catch(PDOException $error){
	echo $error->getMessage(); die;
}




