<?php

include_once("php/include/class.TemplatePower.inc.php");
include_once("php/header.php");

include_once("php/include/database.php");

if (isset($_GET['pageid'])) {
	
	$count = $verbinding->prepare("SELECT count(*) FROM bestanden WHERE idbestanden=:id");
	$count->bindParam(':id', $_GET['pageid']);
	$count->execute();


	if ($count->fetchColumn() == 1) {
		$get_pagina = $verbinding->prepare("SELECT * FROM bestanden WHERE idbestanden=:id");
		$get_pagina->bindParam(':id', $_GET['pageid']);
		$get_pagina->execute();
		$pagina = $get_pagina->fetch(PDO::FETCH_ASSOC);

		if (file_exists("php/" . $pagina['naam'] . ".php")) {
			include_once("php/" . $pagina['naam'] . ".php");
		} else {
			include_once("php/content.php");
		}
	} else {
		include_once("php/content.php");
	}
} else {
	include_once("php/content.php");
}


include_once("php/aside.php");
include_once("php/footer.php");