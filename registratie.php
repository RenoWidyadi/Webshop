<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>Registreren</title>
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <?php
        require('db.php');
        
        if (isset($_REQUEST['username'])) {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username);
            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `users` (username, password, email, create_datetime)
                         VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                <h3>Je bent succesvol geregistreerd!</h3><br/>
                <p class='link'>Klik hier om <a href='login.php>in te loggen</a></p>
                </div>";
                
            } else {
                echo "<div class='form'>
                <h3>Verplichte velden niet ingevuld!</h3><br/>
                <p class='link'>Klik hier om te <a href='registration.php>registreren</a>
                </div>";
            }
        } else {
            ?>
                
                <form class="form" action="" method="post">
                    <h1 class="login-title">Registreren</h1>
                    <input type="text" class="login-input" name="gebruikersnaam" placeholder="Gebruikersnaam" required />
                    <input type="text" class="login-input" name="email" placeholder="Emailadres">
                    <input type="password" class="login-input" name="password" placeholder="Wachtwoord">
                    <input type="submit" name="submit" value="Registeren" class="login-button">
                    <p class="link"><a href="login.php">Klik om in te loggen</a></p>
                     
        <?php
        }

        ?>