<?php
    namespace App;

    class Connection {

        public static function getDatabase() {
            try {

                $connection = new \PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', '');
                return $connection;

            } catch (\PDOException $exception) {

            }
        }

    }
?>