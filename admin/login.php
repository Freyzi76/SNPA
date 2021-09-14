<?php

    session_start();

    include('../bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD

    

  // S'il y a une session alors on ne retourne plus sur cette page  

    if (isset($_SESSION['id'])){

        header('Location: ../admin/index.php');

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

                array($mail, crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$")));

            $req = $req->fetch();

            
            $DB->insert("UPDATE tadmin SET n_pw = 0 WHERE mail = ?", array($mail));

            // Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
            
            if ($req['id'] == ""){

                $valid = false;

                $er_mail = "Le mail ou le mot de passe est incorrecte";

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




<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexion</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../Admin/css/style.css">

    </head>
    <body>      

        <div>Se connecter</div>


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
    </body>
</html>