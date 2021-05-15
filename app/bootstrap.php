<?php


    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }


    require_once 'config/config.php';
    require_once 'helpers/url_helper.php';

    

    spl_autoload_register(function($className)
    {
        
        require_once 'libraries/' .$className. '.php';
        
    });
?>