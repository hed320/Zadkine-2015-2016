<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 23-3-2016
 * Time: 11:41
 */

$footer = new TemplatePower("html/footer.html");
$footer->prepare();



$header->printToScreen();
$content->printToScreen();
$aside->printToScreen();
$footer->printToScreen();