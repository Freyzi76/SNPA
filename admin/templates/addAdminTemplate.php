<div class="text-center">
    
    <div class="form-signin">

        <form class="container-fluid formcontainer" method="post">

            <h1 class="h3 mb-3 fw-normal">Mot de passe</h1>

                <div class="form-floating">

                    <input type="text" class="form-control" id="firstname" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>

                    <label for="firstname">Prénom</label>

                </div>


                <br>


                <div class="form-floating">

                    <input type="text" class="form-control" id="lastname" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>  

                    <label for="lastname">Nom</label>

                </div> 


                <br>


                <div class="form-floating">

                    <input type="email" class="form-control" id="email" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>

                    <label for="email">Email</label>

                </div> 


                <br>


                <div class="form-floating">

                    <input type="password" class="form-control" id="pw" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>

                    <label for="pw">Mot de passe</label>

                </div> 


                <br>


                <div class="form-floating">

                    <input type="password" class="form-control" id="pw_c" name="confmdp" required>

                    <label for="pw_c">Confirmer le mot de passe</label>

                </div> 


                <br>


                <div class="form-floating">

                    <select class="form-control" name="adminselect" required>

                        <option value="" disabled >Select Admin</option>

                        <option value="0">Admin</option>

                        <option value="1">Super-Admin</option>
                                
                    </select>

                </div> 


                <br>


                <button type="submit" class="btn btn-primary btn-formulaire-add" name="addadmin" >Envoyer</button>

        </form>

    </div>

</div>