<?php
$content = new TemplatePower("html/login.html");
$content->prepare();

if (!empty($_POST["email"]) and !empty($_POST["wachtwoord"])) {
    $options = [
        'cost' => 12,
    ];
    $wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_BCRYPT, $options);
    
    $check = $verbinding->prepare("SELECT count(*) FROM gebruikers WHERE email = :email AND wachtwoord = :wachtwoord");
    $check->bindParam(":email", $_POST['email']);
    $check->bindParam(":wachtwoord", $wachtwoord);
    $check->execute();

    if ($check->fetchColumn() == 1) {
        $content->newBlock("ERROR");
        $content->assign("ERROR", "Je login klopt niet");
    } else {
        $content->newBlock("SUCCES");
        $content->assign("SUCCES", "Je bent ingelogd");
    }
} else {
    $content->newBlock("FORMULIER");
    $content->assign("PAGEID", $pagina["idbestanden"]);
}