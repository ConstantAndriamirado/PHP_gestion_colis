<?php
    include_once 'connection.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PhpMailer/src/Exception.php';
    require 'PhpMailer/src/PHPMailer.php';
    require 'PhpMailer/src/SMTP.php';

    $Idrecept = $_GET['id1'];
    $Idenvoi = $_GET['id2'];

    $req_envoyer = "SELECT * FROM Envoyer WHERE Idenvoi = '$Idenvoi'";
    $req_recevoir = "SELECT * FROM Recevoir WHERE Idenvoi = '$Idenvoi' AND Idrecept = '$Idrecept'";
    $req_itineraire = "SELECT * FROM Itineraire,Voiture,Envoyer WHERE (Itineraire.Codeit=Voiture.Codeit) AND (Voiture.Idvoit=Envoyer.Idvoit) AND Idenvoi = '$Idenvoi'";

    $res_envoyer = mysqli_fetch_assoc($conn -> query($req_envoyer));
    $res_recevoir = mysqli_fetch_assoc($conn -> query($req_recevoir));
    $res_itineraire = mysqli_fetch_assoc($conn -> query($req_itineraire));

    $email = $res_envoyer['Email_envoyeur'];

    $message = '<h3>Reçu N°' . $Idrecept . '</h3><br/>';

    $message .= '
                    Le colis : '. $res_envoyer['Colis'] . ' que vous avez envoyé le ' . $res_envoyer['Date_envoi'] . ' a été bien 
                    reçu par ' . $res_envoyer['Nom_recepteur'] . ' le '. $res_recevoir['Date_recept'] . ' !<br/><br/>
                ';

    $message .= '
                    Colis porté par la voiture N°' . $res_envoyer['Idvoit'] . ' de ' . $res_itineraire['Villedep'] . ' vers ' . $res_itineraire['Villearr'] . '<br/><br/>
                ';

    $message .= '
                    Merci beaucoup ' . $res_envoyer['Nom_envoyeur'] . ' pour votre confiance à "E-Colis". 
                    Nous faisons toute la possibilité de vous faire satisfaire au sujet de la confidialité et de la securité !<br/><br/>
                ';


    $mail = new PHPMailer();
    $mail->isMail();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ecolismadagascar@gmail.com';
    $mail->Password = 'ecolismdpasse.com';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('ecolismadagascar@gmail.com');

    $mail->isHTML(true);

    $mail->addAddress($email);

    $mail->Subject = 'Colis recu // E-COLIS';
    $mail->Body = $message;

    $mail->send();
    echo "
        <script>
            alert('Email bien envoyé !');
            document.location.href = 'recu.php';
        </script>";
?>