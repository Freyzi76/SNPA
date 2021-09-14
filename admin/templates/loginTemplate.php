<form method="post" class="container-fluid formcontainer">



    <?php
    if (isset($er_mail)){
    ?>

        <div><?= $er_mail ?></div>

    <?php   
    }
    ?>


        <div class="mb-3"> 
            
            <label class="form-label">Email</label>
            
            <input class="form-control" type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>
        
        </div>


    <?php
    if (isset($er_mdp)){
    ?>

        <div><?= $er_mdp ?></div>


    <?php   
    }
    ?>

        <div class="mb-3"> 
            <label class="form-label">Email</label>
            
            <input class="form-control" type="password" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>

            <button class="btn btn-primary " type="submit" name="connexion">Se connecter</button>
        </div>


</form>