<?php
    include("../config/config.php");
    $query = mysqli_query($conn,"SELECT categories.nomCategories, produit.idProduit, produit.libelle, produit.prix, produit.description FROM produit INNER JOIN categories ON produit.categorieId = categories.idCath GROUP BY categories.nomCategories, produit.idProduit, produit.libelle, produit.prix");
    $result = [];
    while ($row = mysqli_fetch_assoc($query)) {
        # code...
        $result[] = $row;
    }
    $json = json_encode($result);
?>