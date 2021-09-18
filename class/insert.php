<?php

class insert {

    $DB->insert("INSERT INTO tadmin (firstname, lastname, mail, pw, date) 

                    VALUES (?, ?, ?, ?, ?)", 

                    array($name, $Lastname, $mail, $password, $create_date));


}
