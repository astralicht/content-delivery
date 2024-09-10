<?php

namespace cdf\Models;

include_once("model.php");

class Test {

    function getAllFruits() {
        $query = "SELECT * FROM fruits;";

        return \cdf\Models\Model::getResult($query);
    }

}