
<div class="text-center">
    
    <div class="form-signin">

        <form method="post" class="container-fluid formcontainer" style="width: 300px;">

            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

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


            <?php
            if (isset($er_mdp)){
            ?>

                <div><?= $er_mdp ?></div>


            <?php   
            }
            ?>

                <div class="form-floating"> 
                    
                    <input class="form-control" type="password" id="Password" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>

                    <label for="Password">Mot de Passe</label>

                </div>


                <div class="checkbox mb-3">

                    <label>

                        <input type="checkbox" value="remember-me"> Remember me

                    </label>
                    
                </div>


                <button class="w-100 btn btn-lg btn-primary" type="submit" name="connexion">Se connecter</button>


        </form>

    </div>

</div>


