<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eenheden Omrekenen</title>
    <link href="./css/omrekenen.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("#frompre").val("{frompre}");
            $("#topre").val("{topre}");
            $("#fromUnitEenheid").val("{fromUnitEenheid}");
        });
    </script>
</head>
<body>
    <main>
        <h1>Eenheden Omrekenen</h1>
        <aside class="bookie">
            <div class="bullet"> {fromUnitAantal} </div>
            <div class="bullet"> X </div>
            <div class="bullet"> {from}  </div>
            <div class="bullet"> /  </div>
            <div class="bullet"> {to}  </div>
            <div class="bullet"> =  </div>
            <div class="bullet"> {toUnitAantal} </div>
        </aside>
        <form name="omrekenen" method="post" action="index.php">
            <fieldset class="fromUnit">
                <legend>Van eenheid </legend>
                <label for="fromUnitaantal"></label>
                <input type="number" style="width:{fromUnitAantalWidth}px; min-width: 100px" name="fromUnitAantal" id="fromUnitaantal" value="{fromUnitAantal}">
                <label for="frompre"></label>
                <select name="frompre" id="frompre">
                    <option value=" "></option>
                    <option value="n">Nano</option>
                    <option value="µ">Micro</option>
                    <option value="m">Milli</option>
                    <option value="c">Centi</option>
                    <option value="d">Deci</option>
                    <option value="da">Deca</option>
                    <option value="h">Hecto</option>
                    <option value="k">Kilo</option>
                    <option value="M">Mega</option>
                    <option value="G">Giga</option>
                    <option value="T">Tera</option>
                </select>
                <label for="fromUnitEenheid"></label>
                <select name="fromUnitEenheid" id="fromUnitEenheid">
                    <!-- START BLOCK : eenheid -->
                    <option value="{eenheid}">{eenheid}</option>
                    <!-- END BLOCK : eenheid -->
                </select>
                <label for="fromOmrekenfactor">Factor</label>
                <input type="text" name="fromOmrekenfactor" id="fromOmrekenfactor" value="{from}" readonly>
            </fieldset>
            <div class="left"></div>
            <label for="fromToUnit"></label>
            <textarea class="fromToUnit" id="fromToUnit" readonly>{message}</textarea>
            <div class="left"></div>
            <fieldset class="toUnit">
                <legend>Naar eenheid</legend>
                <label for="topre"></label>
                <select name="topre" id="topre">
                    <option value=" "></option>
                    <option value="n">Nano</option>
                    <option value="µ">Micro</option>
                    <option value="m">Milli</option>
                    <option value="c">Centi</option>
                    <option value="d">Deci</option>
                    <option value="da">Deca</option>
                    <option value="h">Hecto</option>
                    <option value="k">Kilo</option>
                    <option value="M">Mega</option>
                    <option value="G">Giga</option>
                    <option value="T">Tera</option>
                </select>
                <label for="toUnitEenheid"></label>
                <input type="text" name="toUnitEenheid" id="toUnitEenheid" value="{toUnitEenheid}" readonly>
                <label for="toOmrekenfactor">Factor</label>
                <input type="text" name="toOmrekenfactor" id="toOmrekenfactor" value="{to}"  readonly>
            </fieldset>
            <div class="left"></div>
            <fieldset class="antwoord">
                <legend>Antwoord</legend>
                <label for="antwoord"></label>
                <input type="text" style="width: {toUnitAantalWidth}px; min-width: 100px" name="toUnitAantal" id="toUnitAantal" value="{toUnitAantal}" readonly>
                <input type="text" name="toprefix" id="toprefix" value=" {toprefixname}{toUnitEenheid}" readonly>
            </fieldset>
            <div class="left"></div>
            <input type="submit" name="omrekenen" id="omrekenen" value="omrekenen">
            <div class="clear"></div>
        </form>
    </main>
    <footer>
        <p>By Bakker and Nijssen (2015)</p>
    </footer>
</body>
</html>