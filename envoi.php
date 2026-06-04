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
                        <a class="nav-link active" href="envoi.php">Envoi</a>
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
                        <a class="nav-link" href="recette.php">Recette</a>
                    </li>
                </ul>
            </div>

                    <!--------Modale 1 ------------>
            <div class="modal" id="myModal_1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form method="POST">
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h3 class="modal-title">Veuillez saisir les valeurs à ajouter</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>  
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="number" class="form-control" required placeholder="Id de l'envoi" name="idenvoi_ajo">
                                            <label>Id de l'envoi</label>
                                        </div>
                                    </div>
                                    <div class="col">  
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" required placeholder="Id de la voiture" name="idvoit_ajo">
                                            <label>Id de la voiture</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                        <input type="text" class="form-control" required placeholder="Nom de la colis" name="colis_ajo">
                                        <label>Nom de la colis</label>
                                    </div>
                                    </div>
                                    <div class="col">  
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" required placeholder="Nom de l'envoyeur" name="nom_envoyeur_ajo">
                                            <label>Nom de l'envoyeur</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="email" class="form-control" required placeholder="Email de l'envoyeur" name="email_envoyeur_ajo">
                                            <label>Email de l'envoyeur</label>
                                        </div>
                                    </div>
                                    <div class="col">  
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="date" class="form-control" required placeholder="Date d'envoi" name="date_envoi_ajo">
                                            <label>Date d'envoi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="time" class="form-control" required placeholder="Heure de la reception" name="time_envoi_ajo">
                                            <label>Heure de la reception</label>
                                        </div>
                                    </div>
                                    <div class="col">  
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="number" class="form-control" required placeholder="Frais" name="frais_envoi_ajo">
                                            <label>Frais</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" required placeholder="Nom du recepteur" name="nom_recepteur_ajo">
                                            <label>Nom du recepteur</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mt-3 mb-3">
                                            <input type="text" class="form-control" required placeholder="Contact du recepteur" name="contact_recepteur_ajo">
                                            <label>Contact du recepteur</label>
                                        </div>
                                    </div>
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
                        $sql = "SELECT * FROM Envoyer ORDER BY Idenvoi ASC";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            ?>
                                <table class="table .table-hover table-primary">
                                    <tr>
                                        <th style="width:5%; font-size:14px; text-align:center;">Id envoi</th>
                                        <th style="width:8%; font-size:14px; text-align:center;">Id voiture</th>
                                        <th style="width:10%; font-size:14px; text-align:center;">Colis</th>
                                        <th style="width:13%; font-size:14px; text-align:center;">Nom envoyeur</th>
                                        <th style="width:13%; font-size:14px; text-align:center;">Email envoyeur</th>
                                        <th style="width:10%; font-size:14px; text-align:center;">Date d'envoi</th>
                                        <th style="width:8%; font-size:14px; text-align:center;">Frais</th>
                                        <th style="width:12%; font-size:14px; text-align:center;">Nom recepteur</th>
                                        <th style="width:11%; font-size:14px; text-align:center;">Contact recepteur</th>
                                        <th style="width:5%; font-size:14px; text-align:center;">Editer</th>
                                        <th style="width:5%; font-size:14px; text-align:center;">Supprimer</th>
                                    </tr>
                                </table>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:5%; font-size:14px; text-align:center;"><?=$row["Idenvoi"]?></td>
                                            <td style="width:8%; font-size:14px; text-align:center;"><?=$row["Idvoit"]?></td>
                                            <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Colis"]?></td>
                                            <td style="width:13%; font-size:14px; text-align:center;"><?=$row["Nom_envoyeur"]?></td>
                                            <td style="width:13%; font-size:14px; text-align:center;"><?=$row["Email_envoyeur"]?></td>
                                            <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Date_envoi"]?></td>
                                            <td style="width:8%; font-size:14px; text-align:center;"><?=$row["Frais"]?> Ar</td>
                                            <td style="width:12%; font-size:14px; text-align:center;"><?=$row["Nom_recepteur"]?></td>
                                            <td style="width:11%; font-size:14px; text-align:center;"><?=$row["Contact_recepteur"]?></td>
                                            <td style="width:5%; font-size:14px; text-align:center;"><a href="modifier_envoi.php?id1=<?=$row['Idenvoi']?> & id2=<?=$row['Idvoit']?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                            <td style="width:5%; font-size:14px; text-align:center;"><a href="supprimer_envoi.php?id1=<?=$row['Idenvoi']?> & id2=<?=$row['Idvoit']?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                        </tr>
                                    </table>
                                <?php
                            }
                        } else {
                          echo "Il n'y a aucune envoie enregistrée !";
                        }
                    }
                    afficher($conn);

                    if (isset($_POST['btn_ajouter'])) {
                        $idenvoi_ajo = $_POST["idenvoi_ajo"];
                        $idvoit_ajo = $_POST["idvoit_ajo"];
                        $colis_ajo = $_POST["colis_ajo"];
                        $nom_envoyeur_ajo = $_POST["nom_envoyeur_ajo"];
                        $email_envoyeur_ajo = $_POST["email_envoyeur_ajo"];
                        $date_envoi_ajo = $_POST["date_envoi_ajo"];
                        $time_envoi_ajo = $_POST["time_envoi_ajo"];
                        $frais_envoi_ajo = $_POST["frais_envoi_ajo"];
                        $nom_recepteur_ajo = $_POST["nom_recepteur_ajo"];
                        $contact_recepteur_ajo = $_POST["contact_recepteur_ajo"];


                        if (strlen($idvoit_ajo) > 10) {
                            $mes = "<strong><h3>L'Id de la voiture ne doit pas depasser de 10 caracteres !</h3></strong>";
                        
                        } else {
                            $date_comp = $date_envoi_ajo . ' ' . $time_envoi_ajo . ':00';
                            $sql = "INSERT INTO Envoyer Values('$idenvoi_ajo','$idvoit_ajo','$colis_ajo','$nom_envoyeur_ajo','$email_envoyeur_ajo','$date_comp','$frais_envoi_ajo','$nom_recepteur_ajo','$contact_recepteur_ajo')";
                            $result = $conn -> query($sql);
                            if ($result) {
                                ?>
                                <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:5%; font-size:14px; text-align:center;"><?=$idenvoi_ajo?></td>
                                            <td style="width:8%; font-size:14px; text-align:center;"><?=$idvoit_ajo?></td>
                                            <td style="width:10%; font-size:14px; text-align:center;"><?=$colis_ajo?></td>
                                            <td style="width:13%; font-size:14px; text-align:center;"><?=$nom_envoyeur_ajo?></td>
                                            <td style="width:13%; font-size:14px; text-align:center;"><?=$email_envoyeur_ajo?></td>
                                            <td style="width:10%; font-size:14px; text-align:center;"><?=$date_comp?></td>
                                            <td style="width:8%; font-size:14px; text-align:center;"><?=$frais_envoi_ajo?></td>
                                            <td style="width:12%; font-size:14px; text-align:center;"><?=$nom_recepteur_ajo?></td>
                                            <td style="width:11%; font-size:14px; text-align:center;"><?=$contact_recepteur_ajo?></td>
                                            <td style="width:5%; font-size:14px; text-align:center;"><a href="modifier_envoi.php?id1=<?=$idenvoi_ajo?> & id2=<?=$idvoit_ajo?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                            <td style="width:5%; font-size:14px; text-align:center;"><a href="supprimer_envoi.php?id1=<?=$idenvoi_ajo?> & id2=<?=$idvoit_ajo?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                        </tr>
                                    </table>
                                <?php
                                $mes = "<h3><strong>Ajout réussi !<strong><h3>";
                            } else {
                                $mes = "<h3><strong>Echec de l\'ajout !<strong><h3>";
                            }
                        }
                        echo '<script>alert($mes)</script>';
                    }
                    $conn -> close();
                ?>
            </div>
        </div>    
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>