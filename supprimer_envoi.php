<?php
    include_once "connection.php";

    $idenvoi = $_GET['id1'];
    $idvoit = $_GET['id2'];
    $req = "DELETE FROM Envoyer WHERE Idenvoi = '$idenvoi' AND Idvoit = '$idvoit'";
    $res = $conn -> query($req);

    header("Location:envoi.php");

?>