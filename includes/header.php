<?php
session_start();
include "admin/includes/init.php";
$db_object = new Db_object();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Practice</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white"><strong>Home</strong></a></li>
          <?php if ($db_object->isLoggedIn()): ?>
            <li><a href="admin" class="nav-link px-2 text-white"><strong>Admin</strong></a></li>
          <?php endif;?>
        </ul>

        <div class="text-end">
          <a href="sign-up.php"><button type="button" class="btn btn-outline-light me-2">Sign-up</button></a>
          <a href="login.php"><button type="button" class="btn btn-warning">Login</button></a>
        </div>
      </div>
    </div>
  </header>
