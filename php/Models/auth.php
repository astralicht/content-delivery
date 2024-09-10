<?php

namespace cdf\Models;

include_once("model.php");

class Auth {

    function searchUser($email) {
        $query = "SELECT * FROM users
                    WHERE `date_removed` IS NULL
                    AND `email`=:email";

        $result = \cdf\Models\Model::getResult($query, [":email" => $email]);

        if ($result["status"] === 200) {
            foreach ($result["rows"] as $row) {
                var_dump($row);
            }
        }
    }

}