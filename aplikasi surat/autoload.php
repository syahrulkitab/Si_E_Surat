<?php

function autoload($class)
{
    $pecah = explode("\\", $class);
    $file = $pecah[0] . "/" . end($pecah) . ".php";
    //echo $file;
    if (is_readable($file)) {
        require($file);
    }
}
spl_autoload_register('autoload');
