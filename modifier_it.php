<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/modifier.css" rel="stylesheet"/>
    <title>Modification</title>
</head>
<body>
    <?php
        include_once "connection.php";
        $id = $_GET['id'];
        $req = "SELECT * FROM Itineraire WHERE Codeit = '$id'";
        $resu = $conn -> query($req);

        $row = mysqli_fetch_assoc($resu);

        if (isset($_POST['btn_modification'])) {
            
            $b = $_POST["Villedep_modification"];
            $c = $_POST["Villearr_modification"];


            if (isset($b) && ($c)) {
                
                $req = "UPDATE Itineraire SET Codeit = '$id' , Villedep = '$b' , Villearr = '$c' WHERE Codeit = '$id'";
                $resul = $conn -> query($req);
                if ($resul) {
                    header("location:itineraire.php");
                }
                else {
                    $message = "Modification en echec !";
                }

            }
        } else {
            $message = "";
        }


    ?>
    <div class="form">
        <a href="itineraire.php" class="back_btn"><img src="assets/img/retour.png"/> Retour </a>
        <h2>Modifier l'itineraire</h2>
        <p class="erreur_message">
            <?php
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>Ville de depart</label> <input type="text" class="input" name="Villedep_modification" value="<?=$row['Villedep']?>">
            <label>Ville d'arrivé</label> <input type="text" class="input" name="Villearr_modification" value="<?=$row['Villearr']?>">
            <input type="submit" class="sub" value="Modifier" name="btn_modification">
        </form>
    </div>
</body>
</html>