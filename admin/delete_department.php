<?php include "includes/init.php";?>

<?php

if (empty($_GET['id'])) {
    header("Location: departments.php");
}

$departments = new Department();

if (isset($_GET['id'])) {
    $dep_id = $_GET['id'];
    $dep = $departments->deleteById("departments", $dep_id);
    header("Location: departments.php");

}
