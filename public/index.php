<?php
header("Contebt-Type: text/html; charset=utf8");


require_once __DIR__ . "/../config/main.php";


$contentOfDir = delInDirAray("img");


include TEMPLATES_DIR . "index.tpl";


?>
