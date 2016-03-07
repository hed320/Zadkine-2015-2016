<?php
$klassenlijst = array (
    "naam" => array (
        "leeftijd"=> 23 ,
        "email" => "naam@live.nl",
        "woonplaats" => "rotterdam"
        )
    );
$klassenlijst = print_r($klassenlijst);

$filename = "files/klassenlijst.txt" ;
$filestream = fopen( $filename, "w") or die("Unable to open file!");
fwrite( $filestream, $klassenlijst );
fclose( $filestream );
