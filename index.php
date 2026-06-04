<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="assets/css/login.css" rel="stylesheet"/>   
        <title>Gestion des colis</title>
    </head>
    <body>
        <div class="container">
            <form action="index.php" method="POST">
                <p>Bienvenu</p>
                <input type="email" name="login_email" placeholder="Email"><br>
                <input type="password" name="login_password" placeholder="Mot de passe"><br>
                <input type="submit" name="login_submit" value="Acceder"><br>
                <a href="#">Mot de passe oublier</a>
            </form>

            <div class="drop drop-1"></div>
            <div class="drop drop-2"></div>
            <div class="drop drop-3"></div>
            <div class="drop drop-4"></div>
            <div class="drop drop-5"></div>
        </div>
        <?php
            include_once 'connection.php';

            if(isset($_POST['login_submit']))
            {
                $email = $_POST['login_email'];
                $mdp = $_POST['login_password'];
                $req = "SELECT * FROM Admin WHERE Email_admin = '$email' and Mdp_admin = '$mdp'";
                $exec = $conn -> query($req);

                if ($exec -> num_rows > 0)
                {
                    echo"<script>alert('Bienvenu !')</script>";
                    header("location:accueil.php");
                }
                else
                {
                    echo"<script>alert('Email ou mot de passe incorrect !')</script>";
                }
            }
            $conn -> close();
            
        ?>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>