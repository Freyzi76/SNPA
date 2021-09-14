<?php
    session_start();
    require('../bd/connexionDB.php'); // Fichier PHP contenant la connexion à votre BDD

    ini_set('display_errors', '-1');
    error_reporting( E_ALL );

    
    if (isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    }

    if (isset($_SESSION['SP'])){
        header('Location: index.php'); 
        exit;
    }

    require ('../PHPMailer/PHPMailer.php');

 
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        if (isset($_POST['forgotPassword'])){
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail afin d envoyer le mail pour la récupèration du mot de passe 
            $smtpPassword = trim($MDP);


            var_dump($MDP);
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
                    if($verification_mail['n_pw'] == 0){
                        // On génère un mot de passe à l'aide de la fonction RAND de PHP
                        $new_pass = "defaultPassword";
 
                        // Le mieux serait de générer un nombre aléatoire entre 7 et 10 caractères (Lettres et chiffres)
                        $new_pass_crypt = password_hash($new_pass, PASSWORD_ARGON2I);
                        // $new_pass_crypt = crypt($new_pass, "VOTRE CLÉ UNIQUE DE CRYPTAGE DU MOT DE PASSE");
                        
                        $from = "contact@hugo.marc.xyz";
                        $objet = 'Nouveau mot de passe';
                        $to = $verification_mail['mail'];
 
                        //===== Création du header du mail.
                        $header = 'From: "Hugo-marc.xyz" <no-reply@test.com> \n';
                        $header .= "Reply-To: ". $to ."\r\n";
                        $header .= "MIME-version: 1.0\n";
                        $header .= "Content-type: text/html; charset=utf-8\n";
                        $header .= "Content-Transfer-Encoding: 8bit";
 
                        //===== Contenu de votre message
                        $contenu =  "<html>".
                            "<body>".
                            "<p style='text-align: center; font-size: 18px'><b>Bonjour Mr, Mme".$verification_mail['lastname']."</b>,</p><br/>".
                            "<p style='text-align: justify'><i><b>Nouveau mot de passe : </b></i>".$new_pass."</p><br/>".
                            "</body>".
                            "</html>";
                        //===== Envoi du mail
                        mail($from, $to, $objet, $contenu, $header);
                        $DB->insert("UPDATE tadmin SET pw = ?, n_pw = 1 WHERE mail = ?", 
                            array($new_pass_crypt, $verification_mail['mail']));




                            $smtpUsername = 'hmarc@normandiewebschool.fr';
                            
                            $emailFrom ='hmarc@normandiewebschool.fr';
                            $emailFromName = 'Hugo MARC';
                            
                            $emailTo = 'hugo.marc76113@gmail.com';
                            $emailToName = 'TEST test';
                            
                            
                            $mail = new PHPMailer;
                            $mail->isSMTP(); 
                            $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
                            
                            $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
                            $mail->Port = 587; // TLS only
                            $mail->SMTPSecure = 'tls'; // ssl is depracated
                            $mail->SMTPAuth = true;
                            $mail->Username = $smtpUsername;
                            $mail->Password = $smtpPassword;
                            
                            
                            $mail->setFrom($emailFrom, $emailFromName);
                            $mail->addAddress($emailTo, $emailToName);
                            $mail->Subject = 'PHPMailer GMail SMTP';
                            $mail->msgHTML("Hey Nicolas, voila PHPMailer ajouter sans composer les cours php POO ça aide"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
                            $mail->AltBody = 'HTML messaging not supported';
                            // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
                            
                            if(!$mail->send()){
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            }else{
                                echo "Message sent!";
                            }
                            






                    }   
                }       
                //header('Location: ../admin/index.php');
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

        <title>Mot de passe oublié</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../Admin/css/style.css">

        
    </head>
    <body>
        <div>Mot de passe oublié</div>
        <form method="post">
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

            <div class="mb-3"> 
                <label class="form-label">MDP</label>
                <input class="form-control" type="password" placeholder="MDP" name="DMP" value="" required>
            </div>
            
            <button class="btn btn-primary btn-formulaire-add" type="submit" name="forgotPassword">Envoyer</button>
        </form>
    </body>
</html>