

<table class="table">

    <tr class="table-light">

        <th>Nom</th> 

        <th>Prénom</th>

        <th>Super-Admin</th>

        <th>Profil Administrateur</th>

      </tr>

      <?php

        foreach($afficher_admin as $aa){

        ?>

          <tr>          

            <td><?= $aa['lastname'] ?></td>

            <td><?= $aa['firstname'] ?></td>

            <td><?php if($aa['SP'] == 0){echo 'NON';}elseif($aa['SP'] == 1){echo 'OUI';}?></td>

            <td><a href="../admin/modify-admin.php?id=<?= $aa['id'] ?>">Modifier cet Administrateur</a></td>

          </tr>

        <?php

        }

      ?>

</table>