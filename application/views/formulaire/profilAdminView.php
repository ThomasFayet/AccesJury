<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Mon profil</title></head>


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
				<li><a href="/projet_cvven/index.php/Reservation_controller/ListeClient"><input type="button" value="Tous les clients"></a></li>
				<li><a href="/projet_cvven/index.php/Reservation_controller/profilAdmin"><input type="button" value="Mon profil"></a></li>
			</div>
		</ul>
	</nav>


</div>

	<div class="cvven-wrap">
	<div class="wrap-reserv">

		<div class="wrap-contents-profil">

			<div class="wrap-input-modifID">

				<br><br><a href="/projet_cvven/index.php/Reservation_controller/modifierIDAdmin"><input type="button"
																							value="Modifier son nom"></a><br><br>

				<a href="/projet_cvven/index.php/Reservation_controller/modifierPasswordAdmin"><input type="button"
																					 value="Changer son mot de passe"></a><br><br>

				<a href="/projet_cvven/index.php/"><input type="button" value="Se déconnecter"></a>

			</div>
		</div>


	</div>
</div>


