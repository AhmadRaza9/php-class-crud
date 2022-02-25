<?php include "includes/header.php";?>

<?php

$user = new User();
$users = $user->findAll("users");
$message = '';

if (isset($_POST['submit'])) {
    $title = $_POST['dep_title'];
    $user = $_POST['dep_user'];
    $description = $_POST['dep_description'];

    $department = new Department();
    $departments = $department->insert($user, $title, $description);
    $message = "Department successfully added";

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
            <div class="mb-3 form-group" >
                <label for="dep_title" class="form-label">Title</label>
                <input type="text" class="form-control" name="dep_title" placeholder="Enter Department Title">
            </div>
            <div class="mb-3 form-group">
                <label for="dep_users">Select User</label>
                <select name="dep_user" class="form-control">
                    <option value="" selected>Select</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3 form-group">
                <textarea name="dep_description" class="form-control" cols="30" rows="10" placeholder="Enter department description"></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary">
            </form>
            <div>
                <?php echo $message; ?>
            </div>
        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/footer.php";?>