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
        $req = "SELECT * FROM Envoyer WHERE Idenvoi = '$id1' AND Idvoit = '$id2'";
        $resu = $conn -> query($req);

        $row = mysqli_fetch_assoc($resu);

        if (isset($_POST['btn_modification'])) {
            
            $c = $_POST["colis"];
            $d = $_POST["nom_envoie"];
            $e = $_POST["email"];
            $f = $_POST["date"];
            $g = $_POST["frais"];
            $h = $_POST["nom_recep"];
            $i = $_POST["contact_recept"];


            if (isset($c) && ($d) && ($e) && ($f) && ($g) && ($h) && ($i)) {
                
                $req = "UPDATE Envoyer SET Colis = '$c' , Nom_envoyeur = '$d' , Email_envoyeur = '$e' , Date_envoi = '$f' , Frais = '$g' , Nom_recepteur = '$h' , Contact_recepteur = '$i' WHERE Idenvoi = '$id1' AND Idvoit = '$id2'";
                $resul = $conn -> query($req);
                if ($resul) {
                    header("location:envoi.php");
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
        <a href="envoi.php" class="back_btn"><img src="assets/img/retour.png"/> Retour </a>
        <h2>Modifier l'envoie</h2>
        <p class="erreur_message">
            <?php
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nom du colis</label> <input type="text" class="input" name="colis" value="<?=$row['Colis']?>">
                    <label>Nom de l'envoyeur</label> <input type="text" class="input" name="nom_envoie" value="<?=$row['Nom_envoyeur']?>">
                    <label>Email de l'envoyeur</label> <input type="email" class="input" name="email" value="<?=$row['Email_envoyeur']?>">
                    <label>Date</label> <input type="datetime-local" class="input" name="date" value="<?=$row['Date_envoi']?>">
                </div>
                <div class="col-sm-6">
                    <label>Frais</label> <input type="number" class="input" name="frais" value="<?=$row['Frais']?>">
                    <label>Nom du recepteur</label> <input type="text" class="input" name="nom_recep" value="<?=$row['Nom_recepteur']?>">
                    <label>Contact du recepteur</label> <input type="text" class="input" name="contact_recept" value="<?=$row['Contact_recepteur']?>">
                    <input type="submit" class="sub" value="Modifier" name="btn_modification">
                </div>
            </div>
            
        </form>
    </div>
</body>
</html>