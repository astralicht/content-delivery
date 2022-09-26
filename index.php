<?php

require_once("Config.php");
require_once("Routes.php");

$HOST = $_SERVER["HTTP_HOST"];
$URI = $_SERVER["REQUEST_URI"];
$REQUEST_TYPE = $_SERVER["REQUEST_METHOD"];

$Routes = new Routes();

var_dump($_GET);

$filePath = $Routes->pull($URI, $REQUEST_TYPE);

if ($filePath == "" || $filePath == null) return @readfile($Routes->pull("/404", "GET"));

$response = @readfile($filePath);

if ($response === false) return @readfile($Routes->pull("/404", "GET"));

// $remoteImage = "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Banana-Single.jpg/2324px-Banana-Single.jpg";
// $imginfo = getimagesize($remoteImage);
// header("Content-type: {$imginfo['mime']}");
// readfile($remoteImage);

die;

echo $Content;
