<?php 

function autoload_callback($className){
    //$className = strtolower($className);
    $path = "includes/classes/{$className}.php";

    if( file_exists($path)){
        include($path);
    }else{
        die("The file named {$className}.php was not found...");
    }
}

spl_autoload_register('autoload_callback');