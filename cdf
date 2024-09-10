<?php

if(!isset($argv[1])) {
    echo "Enter a function name.";
    return;
}

$argv[1]($argv);

function serve($argv = null) {
    exec("php -S 127.0.0.1:8000");
}

function gen($argv) {
    if (!isset($argv[2])) {
        echo "Provide a class type.";
        return;
    }

    if (!isset($argv[3])) {
        echo "Provide a class name.";
        return;
    }

    // create and write files here
}