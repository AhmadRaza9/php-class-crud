<?php
session_start();

require_once "admin/includes/init.php";

$users = new User;
global $database;
$message = '';

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $username = $users->msqli_real_escape($username);
    $password = $users->msqli_real_escape($password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $select_users_query = $users->confirm_query($database->connection, $query);

    while ($row = mysqli_fetch_assoc($select_users_query)) {

        $db_user_id = $row['id'];
        $db_username = $row['username'];
        $db_user_password = $row['password'];

        if ($db_username == $username && password_verify($password, $db_user_password)) {
            $_SESSION['username'] = $db_username;
            $_SESSION['password'] = $db_password;
            header("location: /admin");

        } else {
            header("location: login.php");

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <div class="col-sm-4 mt-4" style="margin:0 auto;">
        <form method="POST">
        <div class="mb-3" >
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
        <small>or <a href="sign-up.php">sign-up</a></small>
        </form>
    </div>
    <div class="col-sm-4 mt-4" style="margin: 0 auto;">
    <?php
echo "<p class=' alert-success'>$message</p>";
?>
    </div>
</body>
</html>



