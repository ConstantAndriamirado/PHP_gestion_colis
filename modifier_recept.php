<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/modifier.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Modification</title>
</head>
<body>
    <?php
        include_once "connection.php";
        $id1 = $_GET['id1'];
        $id2 = $_GET['id2'];
        $req = "SELECT * FROM Recevoir WHERE Idrecept = '$id1' AND Idenvoi = '$id2'";
        $resu = $conn -> query($req);

        $row = mysqli_fetch_assoc($resu);

        if (isset($_POST['btn_modification'])) {
            
            $a = $_POST["Idrecept"];
            $b = $_POST["Idenvoi"];
            $c = $_POST["Date"];


            if (isset($a) && ($b) && ($c)) {
                
                $req = "UPDATE Recevoir SET Idrecept = '$a' , Idenvoi = '$b' , Date_recept = '$c' WHERE Idrecept = '$id1' AND Idenvoi = '$id2'";
                $resul = $conn -> query($req);
                if ($resul) {
                    header("location:reception.php");
                }
                else {
                    $message = "Modification en echec !";
                }

            }
        } else {
            $message = "N'oublie pas de remplir tous les champs !";
        }


    ?>
    <div class="form">
        <a href="reception.php" class="back_btn"><img src="assets/img/retour.png"/> Retour </a>
        <h2>Modifier la reception</h2>
        <p class="erreur_message">
            <?php
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
                    <label>Id de la reception</label> <input type="number" class="input" name="Idrecept" value="<?=$row['Idrecept']?>">
                    <label>Id de la voiture</label> <input type="number" class="input" name="Idenvoi" value="<?=$row['Idenvoi']?>">
                    <label>Date de la reception</label> <input type="datetime-local" class="input" name="Date" value="<?=$row['Date_recept']?>">
                <input type="submit" class="sub" value="Modifier" name="btn_modification">
            
        </form>
    </div>
</body>
</html>