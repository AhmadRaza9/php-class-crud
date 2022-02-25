<?php

class User extends Db_object
{
    public $id;
    public $username;
    public $password;

    public function fetchAllUsers()
    {
        $data = null;
        $users = $this->findAll("users");
        while ($row = mysqli_fetch_array($users)) {
            $data[] = $row;
        }
        return $data;
    }

    public function insert($username, $password)
    {
        global $database;
        $query = "INSERT INTO users(username, password) VALUES('$username', '$password' )";
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function fetchUserPasswordById($id)
    {
        global $database;
        $query = "SELECT * FROM users WHERE id = '$id' ";
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function updateById($db_table, $id, $username, $password)
    {
        global $database;
        $query = "UPDATE $db_table SET ";
        $query .= "username = '{$username}', ";
        $query .= "password = '{$password}' ";
        $query .= "WHERE id = {$id} ";

        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function username_exists($username)
    {
        global $database;
        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = $this->confirm_query($database->connection, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }

    }

}
