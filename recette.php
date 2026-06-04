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
                        <a class="nav-link" href="recu.php">Recu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="recette.php">Recette</a>
                    </li>
                </ul>
            </div>
            <div class="affichageRecette">
                <?php
                    include 'connection.php';
                    function afficher ($conn) {
                        $sql = "SELECT * FROM Envoyer ORDER BY Idenvoi ASC";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            ?>
                                <table class="table .table-hover table-primary">
                                    <tr>
                                        <th style="width:33%; font-size:22px; text-align:center;">Id envoi</th>
                                        <th style="width:33%; font-size:22px; text-align:center;">Id voiture</th>
                                        <th style="width:33%; font-size:22px; text-align:center;">Frais</th>
                                    </tr>
                                </table>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:33%; font-size:20px; text-align:center;"><?=$row["Idenvoi"]?></td>
                                            <td style="width:33%; font-size:20px; text-align:center;"><?=$row["Idvoit"]?></td>
                                            <td style="width:33%; font-size:20px; text-align:center;"><?=$row["Frais"]?>Ar</td>
                                        </tr>
                                    </table>
                                <?php
                            }
                        } else {
                          echo "Il n'y a aucune envoie enregistrée !";
                        }
                    }
                    afficher($conn);
                ?>
            </div>
            
                                <?php
                                    $req_rec = "SELECT * FROM Envoyer";
                                    $rec = $conn->query($req_rec);
                                    $totale = 0;
                                    while($res = $rec->fetch_assoc())
                                    {
                                        $totale += $res['Frais'];
                                    }
                                    
                                   
                                ?>
                          
            <input type="button"  class="boutonRecette" value="
            <?php
                    echo "La recette totale accumulée par la coopérative est: " . $totale . " Ar";
                ?>
            ">
        
        </div>    
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>