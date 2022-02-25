<?php include "includes/header.php";?>

<?php
$user = new User();
$users = $user->fetchAllUsers();

if (empty($_GET['id'])) {
    header("Location: departments.php");
}

$department = new Department();

if (isset($_GET['id'])) {
    $dep_id = $_GET['id'];
    $depByid = $department->findById("departments", $dep_id);
    while ($dep = mysqli_fetch_assoc($depByid)) {
        $dep_user_id = $dep['user_id'];
        $title = $dep['title'];
        $description = $dep['description'];
    }

    $dep_user = $user->findById("users", $dep_user_id);
    while ($department_user = mysqli_fetch_assoc($dep_user)) {
        $dep_user_name = $department_user['username'];

    }

}

if (isset($_POST['submit'])) {
    $user_id = $dep_user_id;
    $title = $_POST['dep_title'];
    $description = $_POST['dep_description'];
    $user_id = $_POST["dep_user"];

    $result = $department->updateById("departments", $user_id, $dep_id, $title, $description);
    header("Location: edit_department.php?id=$dep_id");

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
                <div class="mb-3 form-group">
                    <label for="dep_title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="dep_title" id="username" value="<?php echo $title; ?>">
                </div>
                <div class="mb-3 form-group">
                    <select name="dep_user" class="form-control">
<?php
foreach ($users as $dep_user) {

    $selected = "selected";
    $user_dep_id = $dep_user['id'];
    $user_dep = $dep_user['username'];

    if ($dep_user_id == $user_dep_id) {
        echo "<option value='$user_dep_id' $selected>$user_dep</option>";
    } else {
        echo "<option value='$user_dep_id'>$user_dep</option>";
    }
}
?>
                    </select>
                </div>
                <div id="admin_user_pass" class="mb-3 form-group">
                    <textarea class="form-control" name="dep_description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
    </div>


<?php include "includes/footer.php";?>