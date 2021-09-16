<?php


if (!isset($_SESSION['id'])){
    header('Location: ../admin?page=home'); 
    exit;
}

if (!isset($_SESSION['SP'])){
    header('Location: ../admin?page=home'); 
    exit;
}

if ($_SESSION['SP'] != 1){
    header('Location: ../admin?page=home'); 
    exit;
}

    // On récupère les informations
    $afficher_admin = $DB->query("SELECT * 
        FROM tadmin 
        WHERE id = ?",
        array($_GET['maId']));
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
 
                $DB->insert("UPDATE tadmin SET firstname = ?, lastname = ?, mail = ?, SP = ?
                    WHERE id = ?", 
                    array($prenom, $nom,$mail, $adminselect, $_GET['id']));

 
                header('Location:  ../admin?page=home&option=manageAdmin');
                exit;
            }   
        }
    }
?>