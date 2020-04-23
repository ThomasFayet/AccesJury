<?php

class Reservation_controller extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
       
        
        $this->load->model('Reservation_modele');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    
    public function create(){
        
        $this->form_validation->set_rules('nom','Nom', 'required');
        $this->form_validation->set_rules('prenom','Prénom','required');
        $this->form_validation->set_rules('adresse','Adresse','required');
        $this->form_validation->set_rules('tel','Téléphone','required');
        $this->form_validation->set_rules('mail','Adresse mail','required');
        $this->form_validation->set_rules('mdpClient', 'Mot de passe','required');
        $this->form_validation->set_rules('confirmMdp', 'Mot de passe','required|matches[mdpClient]');
        
        if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/inscription');            
        }
        else {
            $this->Reservation_modele->set_formulaire();
            $this->load->view('formulaire/successInscription');
        }
        
         
        
    }
    
    public function testConnexion(){
        
        
        $this->form_validation->set_rules('mail',"Identifiant", 'required');
        $this->form_validation->set_rules('mdpClient','Mot de passe','required|callback_verifMdp');
        
        if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/connexion');
        
        }
        else{
            
            $mail=$this->input->post('mail');
            $mdp = $this->input->post('mdpClient');

            $user = $this->Reservation_modele->login($mail, $mdp);
            
            $id=$this->input->post('mail');
            $this->session->id = $id;
            $numClient= $this->Reservation_modele->getId();
            $this->session->numClient = $numClient[0]['idclient'];
            if ($user) {
                foreach ($user as $row) ;
                $this->session->set_userdata('id_connexion', $row->id_connexion);
                $this->session->set_userdata('roles', $row->roles);

                //*Si la session lancé à comme roles dans la table client, "admin" alors l'utilisateur est redirigé vers le profil admin (view differente des users lambda)
                if ($this->session->userdata('roles') == "admin") {
                    redirect('Reservation_controller/profilAdmin');
                } //*Sinon si la session lancé à comme roles dans la table client, "membre" alors l'utilisateur est redirigé vers le profil membre (view differente des users admin)
                elseif ($this->session->userdata('roles') == "membre") {
                    redirect('Reservation_controller/monProfil');
                }
            } //*Si aucune des conditions precedentes ne fonctionne, l'user est redirigé vers la page de connexion
            else {
                $this->load->view('formulaire/connexion');
            }
        }
    }

    public function verifRole(){
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
        
    public function verifMdp(){
        if(isset($this->Reservation_modele->getMdp()[0]['mdp_connexion'])){
            if($this->Reservation_modele->getMdp()[0]['mdp_connexion']==$this->input->post('mdpClient')){
                return TRUE;
            }
            else{
                $this->form_validation->set_message('verifMdp','Mauvais mot de passe');
            }
        }
        else{   
            echo("error");
        
        }
    }
    
    public function verifAncienMdp(){
        if(isset($this->Reservation_modele->getAncienMdp()[0]['mdp_connexion'])){
            if($this->Reservation_modele->getAncienMdp()[0]['mdp_connexion']==$this->input->post('oldMdp')){
                return TRUE;
            }
            else{
                $this->form_validation->set_message('verifMdp','Mauvais mot de passe');
            }
        }
        else{   
            echo("error");
        
        }
    }
    
    public function modifierPassword(){
        $this->form_validation->set_rules('oldMdp','AncienMotDePasse', 'required|callback_verifAncienMdp');
        $this->form_validation->set_rules('newMdp','NouveauMotDePasse','required');
        $this->form_validation->set_rules('confirmNewMdp','ConfirmNewMotDePasse','required|matches[newMdp]');
        
         if($this->form_validation->run()===FALSE){
            $this->load->view('formulaire/modifPassword');            
        }
        else {
            $this->Reservation_modele->updatePassword();
            $this->load->view('formulaire/successInscription');
        }
    }
    
    public function monProfil(){
        if(isset($this->session->id)){
            $data['dataReservation']=$this->Reservation_modele->getReservation();
            echo ("Compte : ".$this->session->id."<br><br>");
            //echo ("num : ".$this->session->numClient."<br>");
            $this->load->view('formulaire/profil',$data);
       
        }   
    }

    //*Profil d'un client//*
    public function profilUser(){

        $data['dataReservation'] = $this->Reservation_modele->getReservationUser();
        $data['dataClient'] = $this->Reservation_modele->getnomClient();
        echo("Compte : " . $this->session->id . "<br><br>");

        $this->load->view('formulaire/profilUserForAdmin', $data);
    }

    public function profilAdmin(){
        if (isset($this->session->id)) {
            echo("Compte : " . $this->session->id . "<br><br>");

            $this->load->view('formulaire/profilAdminView');
        }
    }

    public function allReservation(){
        if (isset($this->session->id)) {
            $data['dataReservation'] = $this->Reservation_modele->getAllReservation();

            $this->load->view('formulaire/gererReservation',$data);
        }
    }

    public function allUser(){
        if (isset($this->session->id)) {
            $data['dataUser'] = $this->Reservation_modele->getAllUser();

            $this->load->view('formulaire/gererUser',$data);
        }
    }
    
    public function deconnexion(){
        $this->session->sess_destroy();
        $this->load->view('formulaire/pageDeconnexion');
    }
    
    public function formulaireReservation(){
        
        $data['dataTypeLogement']=$this->Reservation_modele->getTypeLogement();
        
        $this->form_validation->set_rules('nbpersonnes', 'nbpersonnes', 'required');
        $this->form_validation->set_rules('datevacances', 'datevacances','required');
        $this->form_validation->set_rules('typepension', 'typepension','required');
        $this->form_validation->set_rules('menagereservation', 'menagereservation');        
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('formulaire/reservation',$data);
        } 
        else
        {
            
            $this->Reservation_modele->setReservation();
            redirect('Reservation_controller/affichageReservations');
        }
    }
    
    public function affichageReservations(){
        echo ("Confirmation de votre réservation : "."<br><br>");
        $data['dataReservation']=$this->Reservation_modele->getConfirmReservation();
        $this->load->view('formulaire/successReservation',$data);       
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
        redirect('formulaire/ListeClient');
    }
    
    
}
