<?php
include("auth_session.php");

require('db.php');
include("auth_session.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - klantenbeheer</title>
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>Je bent nu in het klantenbeheer</p>
        <p><a href="logout.php">Uitloggen</a></p>
    </div>
</body>
</html>