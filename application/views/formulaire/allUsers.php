<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Tous les clients</title></head>

<body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<script type='text/javascript' src="<?php echo base_url(); ?>assets/js/app.js"></script>

<div class="nav-admin">

	<span class="name-admin">Compte d'Admin : <?php echo $this->session->id; ?></span>


	<img src="<?php echo base_url() ?>assets/images/close.png" alt="close bouton"
		 class="btn-close">
	<div class="btn-burger">
		<span class="menu-burger top-btn"></span>
		<span class="menu-burger mid-btn"></span>
		<span class="menu-burger bot-btn"></span>
	</div>

<nav>
	<ul>
		<div class="menu">
			<li><a href="/projet_cvven/index.php/Reservation_controller/ListeClient"><input type="button"
																				value="Tous les clients"></a></li>
			<li><a href="/projet_cvven/index.php/Reservation_controller/profilAdmin"><input type="button"
																				value="Mon profil"></a></li>
		</div>
	</ul>
</nav>


</div>

<div class="wrap-reserv">

	<div class="wrap-contents-reserv">

		<span class="span-client">Tous les clients</h2></span>

		<table stylesheet="border=solid 1px black">
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Téléphone</th>
			</tr>


			<?php foreach ($dataClient as $row) { ?>
				<tr>
					<td> <?php echo $row['nom_client']; ?> </td>
					<td> <?php echo $row['prenom_client']; ?> </td>
					<td> <?php echo $row['adresse_client']; ?> </td>
					<td> <?php echo $row['tel_client']; ?> </td>
					<td>
						<a href="/projet_cvven/index.php/Reservation_controller/profilUser?id=<?php echo $row['idclient']; ?>"><input
								type="button" value="Compte du Client"></a></td>
					<td>
						<a href="/projet_cvven/index.php/Reservation_controller/modifClient?idclient=<?php echo $row['idclient']; ?>"><input
								type="button" value="Modifier client"></a></td>
					<td>
						<a href="/projet_cvven/index.php/Reservation_controller/supprUser?id=<?php echo $row['idclient']; ?>"><input
								type="button" value="Supprimer client"></a></td>
				</tr>

			<?php } ?>
		</table>
	</div>
</div>


</body>
