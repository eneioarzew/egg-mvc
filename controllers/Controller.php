<?php
class Controller {
    function getResource($route) {
        $class = $route[0];
        $function = $route[1];
        $args = $route[2];
        $file_string = 'controllers/'.strtolower($class).'.php';
        if (!file_exists($file_string)) return null;
        include_once $file_string;
        $class[0] = strtoupper($class[0]);
        $resource = (new $class)->$function($args);
        return $resource;
    }
}