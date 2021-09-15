 
<div class="text-center">
    
    <div class="form-signin">   
    
        <form method="post" class="container-fluid formcontainer" style="width: 300px;">


            <h1 class="h3 mb-3 fw-normal">Mot de passe</h1>

            <br>

            <h1 class="h3 mb-3 fw-normal">oublier</h1>


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

    </div>

</div>