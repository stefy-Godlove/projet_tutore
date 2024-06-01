
<head>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/hearder.css">
</head>
<header>
    <!--first part of the header-->
    <div class="top">
        <div class="logo">
            <img src="../assets/asset2.jpg" alt="">
        </div>
        <div class="search">
            <input type="search" name="recherche" id="" placeholder="recherche">
           <button class="search-btn">
            <i class="fas fa-magnifying-glass"></i>
           </button>
        </div>
        <div class="right">
        <?php 
            if(isset($_SESSION['userId'])){?>            
                <div class="pp">
                    <img src="../assets/pp1.jpg" alt="">
                </div>
                <p>User Name</p>
            <?php }else{?>
                <button type="button">Sign Up</button>
            <?php }
        ?>
        </div>
    </div>

    <!--second part of the header-->
    <!--barre pour le sidebar-->
    <div class="buttom">
        <div class="barre">
            <button id="menu-btn">
                <i class="fa-solid fa-bars" style="color: white"></i>
            </button>
        </div>

        <!--different links-->
        <ul id="nav-links">
            <li><a href="">Appareil Electromeneger</a></li>
            <li><a href="">Appareil Electronique</a></li>
            <li><a href="">vetements</a></li>
            <li><a href="">chaussures</a></li>
            <li><a href="">montres</a></li>
            <li><a href="">Cuisines</a></li>
            <li><a href="">Sacs</a></li>
            <li><a href="">Bijoux</a></li>
            <li><a href="">Promotion</a></li>
        </ul>
    </div>
    <!-- <hr> -->
</header>