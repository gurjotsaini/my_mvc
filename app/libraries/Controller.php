<?php
    /**
     * Base Controller
     * Created by User: gurjot
     *
     * Loads Models and Views
     */

    class Controller
    {
        /**
         * Loads Model
         *
         * @param $model
         * @return mixed
         */
        public function model( $model) {
            // Requiring model file
            require_once '../app/models/' . $model . '.php';

            // Instantiate Model
            return new $model();
        } // End of model method

        /**
         * Loads View
         *
         * @param       $view
         * @param array $data
         */
        public function view( $view, $data = []) {
            // Checks for view file
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                // If view does not exists
                die('View does not exist');
            }
        } // End of view method
    }