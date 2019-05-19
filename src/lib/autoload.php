<?php
/**
 * Created by PhpStorm.
 * User: remba
 * Date: 19/05/2019
 * Time: 14:17
 */

function autoload($classname)
{
    if (file_exists($file = $classname . '.php'))
    {
        require $file;
    }
}

spl_autoload_register('autoload');