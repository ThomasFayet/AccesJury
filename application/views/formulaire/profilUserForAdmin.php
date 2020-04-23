<table stylesheet="border=solid 1px black">
	<tr>
		<th>Nom</th>
	</tr>

	<?php foreach ($dataClient as $user) { ?>
		<tr>
			<td> <?php echo $user['nom_client']; ?> </td>
		</tr>
	<?php } ?>
</table>


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
					}else {
						echo("RÉSERVATION VALIDÉE !");
					}

					?>
				</td>
					<td><a href="/projet_cvven/index.php/Reservation_controller/supprReservationAdmin?id=<?php echo $row['idreserv'];?>"><input type="button">Supprimer Reservation</a></td>
					<td><a href="/projet_cvven/index.php/Reservation_controller/formulaireModifReservation?id=<?php echo $row['idreserv'];?>&amp;?idclient=<?php echo $user['idclient'];?>&amp;?idconnexion=<?php echo $user['id_connexion'];?>"><input type="button">Modifier Reservation</a></td>
					<td><a href="/projet_cvven/index.php/Reservation_controller/validerReservation?id=<?php echo $row['idreserv'];?>"><input type="button">Valider Reservation</a></td>
				</tr>
			<?php } ?>
		</table>

		






