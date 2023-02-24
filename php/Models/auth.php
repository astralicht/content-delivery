<?php

namespace Models;

class Auth {

    function searchUser($email) {
        include_once("../../Config.php");

        $dbConn = (new \Config())->openDbConn();

        $query = "SELECT * FROM users
                    WHERE `date_removed` IS NULL
                    AND `email`=?";

        $query = $dbConn->prepare($query);
        $query->bind_param("s", $email);
        $query->execute();

        if ($conn->error) return ["status" => 500];

        $result = $query->get_result();
        $row = $result->fetch_assoc();

        if ($row === NULL) return ["status" => 404];

        if (!password_verify($data["password"], $row["password"])) return ["status" => 401];

        return ["status" => 200, "user" => $row];
    }

}