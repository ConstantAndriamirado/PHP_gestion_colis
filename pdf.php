<?php
    include_once 'connection.php';
    $Idrecept = $_GET['id1'];
    $Idenvoi = $_GET['id2'];

    $req_DE = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_NE = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_NV = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_VD = "SELECT * FROM Itineraire,Voiture,Envoyer WHERE (Itineraire.Codeit=Voiture.Codeit) AND (Voiture.Idvoit=Envoyer.Idvoit) AND Idenvoi = '$Idenvoi'";
    $req_VA = "SELECT * FROM Itineraire,Voiture,Envoyer WHERE (Itineraire.Codeit=Voiture.Codeit) AND (Voiture.Idvoit=Envoyer.Idvoit) AND Idenvoi = '$Idenvoi'";
    $req_CO = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_FR = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_NR = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_CR = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";

    $date_envoi = mysqli_fetch_assoc($conn -> query($req_DE));
    $nom_envoyeur = mysqli_fetch_assoc($conn -> query($req_NE));
    $idvoit = mysqli_fetch_assoc($conn -> query($req_NV));
    $villedep = mysqli_fetch_assoc($conn -> query($req_VD));
    $villearr = mysqli_fetch_assoc($conn -> query($req_VA));
    $colis = mysqli_fetch_assoc($conn -> query($req_CO));
    $frais = mysqli_fetch_assoc($conn -> query($req_FR));
    $nom_recepteur = mysqli_fetch_assoc($conn -> query($req_NR));
    $contact_recepteur = mysqli_fetch_assoc($conn -> query($req_CR));

    $html = '<h2>Reçu N°' . $Idrecept . '</h2><br/>';
    $html .= 'Date d\'envoi : ' . $date_envoi['Date_envoi'] . '<br/>';
    $html .= 'Nom de l\'envoyeur : ' . $nom_envoyeur['Nom_envoyeur'] . '<br/>';
    $html .= 'Voiture N°' . $idvoit['Idvoit'] . ' / Destination : ' . $villedep['Villedep'] . ' - ' . $villearr['Villearr'] . '<br/>';
    $html .= 'Colis : ' . $colis['Colis'] . '<br/>';
    $html .= 'Frais : ' . $frais['Frais'] . 'Ar<br/>';
    $html .= 'Nom du recepteur : ' . $nom_recepteur['Nom_recepteur'] . '<br/>';
    $html .= 'Contact du recepteur : ' . $contact_recepteur['Contact_recepteur'] . '<br/>';
    $html = '<div style="margin: 30px auto auto 40px; font-size: 18px; border-bottom: 2px dashed black; padding-bottom: 30px;">' . $html . '</div>';

    use Dompdf\Dompdf;
    use Dompdf\Options;

    require_once "dompdf/autoload.inc.php";
    $option = new Options();
    $option->set('defaultFont', 'Courier');

    $pdf = new Dompdf($option);
    $pdf->loadHtml($html);
    $pdf->setPaper('legal', 'portrait');

    $pdf->render();
    $pdf->stream();

?>