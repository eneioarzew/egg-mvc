<?php
// Autoloader
// Autoloads controller and model classes.
spl_autoload_register('autoload');
function autoload($class) {
    include_once 'controllers\/'.$class.'.php';
    include_once 'models\/'.$class.'.php';
}