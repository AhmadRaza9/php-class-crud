<?php
require_once "admin/includes/init.php";

$users = new User;
$message = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $error = ['user_name' => '', 'user_email' => '', 'user_password' => ''];
    $success = ['success_message' => ''];
    if (strlen($username) < 4) {

        $error['user_name'] = 'Username needs to be longer than 4';
    }

    if (strlen($username) > 10) {

        $error['user_name'] = 'Username needs to be less than 10';
    }

    if ($username == '') {
        $error['user_name'] = 'Username cannot be empty';
    }

    if ($users->username_exists($username)) {
        $error['user_name'] = 'Username already exists, pick another one!';
    }

    if ($password == '') {
        $error['user_password'] = 'Password cannot be empty';
    }

    if (strlen($password) < 4) {
        $error['user_password'] = 'Password needs to be longer than 4';
    }

    if (strlen($password) > 10) {
        $error['user_password'] = 'Password needs to be longer than 10';
    }

    foreach ($error as $key => $value) {
        if (empty($value)) {
            unset($error[$key]);
        }
    }

    if (!$error) {
        $user = $users->insert($username, $hash_password);
        $username = '';
        $password = '';
        $success['success_message'] = "User Successfully Added";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <div class="col-sm-4 mt-4" style="margin:0 auto;">
        <form method="POST" action="sign-up.php">
        <div class="mb-3" >
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
        </div>
        <p class="text-secondary text-left"> <?php echo isset($error['user_name']) ? $error['user_name'] : ''; ?> </p>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
        </div>
        <p class="text-secondary text-left"> <?php echo isset($error['user_password']) ? $error['user_password'] : ''; ?> </p>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <small>or <a href="login.php">Login</a></small>
        </form>
    </div>
    <div class="col-sm-4 mt-4" style="margin: 0 auto;">
    <?php echo "<p class=' alert-success'>" ?>
    <?php echo isset($success['success_message']) ? $success['success_message'] : ''; ?>
   <?php "</p>";?>
    </div>
</body>
</html>



