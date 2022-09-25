<?php

/**
 * @class Routes
 */
class Routes {

    /**
     * 
     */
    private static $routes = [
        "/" => ["public/html/pages/home.html", ["GET"], true],
        "/404" => ["public/html/error/404.html", ["GET"]],
        "/403" => ["public/html/error/403.html", ["GET"]],
        "/500" => ["public/html/error/500.html", ["GET"]],
    ];


    function pull($URI, $REQUEST_METHOD) {
        $route = self::searchKey($URI);
        $pathIndex = 0;
        $methodsIndex = 1;

        if ($route === null) return null;

        $requestMethods = $route[$methodsIndex];

        if (!in_array($REQUEST_METHOD, $requestMethods)) return null;

        $filePath = $route[$pathIndex];
        
        return @file_get_contents($filePath);
        // Error control operator (i.e. @) before file_get_contents function supresses warnings
        // https://www.php.net/manual/en/language.operators.errorcontrol.php
    }


    function searchKey($URI) {
        $keys = array_keys(self::$routes);
        $route = null;

        foreach ($keys as $key) if (fnmatch($key, $URI)) return $route = self::$routes[$key];

        return $route;
    }

}