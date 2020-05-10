<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Validation de votre réservation</title></head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<body class="body-mob-tab">

<img src="<?php echo base_url() ?>assets/images/background-connexion.jpg" alt="background_chalet"
	 class="background-connexion">
<div class="wrap-form-reservBIS">

	<div class="wrap-contents-reservBIS">
		<div class="wrap-input-reservBIS">

			<span class="message-succes-reserv">Merci d'avoir reservé dans notre compagnie</span>


			<?php foreach ($dataReservation as $row) { ?>
				<a href="/projet_cvven/index.php/Reservation_controller/affichageReservations?id=<?php echo $row['idreserv']; ?>"><input type="button" value="Voir sa reservation"></a>
			<?php } ?>

			<br><br><a href="/projet_cvven/index.php/Reservation_controller/profilPersoUser"><h3>Retour à mon profil</h3></a>


		</div>
	</div>
</div>
<?php echo form_close(); ?>

</body>
</html>
