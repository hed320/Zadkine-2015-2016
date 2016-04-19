<!DOCTYPE html>
<html>
    <head>
        <title>Translatie</title>
    </head>
    <body>
    <div id="koptekst">Tanslatie V4</div>
    <div id="midden">
        <form action="encryptie%20translatie.php" method="post">
            <textarea name="tekst" id="tekst" rows="10" cols="80" placeholder="Tik hier de tekst. (Geen enter's)"></textarea><br>
            <input type="radio" name="vraag" value="versleutel">Versleutel
            <input type="radio" name="vraag" value="ontcijfer">Ontcijfer
            <input type="submit" value="go">
        </form>
    </div>
    <?php
    if (empty($_POST["vraag"])) {
        echo "<div>Je moet <i>versleutel</i> of <i>ontcijfer</i> kiezen!</div>";
    } else {
        $tekst = $_POST["tekst"];
        $keuze = $_POST["vraag"];
        if ($keuze == "versleutel") {
            $klaretekst = $tekst;
            $cijfertekst = versleutel($tekst);
            echo "Klare tekst: <div>".$klaretekst."</div>";
            echo "<br>";
            echo "Cijfertekst: <div>".$cijfertekst."</div>";
        } elseif ($keuze == "ontcijfer") {
            $klaretekst = ontcijfer($tekst);
            $cijfertekst = $tekst;
            echo "Cijfertekst: <div>".$cijfertekst."</div>";
            echo "<br>";
            echo "Klare tekst: <div>".$klaretekst."</div>";
        }
    }
    function versleutel($klaretekst) {
        $eerstedeel = "";
        $tweededeel = "";
        $sleuteltekst = "";
        $lengtetekst = 0;

        $lengtetekst = strlen($klaretekst);

        $t = 0;
        while ($t<$lengtetekst) {
            $eerstedeel = $eerstedeel.substr($klaretekst,$t,1);
            $t = $t + 1;
            $tweededeel = $tweededeel.substr($klaretekst,$t,1);
            $t = $t + 1;
        }
        $cijfertext = $eerstedeel.$tweededeel;
        return $cijfertext;
    }

    function ontcijfer ($cijfertekst) {
        $helfttekst = strlen($cijfertekst)/2;
        if ($helfttekst<>round($helfttekst)) {
            $helfttekst = $helfttekst + .5;
        }

        $klaretekst = "";
        $t = 0;

        while ($t<$helfttekst) {
            $klaretekst = $klaretekst.substr($cijfertekst,$t,1);
            $klaretekst = $klaretekst.substr($cijfertekst,$helfttekst+$t,1);
            $t =$t + 1;
        }
        return $klaretekst;
    }
    ?>
    </body>
</html>