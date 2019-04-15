<?php
    /*
     * App Core Class
     * Created by: gurjot
     *
     * Creates URL & loads core controller
     * URL Format: /controller/method/params
     */
    class Core
    {
        // Properties
        // If there are no other controllers, Pages controller will load
        protected $currentController    = 'Pages';
        protected $currentMethod        = 'index';
        protected $params               = [];

        public function __construct () {
            $this->getUrl();
        }

        /**
         * Get URL value
         */
        public function getUrl() {
            echo $_GET['url'];
        }
    }