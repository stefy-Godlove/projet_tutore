<?php
include ("../config/config.php");
// if (!isset($_GET["idCath"])) {
//     header("body.php");
// }
$idCath = $_GET["idCath"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/presentation.css">
    <title>Document</title>
</head>

<body>
    <?php include ("header.php"); ?>
    <section>
        <div class="filter-elt">
            <div class="elt-filt from-categorie-filter">
                <div class="elt-filt-title">
                    Categorie <a href="presentation.php?idCath=0"
                        style="font-size: small; text-decoration: underline;color: blue;">( All )</a>
                </div>
                <ul>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM categories");
                    $count = 0;
                    $numberMax = 3;
                    while ($row = mysqli_fetch_assoc($query)) {
                        if ($count < $numberMax) {
                            ?>
                            <li><input type="radio" name="filterCategorie"
                                    id="<?php echo $row['idCath']; ?>"> <?php echo $row["nomCategories"]; ?></li>
                            <?php
                        } else if ($count == $numberMax + 1) {
                            ?>
                                <div class="categories-cachees">
                                    <li><input type="radio" name="filterCategorie"
                                            id="<?php echo $row['idCath']; ?>"><?php echo $row["nomCategories"]; ?></li>
                            <?php } else { ?>

                                    <li><input type="radio" name="filterCategorie"
                                            id="<?php echo $row['idCath']; ?>"><?php echo $row["nomCategories"]; ?></li>
                                <?php
                        }
                        $count++;
                    }
                    if ($count > $numberMax) {
                        echo "</div><li class=\"voir-plus\"><i class=\"fa-solid fa-chevron-down voirplus-mark\"></i><a href=\"#\" style = 'color: blue; '>Voir plus</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="elt-filt from-color-filter">
                <div class="elt-filt-title">
                    Couleur:
                    <!-- <a href="presentation.php?idCath=0" style="font-size: small; text-decoration: underline;color: blue;">( All )</a> -->
                </div>
                <ul>
                    <li><i class="fas fa-square" style="color: red;"></i></li>
                    <li><i class="fas fa-square" style="color: yellow;"></i></li>
                    <li><i class="fas fa-square" style="color: blue;"></i></li>
                    <li><i class="fas fa-square" style="color: green;"></i></li>
                    <li><i class="fas fa-square" style="color: gray;"></i></li>
                    <li><i class="fas fa-square" style="color: pink;"></i></li>
                    <li><i class="fas fa-square" style="color: black;"></i></li>
                    <li><i class="fas fa-square" style="color: orange;"></i></li>
                    <li><i class="fas fa-square" style="color: brown;"></i></li>
                    <li><i class="fas fa-square" style="color: purple;"></i></li>
                </ul>
            </div>
            <div class="elt-filt from-categorie-filter">
                <div class="elt-filt-title">
                    Marque
                </div>
                <ul>
                    <?php
                    $query = mysqli_query($conn, "SELECT marque FROM produit WHERE marque <> \"\" GROUP BY marque");
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($query)) {
                        if ($count < $numberMax) {
                            ?>
                            <li><input type="checkbox" name="filterCategorie"
                                    id="<?php echo $row['marque']; ?>"> <?php echo $row["marque"]; ?></li>
                            <?php
                        } else if ($count == $numberMax + 1) {
                            ?>
                                <div class="categories-cachees">
                                    <li><input type="radio" name="filterCategorie"
                                            id="<?php echo $row['marque']; ?>"><?php echo $row["marque"]; ?></li>
                            <?php } else { ?>

                                    <li><input type="radio" name="filterCategorie"
                                            id="<?php echo $row['marque']; ?>"><?php echo $row["marque"]; ?></li>
                                <?php
                        }
                        $count++;
                    }
                    if ($count > $numberMax) {
                        echo "</div><li class=\"voir-plus\"><i class=\"fa-solid fa-chevron-down voirplus-mark\"></i><a href=\"#\" style = 'color: blue; '>Voir plus</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="contain-show-product">
            <?php
            $query = mysqli_query($conn, "SELECT categories.nomCategories, produit.idProduit, produit.libelle, produit.prix, produit.description FROM produit INNER JOIN categories ON produit.categorieId = categories.idCath AND categories.idCath = " . $idCath);
            if ($idCath == 0) {
                $query = mysqli_query($conn, "SELECT categories.nomCategories, produit.idProduit, produit.libelle, produit.prix, produit.description FROM produit INNER JOIN categories ON produit.categorieId = categories.idCath ");
            }
            while ($row = mysqli_fetch_row($query)) {
                $result[] = $row;
                $images = mysqli_query($conn, "SELECT imageUrl, color FROM imageproduit WHERE idProd = " . $row[1]);
                $image = mysqli_fetch_assoc($images);
                ?>
                <div class="card">
                    <div class="card-title">
                        <img src="../<?php echo $image["imageUrl"]; ?>" alt="">

                        <div class="card-diff-color">
                            <?php
                            if (mysqli_num_rows($images) > 1) {
                                ?>

                                <i class="fas fa-circle isSelectedColor"
                                    style="color: <?php echo $image['color']; ?>;border : 1px solid black; border-radius: 50%; height: max-content;"></i>
                                <?php
                                $i = 0;
                                $nombreMax = 2;
                                while ($colorImages = mysqli_fetch_assoc($images)) {
                                    if ($i < $nombreMax) {
                                        ?>
                                        <i class="fas fa-circle"
                                            style="color: <?php echo $colorImages['color']; ?>; border : 1px solid black,; border-radius: 50px;height: max-content;"></i>
                                        <?php
                                    }
                                    $i++;
                                }
                                if ($i - $nombreMax > 0) {
                                    echo "<a href='' style='color: blue;text-decoration: underline;'>+" . ($i - $nombreMax) . "</a>";
                                }
                                ?>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="information">
                        <p>
                            <?php echo $row[2] ?>
                        </p>
                        <div class="description">
                            <?php
                            $suffixe = '...';
                            $texte = $row[4];
                            $longueurMax = 50;
                            if (strlen($texte) > $longueurMax) {
                                $texte = substr($texte, 0, $longueurMax - strlen($suffixe)) . $suffixe;
                            }
                            echo $texte;
                            ?>
                        </div>
                        <span>
                            <?php echo $row[3] ?> xaf
                        </span>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <br>
    </section>
    <?php include ("loaded.php") ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/presentation.js"></script>
</body>

</html>