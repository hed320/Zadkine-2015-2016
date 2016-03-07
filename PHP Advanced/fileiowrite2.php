<?php
$klassenlijst = array (
    "Ronald Nijssen" => array (
        "leeftijd"=> 19 ,
        "email" => "naam@live.nl",
        "woonplaats" => "Vlaardingen"
        )
    );

$klassenlijst = print_r($klassenlijst, true);
$filename = "files/klassenlijst.txt" ;
$filestream = fopen( $filename, "w") or die("Unable to open file!");
fwrite( $filestream, $klassenlijst );
fclose( $filestream );
