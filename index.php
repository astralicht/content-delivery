<?php

require_once("Config.php");
require_once("Routes.php");
require_once("Preprocessor.php");

$HOST = $_SERVER["HTTP_HOST"];
$URI = $_SERVER["REQUEST_URI"];
$REQUEST_TYPE = $_SERVER["REQUEST_METHOD"];

$Routes = new Routes();
$Content = $Routes->pull($URI, $REQUEST_TYPE);

if ($Content === null) echo $Routes->pull("/404", "GET");

echo $Content;
