<?php

class test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('Reservation_modele');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function testpage()
	{
		redirect('formulaire/ListeClient');
	}
}
