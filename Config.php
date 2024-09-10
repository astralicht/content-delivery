<?php

namespace cdf;

/**
 * Contains app config
 */
class Config {

    static $DOCUMENT_ROOT = "public/";
    static $APP_NAME = "Content Delivery";
    static $dbConfig = [
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "db_name" => "test",
        ];
    static $dbConn = null;

    static public function openDbConn() {
        $db_config = self::$dbConfig;
        
        $host = $db_config["host"];
        $db_name = $db_config["db_name"];
        $username = $db_config["username"];
        $password = $db_config["password"];

        self::$dbConn = new \PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        self::$dbConn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    static public function closeDbConn() {
        self::$dbConn = null;
    }

}