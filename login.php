<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="./css/styles.css"/>
</head>
<body>
<?php
    require('database.php');
    session_start();
    // Wanneer het formulier is verzonden, controleert en maak je een gebruikerssessie aan.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // verwijder backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Controleer of de gebruiker bestaat in de database
        $query    = "SELECT * FROM `klant` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Omleiden naar gebruikersdashboardpagina
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect gebruikersnaam of wachtwoord</h3><br/>
                  <p class='link'>Klik hier om <a href='login.php'>in te loggen</a></p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Inloggen</h1>
        <input type="text" class="login-input" name="username" placeholder="Gebruikersnaam" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Wachtwoord"/>
        <input type="submit" value="Inloggen" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">Registreren</a>
        <a href="index.php">Terug</a></p>
  </form>
<?php
    }

    include 'footer.php'
?>
</body>
</html>