<form method="post">
            

        <div class="mb-3"> 

            <label class="form-label">Nom</label>

            <input class="form-control" type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_admin['lastname'];}?>" required>  
        
        </div>
            
          

        <div class="mb-3"> 

            <label class="form-label">Prénom</label>
            
            <input class="form-control" type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_admin['firstname'];}?>" required>   
        
        </div>


        <div class="mb-3"> 

            <label class="form-label">Prénom</label>

            <input class="form-control" type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_admin['mail'];}?>" required>
            
        </div>


        <div class="mb-3">

            <select class="form-control" name="adminselect" class="form-select" required>

                <option value="" disabled ><?php if($afficher_admin['SP'] == 0){echo 'Admin';}elseif($afficher_admin['SP'] == 1){echo 'Super-Admin';}?></option>

                <option value="0">Admin</option>

                <option value="1">Super-Admin</option>
                        
            </select>

        </div> 



    <button class="btn btn-primary btn-formulaire-add" type="submit" name="modification">Modifier</button>
</form>