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
                        <a class="nav-link active" href="reception.php">Réception</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="colis.php">Colis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recu.php">Recu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recette.php">Recette</a>
                    </li>
                </ul>
            </div>

                    <!--------Modale 1 ------------>
            <div class="modal" id="myModal_1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h3 class="modal-title">Veuillez saisir les valeurs à ajouter</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>  
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="number" class="form-control" placeholder="Id de la reception" name="idrecept_ajo">
                                    <label>Id de la reception</label>
                                </div>  
                                <div class="form-floating mt-3 mb-3">
                                    <input type="number" class="form-control" placeholder="Id de l'envoi" name="idenvoi">
                                    <label>Id de l'envoie</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="date" class="form-control" placeholder="Date de la reception" name="daterecept_ajo">
                                    <label>Date de la reception</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="time" class="form-control" placeholder="Heure de la reception" name="timerecept_ajo">
                                    <label>Heure de la reception</label>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btn_ajouter" name="btn_ajouter" data-bs-dismiss="modal">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <form method="POST">
                <button type="button" class="img_ajo_btn" data-bs-toggle="modal" data-bs-target="#myModal_1" ><img class="img_ajo" src="assets/img/ajouter.png"/></button>
            </form>
            <div class="affichage">
                <?php
                    include 'connection.php';
                    function afficher ($conn) {
                        $sql = "SELECT * FROM Recevoir ORDER BY Idrecept ASC";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            ?>
                                <table class="table .table-hover table-primary">
                                    <tr>
                                        <th style="width:20%; text-align:center;">Id de la reception</th>
                                        <th style="width:20%; text-align:center;">Id d'envoie</th>
                                        <th style="width:30%; text-align:center;">Date de la reception</th>
                                        <th style="width:15%; text-align:center;">Editer</th>
                                        <th style="width:15%; text-align:center;">Supprimer</th>
                                    </tr>
                                </table>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:20%; text-align:center;"><?=$row["Idrecept"]?></td>
                                            <td style="width:20%; text-align:center;"><?=$row["Idenvoi"]?></td>
                                            <td style="width:30%; text-align:center;"><?=$row["Date_recept"]?></td>
                                            <td style="width:15%; text-align:center;"><a href="modifier_recept.php?id1=<?=$row['Idrecept']?> & id2=<?=$row['Idenvoi']?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                            <td style="width:15%; text-align:center;"><a href="supprimer_recept.php?id1=<?=$row['Idrecept']?> & id2=<?=$row['Idenvoi']?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                        </tr>
                                    </table>
                                <?php
                            }
                        } else {
                          echo "<h4><strong>Il n'y a aucune reception enregistrée !</strong></h4>";
                        }
                    }
                    afficher($conn);

                    if (isset($_POST['btn_ajouter'])) {
                        $idrecept_ajo = $_POST["idrecept_ajo"];
                        $idenvoi = $_POST["idenvoi"];
                        $daterecept_ajo = $_POST["daterecept_ajo"];
                        $timerecept_ajo = $_POST["timerecept_ajo"];
                        if (strlen($idenvoi) > 10) {
                            echo "<strong><h4>L'Id de la voiture ne doit pas depasser de 10 caracteres !</h4></strong>";
                        
                        } else {
                            $temp = $daterecept_ajo . ' ' . $timerecept_ajo . ':00';
                            $sql = "INSERT INTO Recevoir Values('$idrecept_ajo','$idenvoi','$temp')";
                            $result = $conn -> query($sql);
                            if ($result) {
                                ?>
                                <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:20%; text-align:center;"><?=$idrecept_ajo?></td>
                                            <td style="width:20%; text-align:center;"><?=$idenvoi?></td>
                                            <td style="width:30%; text-align:center;"><?=$temp?></td>
                                            <td style="width:15%; text-align:center;"><a href="modifier_recept.php?id1=<?=$idrecept_ajo?> & id2=<?=$idenvoi?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                            <td style="width:15%; text-align:center;"><a href="supprimer_recept.php?id1=<?=$idrecept_ajo?> & id2=<?=$idenvoi?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                        </tr>
                                    </table>
                                <?php
                            } else {
                                echo '<h3><strong>Echec de l\'ajout ! Vous avez peut-être ecrit une code déjà existé !<strong><h3>';
                            }
                        }
                    }
                    $conn -> close();
                ?>
            </div>
        </div>    
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>