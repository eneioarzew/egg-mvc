<?php
class Home {
    function index() { return 'views/home/index.php'; }
    function returninput($input) { return ['type'=>'api_response', 'body'=>$input]; }
}