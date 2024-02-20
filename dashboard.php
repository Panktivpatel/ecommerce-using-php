<?php
    require("db.php");
    include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['name']; ?> ! </p>
        <p>Welcome to your page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>