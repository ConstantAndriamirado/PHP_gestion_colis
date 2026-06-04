<?php
    include_once "connection.php";

    $idrecept = $_GET['id1'];
    $idenvoi = $_GET['id2'];
    $req = "DELETE FROM Recevoir WHERE Idrecept = '$idrecept' AND Idenvoi = '$idenvoi'";
    $res = $conn -> query($req);

    header("Location:reception.php");

?>