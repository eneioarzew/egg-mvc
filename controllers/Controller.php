<?php
class Controller {
    function getResource($route, $POST_BODY) {
        $class = $route[0];
        $function = $route[1];
        $POST_BODY = (array)json_decode($POST_BODY);
        $args = empty($POST_BODY) ? $route[2] : $POST_BODY['body'];
        $file_string = 'controllers/'.strtolower($class).'.php';
        if (!file_exists($file_string) && empty($POST_BODY)) return null;
        if (!file_exists($file_string) && !empty($POST_BODY)) return ['type' => 'api_response', 'body' => ['error' => "{$class} controller does not exist."]];
        include_once $file_string;
        $class[0] = strtoupper($class[0]);
        $resource = (new $class)->$function($args);
        if (!$resource) return ['type' => 'api_response', 'body' => ['error' => "{$function} function from {$class} controller does not exist."]];
        return $resource;
    }
}