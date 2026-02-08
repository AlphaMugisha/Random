<?php
session_start();

// fake login
$_SESSION['user'] = "Tiger";
$_SESSION['login_time'] = time();

// session expires after 30 seconds
$_SESSION['expire'] = $_SESSION['login_time'] + 30;

header("Location: index.php");
exit();
