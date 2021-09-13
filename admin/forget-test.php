<?php
require ('../PHPMailer/PHPMailerTest.php');

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