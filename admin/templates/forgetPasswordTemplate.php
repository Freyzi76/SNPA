<form method="post">
        <?php

            if (isset($er_mail)){

        ?>

            <div><?= $er_mail ?></div>
                

        <?php   

            }

        ?>

        <div class="form-floating">
                    
            <input class="form-control" type="email" id="Email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>

            <label for="Email">Email</label>
                
        </div>


        <br>


        <div class="form-floating"> 
                    
                    <input class="form-control" type="password" id="Password" name="smtpPassword" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>

                    <label for="Password">Mot de Passe</label>

        </div>


        <br>


            
    <button class="btn btn-primary btn-formulaire-add" type="submit" name="forgetPassword">Envoyer</button>

</form>