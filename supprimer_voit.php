<?php
    include_once "connection.php";

    $idvoit = $_GET['id'];
    $req = "DELETE FROM Voiture WHERE idvoit = '$idvoit'";
    $res = $conn -> query($req);

    header("Location:voiture.php");

?>