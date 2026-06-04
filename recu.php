<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="assets/css/fenetre.css" rel="stylesheet"/>   
        <title>Gestion des colis</title>
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <ul class="nav nav-tabs">
                <li class="nav-item">
                        <a class="nav-link" href="accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="itineraire.php">Itineraire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="voiture.php">Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="envoi.php">Envoi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reception.php">Réception</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="colis.php">Colis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="recu.php">Recu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recette.php">Recette</a>
                    </li>
                </ul>
            </div>

            <div class="affichage_recu">
            <?php
                include 'connection.php';
                $sql = "SELECT * FROM Recevoir";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <table class="table .table-hover table-primary">
                        <tr>
                            <th style="width:20%; text-align:center;">Id de la reception</th>
                            <th style="width:20%; text-align:center;">Id d'envoi</th>
                            <th style="width:20%; text-align:center;">Date de reception</th>
                            <th style="width:20%; text-align:center;">Generer un pdf</th>
                            <th style="width:20%; text-align:center;">Envoyer un email</th>
                        </tr>
                    </table>
                    <?php
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <table class="table .table-hover">
                        <tr>
                            <td style="width:20%; text-align:center;"><?=$row["Idrecept"]?></td>
                            <td style="width:20%; text-align:center;"><?=$row["Idenvoi"]?></td>
                            <td style="width:20%; text-align:center;"><?=$row["Date_recept"]?></td>
                            <td style="width:20%; text-align:center;">
                                <a href="pdf.php?id1=<?=$row["Idrecept"]?> & id2=<?=$row["Idenvoi"]?>">
                                    <img name="btn_pdf" class="img_pdf" src="assets/img/pdf.png"/>
                                </a>
                            </td>
                            <td style="width:20%; text-align:center;">
                                <a href="email.php?id1=<?=$row["Idrecept"]?> & id2=<?=$row["Idenvoi"]?>">
                                    <img name="btn_email" class="img_pdf" src="assets/img/email.png"/>
                                </a>
                            </td>
                        </tr>
                    </table>
                    <?php
                    }
                } else {
                  echo "0 resultats";
                }
            ?>
            </div>
            
        </div>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>