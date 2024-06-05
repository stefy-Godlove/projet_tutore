<?php
    include("../config/config.php");
    $color = $_GET["color"];
    
    $query = mysqli_query($conn, "SELECT produit.libelle, produit.prix,produit.description, imageproduit.imageUrl FROM produit, imageproduit WHERE idProduit = idProd AND color = '" . $color . "'");

    $resultats = mysqli_fetch_all($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);
?>