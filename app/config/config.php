<?php
    /**
     * Created by User: gurjot
     */

    //Enable this only in production state
    //Enabling error_reporting
    if ( !error_reporting(E_ALL) ) {
        die("Unable to set error reporting");
    }

    //Enable this only in production state
    //Checking and enabling errors display
    if ( !ini_get('display_errors') ) {
        ini_set('display_errors', '1');
    }

    //Enable this only in production state
    //Checking and enabling startup errors display
    if ( ini_get('display_startup_errors') == 0 ) {
        ini_set('display_startup_errors', 1);
    }

    //Checking and setting Timezone to "Asia/Kolkata"
    if ( !ini_get('date.timezone') ) {
        date_default_timezone_set('Asia/Kolkata');
    }

    // App Root
    define('APP_ROOT', dirname(dirname(__FILE__)));

    // URL Root
    define('URL_ROOT', 'https://mymvc.test:8890');

    // Site Name
    define('SITE_NAME', 'MyMVC');