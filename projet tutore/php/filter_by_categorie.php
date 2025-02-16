<?php
    include("../config/config.php");
    $categorieId = $_GET["categorieId"];
    
    $query = mysqli_query($conn, "SELECT p.libelle, p.prix, p.description, MIN(i.imageUrl) AS imageUrl
                                  FROM produit AS p
                                  JOIN imageproduit AS i ON p.idProduit = i.idProd
                                  JOIN categories AS c ON p.categorieId = c.idCath
                                  AND c.idCath = " . $categorieId . "
                                  GROUP BY p.idProduit");



    $resultats = mysqli_fetch_all($query);
    header('Content-Type: application/json');
    echo json_encode($resultats);