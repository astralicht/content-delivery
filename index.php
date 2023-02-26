<?php

require_once("Config.php");
require_once("Routes.php");

$HOST = $_SERVER["HTTP_HOST"];
$URI = $_SERVER["REQUEST_URI"];
$REQUEST_TYPE = $_SERVER["REQUEST_METHOD"];

$URI = (explode("/", $URI));

for ($i = 0; $i < Config::$URI_SHIFT; $i++) array_shift($URI);

$URI = implode("/", $URI);
$filePath = Routes::search($URI, $REQUEST_TYPE);

if ($filePath == "" || $filePath == null) $filePath = Routes::search("404", "GET");

if (isset($_GET["type"])) {
    $imginfo = getimagesize($filePath);
    header("Content-type: {$imginfo['mime']}");
}

$PAGE_TITLE = "";
$APP_NAME = "";
$PAGE_BODY = "";

ob_start();
include_once($filePath);
$PAGE_BODY = ob_get_clean();

include_once("App.php");