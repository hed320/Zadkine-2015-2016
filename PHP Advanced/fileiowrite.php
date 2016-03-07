<?php
$filename = "files/score.txt" ;
$filestream = fopen( $filename, "w") or die("Unable to open file!");
$contents = "Score van het spel \n";
$contents .= "John Doe \t 10 punten\n";
$contents .= "Computer \t 7 punten \n";
fwrite( $filestream, $contents );
fclose( $filestream );
