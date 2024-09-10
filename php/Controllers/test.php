<?php

namespace cdf\Controllers;

class Test {
    
    function fetch() {
        include_once("php/models/test.php");
        $result = (new \cdf\Models\Test())->getAllFruits();

        return json_encode([
            "status" => 200,
            "message" => "You sent a get request.",
            "rows" => $result,
        ]);
    }

    function update() {
        return json_encode([
            "status" => 200,
            "message" => "You sent an update request.",
        ]);
    }

}