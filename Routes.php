<?php

/**
 * Contains array of routes and function for retrieving routes.
 */
class Routes {

    /**
     * @var array
     * Contains array of filepaths and allowed request methods.
     */
    private static $routes = [
        "/" => ["public/html/pages/home.html", ["GET"]],
        "/403" => ["public/html/error/403.html", ["GET"]],
        "/404" => ["public/html/error/404.html", ["GET"]],
        "/500" => ["public/html/error/500.html", ["GET"]],
    ];


    /**
     * Takes in URI and request method, returns either a route or null.
     */
    function pull($URI, $REQUEST_METHOD) {
        $route = self::searchKey($URI);
        $pathIndex = 0;
        $methodsIndex = 1;

        if ($route === null) return null;

        $requestMethods = $route[$methodsIndex];

        if (!in_array($REQUEST_METHOD, $requestMethods)) return null;

        return $route[$pathIndex];
    }


    function searchKey($URI) {
        $keys = array_keys(self::$routes);
        $route = null;

        foreach ($keys as $key) if (fnmatch($key, $URI)) return $route = self::$routes[$key];

        return $route;
    }

}