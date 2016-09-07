<?php

$footer = new TemplatePower("include/footer.include");
$footer->prepare();



$header->printToScreen();
$content->printToScreen();
$aside->printToScreen();
$footer->printToScreen();