<?php

class Reservation_modele extends CI_Model {
    
    public function __construct(){
        $this->load->database();        
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    
    public function set_formulaire(){

        
        $data =array(
            'nom_client' => $this->input->post('nom'),
            'prenom_client'=> $this->input->post('prenom'),
            'adresse_client' => $this->input->post('adresse'),
            'tel_client' => $this->input->post('tel'),
            'id_connexion' => $this->input->post('mail'),
            'mdp_connexion' => $this->input->post('mdpClient'),
            'roles' => 'membre'
        );
        
        return $this->db->insert('client', $data);
    }
    
    public function getId(){
        $this->db->select('*')
                 ->from('client')
                 ->where('id_connexion',$this->session->id);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function getMdp(){
        $this->db->select('mdp_connexion')
                        ->from ('client') 
                        ->where ('id_connexion', $this->input->post('mail'));
        $query= $this->db->get();   
        return $query->result_array();
    }
    
    public function getAncienMdp(){
        $this->db->select('mdp_connexion')
                        ->from ('client') 
                        ->where ('id_connexion', $this->session->id);
        $query= $this->db->get();   
        return $query->result_array();
    }
    
    public function updatePassword(){
        $this->db->set('mdp_connexion',$this->input->post('newMdp'))
                  ->where('id_connexion',$this->session->id)
                  ->update('client');
    }

    public function login($mail, $pass){
        $this->db->select('id_connexion,mdp_connexion,roles');
        $this->db->from('client');
        $this->db->where('id_connexion',$mail);
        $this->db->where('mdp_connexion',$pass);

        $query = $this->db->get();

        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
    
      
    public function setReservation(){
        
        $data['numClient'] = $this->Reservation_modele->getId();
        
        $date_maintenant=date('Y-m-d');

        $prixLogement=$this->Reservation_modele->setPrixLogement();
        
        $data = array(       
        'datereservation'=> $date_maintenant,
        'nbpersonnes'=> $this->input->post('nbpersonnes'),
        'datevacances'=> $this->input->post('datevacances'),
        'typepension'=> $this->input->post('typepension'),
        'menagereservation'=> $this->input->post('menagereservation'),
        'idtypelogement'=> $this->input->post('typelogement'),
        'prixreserv'=> $prixLogement[0]['prixlogement'],
        'idclient'=> $this->session->numClient
        );
                                    
        return $this->db->insert('reservation', $data);                     
    }
    
    public function setPrixLogement(){
        $this->db->select('prixlogement')
                   ->from('typelogement')
                   ->where('idtypelogement',$this->input->post('typelogement'));
        $query= $this->db->get();   
        return $query->result_array();
    }

    
    public function getReservation(){
      $this->db->select('*')
                   ->from('reservation')
                
                    ->join ('client','reservation.idclient = client.idclient')
                   
                   ->where('id_connexion',$this->session->id);
        $query= $this->db->get();   
        return $query->result_array();  
    }

    public function getConfirmReservation(){
        $this->db->select('*')
                ->from('reservation')
                ->where('idreserv', $idUser = $this->input->get('id'));
        $query = $this->db->get();
        return $query->result_array();
    }

     public function getReservationUser()
    {
        $this->db->select('*')
            ->from('reservation')
            ->where('idclient', $idUser = $this->input->get('id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllReservation(){
        $this->db->select('*')
                   ->from('reservation');
        $query= $this->db->get();   
        return $query->result_array();  
    }
    
    public function getAllUser(){
        $this->db->select('*')
                   ->from('client')
                   ->where('roles','membre');
        $query= $this->db->get();   
        return $query->result_array();  
    }

    public function getnomClient()
    {
        $this->db->select('*')
            ->from('client')
            ->where('idclient', $idUser = $this->input->get('id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTypeLogement(){
        $this->db->select('*')
                 ->from('typelogement');
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


}
    
   


    
    

    
    
    
        
