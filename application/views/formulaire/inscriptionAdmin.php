<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Modifier un utilisateurs</title></head>
<body class="body-mob-tab">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<img src="<?php echo base_url() ?>assets/images/background-inscription.jpg" alt="background_chalet"
	 class="background-inscription">
<div class="wrap-form-inscription">

	<div class="wrap-contents-inscription">
		<h2>Modifier utilisateur</h2>
		<?php //echo validation_errors();?>
		<form method="post">

			<div class="wrap-input">

				<span class="title-input-inscription">Nom</span>
				<input type='text' name='nom' value="" size="50" class="input-text"required /><br>

				<span class="title-input-inscription">Prénom</span>
				<input type='text' name='prenom' value="" size="50" class="input-text"required /><br>

				<span class="title-input-inscription">Adresse</span>
				<input type='text' name='adresse' value="" size="50" class="input-text"required /><br>

				<span class="title-input-inscription">Numéro de téléphone</span>
				<input type='text' name='tel' value="" size="50" class="input-text"required /><br>

				<span class="title-input-inscription">Email</span>
				<input type='text' name='mail' value="" size="50" class="input-text"required /><br>

				<input type="submit" name="updateInscription" value="Confirmer" class="input-submit-inscription"/>
				<a href="/projet_cvven/index.php/Reservation_controller/profilAdmin"><h3>Retour à mon profil</h3></a>
			</div>
		</form>
	</div>
</div>
</body>
</html>
