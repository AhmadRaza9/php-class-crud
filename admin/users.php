<!-- <#?php session_start();?> -->
<?php include "includes/header.php";?>


<?php
$user = new User();
$users = $user->fetchAllUsers();

$db_object = new Db_object();
if (!$db_object->isLoggedIn()) {
    header("location: /login.php");
}

?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


        <?php include "includes/top_nav.php";?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <?php include "includes/sidebar.php";?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <h1>User</h1>
            <a href="/sign-up.php"><button class="btn btn-success">Add New</button></a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td>
                                <?php echo $user['username']; ?>
                                <div class="pictures_links">
                                    <a class="delete_user" href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
                                    <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                                </div>
                            </td>
                            <?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];unset($_SESSION['message']);}?>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php";?>