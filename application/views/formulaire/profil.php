<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Mes réservations</title></head>

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

				<li><a href="/projet_cvven/index.php/Reservation_controller/profilPersoUser"><input type="button"
																						value="Mon profil"></a></li>
				<li><a href="/projet_cvven/index.php/Reservation_controller/formulaireReservation"><input type="button"
																							  value="Réserver des vacances"></a></li>
				<li><a href="/projet_cvven/index.php/Reservation_controller/monProfil"><input type="button"
																				  value="Mes réservations"></a></li>
			</div>
		</ul>
	</nav>


</div>

	<div class="wrap-reserv">

		<div class="wrap-contents-reserv">

			<?php foreach ($dataClient as $user) { ?>
				<span class="span-nom-user"><th>Nom :</th></span> <span
					class="nom-user-perso"><?php echo $user['nom_client']; ?></span>
			<?php } ?>

			<table stylesheet="border=solid 1px black">
				<tr>
					<th>N°</th>
					<th>Date réservation</th>
					<th>Nombre personne</th>
					<th>Type Pension</th>
					<th>menage</th>
					<th>Etat réservation</th>
				</tr>


				<?php foreach ($dataReservation as $row) { ?>
					<tr>
						<td> <?php echo $row['idreserv']; ?> </td>
						<td> <?php echo $row['datevacances']; ?> </td>
						<td> <?php echo $row['nbpersonnes']; ?> </td>
						<td> <?php echo $row['typepension']; ?> </td>
						<td>
							<?php
							if ($row['menagereservation'] == true) {
								echo("OUI");
							} else {
								echo("NON");
							}
							?>
						</td>

						<td>
							<?php
							if ($row['etatreserv'] == 'En attente') {
								echo("EN COURS DE VALIDATION");
							} else {
								echo("RÉSERVATION VALIDÉE !");
							}

							?>
						</td>
		<td><a href="/projet_cvven/index.php/Reservation_controller/supprReservation?id=<?php echo $row['idreserv'];?>"><input type="button" value="Annuler Reservation"></a></td>
    </tr>

    <?php } ?>
</table>















