<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel automatique</title> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        .carousel {
            width: 100%;
            /* Ajustez la largeur du carrousel */
            margin: 0 auto;
            /* Centrez le carrousel */
            position: relative;
            /* Permet de positionner les boutons */
            overflow: hidden;
            background-color: transparent;
        }

        .conteneur-slides {
            display: flex;
            flex-direction: row;
            margin-left: 7%;
            /* Permet de disposer les slides en ligne */
            
            /* Cache les slides qui dépassent du conteneur */
            transition: transform 0.5s ease;
            /* Anime la transition entre les slides */
        }

        .slide {
            flex: 1 0 auto; 
            /* Donne à chaque slide la même largeur */
            min-width: 100%;
            /* Empêche les slides de se rétrécir */
            text-align: center;
            /* Centre le contenu des slides */
            display: flex;
            justify-content: center;
        }

        .slide P{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: bold;
        }

        .slide img {
            width: 50%;
            /* Ajuste l'image à la largeur du slide */
            height: 50vh;
            object-fit: contain;
            /* Conserve le ratio d'aspect de l'image */
        }

        .slide p {
            margin-top: 10px;
            /* Espace entre l'image et le texte */
        }

        .btn-prev,
        .btn-next {
            position: absolute;
            /* Positionne les boutons à l'intérieur du carrousel */
            top: 75%;
            transform: translateY(-50%);
            /* Compense le décalage vertical dû au positionnement absolu */
            cursor: pointer;
        }
        .btn-next{
            margin-right: -1.7%;
        }

        .btn-prev {
            left: 0;
            /* Positionne le bouton Précédent à gauche */
        }

        .btn-next {
            right: 0;
            /* Positionne le bouton Suivant à droite */
        }
        .chevron-left{
            height: 100%;
        }
    </style>
</head>

<body>

    <div class="carousel">
        <div class="conteneur-slides">
            <?php 
            $categorieId = "";
            for ($i=0; $i < count($data); $i++) { 
                # code...
                if($categorieId != $data[$i]['nomCategories']){
                    $categorieId = $data[$i]['nomCategories'];
                    $query = mysqli_query($conn,'SELECT imageUrl FROM imageproduit WHERE idProd = ' . $data[$i]['idProduit']) or die(mysqli_error($con));
                    $image = mysqli_fetch_assoc($query);

                ?>
                    <div class="slide">
                        <p><?php echo $data[$i]['nomCategories']; ?></p>
                        <img src="../<?php echo $image['imageUrl'] ?>" alt="Image 1">
                        <!-- <p>Titre de l'image 1</p>
                        <p>Description de l'image 1</p> -->
                    </div>
                <?php
                }
            }
        ?>
            
            <div class="slide">
                <p>Appareil Electro-Menager</p>
                <img src="../assets/Offre Amazon_ Brand sélection de Cecotec.jpeg" alt="Image 2">
                <!-- <p>Titre de l'image 2</p>
                <p>Description de l'image 2</p> -->
            </div>
            <div class="slide">
                <p>Appareil Electro-Menager</p>
                <img src="../assets/frigo.png" alt="Image 3">
                <img src="../assets/frigo.png" alt="Image 3">
                <!-- <p>Titre de l'image 3</p>
                <p>Description de l'image 3</p> -->
            </div>
        </div>
        <div class="chevron-left btn-prev">
            <button id="chevron-left" >
                <i class="fa-solid fa-chevron-left"></i>
            </button>
        </div>
        <div class="chevron-left btn-next">
            <button id="chevron-left" >
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <!-- <button class="btn-prev">Précédent</button> -->
        <!-- <button class="btn-next">Suivant</button> -->
    </div>

    <script src="script.js"></script>
</body>

<script>
    const slider = document.querySelector('.conteneur-slides');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.btn-prev');
    const nextBtn = document.querySelector('.btn-next');

    let activeSlideIndex = 0;

    function showSlide(slideIndex) {
        slider.style.transform = `translateX(-${slideIndex * 100}%`; /* Déplace le conteneur de slides vers la gauche */
    }

    showSlide(activeSlideIndex);

    prevBtn.addEventListener('click', () => {
        activeSlideIndex = activeSlideIndex === 0 ? slides.length - 1 : activeSlideIndex - 1;
        showSlide(activeSlideIndex);
    });

    nextBtn.addEventListener('click', () => {
        activeSlideIndex = activeSlideIndex === slides.length - 1 ? 0 : activeSlideIndex + 1;
        showSlide(activeSlideIndex);
    });

    // Changement de slide automatique toutes les 30 secondes
    setInterval(() => {
        activeSlideIndex = activeSlideIndex === slides.length - 1 ? 0 : activeSlideIndex + 1;
        showSlide(activeSlideIndex);
    }, 3000);


</script>

</html>

<!-- s/ref=nb_sb_noss?__mk_fr_FR=ÅMÅŽÕÑ&url=search-alias%3Dmobile-apps&field-keywords= -->