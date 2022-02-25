<?php include "includes/header.php";?>

<?php
$department_obj = new Department();
$departments = $department_obj->fetchAllDepartments();

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
            <h1>Departments</h1>
            <a href="add_department.php"><button class="btn btn-success">Add New</button></a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($departments as $department): ?>
                        <tr>
                            <td><?php echo $department['id']; ?></td>
                            <td>
<?php
$dep_user_id = $department['user_id'];
$userById = $db_object->findById("users", $dep_user_id);
while ($userId = mysqli_fetch_assoc($userById)) {
    echo $userId['username'];
}
?>
                            </td>
                            <td><?php echo $department['title']; ?>
                                <div class="pictures_links">
                                    <a href="delete_department.php?id=<?php echo $department['id']; ?>">Delete</a>
                                    <a href="edit_department.php?id=<?php echo $department['id']; ?>">Edit</a>
                                </div>
                            </td>
                            <td>
<?php
$description = $department_obj->fewDescription($department['description']);
echo $description;
?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

<?php include "includes/footer.php";?>