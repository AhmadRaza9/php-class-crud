<?php
session_destroy();
session_start();
unset($_SESSION['username']);
header("Location: login.php");
