<h1> LISTE DES CLIENTS </h1>

<table stylesheet="border=solid 1px black">
    <tr>
        <th>N°</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Email</th>
    </tr>

    
    
    
    <?php foreach($dataUser as $row){ ?>
    <tr>
        <td> <?php echo $row['idclient']; ?> </td>
        <td> <?php echo $row['nom_client']; ?> </td>
        <td> <?php echo $row['prenom_client']; ?> </td>
        <td> <?php echo $row['adresse_client']; ?> </td>
        <td> <?php echo $row['tel_client']; ?> </td>
        <td> <?php echo $row['id_connexion']; ?> </td>
        <td><a href="/projet_cvven/index.php/Reservation_controller/profilUser?id=<?php echo $row['idclient'];?>"><input type="button">Compte Client</a></td>
        <td><a href="/projet_cvven/index.php/Reservation_controller/supprUser?id=<?php echo $row['idclient'];?>"><input type="button">Supprimer</a></td>
    </tr>

    <?php } ?>
</table>

<br><br><a href="/projet_cvven/index.php/Reservation_controller/profilAdmin">Retour</a>