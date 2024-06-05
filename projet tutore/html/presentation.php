<?php
include ("../config/config.php");
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
                    Categorie (<a href="" style="font-size: small; text-decoration: underline;color: blue;">All</a>)
                </div>
                <ul>
                    <li>Sac</li>
                    <li>Vetement</li>
                    <li>Appareil Electro-Menager</li>
                </ul>
            </div>
            <div class="elt-filt from-color-filter">
                <div class="elt-filt-title">
                    Couleur (<a href="" style="font-size: small; text-decoration: underline;color: blue;">All</a>)
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
        </div>
        <div class="contain-show-product">
            <?php
            $query = mysqli_query($conn, "SELECT categories.nomCategories, produit.idProduit, produit.libelle, produit.prix, produit.description FROM produit INNER JOIN categories ON produit.categorieId = categories.idCath ");
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
                        
                            <i class="fas fa-circle isSelectedColor" style="color: <?php echo $image['color']; ?>;border : 1px solid black; border-radius: 50%; height: max-content;"></i>
                            <?php
                            while ($colorImages = mysqli_fetch_assoc($images)) {
                                ?>
                                <i class="fas fa-circle" style="color: <?php echo $colorImages['color']; ?>; border : 1px solid black,; border-radius: 50px;height: max-content;"></i>
                            <?php } ?>
                       
                        <?php
                    }
                    ?>
                     </div>
                </div>
                <div class="information">
                <p>
                    <?php echo $row[2] ?>
                </p>
                <span>
                    <?php echo $row[3] ?>
                </span>
                <div class="description">
                    <?php echo $row[4]; ?>
                </div>
                </div>
                    </div>
                <?php
            }            
            ?>
        </div>
        <br>
    </section>
    <div class="screen-loader">
        <div class="loader">
            <div class="circle black"></div>
            <div class="circle red"></div>
            <div class="circle orange"></div>
            <div class="circle yellow"></div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/presentation.js"></script>
</body>

</html>

<!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sunt adipisci excepturi deserunt, pariatur maxime reprehenderit, veritatis eos est obcaecati minus mollitia! Excepturi unde sunt saepe praesentium animi nobis omnis. -->