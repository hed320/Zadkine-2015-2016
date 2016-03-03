<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalender</title>
    <link type="text/css" rel="stylesheet" href="kalender.css">
    <?php
    session_start();
    $date = date("Y-m-d");

    if (isset($_POST["reset"])) {
        session_unset();
        unset($_SESSION["date"]);
    }

    if (isset($_SESSION["date"])) {
        $date = $_SESSION["date"];
    }

    if (isset($_POST["volgende"])) {
        if ($_POST["volgende"] == "volgende") {
            $date = date("d-m-Y", strtotime("+1 month", strtotime($date)));
            $_SESSION["date"] = $date;
            unset($_POST["volgende"]);
        }
    }

    if (isset($_POST["vorige"])) {
        if ($_POST["vorige"] == "vorige") {
            $date = date("d-m-Y", strtotime("-1 month", strtotime($date)));
            $_SESSION["date"] = $date;
            unset($_POST["vorige"]);
        }
    }

    $maandtext = date("F", strtotime($date));
    $maand = date("n", strtotime($date));
    $jaar = date("Y", strtotime($date));
    $dagen = date("t", strtotime($date));
    $startday = date("N", strtotime("first day of this month", strtotime($date)));
    $emptyspaces = 42 - $dagen - $startday;

    $monthstart = date("Y-m-d", strtotime("first day of this month", strtotime($date)));
    $monthend = date("Y-m-d", strtotime("last day of this month", strtotime($date)));

    if ($emptyspaces > 6) {
        $extra = $emptyspaces - 7 + 1;
    } else {
        $extra = $emptyspaces + 1;
    }

    $conn = new PDO('mysql:host=localhost;dbname=kalender', 'root', '');

    $sql = "
      SELECT *
      FROM gebeurtenissen
      WHERE (startdatum BETWEEN DATE('$monthstart') and DATE('$monthend') AND
      einddatum BETWEEN DATE('$monthstart') and DATE('$monthend')) OR
      (startdatum < DATE('$monthstart') AND
      einddatum > DATE('$monthstart')) OR
      (startdatum < DATE('$monthend') AND
      einddatum > DATE('$monthend'))
      ORDER BY event
      ";

    //print_r($sql);
    //echo "<br><br>";
    $data = $conn->query($sql);

    $i = 0;
    $db = array();
    foreach($data as $row) {
        $db[$i]["start"] = $row['startdatum'];
        $db[$i]["end"] = $row['einddatum'];
        $db[$i]["event"] = $row['event'];
        $i++;
    }

    //print_r($db);
    //echo "<br>";

    $eventdagen = array();
    foreach ($db as $event) {
        $eventdag = substr($event["start"], -2);
        $eventdago = mb_substr($eventdag, 1, 2);

        $begin = new DateTime( $event["start"] );
        $end = new DateTime( $event["end"] );
        $end = $end->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);

        foreach ($daterange as $date) {
            if ($date->format("n") == $maand and $date->format("Y") == $jaar) {
                $curdag = $date->format("j");
                if (array_key_exists($curdag, $eventdagen)) {
                    $present = $eventdagen[$curdag];
                    $eventdagen[$curdag] = $present . "<br>" . $event["event"];
                } else {
                    $eventdagen[$curdag] = $event["event"];
                }
            }
        }
    }
    ?>
</head>
<body>
<header>
    <h1>Kalender</h1>
</header>
<main role="main">
    <form method="post" action="index.php">
        <input type="submit" name="vorige" id="vorige" value="vorige">
        <input type="submit" name="reset" id="reset" value="reset">
        <input type="submit" name="volgende" id="volgende" value="volgende">
        <div class="clear"></div>
    </form>
    <div class="huidig"><p><?php echo $maandtext." ".$jaar;?></p></div>
    <table class="kalender">
        <tr>
            <th>Maandag</th>
            <th>Dinsdag</th>
            <th>Woensdag</th>
            <th>Donderdag</th>
            <th>Vrijdag</th>
            <th>Zaterdag</th>
            <th>Zondag</th>
        </tr>
        <?php
        echo "<tr>";

        if ($startday != 0) {
            for ($i = 1; $i < $startday; $i++) {
                if ($i == 7) {
                    echo "</tr>";
                } else {
                    echo "<td></td>";
                }
            }
        }

        if ($eventdagen != array()) {
            for ($datum = 1; $datum <= $dagen; $datum++) {
                if (array_key_exists($datum, $eventdagen)) {
                    echo "<td>" . $datum . "<br>" . $eventdagen[$datum] . "</td>";
                } else {
                    echo "<td>$datum</td>";
                }

                if ($datum + $startday == 8 or $datum + $startday == 15 or $datum + $startday == 22 or $datum + $startday == 29) {
                    echo "</tr><tr>";
                } elseif ($datum + $startday == 36 and $extra != 0) {
                    echo "</tr><tr>";
                }
            }
        } else {
            for ($datum = 1; $datum <= $dagen; $datum++) {
                if ($datum + $startday == 9 or $datum + $startday == 16 or $datum + $startday == 23 or $datum + $startday == 30) {
                    echo "</tr><tr>";
                } elseif ($datum + $startday == 37 and $extra != 0) {
                    echo "</tr><tr>";
                }
                echo "<td>$datum</td>";
            }
        }

        if ($extra != 0) {
            if ($emptyspaces > 5) {
                if ($emptyspaces == 6) {
                } else {
                    for ($i = 0; $i <= $emptyspaces - 7; $i++) {
                        echo "<td></td>";
                    }
                }
            } else {
                for ($i = 0; $i <= $emptyspaces; $i++) {
                    echo "<td></td>";
                }
            }
        }

        echo "</tr>";
        ?>
    </table>
</main>
</body>
</html>