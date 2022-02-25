<?php

class Department extends Db_object
{
    public $id;
    public $title;
    public $image;

    public function fetchAllDepartments()
    {
        $data = null;
        $departments = $this->findAll("departments");
        while ($row = mysqli_fetch_array($departments)) {
            $data[] = $row;
        }
        return $data;
    }

    public function insert($user_id, $title, $description)
    {
        global $database;
        $query = "INSERT INTO departments(user_id, title, description) VALUES($user_id, '$title', '$description' )";
        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

    public function updateById($db_table, $user_id, $id, $title, $description)
    {
        global $database;
        $query = "UPDATE $db_table SET ";
        $query .= "user_id = '{$user_id}', ";
        $query .= "title = '{$title}', ";
        $query .= "description = '{$description}' ";
        $query .= "WHERE id = {$id} ";

        $result = $this->confirm_query($database->connection, $query);
        return $result;
    }

}
