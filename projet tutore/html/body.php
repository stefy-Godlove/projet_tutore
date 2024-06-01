<head>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/body.css">
</head>


<body>
    <?php 
        include("header.php");
        include("../php/get_all_product.php"); 
        $data = json_decode($json, true);
    ?>
    <!--first part of the body-->
    <div class="head-body">
        <div style="height: 100%;">
            <?php include('carroussel.php'); ?>
        </div>
    </div>

    <section>
        <table border="5px">
            <tr><th>Identifiant</th><th>Categorie</th><th>Libelle</th><th>prix</th><th>Description</th></tr>
        <?php 
            
            for ($i=0; $i < count($data); $i++) { 
                # code...
                ?>
                <tr>
                    <td>
                        <?php 
                            echo $data[$i]['idProduit']; 
                        ?>
                    </td>
                    <td>
                        <?php 
                            echo $data[$i]['nomCategories'];
                        ?>
                    </td>
                    <td>
                        <?php 
                          echo $data[$i]['libelle'];  
                        ?>
                    </td>
                    <td>
                        <?php 
                            echo $data[$i]['prix'];
                        ?>
                    </td>
                    <td>
                        <?php 
                          echo $data[$i]['description'];  
                        ?>
                    </td>
                </tr>
                
                <?php
            }
        ?>
        </table>
    </section>
</body>