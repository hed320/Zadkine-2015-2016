<?php

$content = new TemplatePower("html/registratie.html");
$content->prepare();

/*
 *  stap 1: functionaliteit
 *      registreren
 *  stap 2: welke schermen
 *      scherm 1: formulier
 *      scherm 2: melding -> u bent geregistreerd
 *  stap 3: voorwaarde
 *      scherm 1: formulier => geen voorwaarde
 *      scherm 2: melding -> u bent geregistreerd => voorwaarde ($_POST)
 *
 */


if(!empty($_POST['email']) AND !empty($_POST['wachtwoord']) AND !empty($_POST['wachtwoord2'])){
    if($_POST['wachtwoord'] == $_POST['wachtwoord2']){
        // scherm 2
        $options = [
            'cost' => 12,
        ];
        $wachtwoord = password_hash($_POST['wachtwoord'],
            PASSWORD_BCRYPT, $options);

        try {
            $insert = $verbinding->prepare("INSERT INTO gebruikers SET
                      voornaam = :voornaam,
                      tussenvoegsel = :blabla,
                      achternaam = :anaam,
                      email = :email,
                      straat = :straat,
                      huisnummer = :hnr,
                      toevoeging = :toevoeging,
                      postcode = :pcode,
                      telnummer = :tnr, 
                      wachtwoord = :ww,
                      groep_idgroep = 1
                      ");
            $insert->bindParam(":voornaam", $_POST['voornaam']);
            $insert->bindParam(":blabla", $_POST['tussenv']);
            $insert->bindParam(":anaam", $_POST['achternaam']);
            $insert->bindParam(":email", $_POST['email']);
            $insert->bindParam(":straat", $_POST['straat']);
            $insert->bindParam(":hnr", $_POST['huisnr']);
            $insert->bindParam(":toevoeging", $_POST['toevoeging']);
            $insert->bindParam(":pcode", $_POST['postcode']);
            $insert->bindParam(":tnr", $_POST['telnummer']);
            $insert->bindParam(":ww", $wachtwoord);

            $insert->execute();

            $content->newBlock("SUCCES");
            $content->assign("MELDING", "De gebruiker is geregistreerd");


        }catch(PDOException $error){
            echo $error->getMessage();
        }
        // een insert query
        // INSERT INTO tabelnaam SET kolomnaam=waarde, kolomnaam=waarde

    } else{
        $content->newBlock("ERROR");
        $content->assign("MELDING", "Het wachtwoord komt niet overeen");

        $content->newBlock("FORMULIER");
    }

}else{
    // scherm 1
    $content->newBlock("FORMULIER");
}