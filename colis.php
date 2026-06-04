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
                        <a class="nav-link active" href="colis.php">Colis</a>
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
                          <h4 class="modal-title">RECHERCHE D'UN COLIS PAR SON CODE D'ENVOIE</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="number" class="form-control" placeholder="Entrer le code d'envoi" name="code_envoi_rech" required/>
                        </div>


                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary btn-block m-20" name="btn_rech_code" value="Chercher"/>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

                <!--------Modale 2 ------------>

            <div class="modal" id="myModal_2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST">
                                <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">RECHERCHE D'UN COLIS PAR SA DESIGNATION</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="text" class="form-control" placeholder="Entrer la designation de colis" name="design_rech"/>
                        </div>


                        <!-- Modal footer -->
                        <div class="modal-footer">
                                <input type="submit" class="btn btn-primary btn-block m-20" name="btn_rech_design" value="Chercher"/>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

                <!--------Modale 3 ------------>

            <div class="modal" id="myModal_3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST">
                                <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">RECHERCHE D'UN COLIS PAR DATE</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label>La 1ère date</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="datetime-local" class="form-control" placeholder="Entrer la 1ere date" name="date_rech1"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label>La 2ème date</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="datetime-local" class="form-control" placeholder="Entrer la 2eme date" name="date_rech2"/>
                                </div>
                            </div>
                        </div>


                        <!-- Modal footer -->
                        <div class="modal-footer">
                                <input type="submit" class="btn btn-primary btn-block m-20" name="btn_rech_date" value="Chercher"/>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-sm-6">
                    <h2>RECHERCHER UN COLIS PAR : </h2>
                </div>
                <div class="col-sm-2">
                    <input type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#myModal_1" name="btn_rech_code" value="Son code d'envoie"/>
                </div>
                <div class="col-sm-2">
                    <input type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#myModal_2" name="btn_modifier" value="Sa designation"/>
                </div>
                <div class="col-sm-2">
                    <input type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#myModal_3" name="btn_modifier" value="Sa date"/>
                </div>
            </div>
            <div class="affichage_colis">
                <?php
                    include 'connection.php';
                    if (isset($_POST['btn_rech_code'])) {
                        $code = $_POST['code_envoi_rech'];
                        $req = "SELECT * FROM Envoyer WHERE Idenvoi like '%$code%'";
                        $resultat = $conn -> query($req);
                        echo '<h5 style="text-align:center;"><strong>Nombre du resultat obtenu : ' . $resultat->num_rows . '</strong></h5>';
                        if ($resultat -> num_rows >= 1) {
                            ?>
                            <table class="table .table-hover table-primary">
                                <tr>
                                    <th style="width:5%; font-size:14px; text-align:center;">Id envoi</th>
                                    <th style="width:10%; font-size:14px; text-align:center;">Id voiture</th>
                                    <th style="width:12%; font-size:14px; text-align:center;">Colis</th>
                                    <th style="width:15%; font-size:14px; text-align:center;">Nom envoyeur</th>
                                    <th style="width:15%; font-size:14px; text-align:center;">Email envoyeur</th>
                                    <th style="width:10%; font-size:14px; text-align:center;">Date d'envoi</th>
                                    <th style="width:8%; font-size:14px; text-align:center;">Frais</th>
                                    <th style="width:14%; font-size:14px; text-align:center;">Nom recepteur</th>
                                    <th style="width:11%; font-size:14px; text-align:center;">Contact recepteur</th>
                                </tr>
                            </table>
                                <?php
                            while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                <table class="table .table-hover">  
                                    <tr class="hover_tr">
                                        <td style="width:5%; font-size:14px; text-align:center;"><?=$row["Idenvoi"]?></td>
                                        <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Idvoit"]?></td>
                                        <td style="width:12%; font-size:14px; text-align:center;"><?=$row["Colis"]?></td>
                                        <td style="width:15%; font-size:14px; text-align:center;"><?=$row["Nom_envoyeur"]?></td>
                                        <td style="width:15%; font-size:14px; text-align:center;"><?=$row["Email_envoyeur"]?></td>
                                        <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Date_envoi"]?></td>
                                        <td style="width:8%; font-size:14px; text-align:center;"><?=$row["Frais"]?> Ar</td>
                                        <td style="width:14%; font-size:14px; text-align:center;"><?=$row["Nom_recepteur"]?></td>
                                        <td style="width:11%; font-size:14px; text-align:center;"><?=$row["Contact_recepteur"]?></td>
                                    </tr>
                                </table>
                                <?php
                            }
                        }
                    }
                    
                    if (isset($_POST['btn_rech_design'])) {
                        $code = $_POST['design_rech'];
                        $req = "SELECT * FROM Envoyer WHERE Colis LIKE '%$code%'";
                        $resultat = $conn -> query($req);
                        echo '<h5 style="text-align:center;"><strong>Nombre du resultat obtenu : ' . $resultat->num_rows . '</strong></h5>';
                        if ($resultat -> num_rows >= 1) {
                            ?>
                            <table class="table .table-hover table-primary">
                                <tr>
                                    <th style="width:5%; font-size:14px; text-align:center;">Id envoi</th>
                                    <th style="width:10%; font-size:14px; text-align:center;">Id voiture</th>
                                    <th style="width:12%; font-size:14px; text-align:center;">Colis</th>
                                    <th style="width:15%; font-size:14px; text-align:center;">Nom envoyeur</th>
                                    <th style="width:15%; font-size:14px; text-align:center;">Email envoyeur</th>
                                    <th style="width:10%; font-size:14px; text-align:center;">Date d'envoi</th>
                                    <th style="width:8%; font-size:14px; text-align:center;">Frais</th>
                                    <th style="width:14%; font-size:14px; text-align:center;">Nom recepteur</th>
                                    <th style="width:11%; font-size:14px; text-align:center;">Contact recepteur</th>
                                </tr>
                            </table>
                                <?php
                            while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                <table class="table .table-hover">  
                                    <tr class="hover_tr">
                                        <td style="width:5%; font-size:14px; text-align:center;"><?=$row["Idenvoi"]?></td>
                                        <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Idvoit"]?></td>
                                        <td style="width:12%; font-size:14px; text-align:center;"><?=$row["Colis"]?></td>
                                        <td style="width:15%; font-size:14px; text-align:center;"><?=$row["Nom_envoyeur"]?></td>
                                        <td style="width:15%; font-size:14px; text-align:center;"><?=$row["Email_envoyeur"]?></td>
                                        <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Date_envoi"]?></td>
                                        <td style="width:8%; font-size:14px; text-align:center;"><?=$row["Frais"]?> Ar</td>
                                        <td style="width:14%; font-size:14px; text-align:center;"><?=$row["Nom_recepteur"]?></td>
                                        <td style="width:11%; font-size:14px; text-align:center;"><?=$row["Contact_recepteur"]?></td>
                                    </tr>
                                </table>
                                <?php
                            }
                        }
                    }

                    if (isset($_POST['btn_rech_date'])) {
                        $date1 = $_POST['date_rech1'];
                        $date2 = $_POST['date_rech2'];
                        $req = "SELECT * FROM Envoyer WHERE Date_envoi BETWEEN '$date1' and '$date2'";
                        $resultat = $conn -> query($req);
                        echo '<h5 style="text-align:center;"><strong>Nombre du resultat obtenu : ' . $resultat->num_rows . '</strong></h5>';
                        if ($resultat -> num_rows >= 1) {
                            ?>
                            <table class="table .table-hover table-primary">
                                <tr>
                                    <th style="width:5%; font-size:14px; text-align:center;">Id envoi</th>
                                    <th style="width:10%; font-size:14px; text-align:center;">Id voiture</th>
                                    <th style="width:12%; font-size:14px; text-align:center;">Colis</th>
                                    <th style="width:15%; font-size:14px; text-align:center;">Nom envoyeur</th>
                                    <th style="width:15%; font-size:14px; text-align:center;">Email envoyeur</th>
                                    <th style="width:10%; font-size:14px; text-align:center;">Date d'envoi</th>
                                    <th style="width:8%; font-size:14px; text-align:center;">Frais</th>
                                    <th style="width:14%; font-size:14px; text-align:center;">Nom recepteur</th>
                                    <th style="width:11%; font-size:14px; text-align:center;">Contact recepteur</th>
                                </tr>
                            </table>
                                <?php
                            while ($row = mysqli_fetch_assoc($resultat)) {
                                ?>
                                <table class="table .table-hover">  
                                    <tr class="hover_tr">
                                        <td style="width:5%; font-size:14px; text-align:center;"><?=$row["Idenvoi"]?></td>
                                        <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Idvoit"]?></td>
                                        <td style="width:12%; font-size:14px; text-align:center;"><?=$row["Colis"]?></td>
                                        <td style="width:15%; font-size:14px; text-align:center;"><?=$row["Nom_envoyeur"]?></td>
                                        <td style="width:15%; font-size:14px; text-align:center;"><?=$row["Email_envoyeur"]?></td>
                                        <td style="width:10%; font-size:14px; text-align:center;"><?=$row["Date_envoi"]?></td>
                                        <td style="width:8%; font-size:14px; text-align:center;"><?=$row["Frais"]?> Ar</td>
                                        <td style="width:14%; font-size:14px; text-align:center;"><?=$row["Nom_recepteur"]?></td>
                                        <td style="width:11%; font-size:14px; text-align:center;"><?=$row["Contact_recepteur"]?></td>
                                    </tr>
                                </table>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>