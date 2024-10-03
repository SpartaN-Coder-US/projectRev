<?php

/**
 * Redirect to another url on the same site.
 *
 * @param [string] $path is the path to redirect to
 * @return void      
 */
function redirect($path)
{
    if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ){
        $protocol= 'https';
    }   else{
        $protocol = 'http';
    } 
    header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
    exit;
}