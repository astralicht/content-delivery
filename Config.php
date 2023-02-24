<?php

class Config {

    static $DOCUMENT_ROOT = "/content-delivery/public/";
    static $APP_NAME = "Content Delivery";
    static $URI_SHIFT = 2;
    static $db_config = [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db_name' => '',
        ];

    /**
     * Returns a new mysqli object using data from config.
     * Can be replaced with another kind of database connection.
     */
    public function openDbConn(): \mysqli {
        return new \mysqli(self::$db_config['host'], self::$db_config['username'], self::$db_config['password'], self::$db_config['db_name']);
    }

}