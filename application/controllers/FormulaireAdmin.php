<?php

class Formulaire extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('Reservation_modele');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}


	public function createAdmin()
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


	}

	public function testConnexionAdmin()
	{


		$this->form_validation->set_rules('mail_admin', "Identifiant", 'required');
		$this->form_validation->set_rules('mdpAdmin', 'Mot de passe', 'required|callback_verifMdpAdmin');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('formulaire/connexion');

		} else {

			$id = $this->input->post('mail_admin');
			$this->session->id = $id;
			$numAdmin = $this->Reservation_modele->getIdAdmin();
			$this->session->numAdmin = $numAdmin[0]['idadmin'];
			redirect('formulaire/profilAdmin');
		}
	}

	public function verifMdpAdmin()
	{
		if (isset($this->Reservation_modele->getMdpAdmin()[0]['mdp_admin'])) {
			if ($this->Reservation_modele->getMdpAdmin()[0]['mdp_admin'] == $this->input->post('mdpAdmin')) {
				return TRUE;
			} else {
				$this->form_validation->set_message('verifMdpAdmin', 'Mauvais mot de passe');
			}
		} else {
			echo("erreur");

		}
	}


	public function profilAdmin()
	{
		if (isset($this->session->id)) {
			$data['dataReservation'] = $this->Reservation_modele->getReservation();
			echo("Compte : " . $this->session->id . "<br><br>");

			$this->load->view('formulaire/profilAdminView');

		}

	}
}
