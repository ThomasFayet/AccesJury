<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Inscription</title></head>
<body class="body-mob-tab">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<img src="<?php echo base_url() ?>assets/images/background-inscription.jpg" alt="background_chalet"
	 class="background-inscription">
<script src="https://kit.fontawesome.com/22f0792d3e.js" crossorigin="anonymous"></script>
<div class="wrap-form-inscription">

	<div class="wrap-contents-inscription">
		<h2>Page d'inscription</h2>
		<?php //echo validation_errors();?>
		<?php echo form_open('Reservation_controller/create'); ?>

		<div class="wrap-input">

			<span class="title-input-inscription">Nom</span>
			<input type='text' name='nom' value="" size="50" class="input-text" required /><br>

			<span class="title-input-inscription">Prénom</span>
			<input type='text' name='prenom' value="" size="50" class="input-text"required /><br>

			<span class="title-input-inscription">Adresse</span>
			<input type='text' name='adresse' value="" size="50" class="input-text"required /><br>

			<span class="title-input-inscription">Numéro de téléphone</span>
			<input type='text' name='tel' value="" size="50" class="input-text"required /><br>

			<span class="title-input-inscription">Email</span>
			<input type='text' name='mail' value="" size="50" class="input-text"required /><br>

			<span class="title-input-inscription">Mot de passe</span>
			<input type='password' name='mdpClient' value="" size="50" class="input-text"required /><br>

			<span class="title-input-inscription">Confirm Mot de passe</span>
			<input type='password' name='confirmMdp' value="" size="50" class="input-text"required /><br><br>

			<input type="submit" value="Confirmer" class="input-submit-inscription"required />

			<a href="/projet_cvven/index.php"><i class="far fa-arrow-alt-circle-left" title="Retour à l'accueil"></i></a>
			<a href="<?php echo('testconnexion') ?>"><h3>Deja inscrit ? Se connecter</h3></a>
		</div>
	</div>
</div>
</body>
</html>
