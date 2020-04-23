<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">


<img src="<?php echo base_url() ?>assets/images/background-connexion.jpg" alt="background_chalet" class="background-connexion">
<div class="wrap-form">

	<div class="wrap-contents">
		<h2> Page de connexion </h2>

		<?php //echo validation_errors();?>

		<?php echo form_open('Reservation_controller/testconnexion'); ?>

		<div class="wrap-input">

			<span class="title-input-connexion">Identifiant (email)</span>
			<input type='text' name="mail" value="" size="50" class="input-text"/><br>


			<span class="title-input-connexion">Mot de passe</span>
			<input type='password' name="mdpClient" value="" size="50" class="input-text"/><br><br>


			<input type="submit" value="Connexion" class="input-submit">

		</div>
	</div>
</div>
<?php echo form_close(); ?>


