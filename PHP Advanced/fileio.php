<?php
$filename = "files/FILE_IO.CSV";
$filesize = filesize($filename);
$filestream = fopen($filename, "r");
$content = fread($filestream, $filesize);
fclose($filestream);

echo $content;