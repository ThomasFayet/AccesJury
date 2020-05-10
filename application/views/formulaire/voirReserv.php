<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Confirmation de votre réservation</title></head>
<body class="voirReserv">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">

<h2> Confirmation de votre réservation </h2>


<div class="wrap-voirReserv">

<table stylesheet="border=solid 1px black">
	<tr>
		<th>N°</th>
		<th>Date réservation</th>
		<th>Nombre personne</th>
		<th>Type Pension</th>
		<th>menage</th>
		<th>Etat réservation</th>
	</tr>



	<?php foreach($dataReservation as $row){ ?>
		<tr>
			<td> <?php echo $row['idreserv']; ?> </td>
			<td> <?php echo $row['datevacances']; ?> </td>
			<td> <?php echo $row['nbpersonnes']; ?> </td>
			<td> <?php echo $row['typepension']; ?> </td>
			<td>
				<?php
				if($row['menagereservation'] == true){
					echo("OUI");
				}
				else{
					echo("NON");
				}
				?>
			</td>

			<td>
				<?php echo $row['etatreserv']; ?>
				</td>
			<td><a href="/projet_cvven/index.php/Reservation_controller/modifReservation?id=<?php echo $row['idreserv'];?>""><input type="button" value="Modifier la Reservation"></a></td>
			<td><a href="/projet_cvven/index.php/Reservation_controller/supprReservationAdmin?id=<?php echo $row['idreserv'];?>"><input type="button" value="Annuler la Reservation"></a></td>
		</tr>

	<?php } ?>
</table>



	<br><br><a href="/projet_cvven/index.php/Reservation_controller/profilPersoUser"><h3>Retour à mon profil</h3></a>

</div>
</body>
<footer></footer>
</html>
