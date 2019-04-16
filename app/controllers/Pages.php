<?php
    /**
     * Created by User: gurjot
     */

    class Pages extends Controller
    {
        public function __construct () {

        }

        public function index() {
            $data = [
                'title' => 'Welcome to MyMVC'
            ];

            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About Us'
            ];
            $this->view('pages/about', $data);
        }
    }