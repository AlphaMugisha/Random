<?php
session_start();

// not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// time left
$timeLeft = $_SESSION['expire'] - time();

// session expired
if ($timeLeft <= 0) {
    session_destroy();
    header("Location: out.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?> 👋</h1>
    <p>
        Time left before logout:
        <span id="countdown"><?php echo $timeLeft; ?></span> seconds
    </p>

    <form method="post" action="logout.php">
        <button type="submit">Logout</button>
    </form>

    <script>
        let timeLeft = <?php echo $timeLeft; ?>;
        const countdown = document.getElementById("countdown");

        const timer = setInterval(() => {
            timeLeft--;
            if (timeLeft < 0) timeLeft = 0;
            countdown.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(timer);
                window.location.href = "out.php";
            }
        }, 1000);
    </script>
</body>
</html>
