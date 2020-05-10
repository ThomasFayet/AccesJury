<?php

class Reservation_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('Reservation_modele');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('user_agent');
	}

	public function create()
	{

		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required');
		$this->form_validation->set_rules('adresse', 'Adresse', 'required');
		$this->form_validation->set_rules('tel', 'Téléphone', 'required');
		$this->form_validation->set_rules('mail', 'Adresse mail', 'required');
		$this->form_validation->set_rules('mdpClient', 'Mot de passe', 'required');
		$this->form_validation->set_rules('confirmMdp', 'Mot de passe', 'required|matches[mdpClient]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/inscription');
		} else {
			$this->Reservation_modele->set_formulaire();
			$this->load->view('formulaire/successInscription');
		}


	}

	/*public function createAdmin()
	{

		$this->form_validation->set_rules('nomAdmin', 'Nom', 'required');
		$this->form_validation->set_rules('mdpAdmin', 'Mot de passe', 'required');
		$this->form_validation->set_rules('confirmMdpAdmin', 'Mot de passe', 'required|matches[mdpAdmin]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/inscriptionAdmin');
		} else {
			$this->Reservation_modele->donneeAdmin();
			$this->load->view('formulaire/successInscription');
		}


	}*/

	public function testConnexion()
	{


		$this->form_validation->set_rules('mail', "Identifiant", 'required');
		$this->form_validation->set_rules('mdpClient', 'Mot de passe', 'required|callback_verifMdp');

		//*test le formulaire, si marche pas retour a la page de connexion*//
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/connexion');
		} //*Sinon deux variables crée, mail et mdp qui representent les deux inputs du formulaire
		else {
			$mail = $this->input->post('mail');
			$mdp = $this->input->post('mdpClient');

			//*Variable user qui test la fonction login dans le model
			$user = $this->Reservation_modele->login($mail, $mdp);

			//*Recupere l'id correspondant au client
			$id = $this->input->post('mail');
			$this->session->id = $id;
			$numClient = $this->Reservation_modele->getId();
			$this->session->numClient = $numClient[0]['idclient'];

			//* Si la fonction model marche, sa lance une boucle qui a chaque tour, test $user/
			if ($user) {
				foreach ($user as $row) ;
				$this->session->set_userdata('id_connexion', $row->id_connexion);
				$this->session->set_userdata('roles', $row->roles);

				//*Si la session lancé à comme roles dans la table client, "admin" alors l'utilisateur est redirigé vers le profil admin (view differente des users lambda)
				if ($this->session->userdata('roles') == "admin") {
					redirect('Reservation_controller/profilAdmin');
				} //*Sinon si la session lancé à comme roles dans la table client, "membre" alors l'utilisateur est redirigé vers le profil membre (view differente des users admin)
				elseif ($this->session->userdata('roles') == "membre") {
					redirect('Reservation_controller/profilPersoUser');
				}
			} //*Si aucune des conditions precedentes ne fonctionne, l'user est redirigé vers la page de connexion
			else {
				$this->load->view('formulaire/connexion');
			}
		}
	}

	public function verifRole()
	{
		if (isset($this->Reservation_modele->getRole()[0]['roles'])) {
			if ($this->Reservation_modele->getRole()[0]['roles'] == 1) {
				return TRUE;
			} else {
				$this->form_validation->set_message('verifRole', 'Mauvais mot de passe');
			}
		} else {
			echo("error");

		}
	}

	public
	function verifMdp()
	{		if (isset($this->Reservation_modele->getMdp()[0]['mdp_connexion']))
			if ($this->Reservation_modele->getMdp()[0]['mdp_connexion'] == $this->input->post('mdpClient')) {
				return TRUE;
		} else {
			echo '<span class="msg-error">Mauvais identifiant ou mot de passe</span>';

		}
	}

	public
	function verifAncienMdp()
	{
		if (isset($this->Reservation_modele->getAncienMdp()[0]['mdp_connexion'])) {
			if ($this->Reservation_modele->getAncienMdp()[0]['mdp_connexion'] == $this->input->post('oldMdp')) {
				return TRUE;
			} else {
				$this->form_validation->set_message('verifMdp', 'Mauvais mot de passe');
			}
		} else {
			echo("error");

		}
	}








	public
	function modifierPassword()
	{
		$this->form_validation->set_rules('oldMdp', 'AncienMotDePasse', 'required|callback_verifAncienMdp');
		$this->form_validation->set_rules('newMdp', 'NouveauMotDePasse', 'required');
		$this->form_validation->set_rules('confirmNewMdp', 'ConfirmNewMotDePasse', 'required|matches[newMdp]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/modifPassword');
		} else {
			$this->Reservation_modele->updatePassword();
			$this->load->view('formulaire/successInscription');
		}
	}

	public
	function modifierPasswordAdmin()
	{
		$this->form_validation->set_rules('oldMdp', 'AncienMotDePasse', 'required|callback_verifAncienMdp');
		$this->form_validation->set_rules('newMdp', 'NouveauMotDePasse', 'required');
		$this->form_validation->set_rules('confirmNewMdp', 'ConfirmNewMotDePasse', 'required|matches[newMdp]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/modifPasswordAdmin');
		} else {
			$this->Reservation_modele->updatePassword();
			$this->load->view('formulaire/successInscription');
		}
	}


	public
	function modifierIDAdmin()
	{
		$this->form_validation->set_rules('oldID', 'AncienNom', 'required|callback_verifAncienID');
		$this->form_validation->set_rules('newID', 'NouveauNom', 'required');
		$this->form_validation->set_rules('confirmID', 'ConfirmNewNom', 'required|matches[newID]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/modifID');
		} else {
			$this->Reservation_modele->updateID();
			$this->load->view('formulaire/successInscription');
		}
	}

	public
	function modifierIDUser()
	{
		$this->form_validation->set_rules('oldID', 'AncienNom', 'required|callback_verifAncienID');
		$this->form_validation->set_rules('newID', 'NouveauNom', 'required');
		$this->form_validation->set_rules('confirmID', 'ConfirmNewNom', 'required|matches[newID]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/modifIDUser');
		} else {
			$this->Reservation_modele->updateID();
			$this->load->view('formulaire/successInscription');
		}
	}

	public
	function verifID()
	{
		if (isset($this->Reservation_modele->getIDUPD()[0]['id_connexion'])) {
			if ($this->Reservation_modele->getIDUPD()[0]['id_connexion'] == $this->input->post('mail')) {
				return TRUE;
			} else {
				$this->form_validation->set_message('verifID', 'Mauvais identifiant');
			}
		} else {
			echo("error");

		}
	}

	public
	function verifAncienID()
	{
		if (isset($this->Reservation_modele->getAncienID()[0]['id_connexion'])) {
			if ($this->Reservation_modele->getAncienID()[0]['id_connexion'] == $this->input->post('oldID')) {
				return TRUE;
			} else {
				$this->form_validation->set_message('verifID', 'Mauvais identifiant');
			}
		} else {
			echo("error");

		}
	}




	public
	function monProfil()
	{
		if (isset($this->session->id)) {
			$data['dataReservation'] = $this->Reservation_modele->getReservation();
			$data['dataClient'] = $this->Reservation_modele->getnomClient();

			$this->load->view('formulaire/profil', $data);

		}

	}

	public
	function profilPersoUser()
	{
		if (isset($this->session->id)) {
			$this->load->view('formulaire/profilUser');

		}

	}

	public
	function profilUser()
	{

		$data['dataReservation'] = $this->Reservation_modele->getReservationUser();
		$data['dataClient'] = $this->Reservation_modele->getnomClient();


		$this->load->view('formulaire/profilUserForAdmin', $data);

	}

	public
	function profilAdmin()
	{
		if (isset($this->session->id)) {

			$this->load->view('formulaire/profilAdminView');

		}
	}

	public
	function ListeClient()
	{
		if (isset($this->session->id)) {
			$data['dataClient'] = $this->Reservation_modele->getClient();
			$datar['dataReservation'] = $this->Reservation_modele->getReservationUser();

			$this->load->view('formulaire/allUsers', $data, $datar);

		}
	}


	public
	function deconnexion()
	{
		$this->session->sess_destroy();
		$this->load->view('formulaire/pageDeconnexion');
	}

	public
	function formulaireReservation()
	{
		$data['dataReservation'] = $this->Reservation_modele->getReservation();
		$data['dataTypeLogement'] = $this->Reservation_modele->getTypeLogement();

		$this->form_validation->set_rules('nbpersonnes', 'nbpersonnes', 'required');
		$this->form_validation->set_rules('datevacances', 'datevacances', 'required');
		$this->form_validation->set_rules('typepension', 'typepension', 'required');
		$this->form_validation->set_rules('menagereservation', 'menagereservation');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/reservation', $data);
		} else {

			$this->Reservation_modele->setReservation();
			redirect('Reservation_controller/formulaireReservationBIS');
		}

	}

	public
	function formulaireReservationBIS()
	{

		$data['dataReservation'] = $this->Reservation_modele->getReservationUserLimit();
		$data['dataTypeLogement'] = $this->Reservation_modele->getTypeLogement();
		$this->load->view('formulaire/reservationBIS', $data);

	}



	public
	function affichageReservations()
	{
		$data['dataReservation'] = $this->Reservation_modele->getReservationUserBIS();
		$this->load->view('formulaire/voirReserv', $data);

	}



	public function supprUser()
	{
		$id = $this->input->post('idclient');
		$this->Reservation_modele->deleteUser($id);
		redirect('Reservation_controller/ListeClient');
	}

	public function supprReservation()
	{
		$id = $this->input->post('idReserv');

		$etat = $this->Reservation_modele->deleteReservation($id);

		if ($etat) {
			foreach ($etat as $row) ;
			$this->session->set_userdata('etatreserv', $row->etatreserv);

			if ($this->session->userdata('etatreserv') == "valide") {
				redirect($this->agent->referrer());

			}
		} else {
			$id = $this->input->post('idReserv');
			$this->Reservation_modele->deleteReservationBIS($id);
			$this->session->set_tempdata('item', 'This is a message.', 10);
			redirect('Reservation_controller/monProfil');
		}
	}


	public function supprReservationAdmin()
	{
		$id = $this->input->post('idReserv');
		$this->Reservation_modele->deleteReservationBIS($id);
		redirect($this->agent->referrer());
	}


	public function validerReservation()
	{
		$this->Reservation_modele->validerReservation();
		redirect('Reservation_controller/ListeClient');
	}


	public function modifReservation()
	{

		$data['dataTypeLogement'] = $this->Reservation_modele->getTypeLogement();
		$data['dataReservation'] = $this->Reservation_modele->getReservationUserLimit();

		$this->load->view('formulaire/reservationAdmin', $data);

		if($this->input->post('update'))
		{

			$d=$this->input->post('datevacances');
			$n=$this->input->post('nbpersonnes');
			$t=$this->input->post('typepension');
			$m=$this->input->post('menagereservation');

			$this->Reservation_modele->modifierReservation($n,$d,$t,$m);
			redirect('Reservation_controller/monProfil');
		}
	}

	public function modifReservationAdmin()
	{

		$data['dataTypeLogement'] = $this->Reservation_modele->getTypeLogement();
		$data['dataReservation'] = $this->Reservation_modele->getReservationUserLimit();
		$this->load->view('formulaire/reservationAdmin', $data);

		if($this->input->post('update'))
		{

			$d=$this->input->post('datevacances');
			$n=$this->input->post('nbpersonnes');
			$t=$this->input->post('typepension');
			$m=$this->input->post('menagereservation');

			$this->Reservation_modele->modifierReservation($n,$d,$t,$m);
			redirect('Reservation_controller/ListeClient');
		}
	}


	public function modifClient()
	{

		$this->load->view('formulaire/inscriptionAdmin');

		if($this->input->post('updateInscription'))
		{

			$n=$this->input->post('nom');
			$p=$this->input->post('prenom');
			$a=$this->input->post('adresse');
			$t=$this->input->post('tel');
			$m=$this->input->post('mail');

			$this->Reservation_modele->modifierClient($n,$p,$a,$t,$m);
			redirect('Reservation_controller/ListeClient');
		}
	}

}
