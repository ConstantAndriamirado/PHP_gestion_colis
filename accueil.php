<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>   
    <title>Gestion des colis</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
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
                        <a class="nav-link" href="recette.php">Recette</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <video autoplay loop muted id="video">
                    <source src="assets/video/video.mp4" type="video/mp4">
                </video>
            </div>
            <div class="col-sm-4 image">
                <img class="img_anime" src="assets/img/img1.jpg"/>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-4">
                <h2>NOTRE MISSION</h2>
                <h5>La ponctualité</h5>
                <div class="fakeimg"><img src="assets/img/ponctuel.jpg" /></div>
                <p>E-Colis vous garantie la ponctualité !</p>
                <h3 class="mt-4">Nos liens</h3>
                <p>Application pour faciliter le transport des colis !</p>
                <br><br><br><br>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="accueil.php">Accueil</a>
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
                        <a class="nav-link" href="recette.php">Recette</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-4">
                <h2>CONFIANCE</h2>
                <h5>Coopérative, 09 Avril 2023</h5>
                <div><img alt="Image" class="fakeimage" src="assets/img/confiance.jpg"/></div>
                <p>Ma confiance</p>
                <p>La coopérative 'E-Colis' est une coopérative fiable. Le coût de transport de colis est abordable. Pour eviter les problème à la reception, les envoyeurs de chaque colis doivent payer le frais avant que le colis soit transferé :) !</p>

                <h2 class="mt-5">TRANSPORT</h2>
                <h5>En securité, 09 Avril 2023</h5>
                <div><img alt="image transport" class="fakeimage" src="assets/img/route.jpg"/></div>
                <p>La securité</p>
                <p>Etant donné que E-colis a dejà coopéré avec le "VTS" (Voir Tout avec Satellite) qui est une association française qui gère la securité terrestre en utilisant le satellite, les clients ne doivent pas avoir la soucis !</p>
            </div>
            <div class="col-sm-4" id="partie_3">
                <button type="button" class="btn btn-outline-info py-50" id="toastbtn">A propos de l'application</button>
                <div class="toast">
                    <div class="toast-header">
                        <span class="spinner-grow spinner-grow-sm"></span>
                        GESTION DES COLIS D'UNE COOPERATIVE
                        <span class="spinner-grow spinner-grow-sm"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                    </div>
                    <div class="toast-body">
                        Cette application est créée le Avril 2023 par l'equipe 'Chat noir' en faisant son propre projet. <br/><br/><br/>
                        © 2023 Google LLC. Tous droits réservés. <br/>
                        Elle fonctionne grâce au projet Open Source Chromium et à d'autres logiciels libres. <br/> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>