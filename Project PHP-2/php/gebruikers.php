<?php

$content = new TemplatePower("html/gebruikers.html");
$content->prepare();

try
{
    $verbinding= new PDO('mysql:host=localhost;dbname=project3', 'root', '');
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error)
{
    echo $error->getMessage();
}

if(isset($_GET['actie'])){
    $actie = $_GET['actie'];
}else{
    $actie = NULL;
}


switch($actie){
    case "toevoegen":
        // html require werkt niet met sommige oude browsers dus ook dit gebruiken voor veiligheid.
        if(!empty($_POST["voornaam"]) and !empty($_POST["achternaam"]) and !empty($_POST["email"])){
            // form moet gepost zijn
        }else{
            // formulier
            $content->newBlock("FORMULIER");
        }
        break;
    case "wijzigen":
        print "wijzigen";
        break;
    case "verwijderen":
        print "verwijderen";
        break;
    default:
        try{
            // met externe variabel (:id), prepare gebruiken
            $getUsers = $verbinding->prepare("SELECT voornaam, achternaam, email FROM gebruikers  ");
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
            $content->newBlock("RIJ");
            $content->assign(array(
                "VOORNAAM" => $gebruikers['voornaam'],
                "ACHTERNAAM" => $gebruikers['achternaam'],
                "EMAIL" => $gebruikers['email']
            ));
        }
}