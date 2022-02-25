<?php include "includes/init.php";?>

<?php
session_start();
if (empty($_GET['id'])) {
    header("Location: users.php");
}

$users = new User();
$user = $users->fetchAllRows("users");
$user_row = mysqli_num_rows($user);

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    if ($user_row == 1) {
        $message = "Cannot delete the last one";
        $_SESSION['message'] = $message;
        header("Location: users.php");
        return false;
    } else {
        $user = $users->deleteById("users", $user_id);
        $_SESSION['message'] = $message;
        header("Location: users.php");
    }

}
