<?php

require('../bd/connexionDB.php');
 
    ini_set('display_errors', '-1');

    session_start();


    if (!isset($_SESSION['SP'])){
        header('Location: index.php'); 
        exit;
    }

    if ($_SESSION['SP'] != 1){
        header('Location: index.php'); 
        exit;
    }



    // On récupère les informations
    $afficher_admin = $DB->query("SELECT * 
        FROM tadmin 
        WHERE id = ?",
        array($_GET['id']));
    $afficher_admin = $afficher_admin->fetch();
 
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['modification'])){
            $nom = htmlentities(trim($nom));
            $prenom = htmlentities(trim($prenom));
            $mail = htmlentities(strtolower(trim($mail)));
            $adminselect = htmlentities(trim($adminselect));
 
            if(empty($nom)){
                $valid = false;
                $er_nom = "Il faut mettre un nom";
            }
 
            if(empty($prenom)){
                $valid = false;
                $er_prenom = "Il faut mettre un prénom";
            }
 
            if(empty($mail)){
                $valid = false;
                $er_mail = "Il faut mettre un mail";
 
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                $valid = false;
                $er_mail = "Le mail n'est pas valide";
 
            
            }elseif($req_mail['mail'] <> "" && $afficher_admin['mail'] != $req_mail['mail']){
                $valid = false;
                $er_mail = "Ce mail existe déjà";
            }
 
            if ($valid){
 
                $DB->insert("UPDATE utilisateur SET firstname = ?, lastname = ?, mail = ?, SP = ?
                    WHERE id = ?", 
                    array($prenom, $nom,$mail, $adminselect, $_GET['id']));

 
                header('Location:  profil.php');
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
        <title>Modifier votre profil</title>
    </head>
    <body>      
        <div>Modification</div>
        <form method="post">
            <?php
                if (isset($er_nom)){
                ?>
                    <div><?= $er_nom ?></div>
                <?php   
                }
            ?>


            <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }else{ echo $afficher_admin['lastname'];}?>" required>  
            
            
            <?php
                if (isset($er_prenom)){
                ?>
                    <div><?= $er_prenom ?></div>
                <?php   
                }
            ?>


            <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }else{ echo $afficher_admin['firstname'];}?>" required>   


            <?php
                if (isset($er_mail)){
                ?>
                    <div><?= $er_mail ?></div>
                <?php   
                }
            ?>



            <input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }else{ echo $afficher_admin['mail'];}?>" required>



            <div class="mb-3">

                <select class="form-control" name="adminselect" required>
                    <option value="" disabled ><?php if($afficher_admin['SP'] == 0){echo 'Admin';}elseif($afficher_admin['SP'] == 1){echo 'Super-Admin';}?></option>
                    <option value="0">Admin</option>
                    <option value="1">Super-Admin</option>
                    
                </select>

            </div> 



            <button type="submit" name="modification">Modifier</button>
        </form>
    </body>
</html>