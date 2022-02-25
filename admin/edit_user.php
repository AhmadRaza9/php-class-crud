<?php include "includes/header.php";?>

<?php

if (empty($_GET['id'])) {
    header("Location: users.php");
}

$users = new User();
$message = '';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $userByid = $users->findById("users", $user_id);
    while ($user = mysqli_fetch_assoc($userByid)) {
        $username = $user['username'];
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($password)) {

        $find_db_password = $users->fetchUserPasswordById($user_id);
        while ($row = mysqli_fetch_assoc($find_db_password)) {
            $db_password = $row['password'];
        }

        $user = $users->updateById("users", $user_id, $username, $db_password);
        $message = "User Successfully Update";

    } else {

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $user = $users->updateById("users", $user_id, $username, $hash_password);
        $message = "User Successfully Update";

    }

}
?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


        <?php include "includes/top_nav.php";?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include "includes/sidebar.php";?>

            <!-- /.navbar-collapse -->
        </nav>

    <div id="page-wrapper" class="p-5">
            <form method="POST">
                <div class="mb-3" >
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
                </div>
                <div id="admin_user_pass" class="mb-3 hidden">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter New password">
                </div>
                <button id="show-pass" class="btn btn-secondary">Update Password</button>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        <div class="col-sm-4 mt-4" style="margin: 0 auto;">
        <?php
echo "<p class=' alert-success'>$message</p>";
?>
        </div>
    </div>


<?php include "includes/footer.php";?>