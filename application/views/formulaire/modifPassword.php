<h2> Changer votre mot de passe </h2>
<?php echo form_open('reservation_controller/modifierPassword');?>

Ancien mot de passe 
<input type='password' name='oldMdp' value="" size="50" /><br>

Nouveau Mot de passe
<input type='password' name='newMdp' value ="" size="50"/><br><br>

Confirmation Mot de passe
<input type='password' name='confirmNewMdp' value ="" size="50"/><br><br>

<input type="submit" value="Connexion"> <a href="/projet_cvven/index.php/Reservation_controller/profilAdmin">Annuler</a>

