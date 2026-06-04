<?php
    include_once "connection.php";

    $Codeit = $_GET['Codeit'];
    $req = "DELETE FROM itineraire WHERE Codeit = '$Codeit'";
    $res = $conn -> query($req);

    header("Location:itineraire.php");

?>