<?php
    /**
     * Main file, in which all the Classes, config files are included
     * Created by User: gurjot
     */

    // Load config
    require_once 'config/config.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });