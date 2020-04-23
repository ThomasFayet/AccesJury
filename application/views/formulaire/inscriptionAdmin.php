<h2>Page d'inscription</h2>
<?php //echo validation_errors();?>
<?php echo form_open('formulaire/createAdmin');?>

Nom
<input type='text' name='nom_admin' value="" size="50" /><br>

Email
<input type='text' name='mail_admin' value ="" size="50"/><br>

Mot de passe
<input type='password' name='mdpAdmin' value ="" size="50"/><br><br>

Confirm Mot de passe
<input type='password' name='confirmMdpAdmin' value ="" size="50"/><br><br>

<input type="submit" value="Confirmer"/>





