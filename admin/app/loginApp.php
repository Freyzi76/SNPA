<?php

  // S'il y a une session alors on ne retourne plus sur cette page  

    if (isset($_SESSION['id'])){

        header('Location: ../admin?page=home');

        exit;

    }

 

    // Si la variable "$_Post" contient des informations alors on les traitres

    if(!empty($_POST)){

        extract($_POST);

        $valid = true;

 

        if (isset($_POST['connexion'])){

            $mail = htmlentities(strtolower(trim($mail)));

            $mdp = trim($mdp);

 

            if(empty($mail)){ // Vérification qu'il y est bien un mail de renseigné

                $valid = false;

                $er_mail = "Il faut mettre un mail";

            }

 

            if(empty($mdp)){ // Vérification qu'il y est bien un mot de passe de renseigné

                $valid = false;

                $er_mdp = "Il faut mettre un mot de passe";

            }


            // On fait une requête pour savoir si le couple mail / mot de passe existe bien car le mail est unique !


            $req = $DB->query("SELECT * 

                FROM tadmin

                WHERE mail = ? AND pw = ?",

                array($mail, crypt($mdp, "$6$rounds=5000$MEGAsecretKEY765325dqz6d2d265ad2kuh11dq9z$")));

            $req = $req->fetch();

            
            $DB->insert("UPDATE tadmin SET n_pw = 0 WHERE mail = ?", array($mail));

            // Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
            
            if ($req['id'] == ""){

                $valid = false;

                $er_mail = "Les informations son incorrecte";

            }

 

            // Si le token n'est pas vide alors on ne l'autorise pas à accéder au site
            /*
            if($req['token'] <> NULL){

            	$valid = false;

                $er_mail = "Le compte n'a pas été validé";	

            }   */

 

            // S'il y a un résultat alors on va charger la SESSION de l'utilisateur en utilisateur les variables $_SESSION

            if ($valid){

                $_SESSION['id'] = $req['id']; // id de l'utilisateur unique 
                $_SESSION['SP'] = $req['SP'];
                $_SESSION['lastname'] = $req['lastname']; // id de l'utilisateur unique 
                $_SESSION['firstname'] = $req['firstname'];


 

                header('Location:  ../admin/index.php');

                exit;

            }   

        }

    }

?>