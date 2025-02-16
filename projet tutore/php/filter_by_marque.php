<?php
    include("../config/config.php");
    $marque = $_GET["marque"];
    
    $query = mysqli_query($conn, "SELECT p.libelle, p.prix, p.description, MIN(i.imageUrl) AS imageUrl
                                  FROM produit AS p
                                  JOIN imageproduit AS i ON p.idProduit = i.idProd
                                  AND p.marque = '" . $marque . "'
                                  GROUP BY p.idProduit");



    $resultats = mysqli_fetch_all($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);