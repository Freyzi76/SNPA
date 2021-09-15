<?php

    
    if (isset($_SESSION['id'])){
        header('Location: ../admin?page=home'); 
        exit;
    }

    if (isset($_SESSION['SP'])){
        header('Location: ../admin?page=home'); 
        exit;
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

 
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['forgetPassword'])){
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail afin d envoyer le mail pour la récupèration du mot de passe 
            $smtpPassword = trim($smtpPassword);

            // Si le mail est vide alors on ne traite pas
            if(empty($mail)){
                $valid = false;
                $er_mail = "Il faut mettre un mail";
            }
 
            if($valid){
                $verification_mail = $DB->query("SELECT firstname, lastname, mail, n_pw 
                    FROM tadmin WHERE mail = ?",
                    array($mail));
                $verification_mail = $verification_mail->fetch();

 
                if(isset($verification_mail['mail'])){

                    $verification_mail['n_pw'] = 0;

                    if($verification_mail['n_pw'] == 0){
                        // On génère un mot de passe à l'aide de la fonction RAND de PHP
                        $new_pass = rand();
 
                        // Le mieux serait de générer un nombre aléatoire entre 7 et 10 caractères (Lettres et chiffres)
                        $new_pass_crypt = crypt($new_pass, "$6$rounds=5000$MEGAsecretKEY765325dqz6d2d265ad2kuh11dq9z$");

                        var_dump($new_pass_crypt);
                        // $new_pass_crypt = crypt($new_pass, "VOTRE CLÉ UNIQUE DE CRYPTAGE DU MOT DE PASSE");

                        $DB->insert("UPDATE tadmin SET pw = ?, n_pw = 1 WHERE mail = ?", 
                            array($new_pass_crypt, $verification_mail['mail']));
 
                        //===== Contenu de votre message
                        $contenu =  "<html>".
                            "<body>".
                            "<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme ". $verification_mail['lastname'] ."</b>,</p><br/>".
                            "<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i>".$new_pass."</p><br/>".
                            "</body>".
                            "</html>";
                        //===== Envoi du mail
                        

                            $smtpUsername = 'hmarc@normandiewebschool.fr';
                            
                            $emailFrom ='hmarc@normandiewebschool.fr';
                            $emailFromName = 'Hugo MARC SNPA';
                            
                            $mail = new PHPMailer;
                            $mail->isSMTP(); 
                            $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                            
                            $mail->Host = 'smtp.gmail.com'; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                            $mail->Port = 587; // TLS only
                            $mail->SMTPSecure = 'tls'; // ssl is depracated
                            $mail->SMTPAuth = true;
                            $mail->Username = $smtpUsername;
                            $mail->Password = $smtpPassword;
                            
                            
                            $mail->setFrom($emailFrom, $emailFromName);
                            $mail->addAddress($verification_mail['mail'], $verification_mail['lastname'] . ' ' . $verification_mail['firstname']);
                            $mail->Subject = 'Nouveau Mot de passe';
                            $mail->msgHTML($contenu); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                            $mail->AltBody = 'HTML messaging not supported';
                            // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
                          

                        header('Location: ../admin?page=home');
                        exit;

                    }   
                }       
                header('Location: ../admin?page=home');
                exit;
            }
        }
    }

?>