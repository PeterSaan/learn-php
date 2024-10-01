<?php
function dump(...$vars){
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

function dd(...$vars){
    dump(...$vars);
    die;
}

function redirect($path){
    header("Location: $path");
}

function view($viewName, $vars=[]){
    extract($vars);
    include __DIR__ . "/view/$viewName.php"; 
}