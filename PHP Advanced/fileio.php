<?php
$filename = "files/FILE_IO.CSV";

if (file_exists($filename)) {
    $filesize = filesize($filename);
    $filestream = fopen($filename, "r");
    $content = fread($filestream, $filesize);
} else {
    die("Cant find .$filename.");
}
fclose($filestream);

echo $content;