<?php
// optional: destroy any session just in case
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logged Out</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #fff;
        }
        h1 {
            color: red;
            font-size: 2rem;
        }
        a {
            margin-top: 20px;
            display: block;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <div>
        <h1>You are logged out ❌</h1>
        <a href="login.php">Click here to log in again</a>
    </div>
</body>
</html>
