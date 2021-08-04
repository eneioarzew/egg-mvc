<?php
error_reporting(0);
include_once 'controllers/Controller.php';
include_once 'config.php';

function getCurrentURIArray() { return explode('/', $_SERVER['REQUEST_URI']); }
function getOffsetAmount($URI_offset, $ENVIRONMENT) { return $URI_offset[strtoupper($ENVIRONMENT)]; }
function offsetURI($offset_amount, $URI_array) {
    foreach (range(0, $offset_amount-1) as $i) array_shift($URI_array);
    return $URI_array;
}
function getURILength($URI_array) {
    $count = 0;
    foreach ($URI_array as $segment) if (!empty($segment)) ++$count;
    return $count;
}
function routeURI($URI_array, $URI_length) {
    if ($URI_length === 0) header('Location: home/index');
    if ($URI_length === 1) header("Location: {$URI_array[0]}/index");
    return $URI_array;
}
function getResource($route, $POST_BODY) { return (new Controller)->getResource($route, $POST_BODY); }
function showErrorPage() { include_once 'views/404/index.php'; }
function main($ENVIRONMENT) {
    $URI_array = getCurrentURIArray();
    $offset_amount = getOffsetAmount(['LOCAL' => 2, 'PRODUCTION' => 1], $ENVIRONMENT);
    $URI_array = offsetURI($offset_amount, $URI_array);
    $URI_length = getURILength($URI_array);
    $route = routeURI($URI_array, $URI_length);
    $POST_BODY = file_get_contents("php://input");
    $resource = getResource($route, $POST_BODY);
    if (is_array($resource)) echo json_encode($resource);
    if (file_exists($resource)) include_once $resource; else showErrorPage();
}

main($ENVIRONMENT);