<?php
$content = new TemplatePower("html/login.html");
$content->prepare();

if (!empty($_POST["email"]) and !empty($_POST["wachtwoord"])) {
    $options = [
        'cost' => 12,
    ];
    $wachtwoord = password_hash($_POST["wachtwoord"], PASSWORD_BCRYPT, $options);

    $checkmail = $verbinding->prepare("SELECT count(*) FROM gebruikers WHERE email = :email");
    $checkmail->bindParam(":email", $_POST['email']);
    $checkmail->execute();

    if ($checkmail->fetchColumn() == 1) {
        $getinfo = $verbinding->prepare("SELECT * FROM gebruikers WHERE email = :email");
        $getinfo->bindParam(":email", $_POST['email']);
        $getinfo->execute();

        $info = $getinfo->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST["wachtwoord"], $info["wachtwoord"])) {
            $content->newBlock("SUCCES");
            $content->assign("SUCCES", "Je bent ingelogd");
        } else {
            $content->newBlock("ERROR");
            $content->assign("ERROR", "Je login klopt niet");
        }
    }
} else {
    $content->newBlock("FORMULIER");
    $content->assign("PAGEID", $pagina["idbestanden"]);
}