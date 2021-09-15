
<?php

    if(isset($_SESSION['id'])) {  

        if($_SESSION['SP'] == 1) {

?>

            <a href="add-admin.php">Ajouter un Administrateur</a>
            <br>
            <a href="manage-admin.php">Gerez Les Administrateur</a>
            <br>

           


        <?php

        }

        ?>



        <a href="add-item.php">Ajouter un produit</a>

          


 

    <?php
            
    } 

?>