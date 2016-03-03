<?php

include("class.TemplatePower.inc.php");

$tpl = new TemplatePower("index.tpl");

$tpl->prepare();

$numdigits = 12;

$SI_pre = array(
    'n'=> 0.000000001,
    'µ'=> 0.000001,
    'm'=> 0.001,
    'c'=> 0.01,
    'd'=> 0.1,
    ' '=> 1,
    '-'=> 1,
    'da'=> 10,
    'h'=> 100,
    'k'=> 1000,
    'M'=> 1000000,
    'G'=> 1000000000,
    'T'=> 1000000000000
);

$SI_prename = array(
    'n'=> 'Nano',
    'µ'=> 'Micro',
    'm'=> 'Milli',
    'c'=> 'Centi',
    'd'=> 'Deci',
    ' '=> '',
    '-'=> ' ',
    'da'=> 'Deca',
    'h'=> 'Hecto',
    'k'=> 'Kilo',
    'M'=> 'Mega',
    'G'=> 'Giga',
    'T'=> 'Tera'
);

$SI_eenheid = array (
    "meter",
    "mol",
    "radiaal",
    "steradiaal",
    "gram",
    "coulomb",
    "seconde",
    "hertz",
    "becquerel",
    "katal",
    "kelvin",
    "gray",
    "sievert",
    "lux",
    "ampere",
    "henry",
    "newton",
    "joule",
    "watt",
    "candela",
    "lumen",
    "pascal",
    "tesla",
    "volt",
    "weber",
    "ohm",
    "siemens"
);

function _prefix($a, $SI_pre) {
    // $a = array('key'=>nummer);
    $num = 1;
    foreach ($SI_pre as $pre=>$num) {
        if ($pre == $a) {
            return $num;
            break;
        }
    }
    return $num;
}

if (isset($_POST["omrekenen"])) {
    $fromUnitAantal = $_POST['fromUnitAantal'];
    $fromUnitEenheid = $_POST['fromUnitEenheid'];
    $toUnitAantal = $_POST['toUnitAantal'];
    $toUnitEenheid = $_POST['fromUnitEenheid'];
    $frompre = $_POST['frompre'];
    $topre = $_POST['topre'];

    // calculate
    $from = $SI_pre[$frompre];
    $fromprefixname = $SI_prename[$frompre];
    $to = $SI_pre[$topre];
    $toprefixname = $SI_prename[$topre];
    $toUnitAantal = $fromUnitAantal * $from / $to;

    // format
    $toUnitAantal = number_format($toUnitAantal,$numdigits,",",".");
    $toUnitAantal = rtrim( rtrim($toUnitAantal,0) ,",");
    $toUnitEenheid = $fromUnitEenheid;

    // message
    $message =  "Van $fromUnitAantal $fromprefixname$fromUnitEenheid factor ( $from ) \nNaar $toprefixname$toUnitEenheid factor ( $to )";
    $message .=  "\nAntwoord $toUnitAantal $toprefixname$toUnitEenheid  \n";

} else {

    $fromUnitAantal = 1;
    $fromUnitEenheid = $SI_eenheid[0];
    $toUnitAantal = 1;
    $toUnitEenheid = $SI_eenheid[0];
    $frompre = '-';
    $topre = '-';
    $to = 1;
    $from = 1;
    $fromprefixname = NULL;
    $message = NULL;
    $toprefixname = NULL;
}

if (isset($_POST["$frompre"])) {
    $tpl->assign("frompre", $_POST["$frompre"]);
}

if (isset($_POST["$topre"])) {
    $tpl->assign("topre", $_POST["$topre"]);
}

foreach ($SI_eenheid as $value) {
    $tpl->newBlock("eenheid");
    $tpl->assign("eenheid", $value);
}

$toUnitAantalWidth = strlen($toUnitAantal) * 8;
$fromUnitAantalWidth = strlen($fromUnitAantal) * 9.3;

$tpl->assignGlobal("fromUnitAantal", $fromUnitAantal);
$tpl->assignGlobal("frompre", $frompre);
$tpl->assignGlobal("fromprefixname", $fromprefixname);
$tpl->assignGlobal("fromUnitEenheid", $fromUnitEenheid);
$tpl->assignGlobal("from", $from);
$tpl->assignGlobal("toUnitAantal", $toUnitAantal);
$tpl->assignGlobal("topre", $topre);
$tpl->assignGlobal("toprefixname", $toprefixname);
$tpl->assignGlobal("toUnitEenheid", $toUnitEenheid);
$tpl->assignGlobal("to", $to);
$tpl->assignGlobal("message", $message);
$tpl->assignGlobal("toUnitAantalWidth", $toUnitAantalWidth);
$tpl->assignGlobal("fromUnitAantalWidth", $fromUnitAantalWidth);

//var_dump($_POST);

$tpl->printToScreen();
?>
