<h2> Page de connexion </h2>
<?php//echo validation_errors();?>
<?php echo form_open('Reservation_controller/testconnexionAdmin');?>

Identifiant (email)
<input type='text' name="mail_admin" value="" size="50" /><br>

Mot de passe
<input type='password' name="mdpAdmin" value ="" size="50"/><br><br>

<input type="submit" value="Connexion">


<input type="submit" value="ConnexionAdmin">
<?php echo form_close();?>


