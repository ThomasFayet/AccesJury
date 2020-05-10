<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<head><title>Réserver des vacances</title></head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<body class="body-mob-tab">
<img src="<?php echo base_url() ?>assets/images/background-inscription.jpg" alt="background_chalet"
	 class="background-inscription">

<?php echo validation_errors(); ?>
<div class="wrap-form-reserv">

	<div class="wrap-contents-reserv-modif">
		<?php echo form_open('Reservation_controller/formulaireReservation'); ?>
		<h2> Réserver vos vacances ! </h2>
		<div class="wrap-input-reserv">
			<span class="title-input-reserv"><label> Nombre de personne : </label></span>
			<input type="int" name="nbpersonnes" class="input-reserv"required /><br>


			<span class="title-input-reserv"><label>Vous souhaitez partir :</label><br/></span>
			<select name="datevacances">
				<optgroup label="Vacance Toussaint">
					<option value="19/10-26/10">Du 19 Octobre au 26 Octobre</option>
					19/06-26/06
					<option value="26/10-02/11">Du 26 Octobre au 02 Novembre</option>
				</optgroup>

				<optgroup label="Vacance Noël">
					<option value="21/12-28/12">Du 21 Décembre au 28 Décembre</option>
					<option value="28/12-04/01">Du 28 Décembre au 04 Janvier</option>
				</optgroup>

				<optgroup label="Vacance Hiver">
					<option value="08/02-15/02">Du 08 Février au 15 Février</option>
					<option value="15/02-22/02">Du 15 Février au 22 Février</option>
				</optgroup>

				<optgroup label="Vacance Printemps">
					<option value="04/04-11/04">Du 04 Avril au 11 Avril</option>
					<option value="11/04-18/04">Du 11 Avril au 18 Avril</option>
				</optgroup>

				<optgroup label="Vacance Été">
					<option value="04/07-11/07">Du 04 Juillet au 11 Juillet</option>
					<option value="11/07-18/07">Du 11 Juillet au 18 Juillet</option>
					<option value="18/07-25/07">Du 18 Juillet au 25 Juillet</option>
					<option value="25/07-01/08">Du 25 Juillet au 01 Août</option>
					<option value="01/08-08/08">Du 01 Août au 08 Août</option>
					<option value="15/08-22/08">Du 15 Août au 22 Août</option>
					<option value="22/08-29/08">Du 22 Août au 29 Août</option>
				</optgroup>
			</select>


			<span class="title-input-reserv">
				<p>Type de restauration :</p></span>
			<input type="radio" name="typepension" value="Pension Complete" class="menage1" />

			<label>Pension Complete</label>



			<input type="radio" name="typepension" value="Demi-pension" class="menage1" /><label>Demi-Pension</label><br>


			<span class="title-input-reserv"><p>Ménage (Optionnelle) :</p></span>
			<input type="radio" name="menagereservation" value="1" class="menage1"/><label class="oui">Oui</label><br>
			<input type="radio" name="menagereservation" value="0" class="menage0"/><label
				class="non">Non</label><br>


			<span class="title-input-reserv-logement"><p>Type Logement :</p></span>
			<?php foreach ($dataTypeLogement as $row) { ?>
				<input type="radio" name="typelogement" value="<?php echo $row['idtypelogement']; ?>" class="menage1 styleresponsivemenage"required />
				<label><?php echo($row['typelogement'] . " : " . $row['descriptionlogement'] . " " . $row['prixlogement'] . "€"); ?> </label>
				<br>

			<?php } ?>

			<br><input type="submit" value="Réserver" class="input-submit-reserv"/><br>
			<a href="/projet_cvven/index.php/Reservation_controller/profilPersoUser"><h3>Retour à mon profil</h3></a>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>

</html>

</body>
