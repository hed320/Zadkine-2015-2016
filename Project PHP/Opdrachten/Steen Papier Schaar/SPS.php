<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Steen,Papier, Schaar</title>
    <link type="text/css" rel="stylesheet" href="SPS.css">
    <?php
    $player = 0;
    $playerpress = 0;
    $playerwins =0;
    $pcwins = 0;
    $winscore = 0;
    $winnen = "Niemand";
    $en = "en";
    $result = NULL;
    $whowin = array(
        "Speler wint",
        "PC wint",
        "Gelijkspel",
        ""
    );

    if (isset($_POST["playerkeuze"])) {
        $playerkeuze = $_POST["playerkeuze"];
    }
    else {
        $playerkeuze = NULL;
    }

    if (isset($_POST["pckeuze"])) {
        $pckeuze = $_POST["pckeuze"];
    }
    else {
        $pckeuze = NULL;
    }

    if (isset($_POST["playerwins"])) {
        $playerwins = $_POST["playerwins"];
    }
    else {
        $playerwins = 0;
    }

    if (isset($_POST["pcwins"])) {
        $pcwins = $_POST["pcwins"];
    }
    else {
        $pcwins = 0;
    }

    if (isset($_POST["steen_x"])) {
        $playerpress = 1;
    }

    if (isset($_POST["papier_x"])) {
        $playerpress = 2;
    }

    if (isset($_POST["schaar_x"])) {
        $playerpress = 3;
    }

    if ($playerpress == 0) {
        $pcpress = 0;
    } else {
        $pcpress = rand(1,3);
    }

    switch ($playerpress) {
        case 1:
            $player = 1;
            $playerkeuze = "Steen";
            break;
        case 2:
            $player = 2;
            $playerkeuze = "Papier";
            break;
        case 3:
            $player = 3;
            $playerkeuze = "Schaar";
    }

    switch ($pcpress) {
        case 1:
            $pc = 1;
            $pckeuze = "Steen";
            break;
        case 2:
            $pc = 2;
            $pckeuze = "Papier";
            break;
        case 3:
            $pc = 3;
            $pckeuze = "Schaar";
    }

    if  ($pcpress == 0 and $playerpress == 0) {
        $result = $whowin[3];
    } elseif ($pcpress == $playerpress) {
        $result = $whowin[2];
    }

    if ($playerkeuze == "Steen" and $pckeuze == "Papier") {
        $result = $whowin[1];
        $pcwins++;
    } elseif ($playerkeuze == "Papier" and $pckeuze == "Steen") {
        $result = $whowin[0];
        $playerwins++;
    } elseif ($playerkeuze == "Steen" and $pckeuze == "Schaar") {
        $result = $whowin[0];
        $playerwins++;
    } elseif ($playerkeuze == "Schaar" and $pckeuze == "Steen") {
        $result = $whowin[1];
        $pcwins++;
    } elseif ($playerkeuze == "Papier" and $pckeuze == "Schaar") {
        $result = $whowin[1];
        $pcwins++;
    } elseif ($playerkeuze == "Schaar" and $pckeuze == "Papier") {
        $result = $whowin[0];
        $playerwins++;
    } else {
    }

    if ($winscore == 1) {
        $en = "";
    }

    if ($playerwins > $pcwins) {
        $winnen = "Speler";
        $winscore = $playerwins;
    } elseif ($playerwins < $pcwins) {
        $winnen = "PC";
        $winscore = $pcwins;
    } elseif ($playerwins == $pcwins) {
        $winnen = "Niemand";
        $winscore = $playerwins;
    }

    if (isset($_POST["clear"])) {
        $player = 0;
        $playerpress = 0;
        $playerwins = 0;
        $pcwins = 0;
        $winscore = 0;
        $result = NULL;
        $winnen = "Niemand";
    }

    //var_dump($_POST);
    //var_dump($playerpress);
    //var_dump($pcpress);
    ?>
</head>
<body>
    <header>
        <h1>Steen, Papier, Schaar</h1>
        <h2><?php echo $winnen;?> is aan het winnen met <?php echo $winscore;?> punt<?php echo $en;?>.</h2>
    </header>
    <main role="main"></main>
        <form method="POST" action="SPS.php">
            <label for="steen"></label>
            <input type="image" src="img/steen.jpg" id="steen" name="steen">
            <label for="papier"></label>
            <input type="image" src="img/papier.jpg" id="papier" name="papier">
            <label for="schaar"></label>
            <input type="image" src="img/schaar.jpg" id="schaar" name="schaar">
            <div class="clear"></div>
            <fieldset id="uitkomst">
                <a class="player">Speler</a>
                <a class="pc">PC</a>
                <div class="clear"></div>
                <label for="player"></label>
                <input type="text" id="player" name="player" placeholder="Jouw keuze" value="<?php echo $playerkeuze;?>" readonly>
                <label for="pc"></label>
                <div class="vs"><a>VS</a></div>
                <input type="text" id="pc" name="pc" placeholder="Keuze PC" value="<?php echo $pckeuze;?>" readonly>
                <label for="playerwins"></label>
                <div class="clear"></div>
                <input type="number" id="playerwins" name="playerwins" value="<?php echo $playerwins;?>" readonly>
                <label for="pcwins"></label>
                <input type="number" id="pcwins" name="pcwins" value="<?php echo $pcwins;?>" readonly>
                <div class="resultaat"><a class="score">Resultaat</a></div>
                <div class="clear"></div>
                <a class="result"><?php echo $result;?></a>
            </fieldset>
            <label for="submit"></label>
            <input type="submit" id="clear" name="clear" value="clear">
            <div class="clear"></div>
        </form>
    </main>
</body>
</html>