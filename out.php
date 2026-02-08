<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logged Out</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: red;
        }
        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <div>
        <h1>You are logged out ❌</h1>
        <a href="login.php">Log in again</a>
    </div>
</body>
</html>
