<?php

namespace cdf\Models;

include_once("Config.php");

/**
 * Abstact class for all models containing 
 */
class Model {

    private static $dbConnOverride = null;

    function __construct($override = null) {
        $dbConnOverride = $override["dbConnOverride"];
        
        if ($dbConnOverride !== null) {
            try {
                self::$dbConnOverride = $dbConnOverride;
            } catch (\TypeError $e) {
                return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
            }
        }
    }

    static function getResult($query, $params = null) {
        try {
            if (self::$dbConnOverride !== null) {
                \cdf\Config::openDbConn(self::$dbConnOverride);
            } else {
                \cdf\Config::openDbConn();
            }
        } catch (\PDOException $e) {
            return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
        }

        try {
            $query = \cdf\Config::$dbConn->prepare($query);
        } catch (\Exception $e) {
            return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
        }
        
        if ($params != null && gettype($params) !== "array") {
            return ["status" => 500, "message" => "Parameters are not in an array."];
        }

        try {
            $query->execute($params);
        } catch (\PDOException $e) {
            return ["status" => 500, "message" => $e->getMessage(), "stack_trace" => $e->getTraceAsString(), "rows" => []];
        }

        $rows = $query->fetchAll(\PDO::FETCH_ASSOC);

        \cdf\Config::closeDbConn();

        return ["status" => 200, "rows" => $rows];
    }

}