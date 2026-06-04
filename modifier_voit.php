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
        $req = "SELECT * FROM Voiture WHERE idvoit = '$id'";
        $resu = $conn -> query($req);

        $row = mysqli_fetch_assoc($resu);

        if (isset($_POST['btn_modification'])) {
            
            $b = $_POST["design_modification"];
            $c = $_POST["codeit_voit_modification"];
            $d = $_POST["frais_modification"];


            if (isset($b) && ($c) && ($d)) {
                
                $req = "UPDATE Voiture SET Idvoit = '$id' , Design = '$b' , Codeit = '$c' , Frais = '$d' WHERE Idvoit = '$id'";
                $resul = $conn -> query($req);
                if ($resul) {
                    header("location:voiture.php");
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
        <a href="voiture.php" class="back_btn"><img src="assets/img/retour.png"/> Retour </a>
        <h2>Modifier la voiture</h2>
        <p class="erreur_message">
            <?php
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label>Design de la voiture</label> <input type="text" class="input" name="design_modification" value="<?=$row['Design']?>">
            <label>Code Itineraire</label>
            <select class="input" name="codeit_voit_modification" style="font-size: 13px; height: 30px; width: 100%;">
            <option><?=$row['Codeit']?></option>
            <?php
                $select_re = "SELECT * FROM Itineraire";
                $select_exec = $conn -> query($select_re);
                while ($rows = mysqli_fetch_assoc($select_exec)) {
                    ?>
                        <option value="<?=$rows['Codeit']?>"><?=$rows['Codeit']?></option>
                    <?php
                }
            ?>
            </select>
            <label>Frais</label> <input type="number" class="input" name="frais_modification" value="<?=$row['Frais']?>">
            <input type="submit" class="sub" value="Modifier" name="btn_modification">
        </form>
    </div>
</body>
</html>