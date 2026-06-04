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
                        <a class="nav-link active" href="itineraire.php">Itineraire</a>
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
                                  <input type="text" class="form-control" id="Code_it" placeholder="Entrer le code de l'itineraire" name="Code_it_ajo">
                                  <label for="code-it">Code de l'Itineraire</label>
                              </div>

                              <div class="form-floating mt-3 mb-3">
                                  <input type="text" class="form-control" id="Ville_dep" placeholder="Ville de depart" name="Ville_dep">
                                  <label for="Villed">Nom de la ville de depart</label>
                              </div>

                              <div class="form-floating mt-3 mb-3">
                                  <input type="text" class="form-control" id="Ville_arr" placeholder="Ville de depart" name="Ville_arr">
                                  <label for="Villea">Nom de la ville d'arrivée</label>
                              </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="itineraire.php"><button type="submit" class="btn btn-primary" id="btn_ajouter" name="btn_ajouter" data-bs-dismiss="modal">Ajouter</button></a>
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
                        $sql = "SELECT * FROM Itineraire ORDER BY Codeit ASC";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            ?>
                                <table class="table .table-hover table-primary">
                                    <tr>
                                        <th style="width:20%; text-align:center;">Code itineraire</th>
                                        <th style="width:20%; text-align:center;">Ville de depart</th>
                                        <th style="width:20%; text-align:center;">Ville d'arrivé</th>
                                        <th style="width:20%; text-align:center;">Editer</th>
                                        <th style="width:20%; text-align:center;">Supprimer</th>
                                    </tr>
                                </table>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:20%; text-align:center;"><?=$row["Codeit"]?></td>
                                            <td style="width:20%; text-align:center;"><?=$row["Villedep"]?></td>
                                            <td style="width:20%; text-align:center;"><?=$row["Villearr"]?></td>
                                            <td style="width:20%; text-align:center;"><a href="modifier_it.php?id=<?=$row['Codeit']?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                            <td style="width:20%; text-align:center;"><a href="supprimer_it.php?Codeit=<?=$row['Codeit']?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                        </tr>
                                    </table>
                                <?php
                            }
                        } else {
                          echo "Il n'y a aucune Itineraire !";
                        }
                    }
                    afficher($conn);
                    if (isset($_POST['btn_ajouter'])) {
                        $code_it_ajo = $_POST["Code_it_ajo"];
                        $ville_dep_ajo = $_POST["Ville_dep"];
                        $ville_arr_ajo = $_POST["Ville_arr"];
                        if (strlen($code_it_ajo) > 10) {
                            echo "<strong><h4>Le code itineraire ne doit pas depasser de 10 caracteres !</h4></strong>";
                        
                        } else {
                            $sql = "INSERT INTO Itineraire Values('$code_it_ajo','$ville_dep_ajo','$ville_arr_ajo')";
                            $result = $conn -> query($sql);
                            if ($result) {
                                ?>
                                <table class="table .table-hover">  
                                    <tr class="hover_tr">
                                        <td style="width:20%; text-align:center;"><?=$code_it_ajo?></td>
                                        <td style="width:20%; text-align:center;"><?=$ville_dep_ajo?></td>
                                        <td style="width:20%; text-align:center;"><?=$ville_arr_ajo?></td>
                                        <td style="width:20%; text-align:center;"><a href="modifier_it.php?id=<?=$code_it_ajo?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                        <td style="width:20%; text-align:center;"><a href="supprimer_it.php?Codeit=<?=$code_it_ajo?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                    </tr>
                                </table>
                                <?php
                            } else {
                                echo "<script>alert('Echec de l\'ajout !');</script>";
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </div>     
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>