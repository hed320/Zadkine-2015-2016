<?php
include("class.TemplatePower.inc.php");

$tpl = new TemplatePower("gallerij.tpl");

$tpl->prepare();

$tpl->assignGlobal("imgdir", "img");

$imgarray = preg_grep('/^([^.])/', scandir("img"));

foreach ($imgarray as $img) {
    $tpl->newBlock("image");
    $tpl->assign("img", $img);
}

$tpl->printToScreen();
?>