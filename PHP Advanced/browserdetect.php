<?php
$viewer = getenv("HTTP_USER_AGENT");
$browser = "Unidentified";
$platform = "Unidentified";
$osversion = "Unidentified";
$bit = "N/A";
$nt = NULL;
$variables = array();

if (preg_match("/MSIE/i", "$viewer")) {
    $browser = "Internet Explorer";
} elseif (preg_match("/Netscape/i", "$viewer")){
    $browser = "Netscape";
} elseif (preg_match("/Chrome/i", "$viewer")) {
    $browser = "Google Chrome";
}

if (preg_match("/WOW64/i", $viewer) or preg_match("/WIN64/i", $viewer) or preg_match("/x86_64/i", $viewer)) {
    $bit = "64 Bit";
} else {
    $bit = "32 Bit";
}

if (preg_match("/NT/i", $viewer)) {
    $nt = "NT";
}

if (preg_match("/10/i", $viewer)) {
    $osversion = 10;
}

if (preg_match("/Windows/i", "$viewer")) {
    $platform = "Windows";
} elseif (preg_match("/Linux/i", "$viewer")){
    $platform = "Linux";
} elseif (preg_match("/MAC/i", $viewer)) {
    $platform = "Mac OSX";
}

echo "User Agent String: ".$viewer."<br>";
echo "OS: ".$platform." ".$osversion." ".$nt." ".$bit."<br>";
echo "Browser: ".$browser."<br>";
echo "<br>";

if (count($variables) != 0) {
    for ($i = 0; $i < count($variables); $i++) {
        if (!$_SERVER[$variables[$i]] == "") {
            echo $variables[$i]." = ".$_SERVER[$variables[$i]]."<br>";
        }
    }
} else {
    foreach ($_SERVER as $key => $value) {
        echo $key." = ".$value."<br>";
    }
}
?>
