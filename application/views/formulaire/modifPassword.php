<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Modifier mot de passe</title></head>
<body class="body-mob-tab">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">

<img src="<?php echo base_url() ?>assets/images/background-connexion.jpg" alt="background_chalet"
	 class="background-connexion">
<div class="wrap-form">

	<div class="wrap-contents">
		<h2> Changer votre mot de passe </h2>
		<?php echo form_open('Reservation_controller/modifierPassword'); ?>

		<div class="wrap-input">
			<span class="title-input-connexion">Ancien mot de passe</span>
			<input type='password' name='oldMdp' value="" size="50" class="input-text"required /><br>

			<span class="title-input-connexion">Nouveau Mot de passe</span>
			<input type='password' name='newMdp' value="" size="50" class="input-text"required /><br><br>

			<span class="title-input-connexion">Confirmation Mot de passe</span>
			<input type='password' name='confirmNewMdp' value="" size="50" class="input-text"required /><br><br>

			<input type="submit" value="Valider" class="input-submit">

			<a href="/projet_cvven/index.php/Reservation_controller/profilPersoUser"><h3>Retour à mon profil</h3></a>
		</div>
	</div>
</div>

</body>
