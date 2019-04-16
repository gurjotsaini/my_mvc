<?php
    /**
     * Created by User: gurjot
     */

    class Post
    {
        private $db;

        public function __construct () {
            $this->db = new Database();
        }

        public function getPost() {
            $this->db->query("SELECT * FROM post");

            return $this->db->resultSet();
        }
    }