<?php

class Reservation_modele extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}


	public function set_formulaire()
	{


		$data = array(
			'nom_client' => $this->input->post('nom'),
			'prenom_client' => $this->input->post('prenom'),
			'adresse_client' => $this->input->post('adresse'),
			'tel_client' => $this->input->post('tel'),
			'id_connexion' => $this->input->post('mail'),
			'mdp_connexion' => $this->input->post('mdpClient'),
			'roles' => 'membre'
		);

		return $this->db->insert('client', $data);
	}


	public function getId()
	{
		$this->db->select('*')
			->from('client')
			->where('id_connexion', $this->session->id);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function login($mail, $pass)
	{
		$this->db->select('id_connexion,mdp_connexion,roles');
		$this->db->from('client');
		$this->db->where('id_connexion', $mail);
		$this->db->where('mdp_connexion', $pass);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}


	public
	function getMdp()
	{
		$this->db->select('mdp_connexion')
			->from('client')
			->where('id_connexion', $this->input->post('mail'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function getAncienMdp()
	{
		$this->db->select('mdp_connexion')
			->from('client')
			->where('id_connexion', $this->session->id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function updatePassword()
	{
		$this->db->set('mdp_connexion', $this->input->post('newMdp'))
			->where('id_connexion', $this->session->id)
			->update('client');
	}


	public
	function getIDUPD()
	{
		$this->db->select('id_connexion')
			->from('client')
			->where('id_connexion', $this->input->post('mail'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function getAncienID()
	{
		$this->db->select('id_connexion')
			->from('client')
			->where('id_connexion', $this->session->id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function updateID()
	{
		$this->db->set('id_connexion', $this->input->post('newID'))
			->where('id_connexion', $this->session->id)
			->update('client');
	}



	public
	function setReservation()
	{

		$data['numClient'] = $this->Reservation_modele->getId();

		$date_maintenant = date('Y-m-d');

		$data = array(
			'datereservation' => $date_maintenant,
			'nbpersonnes' => $this->input->post('nbpersonnes'),
			'datevacances' => $this->input->post('datevacances'),
			'typepension' => $this->input->post('typepension'),
			'menagereservation' => $this->input->post('menagereservation'),
			'etatreserv' => 'En attente',
			'idclient' => $this->session->numClient
		);

		return $this->db->insert('reservation', $data);
	}

	public
	function setPrixLogement()
	{

	}


	public
	function getReservation()
	{
		$this->db->select('*')
			->from('reservation')
			->join('client', 'reservation.idclient = client.idclient')
			->where('id_connexion', $this->session->id);
		$query = $this->db->get();
		return $query->result_array();

	}

	public
	function getReservationBIS()
	{
		$this->db->select('*')
			->from('reservation')
			->join('client', 'reservation.idclient = client.idclient')
			->where('id_connexion', $this->session->id)
		->where('idreserv', $this->input->post('id'));
		$query = $this->db->get();
		return $query->result_array();

	}

	public
	function getClient()
	{
		$this->db->select('*')
			->from('client')
			->where('roles', 'membre');
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function getnomClient()
	{
		$this->db->select('*')
			->from('client')
			->where('idclient', $idUser = $this->input->get('id'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function getReservationUser()
	{
		$this->db->select('*')
			->from('reservation')
			->where('idclient', $idUser = $this->input->get('id'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function getReservationUserBIS()
	{
		$this->db->select('*')
			->from('reservation')
			->where('idreserv', $idUser = $this->input->get('id'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public
	function getReservationUserLimit()
	{
		$this->db->select('*')
			->from('reservation')
			->order_by('idreserv', 'DESC')
		->limit (1);
		$query = $this->db->get();
		return $query->result_array();
	}


	public
	function getTypeLogement()
	{
		$this->db->select('*')
			->from('typelogement');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function arrayAllUser()
	{
		$this->db->select('*')
			->from('reservation');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function arrayReserv()
	{
		$this->db->select('*');
		$this->db->from('reservation');
		$this->db->where('idreserv', $idUser = $this->input->get('id'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function arrayClient()
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('idclient', $idUser = $this->input->get('idclient'));
		$query = $this->db->get();
		return $query->result_array();
	}


	public function deleteUser()
	{
		$this->db->where('idclient', $idUser = $this->input->get('id'));
		$this->db->delete('reservation');

		$this->db->where('idclient', $idUser = $this->input->get('id'));
		$this->db->delete('client');
	}

	public function deleteReservation()
	{
		$this->db->select('*');
		$this->db->from('reservation');
		$this->db->where('idreserv', $idUser = $this->input->get('id'));
		$this->db->where('etatreserv', 'valide');
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}


	public function deleteReservationBIS()
	{
		$this->db->where('idreserv', $idUser = $this->input->get('id'));
		$this->db->delete('reservation');
	}


	public function validerReservation()
	{

		$this->db->where('idreserv', $idUser = $this->input->get('id'));

		$data = array(
			'etatreserv' => 'valide',
		);

		return $this->db->update('reservation', $data);
	}


	public function modifierReservation($personne, $datevacances, $typepension, $menagereservation)
	{

		$query = $this->db->query("update reservation SET nbpersonnes='$personne',datevacances='$datevacances',typepension='$typepension',menagereservation='$menagereservation', etatreserv ='En attente' where idreserv='" . $this->input->get('id'). "'");
	}

	public function modifierClient($nom, $prenom, $adresse, $tel, $mail)
	{

		$query = $this->db->query("update client SET nom_client='$nom',prenom_client='$prenom',adresse_client='$adresse',tel_client='$tel',id_connexion ='$mail' where idclient='" . $this->input->get('idclient'). "'");
	}


}
