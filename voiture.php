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
                        <a class="nav-link active" href="voiture.php">Voiture</a>
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
                                    <input type="text" class="form-control" placeholder="Id de la voiture" name="idvoit_ajo">
                                    <label for="code-it">Id de la voiture</label>
                                </div>  
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" placeholder="Design de la voiture" name="design_ajo">
                                    <label for="Villed">Design de la voiture</label>
                                </div>  
                                <div class="form-floating mt-3 mb-3">
                                    <input type="text" class="form-control" placeholder="Code de l'itineraire" name="codeit_ajo_voit">
                                    <label for="Villea">Code de l'itineraire</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="number" class="form-control" placeholder="Frais" name="frais_ajo">
                                    <label for="Villea">Frais</label>
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
                        $sql = "SELECT * FROM Voiture ORDER BY Idvoit ASC";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows > 0) {
                            ?>
                                <table class="table .table-hover table-primary">
                                    <tr>
                                        <th style="width:16.6%; text-align:center;">Id de la voiture</th>
                                        <th style="width:16.6%; text-align:center;">Design</th>
                                        <th style="width:16.6%; text-align:center;">Sa code itineraire</th>
                                        <th style="width:16.6%; text-align:center;">Frais</th>
                                        <th style="width:16.6%; text-align:center;">Editer</th>
                                        <th style="width:16.6%; text-align:center;">Supprimer</th>
                                    </tr>
                                </table>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <table class="table .table-hover">  
                                        <tr class="hover_tr">
                                            <td style="width:16.6%; text-align:center;"><?=$row["Idvoit"]?></td>
                                            <td style="width:16.6%; text-align:center;"><?=$row["Design"]?></td>
                                            <td style="width:16.6%; text-align:center;"><?=$row["Codeit"]?></td>
                                            <td style="width:16.6%; text-align:center;"><?=$row["Frais"]?></td>
                                            <td style="width:16.6%; text-align:center;"><a href="modifier_voit.php?id=<?=$row['Idvoit']?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                            <td style="width:16.6%; text-align:center;"><a href="supprimer_voit.php?id=<?=$row['Idvoit']?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                        </tr>
                                    </table>
                                <?php
                            }
                        } else {
                          echo "Il n'y a aucune Voiture enregistrée !";
                        }
                    }
                    afficher($conn);
                    if (isset($_POST['btn_ajouter'])) {
                        $idvoit_ajo = $_POST["idvoit_ajo"];
                        $design_ajo = $_POST["design_ajo"];
                        $codeit_ajo_voit = $_POST["codeit_ajo_voit"];
                        $frais_ajo = $_POST["frais_ajo"];
                        if (strlen($idvoit_ajo) > 10) {
                            echo "<strong><h4>L'Id de la voiture ne doit pas depasser de 10 caracteres !</h4></strong>";
                        
                        } else {
                            $sql = "INSERT INTO Voiture Values('$idvoit_ajo','$design_ajo','$codeit_ajo_voit','$frais_ajo')";
                            $result = $conn -> query($sql);
                            if ($result) {
                                ?>
                                <table class="table .table-hover">  
                                    <tr class="hover_tr">
                                        <td style="width:16.6%; text-align:center;"><?=$idvoit_ajo?></td>
                                        <td style="width:16.6%; text-align:center;"><?=$design_ajo?></td>
                                        <td style="width:16.6%; text-align:center;"><?=$codeit_ajo_voit?></td>
                                        <td style="width:16.6%; text-align:center;"><?=$frais_ajo?></td>
                                        <td style="width:16.6%; text-align:center;"><a href="modifier_voit.php?id=<?=$idvoit_ajo?>"><img class="img_edit" src="assets/img/Edit.png"/></a></td>
                                        <td style="width:16.6%; text-align:center;"><a href="supprimer_voit.php?id=<?=$idvoit_ajo?>"><img class="img_sup" src="assets/img/drop.png"/></a></td>
                                    </tr>
                                </table>
                                <?php
                            } else {
                                echo "<script>alert('Echec de l\'ajout !');</script>";
                            }
                        }
                    }
                    $conn -> close();
                ?>
                </div>
            </div>
        </div>    
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>