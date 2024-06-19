<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('error_reporting', E_WARNING | E_ERROR | E_PARSE | E_NOTICE);
/** 
 * GET BASE PATH
 * @param string $path
 * @return string
 */
function basePath($path=''){
    return __DIR__.'/'.$path;
}

/**
 * LOAD A VIEW
 * @param string $name
 * @return void
 */
function loadView($name, $data=[]){

    $viewPath =  basePath("views/{$name}.view.php");

    if(file_exists($viewPath)){
        // EXTRACT array data wrapper for pointing at KEY 
        extract($data);
        require $viewPath;
    }else{
       echo "View not found";
    }
}

/**
 * LOAD A PARTIAL
 * @param string $name
 * @return void
 */
function loadPartial($name){

    $partialPath = basePath("views/partials/{$name}.php");

    if(file_exists($partialPath)){
        require $partialPath;
    }else{
       echo "Partial '{$name}' not found";
    }
}

/** INSPECT / VAR DUMP VALUE
 * @param mixes $value
 * @return void
 */
function inspect($value){
    echo '<pre>'.var_dump($value).'</pre>';
}
/** INSPECT DUMP & DIE
 * @param mixes $value
 * @return void
 */
function dd($value){
    echo '<pre>'.die(var_dump($value)).'</pre>';
}