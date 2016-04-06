<?php

$content = new TemplatePower("html/locaties.html");
$content->prepare();

include_once("include/database.php");

if (isset($_GET['actie'])) {
	$actie = $_GET['actie'];
} else {
	$actie = NULL;
}

$content->assign('PAGEID', $pagina['idbestanden']);

switch ($actie) {
	case 'wijzigen':
		if (!empty($_POST['naam']) AND !empty($_POST['adres'])	AND !empty($_POST['plaats'])) {
			$wijzigen = $verbinding->prepare("UPDATE locatie SET  WHERE idlocatie = :idlocatie");
		}

		$wijzigen = $verbinding->prepare("SELECT * FROM locatie WHERE idlocatie = :idlocatie");
		$wijzigen->bindParam(":idlocatie", $_GET["locatieid"]);
		$wijzigen->execute();

		$locatie = $wijzigen->fetch(PDO::FETCH_ASSOC);

		$content->newBlock('FORMULIER');
		$content->assign('ACTION', "wijzigen");
		$content->assign('PAGEID', $pagina['idbestanden']);
		$content->assign([
			"ID" => $locatie["idlocatie"],
			"NAAM" => $locatie["naam"],
			"ADRES" => $locatie["adres"],
			"PLAATS" => $locatie["plaats"]
		]);
		break;
	case 'toevoegen':

		if (!isset($_POST['naam']) && !isset($_POST['adres']) && !isset($_POST['plaats'])) {
			$content->newBlock('FORMULIER');
			$content->assign('PAGEID', $pagina['idbestanden']);
			$content->assign('ACTION', 'toevoegen');
		} else {

			try {
				$toevoegen = $verbinding->prepare("INSERT INTO locatie SET naam = :naam, adres = :adres, plaats = :plaats");
				$toevoegen->bindParam(':naam', $_POST['naam']);
				$toevoegen->bindParam(':adres', $_POST['adres']);
				$toevoegen->bindParam(':plaats', $_POST['plaats']);

				$toevoegen->execute();

				$content->newBlock('SUCCES');
				$content->assign('SUCCES', 'Het toevoegen is gelukt');

			} catch (PDOException $error) {
				$content->newBlock('ERROR');
				$content->assign('ERROR', 'Het toevoegen is mislukt');
			}
		}
		break;
	default:

		$locaties = $verbinding->query("SELECT * FROM locatie");
		$locaties->execute();

		$content->newBlock('OVERZICHT');
		while ($locatie = $locaties->fetch(PDO::FETCH_ASSOC)) {
			$content->newBlock('RIJ');
			$content->assign([
				'NAAM' => $locatie['naam'],
				'ADRES' => $locatie['adres'],
				'PLAATS' => $locatie['plaats']
			]);
		}
}
