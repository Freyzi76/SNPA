<?php

require('../bd/connexionDB.php');



class addUser {

    protected function verifyInfo($lastname, $name, $mail, $password, $confpassword, $adminselect, $adminActive) { 
        
        extract($_POST);
        
            $lastname  = htmlentities(trim($lastname)); // On récupère le nom
            $name = htmlentities(trim($name)); // on récupère le prénom
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
            $password = trim($password); // On récupère le mot de passe 
            $confpassword = trim($confpassword); //  On récupère la confirmation du mot de passe
            $adminselect = htmlentities(trim($adminselect));

            $valid = true;

            $table = 'user';


            if($adminActive == true) {

                if(empty($adminselect)) {

                    $valid = false;

                } else {

                    $table = 'tadmin';

                }


            } else {

                $table = 'user';

            }

 
            //  Vérification du nom
            if(empty($lastname)) {

                $valid = false;
    
            }       
 
            //  Vérification du prénom
            if(empty($name)) {

                $valid = false;
            }       
 
            // Vérification du mail
            if(empty($mail)) {
                $valid = false;
 
                // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)) {

                $valid = false;
 
            } else {
                // On vérifit que le mail est disponible
                $req_mail = $DB->query("SELECT mail FROM " . $table . " WHERE mail = ?",

                    array($mail));
 
                $req_mail = $req_mail->fetch();
 
                if ($req_mail['mail'] <> "") {

                    $valid = false;

                }

            }
 
            // Vérification du mot de passe
            if(empty($password)) {

                $valid = false;

 
            }elseif($password != $confpassword) {

                $valid = false;
                
            }


            $password = crypt($password, "$6$rounds=5000$MEGAsecretKEY765325dqz6d2d265ad2kuh11dq9z$");


            $create_date = date('Y-m-d H:i:s');


            if($valid == true) {

                if($adminActive == true) {

                    insertAdmin($name, $Lastname, $mail, $password, $create_date, $adminselect);

                } else {

                    insertUser($name, $Lastname, $mail, $password, $create_date);

                }

            }
                
                
    }



    protected function insertUser($name, $Lastname, $mail, $password, $create_date){    
        
        $DB->insert("INSERT INTO user (firstname, lastname, mail, pw, date) 

                        VALUES (?, ?, ?, ?, ?)", 

                        array($name, $Lastname, $mail, $password, $create_date));
                
                
    }


    protected function insertAdmin($name, $Lastname, $mail, $password, $create_date, $adminselect){    
        
        $DB->insert("INSERT INTO tadmin (firstname, lastname, mail, pw, date, SP) 

                        VALUES (?, ?, ?, ?, ?, ?)", 

                        array($name, $Lastname, $mail, $password, $create_date, $adminselect));
                
                
    }

}

$newAdd = new addUser;
