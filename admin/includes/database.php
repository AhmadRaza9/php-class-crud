<?php

class Database
{
    public $connection;

    public function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // new way

        if ($this->connection->connect_errno) {
            die("DataBase Connection Failed Badly " . $this->connection->connect_error);
        }
        // else {
        //     echo "connected";
        // }

    }
}

$database = new Database();
