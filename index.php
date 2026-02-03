<?php
session_start();

// check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// calculate remaining time
$timeLeft = $_SESSION['expire'] - time();

// if time is up, destroy session and redirect to out.php
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
    <p>Time left before logout: <span id="countdown"><?php echo $timeLeft; ?></span> seconds</p>

    <form method="post" action="logout.php">
        <button type="submit">Logout</button>
    </form>

    <script>
        // Countdown timer
        let timeLeft = <?php echo $timeLeft; ?>;
        const countdownEl = document.getElementById('countdown');

        const timer = setInterval(() => {
            timeLeft--;
            if(timeLeft < 0) timeLeft = 0;
            countdownEl.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(timer);
                window.location.href = "out.php";
            }
        }, 1000);
    </script>
</body>
</html>
