<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Connexion</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body class="body-mob-tab">



<img src="<?php echo base_url() ?>assets/images/background-connexion.jpg" alt="background_chalet"
	 class="background-connexion">
<script src="https://kit.fontawesome.com/22f0792d3e.js" crossorigin="anonymous"></script>
<div class="wrap-form">
	<div class="wrap-contents">
		<h2> Page de connexion </h2>

		<?php //echo validation_errors();?>

		<?php echo form_open('Reservation_controller/testconnexion'); ?>

		<div class="wrap-input">

			<span class="title-input-connexion">Identifiant (email)</span>
			<input type='text' name="mail" value="" size="50" class="input-text" required /><br>


			<span class="title-input-connexion">Mot de passe</span>
			<input type='password' name="mdpClient" value="" size="50" class="input-text" required /><br><br>


			<input type="submit" value="Connexion" class="input-submit">
			<a href="/projet_cvven/index.php"><i class="far fa-arrow-alt-circle-left connexion" title="Retour à l'accueil"></i></a>
			<a href="<?php echo('create') ?>"><h3>Pas encore inscrit ?</h3></a>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
</body>
