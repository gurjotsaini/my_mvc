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
//            print_r($this->getUrl());
            $url = $this->getUrl();

            // Look in controllers for first value
            // Used ucwords() function to convert !st letter of URL value to uppercase
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);

                // Unset zero index
                unset($url[0]);
            } // End of if

            // Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;
        }

        /**
         * Get URL value
         */
        public function getUrl() {
            // Check: URL is set or not
            if (isset($_GET['url'])) {
                // Strip the forward slash on end of URL
                $url = rtrim($_GET['url'], '/');

                // Sanitize the URL
                $url = filter_var($url, FILTER_SANITIZE_URL);

                // Breaking values in an array
                $url = explode('/', $url);

                return $url;
            }
        }
    }