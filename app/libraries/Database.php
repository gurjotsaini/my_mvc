<?php
    /*
     * PDO Database Class
     * Created by User: gurjot
     *
     * Create Prepared Statements
     * Bind Values
     * Return rows and results
     */

    class Database
    {
        private $dbh;
        private $stmt;
        private $error;

        /**
         * Database constructor.
         */
        public function __construct () {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file(realpath(APP_ROOT . '/config/db_config.ini'));

            // Set DSN
            $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['database_name'];

            // Set Options
            $options = array(
                PDO::ATTR_PERSISTENT            => true,
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND    => 'SET NAMES utf8'
            );

            //$this->dbh = new PDO($dsn, $config['username'], $config['password'], $options);

            try {
                $this->dbh = new PDO($dsn, $config['username'], $config['password'], $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        } // end of __construct method

        /**
         * Prepare statement with query
         *
         * @param $query
         */
        public function query( $query) {
            $this->stmt = $this->dbh->prepare($query);
        } // end of query method

        /**
         * Bind Values
         *
         * @param      $param
         * @param      $value
         * @param null $type
         */
        public function bind( $param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }

            $this->stmt->bindValue($param, $value, $type);
        } // end of bind method

        /**
         * Execute prepared statement
         *
         * @return mixed
         */
        public function execute() {
            return $this->stmt->execute();
        } // end of execute method

        /**
         *
         */
        public function lastInsertId() {
            return $this->dbh->lastInsertId();
        } // end of lastInsertId method

        /**
         * Get result set as an array of objects
         *
         * @return all values
         */
        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);

        } // end of resultSet method

        /**
         * Fetch single record record as object
         */
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        } // end of single method

        /**
         * Get row count
         *
         * @return mixed
         */
        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }
