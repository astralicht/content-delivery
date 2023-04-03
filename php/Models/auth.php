<?php

namespace Models;

class Auth {

    function searchUser($email) {
        include_once("model.php");

        $query = "SELECT * FROM users
                    WHERE `date_removed` IS NULL
                    AND `email`=?";

        $result = \Models\Model::getResult($query, $email);

        if ($result["status"] === 200) {
            // Enter code here
        }
    }

}