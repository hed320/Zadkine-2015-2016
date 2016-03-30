<?php

$content = new TemplatePower("html/gebruikers.html");
$content->prepare();

include_once "include/database.php";

if(isset($_GET['actie'])){
    $actie = $_GET['actie'];
}else{
    $actie = NULL;
}

switch($actie){
    case "toevoegen":
        // html require werkt niet met sommige oude browsers dus ook dit gebruiken voor veiligheid.
        if(!empty($_POST["voornaam"]) and !empty($_POST["achternaam"]) and !empty($_POST["email"])){
            try {
                $insert = $verbinding->prepare("INSERT INTO gebruikers SET voornaam = :voornaam, achternaam = :achternaam, email = :email");
                $insert->bindParam(":voornaam", $_POST["voornaam"]);
                $insert->bindParam(":achternaam", $_POST["achternaam"]);
                $insert->bindParam(":email", $_POST["email"]);
                $insert->execute();

                $content->newBlock("SUCCESS");
                $content->assign("SUCCESS", "De gebruiker is toegevoegd");
            } catch (PDOException $error){
                $content->newBlock("ERROR");
                $content->assign("ERROR", "De gebruiker kon niet worden toegevoegd. ".$error->getMessage());
            }
        }else{
            // formulier
            $content->newBlock("FORMULIER");
            $content->assign("PAGEID", $_GET["pageid"]);
            $content->assign("ACTION", "toevoegen");
        }
        break;
    case "wijzigen":
        if (!empty($_POST["voornaam"]) and !empty($_POST["achternaam"]) and !empty($_POST["email"])) {
            try {
            $wijzigen = $verbinding->prepare("UPDATE gebruikers SET voornaam = :voornaam, achternaam = :achternaam, email = :email WHERE idgebruikers = :id");

            $wijzigen->bindParam(":id", $_POST["id"]);
            $wijzigen->bindParam(":voornaam", $_POST["voornaam"]);
            $wijzigen->bindParam(":achternaam", $_POST["achternaam"]);
            $wijzigen->bindParam(":email", $_POST["email"]);

            $wijzigen->execute();

            $content->newBlock("SUCCESS");
            $content->assign("SUCCESS", "De update is gelukt.");
            } catch (PDOException $error) {
                $content->newBlock("ERROR");
                $content->assign("ERROR", "De update is fout gegaan.");
            }
        } else {
            $wijzigen = $verbinding->prepare("SELECT * FROM gebruikers WHERE idgebruikers = :id");
            $wijzigen->bindParam(":id", $_GET["id"]);
            $wijzigen->execute();

            $wijziging = $wijzigen->fetch(PDO::FETCH_ASSOC);
            
            $content->newBlock("FORMULIER");
            $content->assign("PAGEID", $_GET["pageid"]);
            $content->assign("ACTION", "wijzigen");
            $content->assign(array(
                "VOORNAAM" => $wijziging["voornaam"],
                "ACHTERNAAM" => $wijziging["achternaam"],
                "EMAIL" => $wijziging["email"],
                "ID" => $wijziging["idgebruikers"]
            ));
        }
        break;
    case "verwijderen":
        if(!empty($_POST['voornaam']) AND !empty($_POST['achternaam']) AND !empty($_POST['email'])) {
            try {
                $verwijder = $verbinding->prepare("DELETE FROM gebruikers WHERE idgebruikers = :id");
                $verwijder->bindParam(":id", $_POST["id"]);

                $verwijder->execute();

                $content->newBlock("SUCCESS");
                $content->assign("SUCCESS", "De gebruiker is verwijderd.");
            } catch (PDOException $error) {
                $content->newBlock("ERROR");
                $content->assign("ERROR", "De gebruiker is niet verwijderd.");
            }
        } else {
            try {
                $gebruiker = $verbinding->prepare("SELECT * FROM gebruikers WHERE idgebruikers = :id");
                $gebruiker->bindParam(":id", $_GET["id"]);

                $gebruiker->execute();

                $resultaat = $gebruiker->fetch(PDO::FETCH_ASSOC);

                $content->newBlock("FORMULIER");
                $content->assign("PAGEID", $_GET["pageid"]);
                $content->assign("ACTION", "verwijderen");
                $content->assign(array(
                    "VOORNAAM" => $resultaat["voornaam"],
                    "ACHTERNAAM" => $resultaat["achternaam"],
                    "EMAIL" => $resultaat["email"],
                    "ID" => $resultaat["idgebruikers"]
                ));
            } catch (PDOException $error) {
                $content->newBlock("ERROR");
                $content->assign("ERROR", "De gebruiker is niet gevonden.");
            }
        }
        break;
    default:
        try{
            // met externe variabel (:id), prepare gebruiken
            $getUsers = $verbinding->prepare("SELECT * FROM gebruikers ");
            $getUsers->execute();
        }catch(PDOException $error){
            echo '<pre>';
            echo 'Regelnummer: '.$error->getLine().'<br>';
            echo 'Bestand: '.$error->getFile().'<br>';
            echo 'Foutmelding: '.$error->getMessage().'<br>';
            echo '</pre>';
        }
        $content->newBlock("OVERZICHT");
        while($gebruikers = $getUsers->fetch(PDO::FETCH_ASSOC)){
            $content->assign("PAGEID", $_GET["pageid"]);
            $content->newBlock("RIJ");
            $content->assign(array(
                "VOORNAAM" => $gebruikers['voornaam'],
                "ACHTERNAAM" => $gebruikers['achternaam'],
                "EMAIL" => $gebruikers['email'],
                "ID" => $gebruikers["idgebruikers"]
            ));
        }
}