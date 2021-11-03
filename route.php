<?php
// Routing includes setting of HTTP headers.
class Routes {
    function __construct() {
        $ROUTE['home/index'] = ['home.index', ''];
    }

    function getRoute($route) {
        return $ROUTE[$route];
    }
}