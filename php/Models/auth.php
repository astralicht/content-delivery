<?php

namespace cdf\Models;

class Auth {

    function searchUser($email) {
        $query = "SELECT * FROM users
                    WHERE `date_removed` IS NULL
                    AND `email`=?";

        $result = \cdf\Models\Model::getResult($query, $email);

        if ($result["status"] === 200) {
            // Enter code here
        }
    }

}