<?php

class Db_object
{

    public function findAll($db_table)
    {
        global $database;
        $query = "SELECT * FROM " . $db_table;
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function findById($db_table, $id)
    {
        global $database;
        $query = "SELECT * FROM $db_table WHERE id = $id ";
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function confirm_query($database, $query)
    {
        $result = mysqli_query($database, $query);
        if (!$result) {
            die("QUERY FAILED " . mysqli_error($database));
        }
        return $result;

    }

    public function deleteById($db_table, $id)
    {
        global $database;
        $query = "DELETE FROM " . $db_table;
        $query .= " WHERE id = $id";
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function msqli_real_escape($string)
    {
        global $database;
        return mysqli_real_escape_string($database->connection, $string);
    }

    public function isLoggedIn()
    {

        if (isset($_SESSION['username'])) {
            return true;
        }
        return false;
    }

    public function fetchAllRows($db_table)
    {
        global $database;
        $query = "SELECT * FROM $db_table";
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function fewDescription($text)
    {
        $result = implode(' ', array_slice(explode(' ', $text), 0, 15));
        return $result;

    }

}
