<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<img src="<?php echo base_url() ?>assets/images/background-inscription.jpg" alt="background_chalet"
	 class="background-inscription">
<div class="wrap-form-inscription">

	<div class="wrap-contents">
		<h2>Page d'inscription</h2>
		<?php //echo validation_errors();?>
		<?php echo form_open('formulaire/create'); ?>

		<div class="wrap-input">

			<span class="title-input-inscription">Nom</span>
			<input type='text' name='nom' value="" size="50" class="input-text"/><br>

			<span class="title-input-inscription">Prénom</span>
			<input type='text' name='prenom' value="" size="50" class="input-text"/><br>

			<span class="title-input-inscription">Adresse</span>
			<input type='text' name='adresse' value="" size="50" class="input-text"/><br>

			<span class="title-input-inscription">Numéro de téléphone</span>
			<input type='text' name='tel' value="" size="50" class="input-text"/><br>

			<span class="title-input-inscription">Email</span>
			<input type='text' name='mail' value="" size="50" class="input-text"/><br>

			<span class="title-input-inscription">Mot de passe</span>
			<input type='password' name='mdpClient' value="" size="50" class="input-text"/><br><br>

			<span class="title-input-inscription">Confirm Mot de passe</span>
			<input type='password' name='confirmMdp' value="" size="50" class="input-text"/><br><br>

			<input type="submit" value="Confirmer" class="input-submit-inscription"/>
		</div>
	</div>
</div>






