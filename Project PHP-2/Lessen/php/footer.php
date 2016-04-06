<?php

$footer = new TemplatePower("html/footer.html");
$footer->prepare();



$header->printToScreen();
$content->printToScreen();
$aside->printToScreen();
$footer->printToScreen();