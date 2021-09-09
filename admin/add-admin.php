<?php
    session_start();
    require('../bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD


    ini_set('display_errors', '-1');
 
    
    
    if (!isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    }

    if (!isset($_SESSION['SP'])){
        header('Location: index.php'); 
        exit;
    }

    if ($_SESSION['SP'] != 1){
        header('Location: index.php'); 
        exit;
    }
 
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['inscription'])){
            $nom  = htmlentities(trim($nom)); // On récupère le nom
            $prenom = htmlentities(trim($prenom)); // on récupère le prénom
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
            $mdp = trim($mdp); // On récupère le mot de passe 
            $confmdp = trim($confmdp); //  On récupère la confirmation du mot de passe
            $adminselect = htmlentities(trim($adminselect));
 
            //  Vérification du nom
            if(empty($nom)){
                $valid = false;
                $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
            }       
 
            //  Vérification du prénom
            if(empty($prenom)){
                $valid = false;
                $er_prenom = ("Le prenom d' utilisateur ne peut pas être vide");
            }       
 
            // Vérification du mail
            if(empty($mail)){
                $valid = false;
                $er_mail = "Le mail ne peut pas être vide";
 
                // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                $valid = false;
                $er_mail = "Le mail n'est pas valide";
 
            }else{
                // On vérifit que le mail est disponible
                $req_mail = $DB->query("SELECT mail FROM tadmin WHERE mail = ?",
                    array($mail));
 
                $req_mail = $req_mail->fetch();
 
                if ($req_mail['mail'] <> ""){
                    $valid = false;
                    $er_mail = "Ce mail existe déjà";
                }
            }
 
            // Vérification du mot de passe
            if(empty($mdp)) {
                $valid = false;
                $er_mdp = "Le mot de passe ne peut pas être vide";
 
            }elseif($mdp != $confmdp){
                $valid = false;
                $er_mdp = "La confirmation du mot de passe ne correspond pas";
            }


            
 
            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid){
 
                $mdp = crypt($mdp, "$6$rounds=5000$confirmationhbibicheiuheichoiehcoheihciehcoehchik$");
                $date_creation_compte = date('Y-m-d H:i:s');
 
                // On insert nos données dans la table utilisateur
                $DB->insert("INSERT INTO tadmin (firstname, lastname, mail, pw, date, SP) VALUES 
                    (?, ?, ?, ?, ?, ?)", 
                    array($prenom, $nom, $mail, $mdp, $date_creation_compte,  $adminselect));
 
                header('Location: ../admin/index.php');
                exit;
            }
        }
    }
?>



<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inscription</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../Admin/css/style.css">

    </head>

    <body>      

        <form class="container-fluid formcontainer" method="post">

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>

            </div>



            <div class="mb-3">
                <label class="form-label">Prénom</label>  
                <input type="text" class="form-control" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>  

            </div> 


            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>

            </div> 

            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>

            </div> 


            <div class="mb-3">
                <label class="form-label">Confirmer le mot de passe</label>
                <input type="password" class="form-control" placeholder="Confirmer le mot de passe" name="confmdp" required>

            </div> 


            <div class="mb-3">

                    <select class="form-control" name="adminselect" required>
                        <option value="" disabled >Select Admin</option>
                        <option value="0">Admin</option>
                        <option value="1">Super-Admin</option>
                        
                    </select>

            </div> 


            <button type="submit" class="btn btn-primary btn-formulaire-add" name="inscription" >Envoyer</button>

        </form>

    </body>

</html>