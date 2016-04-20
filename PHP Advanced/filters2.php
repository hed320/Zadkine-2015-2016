<!DOCTYPE html>
<html>
    <body>
        <form action="filters2.php" method="post">
            <input type="text" id="naam" name="naam" placeholder="Naam"><br>
            <input type="number" id="leeftijd" name="leeftijd" placeholder="Leeftijd"><br>
            <input type="email" id="email" name="email" placeholder="E-mail"><br>
            <input type="submit">
        </form>
    </body>
</html>
<?php
if (!empty($_POST["naam"]) and !empty($_POST["leeftijd"]) and !empty($_POST["email"])) {
    $gegevens = array("naam" => $_POST["naam"],
        "leeftijd" => $_POST["leeftijd"],
        "email" => $_POST["email"]);

    $filter_array = array("naam" => FILTER_SANITIZE_SPECIAL_CHARS,
        "leeftijd" => FILTER_VALIDATE_INT,
        "email" => FILTER_VALIDATE_EMAIL);

    $resultaat = filter_var_array($gegevens, $filter_array);
    var_dump($resultaat);
}
?>