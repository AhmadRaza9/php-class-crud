<?php

use JetBrains\PhpStorm\Deprecated;

$db_object = new Db_object();
if (!$db_object->isLoggedIn()) {
    header("location: /login.php");
}
$users = new User();
$user = $users->fetchAllRows("users");
$user_row = mysqli_num_rows($user);

$departments = new Department();
$department = $departments->fetchAllRows("departments");
$department_row = mysqli_num_rows($department);

?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin <small>Dashboard</small>
                        </h1>
                    </div>
                </div>
                <div class="row mt-2">

                        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $user_row; ?></div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $department_row; ?></div>
                                        <div>Departments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="departments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Departments</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
